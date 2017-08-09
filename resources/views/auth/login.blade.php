<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title> Log in</title>
        <link href="{{ url('/public/adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="{{ url('/public/adminlte/css/AdminLTE2.css') }}" rel="stylesheet">
        
    </head>
    <body class="bg-black">

    
        <div class="form-box" id="login-box">
            <div class="header">تسجيل الدخول</div>
            <form  role="form" method="POST" action="{{ url('login') }}">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email"  value="{{ old('email') }}"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{ Request::old('password') }}" />
                    </div>          
                    <div class="form-group">
                      <input type="checkbox" name="remember_me"/> تذكرني
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">الدخول</button>


                </div>
             <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>

            <div class="margin text-center">
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
    </div>
        


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="{{ url('public/adminlte/js') }}/bootstrap.min.js"></script>     

    </body>
</html>