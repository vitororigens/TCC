<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;

class BillController extends Controller
{
    // const SESSION_USER = 'sessionUser';
    // const SESSION_FUNC = 'sessionFunc';

    // //Iniciar sessão para usuário externo
    // public static function sessionUser(){
    //     $cart = new Carrinho();

    //     $cart->save();

    //     session()->put(BillController::SESSION_USER, $cart);
    // }

    // //Verificar existencia de sessão para usuário externo
    // public static function verifySessionUser() {

    //     if(!session()->has(BillController::SESSION_USER)) {
    //         BillController::sessionUser();
    //     } else {
    //         session(BillController::SESSION_USER);
    //     }
    // }
}
