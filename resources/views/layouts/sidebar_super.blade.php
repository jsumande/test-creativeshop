<!-- Sidebar Menu -->
<nav class="mt-4">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="sidebarnav">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('super.dashboard') }}" class="nav-link {{ request()->is('super/dashboard*') ? 'active' : '' }}">
                <i class="nav-icon icon-dashboard"></i>
                <p>
                    @lang('menu.dashboard')
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('super.plan.index') }}" class="nav-link {{ request()->is('super/plan*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-clipboard"></i>
                <p>
                    Plans
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('super.subscription.index') }}" class="nav-link {{ request()->is('super/subscription*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-archive"></i>
                <p>
                    Subscription
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('super.history.index') }}" class="nav-link {{ request()->is('super/history*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-history"></i>
                <p>
                    Payment History
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('super.list.index') }}" class="nav-link {{ request()->is('super/list*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-history"></i>
                <p>
                    Payment List
                </p>
            </a>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->
