<div class="sidebar" data-color="orange" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      CT
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Creative Tim
    </a>
  </div>
  <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y">
    <div class="user">
      <div class="photo">
        <img src="http://i.pravatar.cc/200">
      </div>
      <div class="user-info">
        <a data-toggle="collapse" href="#collapseExample" class="username collapsed" aria-expanded="false">
          <span>
            Admin
            <b class="caret"></b>
          </span>
        </a>
        <div class="collapse" id="collapseExample" style="">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="https://material-dashboard-pro-laravel.creative-tim.com/profile">
                <span class="sidebar-mini"> MP </span>
                <span class="sidebar-normal"> My Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://material-dashboard-pro-laravel.creative-tim.com/profile">
                <span class="sidebar-mini"> EP </span>
                <span class="sidebar-normal"> Edit Profile </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> S </span>
                <span class="sidebar-normal"> Settings </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notes' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('notes.index') }}">
            <i class="material-icons">dashboard</i>
              <p>{{ __('Notas') }}</p>
          </a>
        </li>      
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>   
    </ul>
</div></div>
