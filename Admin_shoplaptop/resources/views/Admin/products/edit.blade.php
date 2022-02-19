
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
          <input type="file" id="avatar" class="form-control-file" name='image'
          placeholder="  Enter product price ">
          <div class="col-3">
            <div class="row">
             <img width="100" height="150" src=" {{$product->img_path}}" alt="">
             <div id="preview-avatar"></div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label >photo </label>
          <input type="file" id="images" class="form-control-file" name='img_path[]' multiple 
          placeholder="  Enter product img">
          <div class=" row">
            @foreach ($product->productImg as $item)
       <img style="margin-right: 0.5rem" width="100" height="150" src="{{$user->avatar_path}}" alt="">
              @endforeach

              
        </div>
        <div class="row">
          <div id="preview-images"></div>
        </div>

   >

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

  <script src="{{ asset('/assets/dist/js/previewImage.js')}}"></script>

  <script>

    previewImage("avatar","preview-avatar");
    previewImage("images","preview-images");
    
    
    
      </script>

@endsection
