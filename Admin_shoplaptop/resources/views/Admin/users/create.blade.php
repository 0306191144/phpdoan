
@extends('Layout.admin')

@section('title')

<title>trang chủ </title>
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partals.content_header',['name'=>'User', 'key'=>'edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-6">
   <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
          <div class="form-group">
          <label >Name user</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}"
           name ='name'
           placeholder="  Enter name user  ">
            </div>
         @error('name')
            <div class=" alert alert-danger">{{$message}}</div>
        @enderror

        <div class="form-group">
          <label >Email </label>
          <input type="text" class="form-control" 
           name ='email'
           placeholder=" Enter email ">
        </div>
        @error('email')
        <div class=" alert alert-danger">{{$message}}</div>
         @enderror

        <div class="form-group">
          <label >Password </label>
          <input type="text" class="form-control" 
           name ='password'
           placeholder="  Enter password ">
        </div>
        @error('password')
        <div class=" alert alert-danger">{{$message}}</div>
         @enderror

         <div class="form-group">
          <label >Password confirmation</label>
          <input type="text" class="form-control" 
           name ='password_confirmation'
           placeholder="  enter password confirmation  ">
        </div>
        @error('password_confirmation')
        <div class=" alert alert-danger">{{$message}}</div>
         @enderror

        <div class="form-group">
          <label >phone </label>
          <input type="text" class="form-control" 
           name ='phone'
           placeholder="  Enter phone  ">
        </div>
        @error('phone')
        <div class=" alert alert-danger">{{$message}}</div>
         @enderror

        <div class="form-group">
          <label >gender</label>
          <input type="text" class="form-control" 
           name ='gender'
           placeholder=" enter gender">
        </div>
        @error('phone')
        <div class=" alert alert-danger">{{$message}}</div>
         @enderror

        <div class="form-group">
          <label >address </label>
          <textarea type="text" class="form-control" 
           name ='adress'
           placeholder=" dia chi  ">
          </textarea>
        </div>
        @error('adress')
        <div class=" alert alert-danger">{{$message}}</div>
         @enderror

        <div class="form-group">
          <label >Avatar </label>
          <input type="file" class="form-control-file" name='avatar'
          placeholder="  Enter user price ">
          @error('avatar')
          <div class=" alert alert-danger">{{$message}}</div>
           @enderror
        
        </div>
       <button type="submit" class="btn btn-primary">Submit</button>
        @csrf
    </form>
</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
