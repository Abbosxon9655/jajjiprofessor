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
        {{-- <li class="dropdown @yield('teachers')">
          <a href="{{ route('admin.infos.index') }}" ><i
              data-feather="briefcase"></i><span>Info</span></a>
        </li>

        <li class="dropdown @yield('provinces')">
          <a href="{{ route('admin.posts.index') }}" ><i
              data-feather="briefcase"></i><span>Post</span></a>
        </li>
        <li class="dropdown @yield('orderss')">
          <a href="{{ route('admin.orders.index') }}" ><i
              data-feather="briefcase"></i><span>Orders</span></a> --}}
        </li>
        <li class="dropdown @yield('peoples')">
          <a href="{{ route('admin.humans.index') }}" ><i
              data-feather="briefcase"></i><span>Humanss</span></a>
        </li>
        <li class="dropdown @yield('numbers')">
          <a href="{{ route('admin.numbers.index') }}" ><i
              data-feather="briefcase"></i><span>Numbers</span></a>
        </li>

     

        {{-- <li class="dropdown @yield('regions')">
          <a href="{{ route('admin.comments.index') }}" ><i
              data-feather="briefcase"></i><span>Comments</span></a>
        </li> --}}
      {{-- </li>
      <li class="dropdown @yield('regions')">
        <a href="{{ route('admin.shows.index') }}" ><i
            data-feather="briefcase"></i><span>Show</span></a>
      </li>

    </li>
    <li class="dropdown @yield('regions')">
      <a href="{{ route('admin.articles.index') }}" ><i
          data-feather="briefcase"></i><span>Article</span></a>
    </li> --}}


      </ul>
    </aside>
  </div>