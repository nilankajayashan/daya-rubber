<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color:#F6FAFD;">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if(in_array( 'dashboard', json_decode($permissions)))
                <div class="sb-sidenav-menu-heading">DASHBOARD</div>
                    <a class="nav-link @if(isset($state) && $state == 'dashboard') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'dashboard']) }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                @endif
                @if(in_array( 'view-category', json_decode($permissions)) || in_array( 'view-product', json_decode($permissions)))
                    <div class="sb-sidenav-menu-heading">CATALOG</div>
                    @if(in_array( 'view-category', json_decode($permissions)))
                        <a class="nav-link @if(isset($state) && $state == 'categories') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'categories']) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-stream" aria-hidden="true"></i></div>
                            Categories
                        </a>
                    @endif
                    @if(in_array( 'view-product', json_decode($permissions)))
                        <a class="nav-link @if(isset($state) && $state == 'products') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'products']) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-bag" aria-hidden="true"></i></div>
                            Products
                        </a>
                    @endif
                    @if(in_array( 'view-product', json_decode($permissions)))
                        <a class="nav-link @if(isset($state) && $state == 'stocks') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'stocks']) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cubes" aria-hidden="true"></i></div>
                            Stocks
                        </a>
                    @endif
                    @if(in_array( 'view-order', json_decode($permissions)))
                        <a class="nav-link @if(isset($state) && $state == 'orders') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'orders']) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-luggage-cart" aria-hidden="true"></i></div>
                            Orders
                        </a>
                    @endif
                    @if(in_array( 'view-cart', json_decode($permissions)))
                        <a class="nav-link @if(isset($state) && ($state == 'carts' || $state == 'edit-cart')) bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'carts']) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart" aria-hidden="true"></i></div>
                            Carts
                        </a>
                    @endif
                @endif
                @if(in_array( 'view-supplier', json_decode($permissions)) || in_array( 'view-employee', json_decode($permissions)) || in_array( 'view-customer', json_decode($permissions)))
                    <div class="sb-sidenav-menu-heading"><P>PEOPLE</P></div>
                    @if(in_array( 'view-supplier', json_decode($permissions)))
                        <a class="nav-link @if(isset($state) && $state == 'suppliers') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'suppliers']) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-people-carry"></i></div>
                            Suppliers
                        </a>
                    @endif
                    @if(in_array( 'view-employee', json_decode($permissions)))
                        <a class="nav-link @if(isset($state) && $state == 'employees') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'employees']) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                            Employees
                        </a>
                    @endif
                    @if(in_array( 'view-customer', json_decode($permissions)))
                        <a class="nav-link @if(isset($state) && $state == 'customers') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'customers']) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Customers
                        </a>
                    @endif
                @endif
                <div class="sb-sidenav-menu-heading">Report</div>
                <a class="nav-link @if(isset($state) && $state == 'order_report') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'order_report']) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-export"></i></div>
                    Order Report
                </a>
                <a class="nav-link @if(isset($state) && $state == 'payment_report') bg-dark text-light @else text-dark @endif" href="{{ route('dashboard', ['state' => 'payment_report']) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-invoice"></i></div>
                    Payment Report
                </a>

            </div>
        </div>
    </nav>
</div>
