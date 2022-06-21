@include('header')
<section>
	<div class="container">

		<p><i class="fas fa-map-marked-alt"></i> Quadra 106 - Recanto das Emas - 72601-213</p>
		@if (isset($address))
			<p><i class="fas fa-map-marker-alt"></i> {{ "$address->rua - $address->complemento, $address->numero- $address->bairro, $address->cidade, $address->cep" }}</p>
		@else
			<p><i class="fas fa-map-marker-alt"></i> Sem local</p>
		@endif 
		
		<form>

			<a href="{{ route('adm.localizacao') }}" type="button" class="button-large btn  btn-lg btn-block"><i class="fas fa-location-arrow"></i>
				Selecione seu endereço</a>

			<ul class="nav justify-content-center">
				<li class="nav-item">
					<a class="nav-link" href="#">#hamburguer</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">#Refri</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">#Batata</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">#Combos</a>
				</li>
			</ul>

			<div class="form-group">

				<input class="form-control" style="justify-items: center;" type="text" name="pesquisa" id="pesquisa"
					placeholder="Pesquisa">
			</div>
		</form>
		<table class="table">
			@foreach ($lunchs as $lunch)
				<tbody>
					<td>
						<h2>{{ $lunch->nome }}</h2>
					</td>
					<tr>
						<td><img img width="60vh" height="60vh" 
								src=" {{ env('APP_URL') }}/storage/{{ $lunch->pathlanche }}" alt="Hamburguer"></td>
						<td colspan="3">
							<h2>{{ $lunch->nomeLanche }}</h2>
							<p>{{ $lunch->descricao }}</p>
						</td>
						<td id="valorLanche">{{ formatPrice($lunch->valor) }}</td>
						<td id="store"><a href="{{ route('adm.addComanda', $lunch->id) }}"><button class="btn btn-primary"><i class="fas fa-plus-square"></i></button></a></td>
					</tr>
				</tbody>
			@endforeach

		</table>
	</div>
</section>
<footer>
        <a href="{{ route('adm.carrinho') }}" class="cart">
            <div class="cart-info">
                <div><i class="fas fa-shopping-basket"></i></div>
                <div><p>Meu carrinho</p></div>
                <div class="price" id="valorCarrinho">{{ formatPrice($total)}}</div>
            </div>
        </a>
</footer>

</body>
@include('footer')
