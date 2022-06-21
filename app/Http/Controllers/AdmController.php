<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\Categoria;
use App\Models\Carrinho;
use App\Models\Endereco;
use App\Models\Funcionario;
use App\Models\Lanche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdmController extends Controller
{

    public static function sumValue() {
        $total = Lanche::query('lanches')
                                ->join('carrinhos', 'carrinhos.idlanche', '=', 'lanches.id')
                                ->join('comandas', 'comandas.id', '=', 'carrinhos.idcomanda')
                                ->where('carrinhos.idcomanda', '=', session('sessionUser.cart.id'))
                                ->select()
                                ->sum('lanches.valor');

        return $total;
    }

    //Verifica se ja foi criado comanda para o usuário externo.
    private function checkSessionUser() {
        return session()->has('sessionUser');
    }

    //Verifica se o funcionário está logado.
    private function checkSessionFunc() {
        return session()->has('sessionFunc');
    }

    public function verifySession() {
        //Checa se existe uma sessão de funcionário, se tiver não há a necessidade
        //de existir uma sessão de usuário(cliente)
        if(!$this->checkSessionFunc()) {
            //Se não existir sessão de funcionário, então e um cliente acessando
            //Enão deverá criar um comanda para este usuário 
            if(!$this->checkSessionUser()) {
                $cart = new Comanda();
                
                $cart->save();
                
                //Criar sessão usuário externo e adicionar um comanda 
                session()->put('sessionUser.cart.id', $cart->id);
            }
        } else {
            session()->forget('sessionUser');
        }
    }

    //Chamar tela principal
    public function index($lunchs = null) {

        $this->verifySession();

        $address = Endereco::where('id', session('sessionUser.cart.endereco.id'))->first();

        $lunchs = LunchController::getAllLunch();

        $total = AdmController::sumValue();

        return view('index', [
            'lunchs' => $lunchs,
            'address' => $address,
            'total' => $total
        ]);
    }

    //Chamar tela carteira
    public function wallet() {
        $this->verifySession();
        
        return view('carteira');
    }
    //chamar tela cardapio
    public function menu() {

        $this->verifySession();

        $category = $this->getCategories();

        $lunchs = LunchController::getAllLunch();

        return view('cardapio', [
            'lunchs' => $lunchs,
            'categories' => $category
        ]);
    }

    //Função para adicionar um lanche ao comanda
    public function addLancheToCart($idlanche) {

        $lanche = Lanche::where('id', $idlanche)->first();

        $carrinho = new Carrinho();

        $carrinho->idlanche = $lanche->id;

        $carrinho->idcomanda = session('sessionUser.cart.id');

        $carrinho->save();

        return redirect()->back();
        
    }

    //Função para adicionar um lanche ao comanda
    public function removeLancheToCart(Lanche $lanche) {
        
        Carrinho::where('idlanche', '=', $lanche->id)->first()->delete();

        return redirect()->back();

    }

    public function pay() {

        $rua = session('sessionUser.cart.endereco.rua');
        $complemento =  session('sessionUser.cart.endereco.complemento');
        $numero = session('sessionUser.cart.endereco.numero');
        $bairro = session('sessionUser.cart.endereco.bairro');
        $cidade = session('sessionUser.cart.endereco.cidade');
        $cep = session('sessionUser.cart.endereco.cep');

        if($rua == null || $bairro == null || $cidade == null || $cep== null) {
            session()->flash('erro', 'Adicione um endereço para o qual será enviado o lanche');

            return redirect()->back()->withInput()->withErrors(['• Adicione um endereço para a entrega']);
        }

        $id = session('sessionUser.cart.id');

        $whatsapp = 'https://api.whatsapp.com/send?phone=5561998811404&text=';

        $idCompra = "*Pedido BurguerBoss nº " . $id . "*%0A";

        $divisor = "-------------------------------------%0A%0A";

        $whatsapp .= $idCompra . $divisor;

        

        $whatsapp .= "*Taxa de Entrega*: R$ 4,99%0A";

        $total = AdmController::sumValue() + 4.99;

        $whatsapp .= "*Total: R$ $total*%0A" . $divisor;

        $whatsapp .= "*Tempo para entrega:* de 30 minutos à 45 minutos%0A%0A";

        $whatsapp .= "$rua, $complemento $numero%0A$bairro, $cidade%0A$cep%0A%0A";

        $whatsapp .= "*Pagamento:* Dinheiro%0A";

        $whatsapp .= "*Troco para:* R$ 00,00";
        
        return redirect($whatsapp);
    }

    //chamar tela sobre
    public function about() {
        return view('sobre');
    }
    //chamar tela contato
    public function contact() {
        return view('contato');
    }

    public function cart() {


        $pedidos = $this->allPedidos();

        $address = Endereco::where('id', session('sessionUser.cart.endereco.id'))->first();
        
        $valor = $this->sumValue();

        $erro = session('erro');

        $data = [];

        if(!empty($erro)){
            $data = [
                'erro' => $erro
            ];
        }

        return view('comanda', [
            'pedidos' => $pedidos,
            'address' => $address,
            'valor' => $valor,
            'error' => $data
        ]);
    }

    public function location() {

        $this->verifySession();
        return view('localizacao');

    }

    public function setting() {

        //Verificar se quem está tentando acessar as configurações é o Administrador.
        if(session('sessionFunc.nome') != "Administrador") {
            return redirect()->route('adm.cardapio');
        }

        $funcionarios = Funcionario::all();

        $this->verifySession();
        return view('configuracao', [
            'funcionarios' => $funcionarios
        ]);

    }

    public function employee() {

        $this->verifySession();
        return view('funcionario');
    }

    public function addEmployee(Request $request) {
        
        $this->verifySession();
        
        $funcionario = New Funcionario();

        $funcionario->nome = $request->nome . " " . $request->sobrenome;
        $funcionario->email = $request->email;
        $funcionario->login = strtolower($request->nome . "." . $request->sobrenome);
        $funcionario->senha = Hash::make($request->senha);

        $funcionario->save();

        return redirect()->route('adm.configuracao');
    }

    public function removeEmployee(Funcionario $funcionario) {
        $this->verifySession();

        $funcionario->delete();

        return redirect()->route('adm.configuracao');

    }

    public function login() {

        $erro = session('erro');

        $data = [];

        if(!empty($erro)){
            $data = [
                'erro' => $erro
            ];
        }
        return view('login', $data);
    }

    public function loginPost(Request $request) {

        $adm = Funcionario::where('login', $request->login)->first();

        if(!$adm || !Hash::check($request->password, $adm->senha)) {
            session()->flash('erro', 'Usuário ou senha Incorreta!');
            return redirect()->route('adm.login');
        } else {
            session()->put('sessionFunc', $adm);
            
            return redirect()->route('adm.cardapio');
        }

    }

    public function logout() {
        session()->forget('sessionFunc');
        return redirect()->route('adm.index');
    }

    // Pegar todas categorias existentes no banco de dados
    public function getCategories() {
        $result = Categoria::all();

        return $result;
    }

    public function allPedidos(){
        return Carrinho::query('carrinhos')
        ->join('comandas', 'comandas.id', '=', 'carrinhos.idcomanda')
        ->join('lanches', 'lanches.id', '=', 'carrinhos.idlanche')
        ->where('comandas.id', '=', session('sessionUser.cart.id'))
        ->select('lanches.*', 'comandas.id', 'carrinhos.idlanche', Lanche::raw('count(carrinhos.idlanche) as qtd'))
        ->groupBy('lanches.id')
        ->get();
    }

}
