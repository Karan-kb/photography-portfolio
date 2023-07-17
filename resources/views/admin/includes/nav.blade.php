<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- ...Other Navbar content... -->

    <ul class="navbar-nav ml-auto">
        <!-- ...Other Navbar items... -->

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Keshab Pandey</span>
                <img class="img-profile rounded-circle" src="{{asset('back/img/undraw_profile.svg')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('show-details')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <!-- Dropdown - Settings -->
                <a class="dropdown-item dropdown-toggle" href="#" role="button" id="settingsDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <div class="dropdown-menu" aria-labelledby="settingsDropdown">
                    <a class="dropdown-item" href="{{ route('change-password') }}">Change Password</a>
                    <a class="dropdown-item" href="{{ route('details') }}">Change Details</a>

                </div>
                <!-- End Dropdown - Settings -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-link">Logout</button>
                    </form>
                </a>
            </div>
        </li>
    </ul>
</nav>
