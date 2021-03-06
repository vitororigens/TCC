var abrir = document.getElementById('abrirMenu')
var fechar = document.getElementById('fecharMenu')
abrir.addEventListener('click', function(){
    var menu = document.getElementById('menu')
    menu.style.width = '250px'
})
fechar.addEventListener('click', function(){
    var menu = document.getElementById('menu')

    menu.style.width = '0'
    menu.style.transition = 'width 0.2s ease'
})
var show = document.getElementById('show')
var close = document.getElementById('close')

show.addEventListener('click', function(){
    var adicionarCardapio = document.getElementById('adicionar')
    adicionarCardapio.style.width = '100%'
    adicionarCardapio.style.padding = '25px'
})

close.addEventListener('click', function(){
    var adicionarCardapio = document.getElementById('adicionar')
    adicionarCardapio.style.width = '0'
    adicionarCardapio.style.padding = '0px'
})


var btnDetalhes = document.getElementById('btnDetalhes')
var btnComplemento = document.getElementById('btnComplemento')
var detalhes = document.getElementById('detalhes')
var complemento = document.getElementById('complemento')

btnComplemento.addEventListener('click', function(){
    detalhes.style.display = 'none'
    complemento.style.display = 'block'
})

btnDetalhes.addEventListener('click', function(){
    detalhes.style.display = 'block'
    complemento.style.display = 'none'
})


var btnNovoComplemento = document.getElementById('btnNovoComplemento')
var adicionarComplemento = document.getElementById('adicionarComplemento')
var novoComplemento = document.getElementById('novoComplemento')

btnNovoComplemento.addEventListener('click', function(){
    novoComplemento.style.display = 'block'
})

adicionarComplemento.addEventListener('click', function(){
    novoComplemento.style.display = 'none'
})

var optCartao = document.getElementById('optCartao')
var optDinheiro = document.getElementById('optDinheiro')

optCartao.addEventListener('click', function(){
    var showCartao = document.getElementById('show-cartao')

    showCartao.style.display = 'block'
})

optDinheiro.addEventListener('click', function(){
    var showDinheiro = document.getElementById('show-dinheiro')

    showDinheiro.style.display = 'block'
})


function limpa_formulario_cep() {
    //Limpa valores do formulario de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('rua').value=(conteudo.logradouro);
    document.getElementById('bairro').value=(conteudo.bairro);
    document.getElementById('cidade').value=(conteudo.localidade);
    
} //end if.
else {
    //CEP nao Encontrado.
    limpa_formulario_cep();
    alert("CEP nao encontrado.");
}
}

function pesquisacep(valor) {

//Nova variavel "cep" somente com d??gitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Express??o regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value="...";
        document.getElementById('bairro').value="...";
        document.getElementById('cidade').value="...";
        

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conte??do.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep e invalido.
        limpa_formulario_cep();
        alert("Formato de CEP invalido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulario.
    limpa_formulario_cep();
}
};


var btnEndereco = document.getElementById('btnEndereco')


btnEndereco.addEventListener('click', function(){
    var showEndereco = document.getElementById('showEndereco')
    
    showEndereco.style.display = 'block'
})

var date = document.getElementById('date')
var rodape = document.getElementById('rodape')

rodape.addEventListener('onload', function(){
    var d = new Date();
        var n = d.getFullYear() + "  ";
         date.innerHTML = n;
})

function mostrar(e) {

    if (e.classList.contains("")) { //se tem olho aberto
      e.classList.remove("fas fa-door-open"); //remove classe olho aberto
      e.classList.add("fas fa-door-closed"); //coloca classe olho fechado
    } else { //senao
      e.classList.remove("fas fa-door-closed"); //remove classe olho fechado
      e.classList.add("fas fa-door-open"); //coloca classe olho aberto
    }
}

$('.dinheiro').mask('#.##0,00', {reverse: true});

