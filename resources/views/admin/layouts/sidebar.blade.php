<aside class="sidebar" style="height:auto;">
    <nav class="sidebar-nav">
        <ul class="metismenu">
            <li class="title">
                MAIN NAVIGATION
            </li>

            <li class="{{ request()->is('admin/dashboard') ? 'active' : ''}}">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="title">
                SPAJ
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">shopping_cart</i>
                    <span class="nav-label">Spaj List</span>
                </a>
                <ul>
                    <li>
                        <a href="">Spaj Submitted</a>
                    </li>
                    <li>
                        <a href="">Police Approved</a>
                    </li>
                    <li>
                        <a href="">Premium Total</a>
                    </li>

                </ul>
            </li>
            <li class="title">
                Master Data
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">assignment_turned_in</i>
                    <span class="nav-label">Master Data</span>
                </a>
                <ul>
                    <li>
                        <a href="">Asuransi</a>
                    </li>
                    <li>
                        <a href="">Jenis Asuransi</a>
                    </li>
                    <li>
                        <a href="">Bulan</a>
                    </li>
                </ul>
            </li>
            <li class="title">
                Akun Data
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">supervisor_account</i>
                    <span class="nav-label">Akun</span>
                </a>
                <ul>
                    <li>
                        <a href="">Data Authentikasi</a>
                    </li>
                    <li>
                        <a href="">Data Role</a>
                    </li>
                    <li>
                        <a href="">Data Role Authentikasi</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Pengaturan</span>
                        </a>
                        <ul>
                            <li><a href="javascript:void(0);">Ganti Password</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</aside>
