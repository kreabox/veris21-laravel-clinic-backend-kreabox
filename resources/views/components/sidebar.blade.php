<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">
                KREABOX CLINIC
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">KC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item ">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            {{--  --}}
            <li class="menu-header">Account Management</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}"><i class="far fa-user"></i> <span>Users List</span></a>
            </li>
            {{--  --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dokter.index') }}"><i class="fas fa-user-md"></i> <span>Dokter List</span></a>
            </li>
            <li class="menu-header">Services Management</li>
        </ul>


    </aside>
</div>
