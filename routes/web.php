<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\LunchController;
use Illuminate\Support\Facades\Route;

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


Route::get('/carteira', [AdmController::class, 'wallet'])->name('adm.carteira');

Route::get('/cardapio', [AdmController::class, 'menu'])->name('adm.cardapio');
Route::post('/cardapio/store', [LunchController::class, 'createLunch'])->name('adm.criarLanche');

Route::get('/login', [AdmController::class, 'login'])->name('adm.login');
Route::post('/login/exec', [AdmController::class, 'loginPost'])->name('adm.loginPost');
Route::get('/logout', [AdmController::class, 'logout'])->name('adm.logout');
Route::get('/sobre', [AdmController::class, 'about'])->name('adm.sobre');
Route::get('/contato', [AdmController::class, 'contact'])->name('adm.contato');
Route::get('/carrinho', [AdmController::class, 'cart'])->name('adm.carrinho');
Route::get('/carrinho/comprar', [AdmController::class, 'pay'])->name('adm.finalizar');
Route::get('/carrinho/{lanche}/novo', [AdmController::class, 'addLancheToCart'])->name('adm.addComanda');
Route::get('/carrinho/{lanche}/delete', [AdmController::class, 'removeLancheToCart'])->name('adm.removeComanda');
Route::get('/localizacao', [AdmController::class, 'location'])->name('adm.localizacao');
Route::post('/localizacao/addaddress', [AddressController::class, 'addAddress'])->name('adm.addEndereco');
Route::post('/localizacao/editEnd', [AdmController::class, 'editEnd'])->name('adm.editEnd');
Route::get('/configuracao', [AdmController::class, 'setting'])->name('adm.configuracao');
Route::get('/configuracao/funcionario', [AdmController::class, 'employee'])->name('adm.funcionario');
Route::post('/configuracao/funcionario/store', [AdmController::class, 'addEmployee'])->name('adm.addFuncionario');
Route::get('/configuracao/funcionario/delete/{funcionario}', [AdmController::class, 'removeEmployee'])->name('adm.removeFuncionario');
Route::get('/', [AdmController::class, 'index'])->name('adm.index');

