<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                @if ($messages->isEmpty())
                    <span class="badge badge-danger badge-counter"></span>
                @else
                    <span class="badge badge-danger badge-counter">{{ $messages->count() }}</span>
                @endif  

            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                @foreach ($messages as $message)
                <a class="dropdown-item d-flex align-items-center" href="/dashboard/contacts/{{ $message->id }}">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="/assets/images/profile/blank.png"
                            alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">{{ $message->message }}</div>
                        <div class="small text-gray-500">{{ $message->name }} · {{ $message->created_at->diffForHumans() }}</div>
                    </div>
                </a>
                @endforeach
                
                @if ($messages->isEmpty())
                    <a class="dropdown-item text-center small text-gray-500" disabled>No Message Found</a>
                @else
                    <a class="dropdown-item text-center small text-gray-500" href="/dashboard/contacts">Read More Messages</a>
                @endif
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle"
                    src="/assets/images/profile/admin.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('add-admin') }}">
                    <i class="fa-solid fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                    Add New Admin
                </a>
                <a class="dropdown-item" href="{{ route('change-password') }}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->