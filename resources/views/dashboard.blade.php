@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">directions_boat</i>
              </div>
              <p class="card-category">Conteiners registrados</p>
              <h3 class="card-title">

{{
                $conteiners->count()}}
                <small>
                    Conteiners

                </small>
              </h3>
            </div>
            <div class="card-footer">

            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">swap_horiz</i>
              </div>
              <p class="card-category">Movimentações programadas</p>
              <h3 class="card-title">
                {{$movimentacoes->count()}}
               <small> Movimentações </small></h3>
                }
            </div>
            <div class="card-footer">

            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-blue card-header-icon">
              <div class="card-icon">
                <i class="material-icons">supervisor_account</i>
              </div>
              <p class="card-category">Clientes cadastrados</p>
              <h3 class="card-title">

                {{$clientes->count()
                }} 

                <small>Clientes</small></h3>
            </div>
            <div class="card-footer">

            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Movimentações</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> aumento.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> atualizado 4 minutos atrás
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Novos clientes</h4>
              <p class="card-category">8 Clientes novos</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> atualizado há 15 minutos atrás
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
