@include('header')
<section>
    <div class="container">
       <h2>Adicionar um novo usuário</h2>

       <form action="{{ route('adm.addFuncionario')}}" method="POST" class="form">
        @csrf
           <div class="row">
               <div class="col">
                   <input class="form-control" type="nome" name="nome" id="nome" placeholder="Nome">
               </div>
               <div class="col">
                   <input class="form-control" type="sobrenome" name="sobrenome" id="sobrenome" placeholder="Sobrenome"> 

               </div>

           </div>
           <div class="form-group">
                   <input class="form-control" type="email" name="email" id="email" placeholder="E-mail">
           </div>
           
           <div class="form-group">
                   <input class="form-control" type="tel" name="number" id="number" placeholder="61 - 0 000 000">
           </div>
           
           <div class="form-group">
                   <input class="form-control" type="password" name="senha" id="senha" placeholder="Senha">

           </div>
           
           <button type="submit" style="margin-top: 1rem" class="button-large btn  btn-lg btn-block btn-success">Continuar</button>

      </form>


    </div>
     </section>
    </body>
     @include('footer')