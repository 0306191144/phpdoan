@extends('Layout.admin')

@section('title')

<title>trang chủ </title>
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->   
    @include('partals.content_header',['name'=>'product', 'key'=>'List'])

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-md-12">
            <a href="{{route('products.create' )}}" class="btn btn-success float-right m-2"> Add</a>
          </div>
      <div class="col-md-12">
            <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">nameproduct</th>
              <th scope="col">Image</th>
              <th scope="col">Ram</th>
              <th scope="col">cpu</th>
              <th scope="col">Screen</th>
              <th scope="col">productype</th>
              <th scope="col">price</th>
              <th scope="col">discription</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productnew as $product)
            <tr>
              <th scope="row">{{$product->id}}</th>
              <td>  {{$product->name}} </td>
              <td><img style="object-fit:cover; height:150px; width:100px;"  src="{{asset($product->img_path)}}" alt=""></td>

              <td>  {{$product->ram}} </td>

              <td>    {{$product->cpu}}  </td>

              <td>     {{$product->screen}}   </td>

              <td> {{ optional( $product->producttype)->name}}</td>

              <td>  {{$product->price}}     </td>

              <td> {{$product->discription}}    </td>
        
              <td>
              <a href="{{route('products.edit',['id'=>$product->id])}}" class="btn btn-default">edit</a>
              <a href="{{route('products.delete',['id'=>$product->id])}}"class="btn btn-danger">delete</a>
              </td>
            </tr>

           @endforeach
           
                   </tbody>
        </table>
      </div>
      {{ $productnew->links('pagination::bootstrap-4') }}
     
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection