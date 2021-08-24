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

            <li
                class="{{ request()->is('admin/spaj') || request()->is('admin/policeApproved') || request()->is('admin/premiumTotal') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">shopping_cart</i>
                    <span class="nav-label">Spaj List</span>
                </a>
                <ul>
                    <li class="{{ request()->is('admin/spaj') ? 'active' : ''}}">
                        <a href="{{ url('admin/spaj') }}">Spaj Submitted</a>
                    </li>
                    <li class="{{ request()->is('admin/policeApproved') ? 'active' : ''}}">
                        <a href="{{ url('admin/policeApproved') }}">Police Approved</a>
                    </li>
                    <li class="{{ request()->is('admin/premiumTotal') ? 'active' : ''}}">
                        <a href="{{ url('admin/premiumTotal') }}">Premium Total</a>
                    </li>

                </ul>
            </li>
            <li class="title">
                Master Data
            </li>

            <li
                class="{{ request()->is('admin/asuransi') || request()->is('admin/jenisAsuransi') || request()->is('admin/bulan') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">assignment_turned_in</i>
                    <span class="nav-label">Master Data</span>
                </a>
                <ul>
                    <li class="{{ request()->is('admin/asuransi') ? 'active' : ''}}">
                        <a href="{{ url('admin/asuransi') }}">Asuransi</a>
                    </li>
                    <li class="{{ request()->is('admin/jenisAsuransi') ? 'active' : ''}}">
                        <a href="{{ url('admin/jenisAsuransi') }}">Jenis Asuransi</a>
                    </li>
                    <li class="{{ request()->is('admin/bulan') ? 'active' : ''}}">
                        <a href="{{ url('admin/bulan') }}">Bulan</a>
                    </li>
                </ul>
            </li>
            <li class="title">
                Akun Data
            </li>

            <li
                class="{{ request()->is('admin/account/authentikasi') || request()->is('admin/account/role') || request()->is('admin/account/roleAuthentikasi') || request()->is('admin/account/changePass') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">supervisor_account</i>
                    <span class="nav-label">Akun</span>
                </a>
                <ul>
                    <li class="{{ request()->is('admin/account/authentikasi') ? 'active' : ''}}">
                        <a href="{{ url('admin/account/authentikasi') }}">Data Authentikasi</a>
                    </li>
                    <li class="{{ request()->is('admin/account/role') ? 'active' : ''}}">
                        <a href="{{ url('admin/account/role') }}">Data Role</a>
                    </li>
                    <li class="{{ request()->is('admin/account/roleAuthentikasi') ? 'active' : ''}}">
                        <a href="{{ url('admin/account/roleAuthentikasi') }}">Data Role Authentikasi</a>
                    </li>
                    <li class="{{ request()->is('admin/account/changePass') ? 'active' : ''}}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Pengaturan</span>
                        </a>
                        <ul>
                            <li><a href="{{ url('admin/account/changePass') }}">Ganti Password</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</aside>
