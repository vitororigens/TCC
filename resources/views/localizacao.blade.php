@include('header')
<section>
    <div class="container">
        <div id="showEndereco">
            <form action="{{ route('adm.addEndereco') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Cep:
                    <input class="form-control" name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" required /></label><br />
                </div>
                <div class="form-group">
                    <label>Rua:
                    <input class="form-control" name="rua" type="text" id="rua" size="60" required /></label><br />
                </div>
                <div class="form-group">
                    <label>Numero:
                    <input class="form-control" name="numero" type="text" id="numero" value="" size="10"
                            maxlength="9" /></label><br />
                </div>
                <div class="form-group">
                    <label>Complemento:
                    <input class="form-control" name="complemento" type="text" id="numero" value="" size="45"
                            maxlength="20" />
                    </label>
                </div>
                <div class="form-group">
                    <label>Bairro:
                    <input class="form-control" name="bairro" type="text" id="bairro" size="40" required/></label><br />

                </div>
                <div class="form-group">
                    <label>Cidade:
                    <input class="form-control" name="cidade" type="text" id="cidade" size="40" required/></label><br />
                </div>
                <button type="submit" style="background: orange; margin: 30px 0 30px 0px;" class="button-large btn  btn-lg btn-block">Continuar</button>
            </form>
        </div>
    </div>
</section>

</body>
@include('footer')