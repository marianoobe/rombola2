<!-- Main Header -->
{!! Html::script('js/home.js') !!}

<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>AG</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>RAGroup</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
            @can('admin')
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AREA ADMINISTRATIVA</span>
            @endcan
            @can('vendedor')
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AREA VENTAS</span>
            @endcan
            @can('credito')
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AREA CREDITOSs</span>
            @endcan
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown notifications-menu">
                    <a id="campana" onclick="offbell()" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="label label-danger">2</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tienes 2 Notificaciones</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Comunicarse con Cliente
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Comunicarse con Cliente
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>


                <!-- Messages: style can be found in dropdown.less-->

                @if (Auth::guest())
                <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else


                <!-- User Account Menu -->
                <li class="dropdown user user-menu" id="user_menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ Gravatar::get($user->email) }}" class="user-image" alt="User Image" />
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>


                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">

                            <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ trans('adminlte_lang::message.login') }} Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">

                            <div class="col-xs-4 text-center">
                                <a href="#">{{ trans('adminlte_lang::message.sales') }}</a>
                            </div>

                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/settings') }}" class="btn btn-default btn-flat">{{
                                    trans('adminlte_lang::message.profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" id="logout" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ trans('adminlte_lang::message.signout') }}
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="submit" value="logout" style="display: none;">
                                </form>

                            </div>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>