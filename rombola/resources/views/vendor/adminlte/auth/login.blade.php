@extends('adminlte::layouts.auth')

@section('content')
<body>      
    <!--<div class="mytop-content" >
        
        <div class="container" > 
          
                <div class="col-sm-12 " style="background-color:rgba(0, 0, 0, 0.35); height: 60px; " >
                   <a class="mybtn-social pull-right" href="{{url('/register')}}">
                       Register
                  </a>

                  <a class="mybtn-social pull-right" href="{{url('/login')}}">
                       Login
                  </a>
               
                </div>-->

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
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                    <div class="myform-top">
                        <div align="center" class="myform-top-top">
                         <img src="{{url('img/logogrande.png')}}" width="280" height="160" />
                        </div>
                                                
                    </div>
                    <div class="myform-bottom">
                    <form role="form" action="{{url('/login')}}" method="post" class="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="text"  name="{{ config('auth.providers.users.field','email') }}"
                        value="{{old('')}}" placeholder="Correo Electrónico" class="form-control" id="form-username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Contraseña" class="form-control" id="form-password">
                        </div>
                        <button type="submit" class="mybtn">Entrar</button>
                      </form>
                       <!--<a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>   -->                    
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






      
