<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!--Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
            </div>
        </div>
        <!--<img style="padding-left:5px; padding-right:5px; -webkit-transform: scale(1.8);" 
id="empresa-logo" src="/img/logo.png" class="img-circle" width="50" height="50"> 

        @endif

        <!--  search form (Optional) 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..." />
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
         /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            <!--<li class="header">{{ trans('adminlte_lang::message.header') }}</li>-->
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview"><a href="{{ url('home') }}"><i class='glyphicon glyphicon-home'></i> <span>{{
                        trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="treeview">
                <a href=""><i class='fas fa-user-alt '></i> <span>{{ trans('adminlte_lang::message.client') }}</span></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('clientes') }}">{{ trans('adminlte_lang::message.list-client') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ url('home') }}"><i class='fa fa-car'></i> <span>{{
                        trans('adminlte_lang::message.car') }}</span>  <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li><a href="{{url('listaprecios')}}">Listas de Precios</a></li>
                    <li><a href="{{url('autos/usados')}}">{{ trans('adminlte_lang::message.list-used') }}</a></li>
                   <li><a href="{{url('autos/createusados')}}">{{ trans('adminlte_lang::message.agregate used') }}</a></li>
                      <li><a href="{{url('cero/create')}}">{{ trans('adminlte_lang::message.new-car') }}</a></li>   
                       <li><a href="{{url('cero')}}">{{ trans('adminlte_lang::message.list-0km') }}</a></li>
                   <!-- <li><a href="{{url('autos/create')}}">{{ trans('adminlte_lang::message.new-car') }}</a></li> !-->
                   
                   
                </ul>
            </li>
            <!--<li class="treeview"><a href="{{ url('pre-venta') }}"><i class='fa fa-bars'></i> <span>{{
                        trans('adminlte_lang::message.presales') }}</span></a></li>
            -->
            
            <li><a href="{{ url('venta') }}"><i class='fa fa-handshake-o'></i> <span>{{ trans('adminlte_lang::message.sales') }}</span></a></li>
            
            <!--<li><a href="{{ url('financiera') }}"><i class='fa fa-university'></i> <span>Financieras</span></a></li>
            -->
                 
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>USUARIOS</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('listado_usuarios') }}">Listado Usuarios</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>
           
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>