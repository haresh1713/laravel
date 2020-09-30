@extends('header')
@section('content')

    <div class="login-box-body col-xs-4" style="border: 1px solid;margin: 50px 32%;">
        @if(count($errors) > 0)
            <div id="error" class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                @foreach($errors->all() as $error)
                    <div class="msg">{{$error}}</div>
                @endforeach
            </div>
        @endif

        @if(Session::get('error_msg'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                {{Session::get('error_msg')}}
            </div>
        @elseif(Session::get('success_msg'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success !</h4>
                {{Session::get('success_msg')}}
            </div>
        @endif

        <h4 class="login-box-msg" style="border: 1px solid;padding: 10px;">Sign in</h4>
        <form method="post" action="{{url('login')}}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>

        <a href="{{url('register')}}" style="float: right;">Click here to register</a>
    </div>
    </div>
    </body>
    </html>
@stop