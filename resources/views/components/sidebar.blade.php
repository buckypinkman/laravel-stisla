<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Laravel Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">LS</a>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li> --}}
            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer"></i> <span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown {{ @$type_menu === 'layout' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-user"></i> <span>User Management</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('user') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('admin.user.index') }}">User</a>
                    </li>
                    {{-- <li class="{{ Request::is('role') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('admin.role') }}">Role</a>
                    </li>
                    <li class="{{ Request::is('permission') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('admin.permission') }}">Permission</a>
                    </li> --}}
                </ul>
            </li>
        </ul>

    </aside>
</div>
