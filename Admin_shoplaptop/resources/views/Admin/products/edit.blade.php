
@extends('Layout.admin')

@section('title')

<title>trang chủ </title>
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partals.content_header',['name'=>'product', 'key'=>'edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-6">
          <form action="{{route('products.update',['id'=>$product->id])}} " method="POST" enctype="multipart/form-data">
       
       
            <div class="form-group">
          <label >Name Product</label>
          <input type="text" class="form-control" 
           name ='name'
           value='{{$product->name}}
           'placeholder="  Enter name product  ">
        </div>

        

        <div class="form-group">
          <label >Price </label>
          <input type="text" class="form-control" 
           name ='price'
           value='{{$product->price}}
           'placeholder=" Enter price  ">
        </div>



        <div class="form-group">
          <label >Ram </label>
          <input type="text" class="form-control" 
           name ='ram'
           value='{{$product->ram}}
           'placeholder="  nhập  tên danh mục  ">
        </div>

        <div class="form-group">
          <label >Cpu </label>
          <input type="text" class="form-control" 
           name ='cpu'
           value='{{$product->cpu}}
           'placeholder="  Enter cpu  ">
        </div>

        <div class="form-group">
          <label >Screen </label>
          <input type="text" class="form-control" 
           name ='screen'
           value='{{$product->screen}}
           'placeholder="  ENTER SCEEN  ">
        </div>

        <div class="form-group">
          <label >Discription </label>
          <textarea type="text" class="form-control" 
           name ='discription'
           value='{{$product->discription}}
           'placeholder="  nhập  tên danh mục  ">
           {{$product->discription}}
          </textarea>
        </div>

        <div class="form-group">
          <label >Avatar </label>
          <input type="file" class="form-control-file" name='image'
          placeholder="  Enter product price ">
          <div class="col-3">
            <div class="row">
             <img width="150" height="100" src=" {{$product->img_path}}" alt="">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label >photo </label>
          <input type="file" class="form-control-file" name='img_path[]' multiple 
          placeholder="  Enter product img">
          <div class=" row">
            @foreach ($product->productImg as $item)
       <img width="150" height="100" src="{{$item->img_path}}" alt="">
              @endforeach
        </div>

        <div class="form-group">
          <label >Enter Taps </label>
          <select class="form-control tags_select_choose" name ='tag[]' multiple="multiple">
         
           @foreach ($product->producttag as $item)
           <option selected value="{{$item->id}}">  {{$item->name}}</option>
           @endforeach
        
          </select>
        </div>

        <label for="sel1"> chọn danh mục cha :</label>
        <select class="form-control m-2" name='product_type_id'>
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
