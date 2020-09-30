@extends('header')

@section('content')
    @include('user-headers')
    <div class="login-box-body col-sm-4" style="border: 1px solid;margin: 50px 32%;">

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
            <div class="alert alert-danger alert-dismissable col-sm-6">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                {{Session::get('error_msg')}}
            </div>
        @elseif(Session::get('success_msg'))
            <div class="alert alert-success alert-dismissable col-sm-6">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success !</h4>
                {{Session::get('success_msg')}}
            </div>
        @endif

        <h4 class="login-box-msg" style="border: 1px solid;padding: 10px;">Update User</h4>

            <form method="post" action="{{url('update')}}">
                {{csrf_field()}}
                <div class="form-group has-feedback">
                    <input type="hidden" name="id" value="{{$userDetails->id}}">
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$userDetails->name}}">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="Email"  value="{{$userDetails->email}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4" style="margin: 0 0 8px;">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                    </div>
                </div>
            </form>

    </div>
    </div>
    </body>
    </html>
@stop