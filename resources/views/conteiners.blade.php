@extends('layouts.app', ['activePage' => 'conteiners', 'titlePage' => __('')])

@section('content')


    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
  @if (session()->has('success'))
    <script>alert('Contêiner registrado!')</script>
@endif

 @if (session()->has('error'))
    <script>alert('Houve algum erro ao realizar a operação!')
      
  </script>
@endif
  @if (session()->has('deletado'))
    <script>alert('Contêiner deletado!')</script>
@endif

@if (session()->has('edit'))
    <script>alert('Contêiner alterado!')</script>
@endif
<div style="margin-left:2%" class="container mt-5">
    <h2 class="mb-4">Listagem de contêiners   

    </h2>

 <button type="button"  id="btnCriarConteiner" class="btn btn-success mb-3" data-toggle="modal" data-target="#criarConteiner">
    <i class="fa fa-plus"></i> &nbsp; Criar contêiner

  </button>

<br>

<select id="filtroCliente" type="button" class="btn btn-cyan mb-3" >
  <option  hidden selected disabled value="">Clientes   
</option>
<option value="">Todos os clientes</option>

@foreach ($clientes as $cliente ) 

  <option value="{{$cliente->Cliente}}">{{$cliente->Cliente}}</option>
@endforeach

  </select>

<select id="filtroTipo" type="button" class="btn btn-cyan mb-3" >
  <option  hidden selected disabled value="">Tipos   
</option>
<option value="">Todos os tipos</option>

@foreach ($tipos as $tipo ) 

  <option value="{{$tipo->Tipo}}">{{$tipo->Tipo}}</option>
@endforeach

  </select>

  <select id="filtroStatus" type="button" class="btn btn-cyan mb-3" >
  <option  hidden selected disabled value="">Status   
</option>
<option value="">Todos os status</option>

@foreach ($statuss as $status ) 

  <option value="{{$status->Status}}">{{$status->Status}}</option>
@endforeach

  </select>

  <select id="filtroCategoria" type="button" class="btn btn-cyan mb-3" >
  <option  hidden selected disabled value="">Categoria   
</option>
<option value="">Todos os clientes</option>

@foreach ($categorias as $categoria ) 

  <option value="{{$categoria->Categoria}}">{{$categoria->Categoria}}</option>
@endforeach

  </select>

<!-- Modal deletar-->
<div class="modal fade"  data-backdrop="false" id="deletarConteiner" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deletar contêiner</h5>
       
      </div>
      <div class="modal-body">
        
        <form action="/conteiners/deletar" id="formDelConteiner">
          {{csrf_field()}}

          {{-- inicio formulario --}}

          <h4>Tem certeza que deseja deletar este contêiner? Todas as movimentações armazenadas serão deletadas! </h4>

          <input type="hidden"required id="idConteiner" name="idConteiner">

             
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
<div class="modal fade"  data-backdrop="false" id="criarConteiner" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar contêiner</h5>
       
      </div>
      <div class="modal-body">
        
        <form action="/conteiners/cadastrar" id="formRegConteiner">
          {{csrf_field()}}

          {{-- inicio formulario --}}



          <label for="regConteiner">Nº do Contêiner</label>
          <input minlength="11" placeholder="ID deve conter 4 letras e 7 números" required class="form-control " type="text" id="regConteiner" name="regConteiner">

            <label for="regCliente">Cliente</label>
          <input placeholder="Nome do cliente" required class="form-control " type="text" id="regCliente" name="regCliente">

            <br>

            <div class="d-flex row justify-content-center">
              <div class="column">
              <label for="regTipo">Tipo </label>
                <select name="regTipo"   style="width: 110%"   id="regTipo" required  class="form-control">
                  <option value="#" selected disabled hidden >Selecione o tipo</option>
                  <option value="40">40</option>
                  <option value="20">20</option>
                </select>
                </div>
                &nbsp;&nbsp;
                  <div style="margin-left: 25%" class="column">
                <label   for="regStatus">Status</label>
                  <select   style="width: 110%" name="regStatus" id="regStatus" required  class="form-control">
                  <option value="#" selected disabled hidden >Selecione o status</option>
                  <option value="Cheio">Cheio</option>
                  <option value="Vazio">Vazio</option>
                </select>
             
                </div>  
            </div>

            <br>

            <label for="regCategoria">Categoria</label>
            <select name="regCategoria" required id="regCategoria" class="form-control">
              <option value="#" hidden disabled selected> Selecione a categoria</option>
              <option value="Importacao"> Importação</option>
              <option value="Exportacao">Exportação</option>

            </select>
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
<div class="modal fade"  data-backdrop="false" id="editarConteiner" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar contêiner</h5>
       
      </div>
      <div class="modal-body">
        
        <form action="/conteiners/editar" id="formEditConteiner">
          {{csrf_field()}}

          {{-- inicio formulario --}}


          <input type="hidden" name="editOldConteiner" id="editOldConteiner">
          <input type="hidden" required id="editId">
          <label for="editConteiner">Nº do Contêiner</label>
          <input minlength="11"  required class="form-control " type="text" id="editConteiner" name="editConteiner">

            <label for="editCliente">Cliente</label>
          <input required class="form-control " type="text" id="editCliente" name="editCliente">

            <br>

            <div class="d-flex row justify-content-center">
              <div class="column">
              <label for="editTipo">Tipo </label>
                <select name="editTipo"   style="width: 110%"   id="editTipo" required  class="form-control">
                  <option value="#" selected disabled hidden >Selecione o tipo</option>
                  <option value="40">40</option>
                  <option value="20">20</option>
                </select>
                </div>
                &nbsp;&nbsp;
                  <div style="margin-left: 25%" class="column">
                <label   for="editStatus">Status</label>
                  <select   style="width: 110%" name="editStatus" id="editStatus" required  class="form-control">
                  <option value="#" selected disabled hidden >Selecione o status</option>
                  <option value="Cheio">Cheio</option>
                  <option value="Vazio">Vazio</option>
                </select>
             
                </div>  
            </div>

            <br>

            <label for="editCategoria">Categoria</label>
            <select name="editCategoria" required id="editCategoria" class="form-control">
              <option value="#" hidden disabled selected> Selecione a categoria</option>
              <option value="Importacao"> Importação</option>
              <option value="Exportacao">Exportação</option>

            </select>
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
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Categoria</th>
                <th>Registrado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>



        @foreach ($conteiners as $conteiner)
        <tr>
          <td>{{ $conteiner->Conteiner}}</td>
          <td>{{ $conteiner->Cliente}}</td>
          <td>{{ $conteiner->Tipo}}</td>
          <td>{{ $conteiner->Status}}</td>
          <td>{{ $conteiner->Categoria}}</td>
          <td>{{ date_format(date_create($conteiner->created_at), 'd/m/Y -- H:i') }}</td>
    
          <td><a class="btn btn-outline-warning editbtn " 
            onclick="editar({{$conteiner->id}},'{{$conteiner->Conteiner}}','{{$conteiner->Cliente}}','{{$conteiner->Tipo}}','{{$conteiner->Status}}','{{$conteiner->Categoria}}')" 

            href="#">Editar</a>
            <a class="btn btn-outline-info " onclick="consultar('{{$conteiner->Conteiner}}')" href="#">Consultar</a>
            <a class="btn btn-outline-danger deletebtn" onclick="deletar({{$conteiner->id}})" href="#">Excluir</a>
          </td>

        </tr>
            @endforeach

        </tbody>
    </table>

    </div>
</div>
   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/inputmask.js" integrity="sha512-XvlcvEjR+D9tC5f13RZvNMvRrbKLyie+LRLlYz1TvTUwR1ff19aIQ0+JwK4E6DCbXm715DQiGbpNSkAAPGpd5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">


$("#btnCriarConteiner").on('click',()=> {

$("#regConteiner").css('border', '0px');
$("#regCliente").css('border', '0px');
$("#regTipo").css('border', '0px');
$("#regStatus").css('border', '0px');
$("#regCategoria").css('border', '0px');

})

$("#formRegConteiner").on('submit',(e)=>{
e.preventDefault();

  if ($("#regConteiner").val() == null ) {
  $("#regConteiner").css('border', '1px solid red');
$("#regConteiner").css('border-radius', '1.5px');
}

 else if ($("#regCliente").val() == null ) {
  $("#regCliente").css('border', '1px solid red');
$("#regCliente").css('border-radius', '1.5px');
}


 else if ($("#regTipo").val() == null ) {
  $("#regTipo").css('border', '1px solid red');
$("#regTipo").css('border-radius', '1.5px');
}

 else if ($("#regStatus").val() == null ) {
  $("#regStatus").css('border', '1px solid red');
$("#regStatus").css('border-radius', '1.5px');
}

 else if ($("#regCategoria").val() == null ) {
  $("#regCategoria").css('border', '1px solid red');
$("#regCategoria").css('border-radius', '1.5px');
}
else {

$('#formRegConteiner').submit()

}


})
function deletar(idConteiner) {

$("#deletarConteiner").modal('show')
$("#idConteiner").val();
$("#idConteiner").val(idConteiner)

$('#formDelConteiner').attr('action','conteiners/deletar/'+idConteiner);

}

function consultar(Conteiner){

  window.location.href = '/movimentacoes?conteiner=' + Conteiner
}

function editar(idConteiner,Conteiner,Cliente,Tipo,Status,Categoria){ 

$("#editarConteiner").modal('show')
$("#editId").val(idConteiner)
$("#editConteiner").val(Conteiner)
$("#editOldConteiner").val(Conteiner)
$("#editCliente").val(Cliente)
$("#editTipo").val(Tipo)
$("#editStatus").val(Status)
$("#editCategoria").val(Categoria)

$('#formEditConteiner').attr('action','conteiners/editar/'+idConteiner);

}

  $(function () {


//funcoes para botoes de acao


// fim funcoes 

    // funcao para mascarar entrada

    $("#regConteiner,#editConteiner").inputmask({"mask": "aaaa9999999"});


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
    

 $("#filtroCliente").on('change',() => {


          cliente = $("#filtroCliente").val()
          tipo = $("#filtroTipo").val()
          categoria = $("#filtroCategoria").val()
          tipostatus = $("#filtroStatus").val()

          if (cliente == null ) { cliente = ''}
          if (tipo == null ) { tipo = ''}
          if (categoria == null ) { categoria = ''}
          if (tipostatus == null ) { tipostatus = ''}

          table.rows().search(cliente + ' ' + tipo + ' ' + categoria + ' ' + tipostatus + ' ').draw();

 })


    
 $("#filtroTipo").on('change',() => {


          cliente = $("#filtroCliente").val()
          tipo = $("#filtroTipo").val()
          categoria = $("#filtroCategoria").val()
          tipostatus = $("#filtroStatus").val()

    if (cliente == null ) { cliente = ''}
          if (tipo == null ) { tipo = ''}
          if (categoria == null ) { categoria = ''}
          if (tipostatus == null ) { tipostatus = ''}


          table.rows().search(cliente + ' ' + tipo + ' ' + categoria + ' ' + tipostatus).draw();

 })


    
 $("#filtroStatus").on('change',() => {


          cliente = $("#filtroCliente").val()
          tipo = $("#filtroTipo").val()
          categoria = $("#filtroCategoria").val()
          tipostatus = $("#filtroStatus").val()

    if (cliente == null ) { cliente = ''}
          if (tipo == null ) { tipo = ''}
          if (categoria == null ) { categoria = ''}
          if (tipostatus == null ) { tipostatus = ''}


          table.rows().search(cliente + ' ' + tipo + ' ' + categoria + ' ' + tipostatus).draw();

 })


    
 $("#filtroCategoria").on('change',() => {


          cliente = $("#filtroCliente").val()
          tipo = $("#filtroTipo").val()
          categoria = $("#filtroCategoria").val()
          tipostatus = $("#filtroStatus").val()

    if (cliente == null ) { cliente = ''}
          if (tipo == null ) { tipo = ''}
          if (categoria == null ) { categoria = ''}
          if (tipostatus == null ) { tipostatus = ''}


          table.rows().search(cliente + ' ' + tipo + ' ' + categoria + ' ' + tipostatus).draw();

 })



  });







</script>


@endsection