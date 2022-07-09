 
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <br>

  <div style="margin-left:2.5%; " class="row  justify-center ">
        <a href="{{ url("home") }}">
        <div  class="row">
      <img src="https://cdn.iconscout.com/icon/free/png-256/dock-3173485-2650637.png" style="height:10%;width:10%" alt="">
      <h2 class="">PortSys   
</h2>
</a>
</div>
<div style="margin-right: 36.5%" class="col justify-center align-center text-center">
     <h2 class="mb-4">Relatório de movimentação 


    </h2>
    <p>Gerado em: {{date('d/m/Y à\s H:i:s')}}</p>
</div>

<div style="margin-right:15%" class="row">
    
    <button href='/conteiners' onclick="window.location='{{ url("Relatorio/Download") }}'" id="salvarPdf" class="btn btn-danger mb-3" >
    <i class="fa fa-file-pdf"></i> &nbsp; Salvar relatório

  </button>

</div>
</div>

<br>
     


<table  class="table table-bordered cell-border display" id="tabela">
    <thead>
    <tr>
        <th>Cliente</th>
        <th>Categoria</th>
        <th>Conteiner</th>
        <th>Tipo de movimentação</th>
        <th>Data inicio</th>

        <th>Data fim</th>

    </tr>
    </thead>
    <tbody>
    @foreach($movimentacoes as $data)
        <tr>
            <td>{{ $data->Cliente }}</td>
            <td>{{ $data->Categoria  }}</td>
            <td>{{ $data->Conteiner }}</td>
            <td>{{ $data->Tipo_Movimentacao }}</td>
            <td>{{ $data->Data_Inicio }}</td>
            <td>{{ $data->Data_Fim }}</td>

        </tr>

    @endforeach


    </tbody>
</table>

<table style="margin-top:-6px; border-color: black !important;" class="table table-bordered border border-dark table-sm ">
  
  <tr class="table-warning">
            <td style="width:90%" ><h4>TOTAL DE EXPORTAÇÕES:</h4></td>
            <td   style="padding-left: 5%"><h3>{{count($exportacoes)}}</h3></td>
  </tr>
  <tr class="table-warning">
      <td style="width:90%"><h4>TOTAL DE IMPORTAÇÕES:</h4></td>
        <td style="padding-left: 5%"><h3>{{count($importacoes)}}</h3></td>
  </tr>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/inputmask.js" integrity="sha512-XvlcvEjR+D9tC5f13RZvNMvRrbKLyie+LRLlYz1TvTUwR1ff19aIQ0+JwK4E6DCbXm715DQiGbpNSkAAPGpd5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">



        var table = $('#tabela').DataTable({
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
    exportOptions: {
       // Any other settings used
       grouped_array_index: [0],
},

    searching: false,
    bFilter: false,
    bInfo: false,
    'sDom': 't',
    order: [[0, 'asc'], [1, 'asc']],
           rowGroup: {
            dataSrc: [ 0, 1 ]
        },
        columnDefs: [ {
            targets: [ 0, 1 ],
            visible: false
        } ]
       

       
    });

    </script>