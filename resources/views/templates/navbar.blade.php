<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu"></div>

        @php
        $current_url = Request::path();
        @endphp

        <ul class="navbar-nav" id="navbar-nav">
            <li class="nav-item">
                <a href="{{ url('admin/dashboard') }}" class="nav-link {{ $current_url == 'admin/dashboard' ? 'active' : '' }}">
                    <i data-feather="home"></i>Dashboard
                </a>
            </li>

            <!-- <li class="menu-title"><span data-key="t-menu">Artikel</span></li> -->
            <li class="nav-item">
                <a href="{{ url('admin/akun') }}" class="nav-link {{ $current_url == 'admin/akun' ? 'active' : '' }}">
                    <i data-feather="database"></i>Data Akun
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/kategori') }}" class="nav-link {{ $current_url == 'admin/kategori' ? 'active' : '' }}">
                    <i data-feather="bookmark"></i>Data Kategori
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/transaksi') }}" class="nav-link {{ $current_url == 'admin/transaksi' ? 'active' : '' }}">
                    <i data-feather="credit-card"></i>Data Transaksi
                </a>
            </li>

            <!-- <li class="menu-title"><span data-key="t-menu">Menu Settings</span></li> -->
            <li class="nav-item">
                <a href="{{ url('admin/hutangpiutang') }}" class="nav-link {{ $current_url == 'admin/hutangpiutang' ? 'active' : '' }}">
                    <i data-feather="shopping-bag"></i>Hitung Piutang
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/settingweb') }}" class="nav-link {{ $current_url == 'admin/settingweb' ? 'active' : '' }}">
                    <i data-feather="settings"></i>Setting Website
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>