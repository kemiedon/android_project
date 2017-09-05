<!DOCTYPE html>
<html lang="en">

<head>
    @include ('backend/_layouts/parts/head')
    <style>
        #login_bg {
            position: fixed;
            top: 0px;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('images/login_bg.jpg') }}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            opacity: 0.8;
            filter:alpha(opacity=80);
            z-index: -9999;
        }
    </style>
    <script>

        $(function(){

            function set_margin_top () { $('.panel').css('margin-top', ($(window).height() - $('.panel').height()) / 2); }
            set_margin_top (); $(window).resize(function(){ set_margin_top (); });
        });

    </script>
</head>



<body>
<div id="login_bg"></div>


    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{ Lang::get('app.name') }} {{ Lang::get('app.cms') }}</h2>
                    </div>

                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label">{{ Lang::get('auth.label.email') }}</label>

                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-3 control-label">{{ Lang::get('auth.label.password') }}</label>

                                <div class="col-md-9">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> {{ Lang::get('auth.label.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> {{ Lang::get('auth.button.login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">{{ Lang::get('auth.forget_password') }}?</a>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>



            </div>
        </div>
    </div>
    @include ('backend/_layouts/parts/footer')

</body>

</html>