<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="/admin/assets/img/logo.png" class="header-logo" /> <span
            class="logo-name">Otika</span>
        </a>
      </div>
      <ul class="sidebar-menu">

        <li class="dropdown @yield('dashboard')">
          <a href="/a-panel" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown @yield('teachers')">
          <a href="{{ route('admin.info.index') }}" ><i
              data-feather="briefcase"></i><span>Info</span></a>
        </li>

        <li class="dropdown @yield('provinces')">
          <a href="{{-- {{ route('provinces.index') }} --}}" ><i
              data-feather="briefcase"></i><span>Provinces</span></a>
        </li>
        <li class="dropdown @yield('regions')">
          <a href="{{-- {{ route('regions.index') }} --}}" ><i
              data-feather="briefcase"></i><span>Regions</span></a>
        </li>

      </ul>
    </aside>
  </div>