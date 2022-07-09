@extends('layouts.app', ['activePage' => 'movimentacoes', 'titlePage' => __('')])

@section('content')

  
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">


<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


</head>
<body>
    

     @if (session()->has('error'))
    <script>alert('Houve algum erro ao realizar a operação!')
  </script>
  @endif
  @if (session()->has('success'))
    <script>alert('Movimentação cadastrada!')</script>
@endif

  @if (session()->has('deletado'))
    <script>alert('Movimentação excluida!')</script>
@endif

@if (session()->has('edit'))
    <script>alert('Movimentação alterada!')</script>
@endif
<div style="margin-left:2%" class="container mt-5">
    <h2 class="mb-4">Resumo de movimentações   

    </h2>

 <button id="btnCriarMov" type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#criarMov">
    <i class="fa fa-plus"></i> &nbsp; Registrar nova movimentação

  </button>

<br>
 <select id="filtroTipo" type="button" class="btn btn-cyan mb-3" >
  <option  hidden selected disabled value="#">Tipo de movimentação     
</option>
<option value="">Todos os tipos</option>

@foreach ($distinctTipos as $mov ) 

  <option value="{{$mov->Tipo_Movimentacao}}">{{$mov->Tipo_Movimentacao}}</option>
@endforeach

  </select>


 <select id="filtroConteiner" type="button" class="btn btn-cyan mb-3" >
  <option  hidden selected disabled value="#">Contêiner 
</option>
<option value="">Todos os contêiners</option>

@foreach ($distinctConteiners as $cont ) 

  <option value="{{$cont->Conteiner}}">{{$cont->Conteiner}}</option>
@endforeach

  </select>




<!-- Modal deletar-->
<div class="modal fade"  data-backdrop="false" id="deletarMov" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deletar movimentação</h5>
       
      </div>
      <div class="modal-body">
        
        <form action="/movimentacoes/deletar" id="formDelMov">
          {{csrf_field()}}

          {{-- inicio formulario --}}

          <h4>Tem certeza que deseja deletar este registro de movimentação? </h4>

          <input type="hidden"required id="idMov" name="idMov">

             
            </div>


  <div  class="modal-footer">
        <button type="button" class="btn btn-secondary" id="modalclose" data-dismiss="modal" >Fechar</button>
        <button type="submit" class="btn btn-danger">Deletar</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>

{{-- fim modal deletar  --}}



<!-- Modal Registrar-->
<div class="modal fade"  data-backdrop="false" id="criarMov" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar movimentação</h5>
       
      </div>
      <div class="modal-body">
        
        <form action="/movimentacoes/cadastrar" id="formRegMov">
          {{csrf_field()}}

          {{-- inicio formulario --}}



          <label for="regMovCont">Contêiner </label>
                <select name="regMovCont"     id="regMovCont" required  class="form-control">
                  <option value="#" selected disabled hidden >Selecione o contêiner</option>

                  @foreach($conteiners as $conteiner) 


                  <option value="{{$conteiner->Conteiner}}">{{$conteiner->Conteiner}}</option>
                  @endforeach
               
                </select>
          
            <br>


 <label for="regTipo">Tipo de movimentação </label>
                <select name="regTipo"   style="width: 110%"   id="regTipo" required  class="form-control">
                  <option value="#" selected disabled hidden >Selecione o tipo</option>
                  <option value="Embarque">Embarque</option>
                  <option value="Descarga">Descarga</option>
                  <option value="Gate in">Gate in</option>
                  <option value="Gate out">Gate out</option>
                  <option value="Reposicionamento">Reposicionamento</option>
                  <option value="Pesagem">Pesagem</option>
                  <option value="Scanner">Scanner</option>

                </select>

 


<br>
            <div  class="d-flex row m-3 justify-content-center">
              <div class="column">

              <label for="regInicio">Data de início </label>
                <input name="regInicio"   type="text"  style="width: 110%"   id="regInicio" required  class="form-control dtpicker">

                </div>
                  <div style="margin-left: 15%" class="column">
                <label   for="regDataFim">Data de fim</label>
                  <input  type="text" name="regDataFim" id="regDataFim" required  class="form-control dtpicker">
                
             
                </div>  
            </div>

            <br>

  <div  class="modal-footer">
        <button type="button" class="btn btn-secondary" id="modalclose" data-dismiss="modal" >Fechar</button>
        <button type="submit" class="btn btn-success">Registrar</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>

{{-- fim modal registrar  --}}



<!-- Modal Editar-->
<div class="modal fade"  data-backdrop="false" id="editarMov" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar contêiner</h5>
       
      </div>
      <div class="modal-body">
        
        <form action="/conteiners/editar" id="formEditConteiner">
          {{csrf_field()}}

          {{-- inicio formulario --}}


          <input type="hidden" required id="editId">
          

          <label for="editMovCont">Contêiner </label>
                <select name="editMovCont"     id="editMovCont" required  class="form-control">

                  @foreach($conteiners as $conteiner) 


                  <option value="{{$conteiner->Conteiner}}">{{$conteiner->Conteiner}}</option>
                  @endforeach
               
                </select>
          
            <br>


 <label for="editTipo">Tipo de movimentação </label>
                <select name="editTipo"   style="width: 110%"   id="editTipo" required  class="form-control">
                  <option value="Embarque">Embarque</option>
                  <option value="Descarga">Descarga</option>
                  <option value="Gate in">Gate in</option>
                  <option value="Gate out">Gate out</option>
                  <option value="Reposicionamento">Reposicionamento</option>
                  <option value="Pesagem">Pesagem</option>
                  <option value="Scanner">Scanner</option>

                </select>

 


<br>
            <div  class="d-flex row m-3 justify-content-center">
              <div class="column">

              <label for="editInicio">Data de início </label>
                <input name="editInicio"   type="text"  style="width: 110%"   id="editInicio" required  class="form-control dtpicker">

                </div>
                  <div style="margin-left: 15%" class="column">
                <label   for="editFim">Data de fim</label>
                  <input  type="text" name="editFim" id="editFim" required  class="form-control dtpicker">
                
             
                </div>  
            </div>

            <br>


  <div  class="modal-footer">
        <button type="button" class="btn btn-secondary" id="modalclose" data-dismiss="modal" >Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>

{{-- fim modal editar  --}}




<div  style="margin-left:3%">
    <table  class="table table-bordered yajra-datatable">
        <thead>
            <tr>

                <th>Conteiner</th>
                <th>Tipo de movimentação</th>
                <th>Data partida</th>
                <th>Data chegada</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>



        @foreach ($movimentacoes as $mov)
        <tr>
          <td>{{ $mov->Conteiner}}</td>
          <td>{{ $mov->Tipo_Movimentacao}}</td>
          <td>{{ $mov->Data_Inicio}}</td>

          <td>{{ $mov->Data_Fim}}</td>

          <td><a class="btn btn-outline-warning editbtn " 
            onclick="editar({{$mov->id}},'{{$mov->Conteiner}}','{{$mov->Tipo_Movimentacao}}','{{$mov->Data_Inicio}}','{{$mov->Data_Fim}}')" 

            href="#">Editar</a>
            <a class="btn btn-outline-danger deletebtn" onclick="deletar({{$mov->id}})" href="#">Excluir</a>
          </td>

        </tr>
            @endforeach

        </tbody>
    </table>

    </div>
</div>
   
</body>


<script>
  

        $('#regInicio,#regDataFim, #editInicio, #editFim').datepicker({

        dateFormat: 'dd/mm/yy',
   dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
   dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
   dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
   monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
   monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
   nextText: 'Proximo',
   prevText: 'Anterior'
});





</script>


  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/inputmask.js" integrity="sha512-XvlcvEjR+D9tC5f13RZvNMvRrbKLyie+LRLlYz1TvTUwR1ff19aIQ0+JwK4E6DCbXm715DQiGbpNSkAAPGpd5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">





$("#btnCriarMov").on('click',()=> {

$("#regDataFim").css('border', '0px');
$("#regDataInicio").css('border', '0px');
$("#regMovCont").css('border', '0px');
$("#regTipo").css('border', '0px');

})

$("#formRegMov").on('submit', (e) => {



e.preventDefault();
 if($("#regInicio").val() > $("#regDataFim").val()) {
$("#regDataFim").css('border', '1px solid red');
$("#regDataFim").css('border-radius', '1.5px');
  alert('A data de chegada deve ser posterior à data de saída!')

}

 else if ($("#regTipo").val() == null ) {
  $("#regTipo").css('border', '1px solid red');
$("#regTipo").css('border-radius', '1.5px');
}

 else if ($("#regMovCont").val() == null ) {
  $("#regMovCont").css('border', '1px solid red');
$("#regMovCont").css('border-radius', '1.5px');
}

 else if ($("#regInicio").val() == null ) {
  $("#regInicio").css('border', '1px solid red');
$("#regInicio").css('border-radius', '1.5px');
}

 else if ($("#regDataFim").val() == null ) {
  $("#regDataFim").css('border', '1px solid red');
$("#regDataFim").css('border-radius', '1.5px');
}

else {

$('#formRegMov').submit()

}

})


function deletar(idMov) {

$("#deletarMov").modal('show')
$("#idMov").val();
$("#idMov").val(idMov)

$('#formDelMov').attr('action','movimentacoes/deletar/'+idMov);

}

function editar(idMov,Conteiner,Tipo,dInicio,dFim){ 

$("#editarMov").modal('show')
$("#editId").val(idMov)
$("#editMovCont").val(Conteiner)
$("#editTipo").val(Tipo)
$("#editInicio").val(dInicio)
$("#editFim").val(dFim)

$('#formEditConteiner').attr('action','movimentacoes/editar/'+idMov);

}

  $(function () {


//funcoes para botoes de acao


// fim funcoes 

    // funcao para mascarar entrada

    $("#editConteiner").inputmask({"mask": "aaaa9999999"});


    var table = $('.yajra-datatable').DataTable({
      "language": {
        "sProcessing":    "Processando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "Nenhum resultado foi encontrado", 
        "sEmptyTable":    "Nenhum dado disponível",
        "sInfo":          "Mostrando registros de _START_ de _END_ de um total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros de 0 a 0 de um total de 0 registros",
        "sInfoFiltered":  "(filtrado de um total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Carregando...",
        "oPaginate": {
            "sFirst":    "Primeiro",
            "sLast":    "Último",
            "sNext":    "Próximo",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Ordem crescente",
            "sSortDescending": ": Ordem decrescente"
        }
    },
    
       
    });


    


 
 $("#filtroConteiner").on('change',() => {


    conteiner = $("#filtroConteiner").val()
          tipostatus = $("#filtroTipo").val()

    if (conteiner == null ) { conteiner = ''}
          if (tipostatus == null ) { tipostatus = ''}

          table.rows().search(conteiner + ' ' + tipostatus).draw();

 })
 
 $("#filtroTipo").on('change',() => {


    conteiner = $("#filtroConteiner").val()
          tipostatus = $("#filtroTipo").val()

    if (conteiner == null ) { conteiner = ''}
          if (tipostatus == null ) { tipostatus = ''}


          table.rows().search(conteiner + ' ' + tipostatus).draw();

 })

 var parametroUrl = function parametroUrl(sParam) {
           var sPageURL = decodeURIComponent(window.location.search.substring(1)),
               sURLVar = sPageURL.split('&'),
               sParametNome,
               i;

           for (i = 0; i < sURLVar.length; i++) {
               sParametNome = sURLVar[i].split('=');

               if (sParametNome[0] === sParam) {
                   return sParametNome[1] === undefined ? true : sParametNome[1];
               }
           }
       };
      

    var cont = parametroUrl("conteiner");

 if (cont != null) { // caso nao esteja vazia, é porque há um parametro. e irá buscar.
    table.rows().search(cont, true, true).draw();
                }

    else{ // sem parametro
        table.rows().search('').draw();

                }




    //fim funcao
  });




</script>


@endsection