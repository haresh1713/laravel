@extends('header')

@section('content')

    <div class="login-box-body col-sm-4" style="border: 1px solid;margin: 50px 32%;">
        @if(count($errors) > 0)
            <div id="error" class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @foreach($errors->all() as $error)
                    <div class="msg">{{$error}}</div>
                @endforeach
            </div>
        @endif



        @if(Session::get('error_msg'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{Session::get('error_msg')}}
            </div>
        @elseif(Session::get('success_msg'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{Session::get('success_msg')}}
            </div>
        @endif



        <h4 class="login-box-msg" style="border: 1px solid;padding: 10px;">Sign up</h4>

        <form method="post" action="{{url('register')}}">
            {{csrf_field()}}
        <div class="form-group has-feedback">
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email"  value="{{old('email')}}">
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="cnfirm_password" class="form-control" placeholder="Confirm Password">
            </div>
        </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
            </div>
        </form>
        <a href="{{url('login')}}"  style="float: right;">Click here to login</a>

    </div>
    </div>
    </body>
    </html>
@stop