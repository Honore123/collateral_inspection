<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      <img src="{{ asset('assets/img/CIS.png') }}" alt="CIS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
{{--        <i class="fad fa-dungeon brand-image elevation-3"></i>--}}
      <span class="brand-text font-weight-light">Collateral Inspection </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block font-weight-light">{{ Auth::user()->name }}</a>
        </div>
      </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="far fa-fw fa-tachometer-alt-slow nav-icon">
                        </i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('report_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/earths*") ? "menu-open" : "" }} {{ request()->is("admin/compounds*") ? "menu-open" : "" }} {{ request()->is("admin/statuses*") ? "menu-open" : "" }} ">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-file-chart-line">

                            </i>
                            <p>
                                Inspection
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("admin.earths.index") }}" class="nav-link {{ request()->is("admin/earths") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon far fa-file">

                                    </i>
                                    <p>
                                        New inspection
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.earths.reports") }}" class="nav-link {{ request()->is("admin/earths/reports") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon far fa-file-alt">

                                    </i>
                                    <p>
                                        Review inspections
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-users-cog">

                            </i>
                            <p>
                                Settings
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-handshake">

                                        </i>
                                        <p>
                                            Permissions
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-id-badge">

                                        </i>
                                        <p>
                                            Roles
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-user">

                                        </i>
                                        <p>
                                            Users
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-clock">

                                        </i>
                                        <p>
                                            Audit Logs
                                        </p>
                                    </a>
                                </li>
                            @endcan
                                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                                    @can('profile_password_edit')
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                                <i class="fa-fw far fa-key nav-icon">
                                                </i>
                                                <p>
                                                    Profile
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                @endif
                        </ul>
                    </li>
                @endcan

{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">--}}
{{--                            <i class="far fa-fw fa-sign-out-alt nav-icon">--}}

{{--                            </i>--}}
{{--                            <p>Logout</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>