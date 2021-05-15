<li class="app-sidebar__heading">Menu</li>
<li class="{{ Request::is('home') ? 'mm-active' : '' }}">
    <a href="#">
        <i class="metismenu-icon pe-7s-rocket"></i>
        Dashboards
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="index.html" class="{{ Request::is('home') ? 'mm-active' : '' }}">
                <i class="metismenu-icon">
                </i>Analytics
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-browser"></i>
        Pages
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="pages-login.html">
                <i class="metismenu-icon"></i>
                Login
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-browser"></i>
        User Management
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li class="{{ Request::is('roles*') ? 'mm-active' : '' }}">
            <a href="{!! route('roles.index') !!}">
                <i class="metismenu-icon"></i>
                Roles
            </a>
        </li>
        <li class="{{ Request::is('permissions*') ? 'mm-active' : '' }}">
            <a href="{!! route('permissions.index') !!}">
                <i class="metismenu-icon"></i>
                Permissions
            </a>
        </li>
        <li class="{{ Request::is('users*') ? 'mm-active' : '' }}">
            <a href="{!! route('users.index') !!}">
                <i class="metismenu-icon"></i>
                Users
            </a>
        </li>
    </ul>
</li>
