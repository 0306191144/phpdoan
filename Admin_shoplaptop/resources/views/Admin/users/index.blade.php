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
              <th scope="col">isadmin</th>

              <th scope="col">Action</th>
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
            <td>   {{$user->isadmin}} </td>
              <td>
             
              <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-default">edit</a>
              <button onclick="handleDelete({{$user->id}},'users','delete')" class="btn btn-danger delete-btn">delete</button>
            </td>
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

  <script src="{{ asset('/assets/dist/js/handleDelete.js')}}"></script>

@endsection
