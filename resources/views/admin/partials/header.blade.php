<header class="main-header">
    <a href="{{ route('admin.index') }}" class="logo">
        <span class="logo-mini"><b>N</b>QT</span>
        <span class="logo-lg"><b>ADMIN</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('admin.logout') }}"><i class="fa fa-fw fa-power-off"></i>
                        Log Out
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
