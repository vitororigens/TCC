<nav id="menu">
    <a id="fecharMenu"><i class="fas fa-bars"> Fechar</i></a>
    <a href="{{ route('adm.index')}}"><i class="fas fa-home"></i> Home</a>
    <a href="{{ route('adm.cardapio') }}"><i class="fas fa-list-alt"></i> Cardapio</a>
    <a href="{{ route('adm.carteira') }}"><i class="fas fa-wallet"></i> Carteira</a>
    <a href="{{ route('adm.sobre') }}"><i class="fas fa-exclamation-circle"></i> Sobre</a>
    <a href="{{ route('adm.contato') }}"><i class="fas fa-tty"></i> Contato</a>

    @if (session('sessionFunc.nome') == "Administrador")
        <a href="{{ route('adm.configuracao') }}"><i class="fas fa-tools"></i> Configurações</a>
    @endif
    <div class="copyright">&copy; Burguerboss<em id="date"></em>. Todos os direitos reservados.</div>
</nav>