<nav class="sb-topnav navbar navbar-expand" style="background-color:#F6FAFD;">
    <a class="navbar-brand text-primary" href="{{ route('dashboard', ['state' => 'dashboard']) }}">DAYA RUBBER</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars text-dark"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('dashboard', ['state' => 'my_account']) }}">
                <span class="d-none d-lg-inline-flex">My Account&nbsp;</span><i class="fas fa-user" aria-hidden="true"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('logout') }}">
                <span class="d-none d-lg-inline-flex">Logout&nbsp;</span><i class="fas fa-sign-out-alt"></i></i>
            </a>
        </li>
    </ul>
</nav>
