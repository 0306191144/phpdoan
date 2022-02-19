
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
          <form action="{{route('users.update',['id'=>$user->id])}} " method="POST" enctype="multipart/form-data">
           <div class="form-group">
          <label >Name user</label>
          <input type="text" class="form-control" 
           name ='name'
           value='{{$user->name}}
           'placeholder="  Enter name user  ">
            </div>
        <div class="form-group">
          <label >Email </label>
          <input type="text" class="form-control" 
           name ='email'
           value='{{$user->email}}
           'placeholder=" Enter email ">
        </div>
        
        <div class="form-group">
          <label >Password </label>
          <input type="text" class="form-control" 
           name ='password'
           value='{{$user->password}}
           'placeholder="  nhập  tên danh mục  ">
        </div>

        <div class="form-group">
          <label >phone </label>
          <input type="text" class="form-control" 
           name ='phone'
           value='{{$user->phone}}
           'placeholder="  Enter phone  ">
        </div>

        <div class="form-group">
          <label >gender</label>
          <input type="text" class="form-control" 
           name ='gender'
           value='{{$user->gender}}
           'placeholder="  ENTER SCEEN  ">
        </div>

        <div class="form-group">
          <label >address </label>
          <textarea type="text" class="form-control" 
           name ='adress'
           value='{{$user->adress}}
           'placeholder="  nhập  tên danh mục  ">
           {{$user->adress}}
          </textarea>
        </div>


        <div class="form-group">
          <label >Avatar </label>
          <input type="file" class="form-control-file" name='avatar'
          placeholder="  Enter user price ">
          <div class="col-3">
            <div class="row">
             <img width="150" height="100" src=" {{$user->avatar_path}}" alt="">
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="row">
           <img width="100" height="150" src=" {{$user->avatar_path}}" alt="">
           <div id="preview-avatar"></div>
          </div>
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
  <script src="{{ asset('/assets/dist/js/previewImage.js')}}"></script>

  <script>
    previewImage("avatar","preview-avatar");
    previewImage("images","preview-images");
      </script>

@endsection
