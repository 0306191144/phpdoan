@extends('Layout.admin')

@section('title')

<title>trang chủ </title>
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->   
    @include('partals.content_header',['name'=>'Invoice', 'key'=>'List'])

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-md-12">
            <a href="#" class="btn btn-success float-right m-2"> Add</a>
          </div>
      <div class="col-md-12">
            <table class="table">
          <thead>
            <tr>
              <th scope="col">InvoiceId</th>
              <th scope="col">UserId</th>
              <th scope="col">Name user</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($invoices as $invoice)
            <tr>
              <th scope="row"> {{ $invoice->id}}</th>
              <td>
                {{ $invoice->useriv->id}}
              </td>
              <td>
                {{ $invoice->useriv->name}}
              </td>
              <td>
                <select  class="form-control m-2 btn btn-success"  name='status'>
                  <option value="0" >ativiti</option>
                  <option value="1" >ativiti</option>
                  <option value="2" >ativiti</option>
                  <option value="3" ></option>
                </select>
                {{ $invoice->status}}
              </td>
              <td>
                <a href="{{route('invoices.detail',['id'=>$invoice->id])}}" class="btn btn-success">See</a>
                <a href="#" class="btn btn-default">edit</a>
                <a href="#"class="btn btn-danger">delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $invoices->links('pagination::bootstrap-4') }}
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection