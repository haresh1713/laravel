@include('header')
@include('user-headers')
<div class="login-box-body col-sm-6" style="margin: 50px 0 0 32%;">

    @if(Session::get('name'))
  <p  style="float: right;margin: -29px 0px 9px 0;"> Welcome {{Session::get('name')  }}</p>
@endif

 @if(isset($Adminrole) && $Adminrole == '0')
    <a href="{{url('add')}}" style="float: right;margin: -68px 0px 9px 0;"><button class="btn-success">Add user</button></a>
 @endif

<table class="table table-bordered">
        <thead>
            @if(Session::get('error_msg'))
            <tr>
                <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{Session::get('error_msg')}}
            </div>
            </tr>
            @elseif(Session::get('success_msg'))
            <tr>
                <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{Session::get('success_msg')}}
            </div>
            </tr>
            @endif
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            @if(isset($Adminrole) && $Adminrole == '0')
            <th>Action</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @if(count($users) > 0 )
            @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>@if($user->status == 1) {{ 'Active' }} @else {{ 'Inactive' }} @endif</td>
            @if(isset($Adminrole) && $Adminrole == '0')
            <td>
               <a href="{{'edit'}}/{{$user->id}}"> <button class="btn-success">Edit</button></a>
               <a href="{{'delete'}}/{{$user->id}}">  <button class="btn-danger delete">Delete</button></a>
               @if($user->status == 1)
                    <a href="{{'StatusUpdate'}}/{{$user->id}}/0">  <button class="btn-danger">UnAprroved</button></a>
               @else
                    <a href="{{'StatusUpdate'}}/{{$user->id}}/1"> <button class="btn-success">Aprrove</button></a>
               @endif
            </td>
            @endif
        </tr>
        @endforeach
            @else
            <tr><td colspan="4" align="center">No user found!</td></tr>
        @endif
        </tbody>
</table>
</div>
</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
<script>
    $(document).on('click', '.delete', function (e) {
        var confirmed = confirm("Are you sure you want to delete this record ?");
        if (!confirmed)
        {
            return false;
        }
 
    });
    </script>
</html>