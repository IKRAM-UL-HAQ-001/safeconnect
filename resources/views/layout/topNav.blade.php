<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    {{-- 
    <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="not have"> --}}
</a>
    </a>
    <div class="nav-control">
        <div class="hamburger" >
            <span class="line" style="background:white"></span>
            <span class="line" style="background:white"></span>
            <span class="line" style="background:white"></span>
        </div>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->
<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content" style="background-color: #343957">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                </div>
                <ul class="navbar-nav header-right" >
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account" style="color:white"></i>
                            <span class="ml-2" style="color:white">{{Auth::user()->user_name}} </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if(Auth::user()->role === "admin")
                                <a href="{{route('auth.forget')}}" class="dropdown-item">
                                    <i class="icon-edit fa-1x"></i>
                                    <span class="ml-2" style="font-size:20px">Update Password</span>
                                </a>
                            @endif
                            <a href="{{route('auth.logout')}}" class="dropdown-item">
                                <i class="icon-logout fa-1x"></i>
                                <span class="ml-2" style="font-size:20px">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->