@include('header')
<section>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/public/archives/index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Carteira</li>
            </ol>
          </nav>
        

        <form>
            <h2>Carteira</h2>
            <a id="show" class="btn btn-outline-success"><i class="fas fa-plus-square"></i> Adicionar</a>
            
        </form>
        <table class="table">
            <tbody>
                <td><h2></h2></td>
                <tr>
                    <td width="20px" height="20px" ><img  src="/public/archives/IMG/logo mastercard.png" alt="Mastercard"></td>
                    <td colspan="3">
                        <h2>Mastercard</h2>
                        <p>********8888</p>
                    </td>
                    <td><button type="button" class="btn btn-danger">Remover</button>
                        <button type="button" class="btn btn-success">Editar</button>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="container">
        <div id="adicionar">
        <form>
            <h2>Adicionar forma de pagamento</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="nCartao">Número do Cartão</label>
                    <input type="text" class="form-control" id="nCartao">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="dCartao">Data de venc.</label>
                    <input type="txt" class="form-control" id="dCartao" placeholder="Mês/Ano">
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="txt" class="form-control" id="cvv" placeholder="***">
                </div>
            </div>
        </form>
        <button type="button" id="close" class="btn btn-danger">Fechar</button>
        <button type="button" class="btn btn-success">Adicionar</button>
            
        </div>
    </div>
</section>

</body>
@include('footer')