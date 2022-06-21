@include('header')
<section>
    <div class="container">
        <a href="{{ route('adm.index') }}"><i class="fas fa-arrow-left"></i></a>
        <table class="table">
            <tbody>
                <td>
                    <h2>Seus itens</h2>
                </td>
                @if (isset($pedidos))
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td ><img width="60vh" height="60vh" src="{{ env('APP_URL') }}/storage/{{ $pedido->pathlanche }}" alt="Hamburguer"></td>
                            <td colspan="1">
                                <h2>{{ $pedido->nome }}</h2>
                                <p>{{ $pedido->descricao }}</p>
                            </td>
                            <td>{{formatPrice($pedido->valor * $pedido->qtd)}}</td>
                            <td colspan="1" id="store"><a href="{{ route('adm.removeComanda', $pedido->idlanche) }}"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a></td>
                            <td class="col-md-2 col-sm-2 col-2"><input class="form-control" value="{{$pedido->qtd}}" type="number" name="quantidade" id="quantidade" min="0"></td>
                            <td id="store"><a href="{{ route('adm.addComanda', $pedido->idlanche) }}"><button class="btn btn-primary"><i class="fas fa-plus-square"></i></button></a></td>
                        </tr> 
                    @endforeach  
                @else
                    <tr>
                        <td ><img width="60vh" height="60vh" src="#" alt="Lanche"></td>
                        <td colspan="3">
                            <h2>Sem Pedido</h2>
                            <p>Sem Pedido</p>
                        </td>
                        <td>R$ Sem Valor</td>
                        <td><input class="form-control" value="1" type="number" name="quantidade" id="quantidade" min="0"></td>
                    </tr> 
                @endif
                  
                   
            </tbody>
            
            <tbody>
                <td colspan="6">
                    <h2>Local de Entrega</h2>
                </td>
                @if (isset($address))
                    <tr>
                        <td colspan="5">{{ "$address->rua $address->complemento, $address->bairro" }}</td>
                        <td><a href="{{ route('adm.localizacao')}}"><i class="fas fa-edit"></i> Editar</a></td>
                    </tr>
                @else
                    <tr>
                        <td colspan="5">Sem endereço cadastrado</td>
                        @if($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $erro)
                                    <p>{{$erro}}</p>
                                @endforeach
                            </div>
                        @endif
                        <td><a href="{{ route('adm.localizacao')}}"><i class="fas fa-edit"></i> Adicionar Endereço</a></td>
                    </tr>
                @endif
                
                
            </tbody>

            <tbody>
                <tr>
                    <td colspan="5">Subtotal</td>
                    <td>
                        <p>{{formatPrice($valor)}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">Entrega</td>
                    <td>
                        <p>R$ 4,99</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <h2>Total</h2>
                    </td>
                    <td>
                        <p class="dinheiro" style="font-weight: bold;">{{formatPrice($valor += 4.99)}}</p>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <td colspan="6">
                    <h2>Forma de pagamento</h2>
                </td>
                <tr>
                    <td>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="optCartao" name="option" value="Cartão" class="custom-control-input">
                            <label class="custom-control-label" for="optCartao">Cartão</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="optDinheiro" name="option" value="Dinheiro" class="custom-control-input">
                            <label class="custom-control-label" for="optDinheiro">Dinheiro</label>
                        </div>
                    </td>
                </tr>
                <div id="show-cartao">
                    <tr>
                        <td colspan="6">
                            <form action="" name="cartao" id="cartao">
                                <p style="font-weight: bold;">cartão</p>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label" for="nome-cartao">Nome no cartão</label>
                                            <input class="form-control" type="text" name="nome-cartao" id="nome-cartao">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label" for="numero-cartao">Numero do cartão</label>
                                            <input class="form-control" type="text" name="numero-cartao" id="numero-cartao">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label" for="data-expiracao">Vencimento</label>
                                            <input class="form-control" type="month" name="data-expiracao" id="data-expiracao">
                                        </div>
                                        <div class="col">
                                            <label class="form-label" for="cvv">CVV</label>
                                            <input class="form-control" type="text" name="cvv" id="cvv">
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" id="entregaCartao" style="margin-top: 2rem;" name="entregaCartao"class="custom-control-input">
                                    <label class="custom-control-label" for="entregaCartao"> Pagar com cartão na entrega?</label>
                                </div>
                            </form>
                        </td>
                    </tr>
                </div>

                <div id="show-dinheiro">
                    <tr>
                        <td colspan="6">
                            <form action="" name="din" id="din">
                                <p style="font-weight: bold;">Dinheiro</p>
                                <div class="custom-control custom-radio">
                                    <input type="checkbox" id="troco" name="troco" class="custom-control-input">
                                    <label class="custom-control-label" for="troco"> Vai precisar de troco?</label>
                                </div>
                                <input class="form-control" id="dintroco" name="din" style="margin-top: 1rem" type="text" placeholder="Para quanto?" disabled>
                            </form>
                        </td>
                    </tr>
                </div>
            </tbody>

        </table>

        <a href="{{route('adm.finalizar')}}"><button type="submit" style="background: orange; margin-bottom: 30px;"
            class="button-large btn  btn-lg btn-block">Finalizar</button></a>
    </div>

</section>

</body>

<script>
    document.getElementById("optCartao").addEventListener('click', function(){
        var din = document.getElementById('din')
        din.style.position = "absolute"
        din.style.opacity = 0
        var card = document.getElementById('cartao')
        card.style.position = "relative"
        card.style.opacity = 1
    })
    document.getElementById("optDinheiro").addEventListener('click', function(){
        var card = document.getElementById('cartao')
        card.style.position = "absolute"
        card.style.opacity = 0
        var din = document.getElementById('din')
        din.style.position = "relative"
        din.style.opacity = 1
    })
    document.getElementById("troco").addEventListener('change', function(){
        
        if(this.checked) {
            document.din.din.disabled = 0;
        } else {
            document.din.din.disabled = 1;
        }
    })
</script>
@include('footer')
