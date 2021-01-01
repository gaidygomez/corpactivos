<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href=" {{ route('admin.dashboard') }} "><img src=" {{ asset('img/logo.jpg') }} " alt="CorpActivos Logo" class="img-fluid" width="75" height="75"><span>CorpActivos</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{ asset('img/default.jpg') }}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Bienvenido,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong> {{ Auth::user()->fname.' '.Auth::user()->lname }} </strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{ route('profile') }}"><i class="icon-user"></i>Perfil</a></li>
                    <li class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('logout-form-side').submit();">
                            <i class="icon-power"></i>
                                {{ __('Logout') }}
                        </a>
                    
                        <form id="logout-form-side" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>                
        </div>  
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <li class="header">Acciones</li>
                <li class="active open">
                    <a href="#myPage" class="has-arrow"><i class="icon-home"></i><span>Mis Acciones</span></a>
                    <ul>
                        <li class="active"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                        <li><a href=" {{ route('admin.rates') }} ">Tasas de Cambios</a></li>
                        <li><a href="{{ route('admin.confirmation') }}">Transacciones por Confirmar</a></li>
                        <li><a href="{{ route('balance.admin') }}">Balance Bancos de Venezuela</a></li>
                        <li><a href="{{ route('banks.vzla') }}">Bancos de Venezuela</a></li>
                        <li><a href="{{ route('banks.admin') }}">Bancos de Colombia</a></li>
                        <li><a href="{{ route('balance.colombia') }}">Balance Bancos de Colombia</a></li>
                    </ul>
                </li>
            </ul>
        </nav>     
    </div>
</div>