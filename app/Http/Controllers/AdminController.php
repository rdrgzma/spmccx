<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\{
    Autorizacao,
    Cadastro,
    Endereco,
    Matricula,
    Dependente
};


class AdminController extends Controller
{
    public function index()
    {
        return view('cadastro.associado.index');
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

    public function show($id)
    {
        $user = auth()->user();
        $cadastro = Cadastro::where('user_id', $user->id)->first();

        return view('cadastro.associado.show', compact('cadastro'));
    }

    public function showAssociado($id)
    {

        $cadastro = Cadastro::where('user_id', $id)->first();

        return view('cadastro.associado.show', compact('cadastro'));
    }

    public function update(Request $request, $id)
    {
        return view('cadastro.associado.update');
    }

    public function destroy($id)
    {
        return view('cadastro.associado.destroy');
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
    public function storeAutorizacao(Request $request)
    {
        $data = $request->all();
        $cadastro = Cadastro::where('id', $data['cadastro_id'])->first();
        Autorizacao::create($data);

        return view('cadastro.pessoal');
    }
    public function destroyAssociado($id)
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
    
     // ABRE FORM DOS DEPENDENTES DO ASSOCIADO
    public function showDependente($id)
    {
        $cadastro = Cadastro::find($id);
        $dependentes = Dependente::where('cadastro_id', $id)->get();
     
       
        return view('cadastro.dependente',  compact('cadastro', 'dependentes'));
    }

    public function storeAdminDependente(Request $request, $id)
    {
        $data = $request->all();
        
        $cadastro = Cadastro::where('id', $data['cadastro_id'])->first();
        $dependente = Dependente::create($data);
        return redirect()->route('cadastros.admin.dependente',$data['cadastro_id']);
    }

    public function destroyDependente(Request $request, $id)
    {
        $data = $request->all();
       
      Dependente::destroy($data['dependente_id']);
        return redirect()->route('cadastros.admin.dependente', $id);
    }

    public function updateDependente(Request $request, $id)
    {
        $data = $request->all();

        
        $dependente = Dependente::find($data['dependente_id']);
        $dependente->update($data);
     
        return redirect()->route('cadastros.admin.dependente', $data['cadastro_id']);
    }

    // desativar associado

    public function desativar($id)
    {
        $cadastro = Cadastro::find($id);
        if ($cadastro->ativo == 'nao') {
            $cadastro->update(['ativo' => 'sim']);
        } else {
            $cadastro->update(['ativo' => 'nao']);
        }
        
         $cadastros = Cadastro::where('ativo', 'sim')->orderBy('id','asc')->paginate(25);
        $inativos = false;
        return view('cadastro.lista', compact('cadastros', 'inativos'));
       // redirect url anterior
        //return redirect()->back();
      
    }
    
     //deletar o registro do associado

    public function deletarCadastro($id)
    {
        $cadastro = Cadastro::find($id);
        $cadastro->delete($id);
         $cadastros = Cadastro::where('ativo', 'sim')->orderBy('id','asc')->paginate(25);
        $inativos = false;
        return view('cadastro.lista', compact('cadastros', 'inativos'));
       // redirect url anterior
        //return redirect()->back();
      
    }

}