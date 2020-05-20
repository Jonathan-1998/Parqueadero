<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('App name') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'parqueadero' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('parqueadero.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Parqueadero') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'vehiculo' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('vehiculo.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Vehiculo') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'cliente' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cliente.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Cliente') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'detalle' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('detalle.index') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Detalle') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>