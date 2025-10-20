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
use Illuminate\Support\Facades\DB;


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

// mostra form cadastro site 

    public function createFromSite()
    {
        return view('cadastro.site.formCadastro');
    }

    // cadastro  do associado 
public function storeForm(Request $request)
{
    $data = $request->all();

    // 1. Criar ou atualizar usuário
    $user = User::firstOrCreate(
        ['email' => $data['email']],
        [
            'name' => $data['name'],
            'password' => Hash::make($data['cpf']),
            'role' => 'Associado(a)',
            'status' => 'Aguardando',
            'has_cadastro_completo' => true,
        ]
    );

    // 2. Criar cadastro sempre novo
    $cadastro = Cadastro::create([
        'user_id' => $user->id,
        // data de associação  hoje
        'data_associacao' => now(),
        'nome' => $data['name'],
        'email' => $data['email'],
        'telefone' => $data['telefone'] ?? null,
        'celular' => $data['celular'] ?? null,
        'mae' => $data['mae'],
        'pai' => $data['pai'] ?? null,
        'rg' => $data['rg'],
        'cpf' => $data['cpf'],
        'pis' => $data['pis'] ?? null,
        'data_nascimento' => $data['data_nascimento'],
        'sexo' => $data['sexo'],
        'estado_civil' => $data['estado_civil'],
        'nacionalidade' => $data['nacionalidade'] ?? 'brasileiro(a)',
        'naturalidade' => $data['naturalidade'],
        'ativo' => 'nao',
    ]);

    // 3. Criar endereço
    Endereco::create([
        'user_id' => $user->id,
        'cadastro_id' => $cadastro->id,
        'logradouro' => $data['logradouro'],
        'numero' => $data['numero'],
        'complemento' => $data['complemento'] ?? null,
        'bairro' => $data['bairro'],
        'cep' => $data['cep'],
        'cidade' => $data['cidade'],
        'estado' => $data['estado'],
    ]);

    // 4. Preparar dados de matrícula
    $matriculaData = [
        'user_id' => $user->id,
        'cadastro_id' => $cadastro->id,
        'turnos' => isset($data['turnos']) ? implode(',', $data['turnos']) : null,
        'tel_comercial' => $data['tel_comercial'] ?? null,
        'email_comercial' => $data['email_comercial'] ?? null,
        'funcao' => isset($data['funcao']) ? implode(',', $data['funcao']) : null,
        'area' => $data['area'] ?? null,
    ];

    // Adicionar dados de cada matrícula (1 a 4)
    for ($i = 1; $i <= 4; $i++) {
        $matriculaData["matricula{$i}"] = $data["matricula{$i}"] ?? null;
        $matriculaData["cidade{$i}"] = $data["cidade{$i}"] ?? null;
        $matriculaData["data_admissao{$i}"] = $data["data_admissao{$i}"] ?? null;
        $matriculaData["portaria_nomeacao{$i}"] = $data["portaria_nomeacao{$i}"] ?? null;
        $matriculaData["data_nomeacao{$i}"] = $data["data_nomeacao{$i}"] ?? null;
        $matriculaData["portaria_aposentadoria{$i}"] = $data["portaria_aposentadoria{$i}"] ?? null;
        $matriculaData["data_aposentadoria{$i}"] = $data["data_aposentadoria{$i}"] ?? null;
    }

    // 5. Criar matrícula
    Matricula::create($matriculaData);

    // 6. Atualizar user com cadastro_id
    $user->update(['cadastro_id' => $cadastro->id]);

    return redirect()->route('login')
        ->with('success', 'Cadastro realizado com sucesso!');
}

    public function formPessoal()
    {
       

        return view('cadastro.pessoal');
    }
    public function storePessoal(Request $request)
    {
        
        $data = $request->all();
   
        $cadastro = Cadastro::create($data);
        if($cadastro->id){
            $user = new User();
        $user->name = $data['nome'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['cpf']);
        $user->has_cadastro_completo =true; 
        $user->save();
        $data['user_id'] = $user->id;
        };
        
        return view('cadastro.endereco', compact('cadastro'));
    }
    public function storeEndereco(Request $request)
    {
        $data = $request->all();
        $cadastro = Cadastro::where('id', $data['cadastro_id'])->first();
        $endereco = Endereco::create($data);
        return view('cadastro.matricula', compact('cadastro'));
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
    public function storeDependente(Request $request)
    {
        $data = $request->all();
        $cadastro = Cadastro::where('id', $data['cadastro_id'])->first();


        $dependente1 = array('cadastro_id' => $data['cadastro_id'], 'nome' => $data['nome1'], 'data_nascimento' => $data['data_nascimento1'], 'parentesco' => $data['parentesco1']);
        $dependente2 = array('cadastro_id' => $data['cadastro_id'], 'nome' => $data['nome2'], 'data_nascimento' => $data['data_nascimento2'], 'parentesco' => $data['parentesco2']);
        $dependente3 = array('cadastro_id' => $data['cadastro_id'], 'nome' => $data['nome3'], 'data_nascimento' => $data['data_nascimento3'], 'parentesco' => $data['parentesco3']);
        $dependente4 = array('cadastro_id' => $data['cadastro_id'], 'nome' => $data['nome4'], 'data_nascimento' => $data['data_nascimento4'], 'parentesco' => $data['parentesco4']);
        $dependente5 = array('cadastro_id' => $data['cadastro_id'], 'nome' => $data['nome5'], 'data_nascimento' => $data['data_nascimento5'], 'parentesco' => $data['parentesco5']);
        if (!empty($dependente1['nome'])) {
            $dependente = Dependente::create($dependente1);
        }
        if (!empty($dependente2['nome'])) {
            $dependente = Dependente::create($dependente2);
        }
        if (!empty($dependente3['nome'])) {
            $dependente = Dependente::create($dependente3);
        }
        if (!empty($dependente4['nome'])) {
            $dependente = Dependente::create($dependente4);
        }
        if (!empty($dependente5['nome'])) {
            $dependente = Dependente::create($dependente5);
        }
        return view('cadastro.autorizacao', compact('cadastro'));
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
    {$cadastros =  Cadastro::where('ativo', 'sim')
        ->with(['user','historicos'])
        ->orderBy('id', 'asc')
        ->paginate(25);

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
            'data_nomeacao1' => $data['data_nomeacao1'] ?? null,              // NOVO
            'portaria_nomeacao1' => $data['portaria_nomeacao1'] ?? null,      // NOVO
            'data_aposentadoria1' => $data['data_aposentadoria1'] ?? null,    // NOVO
            'portaria_aposentadoria1' => $data['portaria_aposentadoria1'] ?? null, // NOVO

            'matricula2' => $data['matricula2'],
            'cidade2' => $data['cidade2'],
            'data_admissao2' => $data['data_admissao2'],
            'data_nomeacao2' => $data['data_nomeacao2'] ?? null,              // NOVO
            'portaria_nomeacao2' => $data['portaria_nomeacao2'] ?? null,      // NOVO
            'data_aposentadoria2' => $data['data_aposentadoria2'] ?? null,    // NOVO
            'portaria_aposentadoria2' => $data['portaria_aposentadoria2'] ?? null, // NOVO

            'matricula3' => $data['matricula3'],
            'cidade3' => $data['cidade3'],
            'data_admissao3' => $data['data_admissao3'],
            'data_nomeacao3' => $data['data_nomeacao3'] ?? null,              // NOVO
            'portaria_nomeacao3' => $data['portaria_nomeacao3'] ?? null,      // NOVO
            'data_aposentadoria3' => $data['data_aposentadoria3'] ?? null,    // NOVO
            'portaria_aposentadoria3' => $data['portaria_aposentadoria3'] ?? null, // NOVO 

            'matricula4' => $data['matricula4'],
            'cidade4' => $data['cidade4'],
            'data_admissao4' => $data['data_admissao4'],
            'data_nomeacao4' => $data['data_nomeacao1'] ?? null,              // NOVO
            'portaria_nomeacao4' => $data['portaria_nomeacao1'] ?? null,      // NOVO
            'data_aposentadoria4' => $data['data_aposentadoria4'] ?? null,    // NOVO
            'portaria_aposentadoria4' => $data['portaria_aposentadoria4'] ?? null, // NOVO

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
