<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Index</title>
    <link rel="icon" 
      type="image/logo.png" 
      href="{{ asset('img/logo.png') }}" />

    <link rel="stylesheet" href="{{ mix('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar">
            <a class="form-inline" id="abrirMenu"><i class="fas fa-bars"></i></a>
            <img src="{{ asset('img/logo.png') }}" width="150px" height="150px" alt="">
            @if (session()->has('sessionFunc'))
                <a href="{{ route('adm.logout') }}" class="fas fa-door-open" onclick="mostrar(this)"> FECHAR
            @else
                <a href="{{ route('adm.login') }}" class="fas fa-door-open" onclick="mostrar(this)"> ENTRAR
            @endif
            </a>
        </nav>
    </header>

    @if (session()->has('sessionFunc'))
        @include('viewSelect.logado')
    @else
        @include('viewSelect.naoLogado')
    @endif
    @include('specific.functions')
