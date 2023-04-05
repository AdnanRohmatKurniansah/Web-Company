<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-brands fa-superpowers fa-spin"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ZB Admin </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard/index') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item {{ Request::is('dashboard/slides*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/slides">
            <i class="fa-solid fa-image"></i>
            <span>Slides</span></a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/abouts') || Request::is('dashboard/teams') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-regular fa-address-card"></i>
            <span>About Page</span></a>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('dashboard/abouts*') ? 'active' : '' }}" href="/dashboard/abouts">About</a>
                <a class="collapse-item {{ Request::is('dashboard/teams*') ? 'active' : '' }}" href="/dashboard/teams">Our Team</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::is('dashboard/services*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/services">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <span>Services</span></a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/portfolios*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/portfolios">
            <i class="fas fa-fw fa-folder"></i>
            <span>Portfolios</span></a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/customers*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/customers">
            <i class="fa-solid fa-users-between-lines"></i>
            <span>Customers</span></a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/blogs') || Request::is('dashboard/categories') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-brands fa-blogger"></i>
            <span>Blog Post</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('dashboard/blogs*') ? 'active' : '' }}" href="/dashboard/blogs">Blog</a>
                <a class="collapse-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">Blog Categories</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::is('dashboard/contacts*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/contacts">
            <i class="fa-sharp fa-regular fa-comments"></i>
            <span>Contacts</span></a>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->