@include('header')
<section>
    <div class="container">
       <h2>Configurações</h2>

       
       <div class="form-group">
           <h3>Adicionar um novo usuário</h3>
           <table class="table table-hover">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Nome</th>
                   <th scope="col">E-mail</th>
                   <th scope="col">Apagar</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach ($funcionarios as $funcionario)
                  <tr>
                    <th scope="row"><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"></th>
                    <td>{{ $funcionario->nome}}</td>
                    <td>{{ $funcionario->email}}</td>
                    <td><a href="{{ route('adm.removeFuncionario', $funcionario->id)}}" onclick="return confirm('Deseja remover este registro?')"><button type="button" class="btn btn-danger">X</button></a></td>
                  </tr>                   
                 @endforeach
               </tbody>
               <a href="{{ route('adm.funcionario') }}" id="adicionarComplemento" class="btn btn-success"><i class="fas fa-plus-square"></i> Adicionar</a>

             </table>
             <table class="table">
               <tbody>
                   <td colspan="6">
                       <h3>Endereço fisico da loja</h3>
                   </td>
                   <tr>
                       <td colspan="5">Endereço</td>
                       <td><a href="#"><i class="fas fa-edit"></i> Editar</a></td>
                   </tr>
                   
               </tbody>
             </table>
             <a href="{{ route('adm.cardapio')}}" type="button" class="button-large btn  btn-lg btn-block btn-success"><i class="fas fa-door-open"></i> Abrir Loja</a>

       </div>
    </div>
     </section>
    </body>
@include('footer')