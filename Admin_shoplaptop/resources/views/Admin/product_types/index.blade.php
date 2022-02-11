@extends('Layout.admin')

@section('title')

<title>trang chủ </title>
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->   
    @include('partals.content_header',['name'=>'product_types', 'key'=>'add'])

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-md-12">
            <a href="{{route('product_types.create' )}}" class="btn btn-success float-right m-2"> Add</a>
          </div>
      <div class="col-md-12">
            <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product_types as $product_type)
            <tr>
              <th scope="row"> {{ $product_type->id}}</th>
              <td>
                {{ $product_type ->name}}
              </td>
              <td>
                <a href="{{route('product_types.edit',['id'=>$product_type->id])}}" class="btn btn-default">edit</a>
                <a href="{{route('product_types.delete',['id'=>$product_type->id])}}"class="btn btn-danger">delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
      {{ $product_types->links('pagination::bootstrap-4') }}
        
      
     
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection