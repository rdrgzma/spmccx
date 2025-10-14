<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    DependenteController,
    CadastroController,
    UserController,
    ProfileController,
    HomeController,
    AutorizacaoController,
    ListaController,
    PdfController,
    ConvenioController,
    DocumentosController
};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/search', [UserController::class, 'search'])->name('users.search');

// rota cadastro do associado site
    Route::resource('cadastros/associado', CadastroController::class);
    Route::get('cadastros/associado/pessoal/form', [CadastroController::class, 'formPessoal'])->name('associado.form.pessoal');
    // rota ajax para o cadastro de pessoal
    Route::post('cadastros/associado/pessoal', [CadastroController::class, 'storePessoal'])->name('associado.pessoal');
    // rota ajax para o cadastro de dependentes
    Route::post('cadastros/associado/dependentes', [CadastroController::class, 'storeDependente'])->name('associado.dependente');
    // rota ajax para o cadastro de endereco
    Route::post('cadastros/associado/endereco', [CadastroController::class, 'storeEndereco'])->name('associado.endereco');
    // rota ajax para o cadastro de matricula
    Route::post('cadastros/associado/matricula', [CadastroController::class, 'storeMatricula'])->name('associado.matricula');
    // rota ajax para o cadastro de autorizacao
    Route::post('cadastros/associado/autorizacao', [CadastroController::class, 'storeAutorizacao'])->name('associado.autorizacao');


    //rora cadastro associado admin
    Route::get('pessoal/form', [AdminController::class, 'formPessoal'])->name('admin.form.pessoal');
    // rota ajax para o cadastro de pessoal
    Route::post('cadastros/pessoal', [AdminController::class, 'storePessoal'])->name('admin.pessoal');
    // rota ajax para o cadastro de dependentes
    Route::post('cadastros/dependentes', [AdminController::class, 'storeDependente'])->name('admin.dependente');
    // rota ajax para o cadastro de endereco
    Route::post('cadastros/endereco', [AdminController::class, 'storeEndereco'])->name('admin.endereco');
    // rota ajax para o cadastro de matricula
    Route::post('cadastros/matricula', [AdminController::class, 'storeMatricula'])->name('admin.matricula');
    // rota ajax para o cadastro de autorizacao
    Route::post('cadastros/autorizacao', [AdminController::class, 'storeAutorizacao'])->name('admin.autorizacao');

    Route::get('cadastros/lista', [CadastroController::class, 'listaCadastro'])->name('lista.index');
    Route::get('cadastros/lista/inativo', [CadastroController::class, 'listaCadastroInativo'])->name('lista.inativo');
    Route::any('cadastros/search', [CadastroController::class, 'search'])->name('cadastro.search');
    Route::post('cadastros/search/inativo', [CadastroController::class, 'searchInativo'])->name('cadastro.search.inativo');
    Route::get('cadastros/export', [CadastroController::class, 'ExportCadastro'])->name('cadastro.export');
    // deleta o cadastro do associado pelo admin
    Route::get('cadastros/{id}/destroy', [CadastroController::class, 'destroy'])->name('cadastros.destroy');


    Route::get('/admin/aposentados', [AdminController::class, 'aposentados'])->name('admin.aposentados');
    Route::get('cadastros/admin/create', [CadastroController::class, 'createAdmin'])->name('cadastros.admin.create');
    Route::post('cadastros/admin/store', [CadastroController::class, 'storeAdmin'])->name('cadastros.admin.store');
    Route::post('cadastros/admin/{id}/update', [CadastroController::class, 'updateCadastro'])->name('cadastros.admin.update');
  // desativa o cadastro
    Route::any('cadastros/admin/{id}/ative', [AdminController::class, 'desativar'])->name('cadastros.admin.ative');
    // DELETA o registro do cadastro
    Route::any('cadastros/admin/{id}/destroy', [AdminController::class, 'deletarCadastro'])->name('cadastros.admin.destroy');
    // MOSTRA TODOS OS DEPENDENTES DO ASSOCIADO
    Route::get('cadastros/admin/{id}/dependente', [AdminController::class, 'showDependente'])->name('cadastros.admin.dependente');
    // sALVA UM NOVO DEPENDENTES DO ASSOCIADO
    Route::post('cadastros/admin/{id}/dependente', [AdminController::class, 'storeAdminDependente'])->name('cadastros.admin.dependente.store');
    // DELETA TODOS OS DEPENDENTES DO ASSOCIADO
    Route::delete('cadastros/admin/{id}/dependente/destroy', [AdminController::class, 'destroyDependente'])->name('cadastros.admin.dependente.destroy');
    // MOSTRA O DEPENDENTE DO ASSOCIADO
    Route::get('cadastros/admin/{id}/dependente/{idDep}/edit', [AdminController::class, 'editDependente'])->name('cadastros.admin.dependente.edit');
   // ATUALIZA O DEPENDENTE DO ASSOCIADO
    Route::post('cadastros/admin/{id}/dependente/update', [AdminController::class, 'updateDependente'])->name('cadastros.admin.dependente.update');


    Route::get('cadastros/associado/{id}/ver', [CadastroController::class, 'showAssociado'])->name('cadastros.associado.ver');
    Route::get('cadastros/admin/{id}/edit', [CadastroController::class, 'editarCadastro'])->name('cadastros.admin.edit');
    Route::get('cadastros/associado/{id}/destroy', [CadastroController::class, 'destroyAssociado'])->name('cadastros.associado.destroy');
    Route::resource('cadastros/dependente', DependenteController::class);
    //Route::get('documentos/associado/download/{id}', [DocumentosController::class, 'index'])->name('documentos.associado.index');
    Route::get('cadastros/dependentes/associado/{id}', [DependenteController::class, 'show'])->name('dependentes.associado.show');
    Route::get('autorizacoes/capaodacanoa', [AutorizacaoController::class, 'contribuicaoCC'])->name('autorizacoes.capao.form');
    Route::post('autorizacoes/capaodacanoa', [AutorizacaoController::class, 'storeCC'])->name('autorizacoes.capao.store');
    Route::get('autorizacoes/xangrila', [AutorizacaoController::class, 'contribuicaoXla'])->name('autorizacoes.xangrila.form');
    Route::post('autorizacoes/xangrila', [AutorizacaoController::class, 'storeXla'])->name('autorizacoes.xangrila.store');
    Route::get('lista/geral', [ListaController::class, 'index'])->name('lista.geral');
    Route::get('lista/capao', [ListaController::class, 'listaCapao'])->name('lista.capao');
    Route::get('lista/xangrila', [ListaController::class, 'listaXangrila'])->name('lista.xangrila');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('pdf', [PdfController::class, 'pdf'])->name('associado.pdf');
});
Route::get('convenios/list', [CadastroController::class, 'ListarCadastroDependentes'])->name('convenios.list');
Route::post('convenios/search', [CadastroController::class, 'searchAssociadoConvenio'])->name('convenios.search');

Route::get('convenios', [ConvenioController::class, 'index'])->name('convenios');
Route::get('convenios/{id}', [ConvenioController::class, 'show'])->name('convenios.show');
Route::post('convenios', [ConvenioController::class, 'store'])->name('convenios.store');
Route::get('convenios/{id}/edit', [ConvenioController::class, 'edit'])->name('convenios.edit');
Route::get('convenios/dependentes/{id}', [ConvenioController::class, 'dependentes'])->name('convenios.dependentes');
Route::get('convenios/{id}/edit', [ConvenioController::class, 'editConvenio'])->name('convenios.editConvenio');
Route::post('convenios/{id}/update', [ConvenioController::class, 'updateConvenio'])->name('convenios.updateConvenio');