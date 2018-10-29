@extends('adminlte::layouts.auth')


@section('content')

 <body>      
    <div class="mytop-content" >
        <div class="container" > 
                 <div class="col-sm-12 " style="background-color:rgba(0, 0, 0, 0.35); height: 60px; " >
                   <a class="mybtn-social pull-right" href="{{url('/register')}}">
                       Register
                  </a>

                  <a class="mybtn-social pull-right"href="{{url('/login')}}">
                       Login
                  </a>
               
                </div>
            <div class="row">

     
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    <div class="myform-top">
                        <div class="myform-top-left">
                          <img  src="{{url('img/logo.png')}}" class="img-responsive logo" />
                          <h3>Regístrate en el sistema.</h3>
                            <p>Por favor ingresa tus datos:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-user"></i>
                        </div>
                    </div>
            
          <div class="col-sm-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
           </div>

                    <div class="myform-bottom">
                      
                      <form role="form" action="" method="post" class="">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                            <input type="text" name="name" value="{{old ('name')}}" placeholder="Nombres..." class="form-control" id="form-firtsname">
                        </div>
                     <div class="form-group">
                            <input type="text" name="username" value="{{old ('username')}}" placeholder="Username..." class="form-control" id="form-username">
                        </div>
                        <div class="form-group">
                        <input type="text" name="email" value="{{old ('email')}}" placeholder="Email..." class="form-control" id="form-email">
                            
                        </div>



                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password..." class="form-control" id="form-password">
                        </div>


                         <div class="form-group">
                            <input type="password" name="password_confirmation" placeholder="Password..." class="form-control" id="form-password">
                        </div>
                            <div class="row">
                

                        <button type="submit" class="mybtn">Registrarme</button>
                      </form>
                      <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>
                    </div>
              </div>
            </div>
            <div class="row">
             <div class="col-sm-12 mysocial-login">
                    
                    
                </div>
            </div>
        </div>
      </div>

    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>

   
  </body>

@endsection



