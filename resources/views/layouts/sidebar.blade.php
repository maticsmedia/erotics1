<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>

                {{-- dashboard --}}
                    <li>
                        <a href="{{route('dashboard')}}">
                            <i class="bx bxs-dashboard"></i>
                            <span key="t-mwanzo">@lang('translation.mwanzo')</span>
                        </a>
                    </li>

                    {{-- Employee --}}
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-user-pin"></i>
                            <span>Manage Users</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('all.users') }}">User List</a></li>
                            <li><a href="{{ route('add.user') }}"> Add User</a></li>
                        </ul>
                    </li>




                {{-- Logout --}}
                    <li>
                        <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}" ><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i><span>Logout</span></a>
                    </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
