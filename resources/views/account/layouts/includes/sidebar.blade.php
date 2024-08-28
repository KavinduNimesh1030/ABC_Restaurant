<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo pt-4">
        <a href="{{route('dashboard')}}" class="app-brand-link">
       
                <div class="">
                    <img src="{{url('admin_assets/img/logos/usefulfy.png')}}" class="w-65 h-auto"  style="width: 150px !important;"/>
                </div>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-4">
 
        <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin-dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        
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
                        <div data-i18n="Add Staff">Add staff</div>
                    </a>
                </li>
                <li class="menu-item mt-1">
                     <a href="{{ route('staff.list-view') }}" class="menu-link">
                        <div data-i18n="View Staff">View staff</div>
                    </a>
                </li>
            </ul>
        </li>
      
        <li class="menu-item mt-2 {{ request()->is('admin/service/*') ? 'active' : '' }} ">
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
                <div data-i18n="Manage Service">Manage Service</div>
            </a>
            <ul class="menu-sub mt-1">
                <li class="menu-item">
                    <a href="{{ route('service.view') }}" class="menu-link">
                        <div data-i18n="Add Service">Add Service</div>
                    </a>
                </li>
                <li class="menu-item mt-1">
                     <a href="{{ route('service.list-view') }}" class="menu-link">
                        <div data-i18n="View Service">View Service</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item mt-2 {{ request()->is('admin/product/*') ? 'active' : '' }} ">
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
                <div data-i18n="Manage Product">Manage Product</div>
            </a>
            <ul class="menu-sub mt-1">
                <li class="menu-item">
                    <a href="{{ route('product.view') }}" class="menu-link">
                        <div data-i18n="Add Product">Add Product</div>
                    </a>
                </li>
                <li class="menu-item mt-1">
                     <a href="{{ route('product.list-view') }}" class="menu-link">
                        <div data-i18n="View Product">View Product</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
<!-- / Menu -->