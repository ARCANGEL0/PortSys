<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('PortSys') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Início') }}</p>
        </a>
      </li>
   
      <li class="nav-item{{ $activePage == 'conteiners' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('conteiners') }}">
          <i class="material-icons">directions_boat</i>
            <p>{{ __('Contêiners') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'movimentacoes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('movimentacoes') }}">
          <i class="material-icons">swap_horiz</i>
            <p>{{ __('Movimentações') }}</p>
        </a>
      </li>

         <li class="nav-item">
        <a class="nav-link" href="{{ route('gerar.relatorio') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Gerar relatório') }}</p>
        </a>
      </li>

    </ul>
  </div>
</div>
