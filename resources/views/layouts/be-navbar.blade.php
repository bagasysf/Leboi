<nav class="col-md-2 d-none d-md-block bg-white sidebar shadow-sm">
    <div class="sidebar-sticky">
        <ul class="nav flex-column mt-2">
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-start {{request()->is('dashboard')?'active': ''}}" href="/dashboard">
                    <i data-feather="home"></i>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-start {{request()->is('orders')?'active': ''}}" href="/orders">
                    <span data-feather="file"></span>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-start {{request()->is('packages')?'active': ''}}" href="/packages">
                    <span data-feather="package"></span>
                    Packages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-start {{request()->is('categories')?'active': ''}}" href="/categories">
                    <span data-feather="file"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-start {{request()->is('products')?'active': ''}}" href="/products">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-start {{request()->is('users')?'active': ''}}" href="/users">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-start {{request()->is('user-roles')?'active': ''}}" href="/user-roles">
                    <span data-feather="user-check"></span>
                    User Roles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-start {{request()->is('user-permissions')?'active': ''}}" href="/user-permissions">
                    <span data-feather="user-x"></span>
                    User Permissions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-start" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Sales
                </a>
            </li>
        </ul>
    </div>
</nav>
