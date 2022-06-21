<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\Endereco;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //

    public function addAddress(Request $request) {
        $endereco = new Endereco();

        $endereco->cep = $request->cep;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->complemento = $request->complemento;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;

        $endereco->save();

        session()->put('sessionUser.cart.endereco', $endereco);
        
        
        $this->addAddressToSession(session('sessionUser.cart.id'));
        
        return redirect()->route('adm.index');
    }

    public function addAddressToSession($idcart) {
        
        $cart = Comanda::where('id', $idcart)->first();

        $cart->id = session('sessionUser.cart.endereco.id');

        $cart->save();
    }
}
