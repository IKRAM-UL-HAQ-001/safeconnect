
<!--**********************************
    Sidebar start
***********************************-->
<style>
    .quixnav, .nav-label{
        font-size :18px;
    }
</style>
<div class="quixnav" >
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            @if(Auth::check())
                @if(Auth::user()->role === "shop")
                    <li class="nav-label first">Main Menu</li>
                @elseif(Auth::user()->role === "admin")
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-app-store"></i>
                            <span class="nav-text">User</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('admin.user.list')}}">User List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-app-store"></i>
                            <span class="nav-text">Ride</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('admin.ride_activity.list')}}">Ride List</a></li>
                        </ul>
                    </li>
                @elseif(Auth::user()->role === "pasanger")
                    <li class="nav-label first">Main Menu</li>
                @endif
            @endif
            <!-- admin sidenavbar end -->
        </ul>
    </div>
</div>

<!--**********************************
            Sidebar end
***********************************-->
