<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fab fa-google"></i>
      </div>
        <div class="sidebar-brand-text">oodtour</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-2">

    <!-- Nav Item - Dashboard -->


    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard')}}">
        <i class="fas fa-fw fa-chart-bar"></i>
        <span>Dashboard</span></a>
    </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-2">

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item 
          {{ (request()->routeIs('travel-packs.index') || 
            request()->routeIs('galleries.index') ||
            request()->routeIs('countries.index') ||
            request()->routeIs('users.index'))
             ? 'active' : ''}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Master Data</span>
            </a>
            <div id="collapseTwo" class="collapse 
            {{ (request()->routeIs('travel-packs.index') || 
            request()->routeIs('galleries.index') ||
            request()->routeIs('countries.index') ||
            request()->routeIs('users.index'))
             ? 'show' : ''}}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item mt-2 {{ request()->routeIs('travel-packs.index') ? 'active' : '' }}"
                   href="{{ route('travel-packs.index')}}"><i class="fas fa-fw fa-atlas"></i>&nbsp;Travelpacks</a>
                <a class="collapse-item mt-2 {{ request()->routeIs('galleries.index') ? 'active' : '' }}"
                   href="{{ route('galleries.index')}}"><i class="fas fa-fw fa-camera-retro"></i>&nbsp;Galleries</a>
                <a class="collapse-item mt-2 mb-2 {{ request()->routeIs('countries.index') ? 'active' : '' }}"
                   href="{{ route('countries.index')}}"><i class="fas fa-globe-asia"></i>&nbsp;Countries</a>
                <a class="collapse-item mt-2 mb-2 {{ request()->routeIs('users.index') ? 'active' : '' }}"
                   href="{{ route('users.index')}}"><i class="fas fa-users-cog"></i>&nbsp;Users</a>
              </div>
            </div>
          </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('transactions.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('transactions.index')}}">
        <i class="fas fa-fw fa-cash-register"></i>
        <span>Transactions</span></a>
    </li>
    
      
    {{-- <hr class="sidebar-divider mt-3 mb-3">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('transactionsReport.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('transactionsReport.index')}}">
        <i class="fas fa-fw fa-cash-register"></i>
        <span>Transactions Report</span></a>
    </li> --}}
    
      
    <hr class="sidebar-divider mt-3 mb-3">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul> 