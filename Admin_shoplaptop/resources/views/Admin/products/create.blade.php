
@extends('Layout.admin')

@section('title')

<title>trang chủ </title>
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partals.content_header',['name'=>'product', 'key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-6">
      <form action="{{route('products.store')}} " method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label >Product Name</label>
          <input type="text" class="form-control" name='name'  placeholder="  Enter product name ">
        </div>
        <div class="form-group">
          <label >Avatar </label>
          <input type="file" class="form-control-file" name='image' 
          placeholder="  Enter product price ">
        </div>
        <div class="form-group">
          <label >photo </label>
          <input type="file" class="form-control-file" name='img_path[]' multiple 
          placeholder="  Enter product price ">
        </div>
        <div class="form-group">
          <label >Price Product </label>
          <input type="text" class="form-control" name='price' 
          placeholder=" Enter product price ">
        </div>

        <div class="form-group">
          <label >Ram</label>
          <input type="text" class="form-control" name='ram' 
          placeholder="  Enter product price ">
        </div>


        <div class="form-group">
          <label >Screen </label>
          <input type="text" class="form-control" name='screen' 
          placeholder="  Enter product Screen  ">
        </div>

        <div class="form-group">
          <label >Enter Taps </label>
          <select class="form-control tags_select_choose" name ='tag[]' multiple="multiple">

          </select>
        </div>

        <div class="form-group">
          <label >Cpu </label>
          <input type="text" class="form-control" name='cpu' 
          placeholder="  Enter product Cpu ">
        </div>

        <label for="sel1"> chọn danh mục :</label>
        <select class="form-control m-2  menu_choose" name='product_type_id'>
          {!! $htmlOption !!}
        </select>

        <div class="form-group">
          <label >Discription</label>
          <textarea type="text" class="form-control" name='discription' 
          placeholder="  Enter Discription ">

          </textarea>
        </div>

        
        <button type="submit" class="btn btn-primary m-2">Submit</button>
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
