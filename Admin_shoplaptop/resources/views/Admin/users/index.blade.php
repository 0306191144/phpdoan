@extends('Layout.admin')

@section('title')

<title>trang chủ </title>
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->   
    @include('partals.content_header',['name'=>'User', 'key'=>'List'])

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-md-12">
            <a href="{{route('users.create')}}" class="btn btn-success float-right m-2"> Add</a>
          </div>
      <div class="col-md-12">
            <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">email</th>
              
              <th scope="col">Image</th>
              <th scope="col">gender</th>
              <th scope="col">phone</th>
              <th scope="col">address</th>
              <th scope="col">Action</th>
              <th scope="col">password</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usersv as $user)
            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>  {{$user->name}} </td>
              <td>  {{$user->email}} </td>
              
              <td><img height="100px" width="150px" src="{{asset($user->avatar_path)}}" alt=""></td>
              <td>  {{$user->gender}} </td>
              <td>  {{$user->phone}}  </td>
              <td>  {{$user->adress}}   </td>
              <td>
              <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-default">edit</a>
              <a href="{{route('users.delete',['id'=>$user->id])}}"class="btn btn-danger">delete</a>
            </td>
              <td>  {{$user->password}} </td>
            </tr>

            <tr>



            </tr>

           @endforeach
           
                   </tbody>
        </table>
      </div>
 
        
      {{$usersv ->links('pagination::bootstrap-4') }}
     
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection