
@extends('Layout.admin')

@section('title')

<title>trang chủ </title>
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partals.content_header',['name'=>'product_types', 'key'=>'edit'])
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-6">
  <form action="{{route('product_types.update',['id'=>$product_type->id])}} " method="POST">
        <div class="form-group">
          <label >Tên doanh muc </label>
          <input type="text" class="form-control" 
           name ='name'
           value='{{$product_type->name}}
           'placeholder="  nhập  tên danh mục  ">
        </div>
        
        <label for="sel1"> chọn danh mục cha :</label>
        <select class="form-control m-2" name='parent_id'>
          <option value="0" > danh mục chính</option>
          {!! $htmlOption !!}
        </select>
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
