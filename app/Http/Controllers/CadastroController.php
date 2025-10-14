<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CadastroExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cadastro;
use App\Models\Dependente;
use App\Models\Endereco;
use App\Models\Autorizacao;
use App\Models\Matricula;


class CadastroController extends Controller
{
    public function index()
    {
        return view('cadastro.associado.index');
    }

    public function create()
    {
        $user = auth()->user();
        return view('cadastro.associado.criar.pessoal', compact('user'));
    }



    public function storePessoal(Request $request)
    {

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $cadastro = Cadastro::create($data);



        return view('cadastro.associado.criar.endereco', compact('cadastro'));
    }
    public function storeEndereco(Request $request)
    {
        $data = $request->all();
        $cadastro = Cadastro::where('id', $data['cadastro_id'])->first();
        $endereco = Endereco::create($data);
        return view('cadastro.associado.criar.matricula', compact('cadastro'));
    }
    public function storeMatricula(Request $request)
    {
        $data = $request->all();
        $cadastro = Cadastro::where('id', $data['cadastro_id'])->first();
        $_turnos = implode(',', $data['turnos']);
        $data['turnos'] = $_turnos;
        $_funcao = implode(',', $data['funcao']);
        $data['funcao'] = $_funcao;
        $matricula = Matricula::create($data);

        $cadastros = Cadastro::paginate(25);
        return view('cadastro.lista', compact('cadastros'));
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();
        $data['user_id'] = $user->id;
        $funcao = implode(',', $data['funcao']);
        $data['funcao'] = $funcao;
        $_turnos_cc = implode(',', $data['turnos_cc']);
        $data['turnos_cc'] = $_turnos_cc;
        $_turnos_xla = implode(',', $data['turnos_xla']);
        $data['turnos_xla'] = $_turnos_xla;

        $cadastro = Cadastro::create($data);

        $user->update(['cadastro_id' => $cadastro->id, 'telefone' => $data['telefone'], 'has_cadastro_completo' => 1]);

        return view('cadastro.associado.criar.show', compact('cadastro'));
    }
    public function edit($id)
    {
        $cadastro = Cadastro::where('id', $id)->first();
        return view('cadastro.associado.criar.edit', compact('cadastro'));
    }

    public function show($id)
    {
        $user = auth()->user();
        $cadastro = Cadastro::where('user_id', $user->id)->first();

        return view('cadastro.associado.show', compact('cadastro'));
    }

    public function showAssociado($id)
    {

        $cadastro = Cadastro::where('id', $id)->first();
        $endereco = Endereco::where('cadastro_id', $cadastro->id)->first();
        $dependentes = Dependente::where('cadastro_id', $cadastro->id)->get();
        $matriculas = Matricula::where('cadastro_id', $cadastro->id)->first();
        $autorizacoes = Autorizacao::where('cadastro_id', $cadastro->id)->get();
        $user = $cadastro->user;

        return view('cadastro.associado.show', compact('cadastro', 'endereco', 'dependentes', 'matriculas', 'autorizacoes', 'user'));
    }

    public function update(Request $request, $id)
    {
        return view('cadastro.associado.update');
    }

    public function destroy($id)
    {
        $dependentes = Dependente::where('cadastro_id', $id)->delete();
    
        $endereco = Endereco::where('cadastro_id', $id)->delete();
        $matricula = Matricula::where('cadastro_id', $id)->delete();
            
        $autorizacoes = Autorizacao::where('cadastro_id', $id)->delete();
        User::where('cadastro_id', $id)->delete();
        $cadastro = Cadastro::where('id',$id)->delete();
        return redirect()->route('lista.index');
        
               
    }

    public function createAdmin()
    {
        return view('cadastro.associado.create-admin');
    }

    public function storeAdmin(Request $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['nome'],
            'email' => $data['email'],
            'password' => Hash::make($data['cpf']),
        ]);
        $data['user_id'] = $user->id;
        $funcao = implode(',', $data['funcao']);
        $data['funcao'] = $funcao;
        $_turnos_cc = implode(',', $data['turnos_cc']);
        $data['turnos_cc'] = $_turnos_cc;
        $_turnos_xla = implode(',', $data['turnos_xla']);
        $data['turnos_xla'] = $_turnos_xla;

        $cadastro = Cadastro::create($data);

        $user->update(['cadastro_id' => $cadastro->id, 'telefone' => $data['telefone']]);

        return redirect()->route('users.index');
    }

    function destroyAssociado($id)
    {
        $user = User::find($id);
        $user->cadastro()->delete();
        $user->delete();
        return redirect()->route('users.index');
    }

    public function pessoal(Request $request)
    {
        $data = $request->all();
        $cadastro = Cadastro::create($data);
        session()->put('cadastro', $cadastro);
        return view('cadastros.admin.create');
    }

    public function listaCadastro()
    {
        $cadastros = Cadastro::where('ativo', 'sim')->orderBy('id','asc')->paginate(25);
        $inativos = false;
        return view('cadastro.lista', compact('cadastros', 'inativos'));
    }

    public function listaCadastroInativo()
    {
        $cadastros = Cadastro::where('ativo', 'nao')->orderBy('id','asc')->paginate(25);
        $inativos = true;
        return view('cadastro.lista-inativo', compact('cadastros', 'inativos'));
    }

    public function search(Request $request)
    {
        $dataForm = $request->all();
        // cadastro ativos
            $cadastros = Cadastro::where('nome', 'LIKE', "%{$dataForm['search']}%")
        ->where('ativo', 'sim')
            ->orWhere('email', 'LIKE', "%{$dataForm['search']}%")
            ->paginate(25);
        $redirect = true;

        return view('cadastro.lista', compact('cadastros', 'redirect'));
    }

    public function ExportCadastro()
    {
        $cadastros = Cadastro::with(['enderecos', 'dependentes'])->get();


        return view('cadastro.export', compact('cadastros'));
    }

    //listar todos os cadastros com dependentes

    public function ListarCadastroDependentes()
    {
        $cadastros = Cadastro::where('ativo', 'sim')->orderBy('nome','asc')
            ->paginate(25);;
        $dependentes = Dependente::all();


        return view('convenio.listar', compact('cadastros', 'dependentes'));
    }

     public function searchAssociadoConvenio(Request $request)
    {
        $dataForm = $request->all();
        // cadastro ativos
            $cadastros = Cadastro::where('nome', 'LIKE', "%{$dataForm['search']}%")
        ->where('ativo', 'sim')
            ->orWhere('email', 'LIKE', "%{$dataForm['search']}%")
            ->orderBy('nome','asc')
            ->paginate(25);
            $dependentes = Dependente::all();
        $redirect = true;

       return view('convenio.listar', compact('cadastros', 'dependentes', 'redirect'));
    }

    // editar cadastro
    public function editarCadastro($id)
    {
        $cadastro = Cadastro::where('id', $id)->first();
        $endereco = Endereco::where('cadastro_id', $cadastro->id)->first();
        $dependentes = Dependente::where('cadastro_id', $cadastro->id)->get();
        $matriculas = Matricula::where('cadastro_id', $cadastro->id)->first();
        $autorizacoes = Autorizacao::where('cadastro_id', $cadastro->id)->get();
        $user = $cadastro->user;


        return view('cadastro.associado.edit', compact('cadastro', 'endereco', 'dependentes', 'matriculas', 'autorizacoes', 'user'));
    }
    // update cadastro
    public function updateCadastro(Request $request, $id)
    {

        $data = $request->all();
        $cadastro = Cadastro::where('id', $id);
        $cadastro->update([
            'data_associacao' => $data['data_associacao'],
            'nome' => $data['nome'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
            'data_nascimento' => $data['data_nascimento'],
            'sexo' => $data['sexo'],
            'estado_civil' => $data['estado_civil'],
            'telefone' => $data['telefone'],
            'celular' => $data['celular'],
            'mae' => $data['mae'],
            'pai' => $data['pai'],
            'nacionalidade' => $data['nacionalidade'],
            'naturalidade' => $data['naturalidade'],
            'pis' => $data['pis'],

        ]);


        $endereco = Endereco::where('cadastro_id', $id);
        $endereco->update([
            'logradouro' => $data['logradouro'],
            'numero' => $data['numero'],
            'complemento' => $data['complemento'],
            'bairro' => $data['bairro'],
            'cep' => $data['cep'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],

        ]);

        $matricula = Matricula::where('cadastro_id', $id);
        $matricula->update([
            'matricula1' => $data['matricula1'],
            'cidade1' => $data['cidade1'],
            'data_admissao1' => $data['data_admissao1'],
            'matricula2' => $data['matricula2'],
            'cidade2' => $data['cidade2'],
            'data_admissao2' => $data['data_admissao2'],
            'matricula3' => $data['matricula3'],
            'cidade3' => $data['cidade3'],
            'data_admissao3' => $data['data_admissao3'],
            'matricula4' => $data['matricula4'],
            'cidade4' => $data['cidade4'],
            'data_admissao4' => $data['data_admissao4'],

            'tel_comercial' => $data['tel_comercial'],
            'email_comercial' => $data['email_comercial'],
            'funcao' => $data['funcao'],
            'area' => $data['area'],
        ]);

        $cadastros = Cadastro::where('ativo', 'sim')->orderBy('id','asc')->paginate(25);
         $inativos = false;
        return view('cadastro.lista', compact('cadastros', 'inativos'));
    }
}
