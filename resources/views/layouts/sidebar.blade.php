<!-- Sidebar Menu -->
<nav class="mt-4">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="sidebarnav">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('account/dashboard*') ? 'active' : '' }}">
                <i class="nav-icon icon-dashboard"></i>
                <p>
                    @lang('menu.dashboard')
                </p>
            </a>
        </li>

        @if($user->is_admin)
        <li class="nav-item">
            <a href="{{ route('admin.locations.index') }}" class="nav-link {{ request()->is('account/locations*') ? 'active' : '' }}">
                <i class="nav-icon icon-map-alt"></i>
                <p>
                    @lang('menu.locations')
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->is('account/categories*') ? 'active' : '' }}">
                <i class="nav-icon icon-list"></i>
                <p>
                    @lang('menu.categories')
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.business-services.index') }}" class="nav-link {{ request()->is('account/business-services*') ? 'active' : '' }}">
                <i class="nav-icon icon-list"></i>
                <p>
                    @lang('menu.services')
                </p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->is('account/pages*') ? 'active' : '' }}">
                <i class="nav-icon icon-layers"></i>
                <p>
                    @lang('menu.pages')
                </p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->is('account/customers*') ? 'active' : '' }}">
                <i class="nav-icon icon-user"></i>
                <p>
                    @lang('menu.customers')
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.employee.index') }}" class="nav-link {{ request()->is('account/employee*') ? 'active' : '' }}">
                <i class="nav-icon icon-user"></i>
                <p>
                    @lang('menu.employee')
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.pos.create') }}" class="nav-link {{ request()->is('account/pos*') ? 'active' : '' }}">
                <i class="nav-icon icon-shopping-cart"></i>
                <p>
                    @lang('menu.pos')
                </p>
            </a>
        </li>
        @endif
        <li class="nav-item">
            <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->is('account/bookings*') ? 'active' : '' }}">
                <i class="nav-icon icon-calendar"></i>
                <p>
                    @lang('menu.bookings')
                </p>
            </a>
        </li>

        @if($user->is_admin)
        <li class="nav-item">
            <a href="{{ route('admin.reports.index') }}" class="nav-link {{ request()->is('account/reports*') ? 'active' : '' }}">
                <i class="nav-icon icon-pie-chart"></i>
                <p>
                    @lang('menu.reports')
                </p>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a href="{{ route('admin.subscription.index') }}" class="nav-link 
            {{ request()->is('account/subscription*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-archive"></i>
                <p>
                    Subscription
                </p>
            </a>
        </li> --}}

        <li class="nav-item">
            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->is('account/settings*') ? 'active' : '' }}" id="settings">
                <i class="nav-icon icon-settings"></i>
                <p>
                    @lang('menu.settings')
                </p>
            </a>
        </li>
        @endif
    </ul>
</nav>
<!-- /.sidebar-menu -->
