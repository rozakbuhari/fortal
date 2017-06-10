<div class="topbar">
    <div class="container">
        <div class="inner">
            <div class="left">
                <ul class="info">
                    <li>
                        <a href="#"><i class="ion-ios-email-outline"></i> editor@fortal.co.id</a></li>
                </ul>
            </div>
            <div class="right">
                <ul class="topbar-nav">
                    @if(!Auth::authenticated())
                        <li><a href="#" data-toggle="modal" data-target="#modalDaftar">Daftar</a></li>
                        <li>
                            <a href="#login-modal" data-toggle="modal" data-target="#login-modal">
                                <i class="ion-ios-help-outline"></i> Login
                            </a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->fullname }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li style="float: none">
                                    <a href="{{ URL. 'dashboard' }}" style="margin-left: 0; padding: 10px;">Dashboard</a></li>
                                <li style="float: none">
                                    <a href="{{ URL. 'auth/profile' }}" style="margin-left: 0; padding: 10px;">Profil</a></li>
                                <li style="float: none">
                                    <a href="{{ URL. 'auth/logout' }}" style="margin-left: 0; padding: 10px;">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>