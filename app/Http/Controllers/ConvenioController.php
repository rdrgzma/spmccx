<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CadastroExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Convenio;
use App\Models\Cadastro;
use App\Models\Dependente;


class ConvenioController extends Controller
{
    public function index()
    {
        $convenios = Convenio::all();
        return view('convenio.index', compact('convenios'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('convenio.create', compact('user'));
    }
    public function store(Request $request)
    {
        var_dump($request->all());
        $data = $request->all();
        $user = new User();
        $user->name = $data['nome'];
        $user->email = $data['email'];
        isset($data['cnpj']) ? $user->password = Hash::make($data['cnpj']) : $user->password = Hash::make($data['cpf']);
        $user->role = 'Convenio';
        //salvar usuario
        $user->save();
        //salvar convenio
        $convenio = new Convenio();
        $convenio->nome = $data['nome'];
        $convenio->cnpj = $data['cnpj'];
        $convenio->user_id = $user->id;
        $convenio->email = $data['email'];
        $convenio->telefone = $data['telefone'];
        $convenio->celular = $data['celular'];
        $convenio->cpf = $data['cpf'];
        $convenio->ativo = $data['ativo'];
        $convenio->save();
        return redirect()->route('convenios')->with('success', 'Cadastro realizado com sucesso!');
    }
    public function edit($id)
    {
        $cadastro = Convenio::where('user_id', $id)->first();
        return view('convenio.edit', compact('cadastro'));
    }

    public function show($id)
    {
        $user = auth()->user();
        $cadastro = Convenio::where('user_id', $user->id)->first();
    }

    public function showAssociado($id)
    {

        $cadastro = Convenio::where('user_id', $id)->first();

        return view('convenio.show', compact('cadastro'));
    }

    public function update(Request $request, $id)
    {
        return view('convenio.update');
    }

    public function destroy($id)
    {
        return view('cadastro.destroy');
    }

    public function createAdmin()
    {
        return view('cadastro.create-admin');
    }

    public function storeAdmin(Request $request)
    {
        $data = $request->all();
        var_dump($data);
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
        $cadastros = Cadastro::all();
        return view('cadastro.lista', compact('cadastros'));
    }

    public function search(Request $request)
    {
        $dataForm = $request->all();
        $cadastros = Cadastro::where('nome', 'LIKE', "%{$dataForm['search']}%")
            ->orWhere('email', 'LIKE', "%{$dataForm['search']}%")
            ->orWhere('cpf', 'LIKE', "%{$dataForm['search']}%")
            ->Where('ativo', 'sim')
            ->paginate(25);
        $redirect = true;

        return view('cadastro.lista', compact('cadastros', 'redirect'));
    }

    public function ExportCadastro()
    {
        $cadastros = Cadastro::with(['enderecos', 'dependentes'])->get();


        return view('cadastro.export', compact('cadastros'));
    }

    //listar cadastros e dependente
    public function listCadDep()
    {

        $cadastros = Cadastro::with(['dependentes'])->get();

        return view('convenio.listar', compact('cadastros'));
    }

    public function dependentes($id)
    {
        $cadastro = Cadastro::find($id);
        $dependentes = Dependente::where('cadastro_id', $id)->get();
        return view('convenio.dependentes', compact('cadastro', 'dependentes'));
    }
    //editar convenio
    public function editConvenio($id)
    {
        $convenio = Convenio::where('id', $id)->first();
        return view('convenio.edit', compact('convenio'));
    }

    //atualizar convenio
    public function updateConvenio(Request $request, $id)
    {
        $data = $request->all();
        $convenio = Convenio::where('id', $id)->first();
        $convenio->nome = $data['nome'];
        $convenio->cnpj = $data['cnpj'];
        $convenio->email = $data['email'];
        $convenio->telefone = $data['telefone'];
        $convenio->celular = $data['celular'];
        $convenio->cpf = $data['cpf'];
        $convenio->ativo = 'sim';
        $convenio->save();
        return redirect()->route('convenios')->with('success', 'Cadastro atualizado com sucesso!');
    }

}
