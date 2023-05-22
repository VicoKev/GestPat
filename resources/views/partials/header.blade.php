<header id="page-topbar">
    <div class="navbar-header">

        <div class="d-flex align-items-left">
            <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>
        
        <div class="dropdown d-inline-block ml-2">
            <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="profile-image" @style("border-radius: 50%; background-color: #ccc; color: #fff; font-size: 24px; text-align: center; width: 40px; height: 40px; line-height: 38px;")>{{ substr(Auth::user()->name, 0, 1) }}</div>
                    <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </div>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span>{{ __('Se déconnecter') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        
    </div>
</header>
