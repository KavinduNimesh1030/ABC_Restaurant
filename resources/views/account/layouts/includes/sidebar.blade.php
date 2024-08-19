<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo pt-4">
        <a href="{{route('dashboard')}}" class="app-brand-link">
       
                <div class="">
                    <img src="{{url('admin_assets/img/logos/usefulfy.png')}}" class="w-65 h-auto"  style="width: 150px !important;"/>
                </div>

          
            {{-- <span class="app-brand-text demo menu-text fw-bold">Usefulfy</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-4">
 
        <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        
        
        <!-- Country -->
        <li class="menu-item mt-2 {{ request()->is('admin/staff/*') ? 'active' : '' }} ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8f8a8a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-world">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M3.6 9h16.8" />
                        <path d="M3.6 15h16.8" />
                        <path d="M11.5 3a17 17 0 0 0 0 18" />
                        <path d="M12.5 3a17 17 0 0 1 0 18" />
                    </svg>
                </i>
                <div data-i18n="Manage Staff">Manage Staff</div>
            </a>
            <ul class="menu-sub mt-1">
                <li class="menu-item">
                    <a href="{{ route('staff.view') }}" class="menu-link">
                        <div data-i18n="Add Country">Add staff</div>
                    </a>
                </li>
                <li class="menu-item mt-1">
                     <a href="{{ route('staff.list-view') }}" class="menu-link">
                        <div data-i18n="View Country">View staff</div>
                    </a>
                </li>
            </ul>
        </li>
      
          {{-- <!-- City -->
          <li class="menu-item mt-2 {{ request()->is('admin/city/*') ? 'active' : '' }} ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8f8a8a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-world">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M3.6 9h16.8" />
                        <path d="M3.6 15h16.8" />
                        <path d="M11.5 3a17 17 0 0 0 0 18" />
                        <path d="M12.5 3a17 17 0 0 1 0 18" />
                    </svg>
                </i>
                <div data-i18n="Manage City">Manage City</div>
            </a>
            <ul class="menu-sub mt-1">
                <li class="menu-item">
                    <a href="{{ route('city.view') }}" class="menu-link">
                        <div data-i18n="Add City">Add City</div>
                    </a>
                </li>
                <li class="menu-item mt-1">
                     <a href="{{ route('city.list-view') }}" class="menu-link">
                        <div data-i18n="View City">View City</div>
                    </a>
                </li>
            </ul>
        </li> --}}


    </ul>
</aside>
<!-- / Menu -->