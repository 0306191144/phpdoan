@extends('Layout.admin')

@section('title')

<title>trang chủ </title>
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->   
    @include('partals.content_header',['name'=>'Invoice', 'key'=>'Detail'])

    <!-- /.content-header -->

    <!-- Main content -->
  <hr>
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-blue">TrminhShop</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-blue">assdad asd  asda asdad a sd</p>
                        <p class="text-blue">assdad asd asd</p>
                        <p class="text-blue">+91 888555XXXX</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: {{$invoice->id}}</h2>
                    <p class="sub-heading">Tracking No. fabcart2025 </p>
                    <p class="sub-heading">Order Date: 20-20-2021 </p>
                    <p class="sub-heading">Email Address: 0306191144@caothang.edu.vn.com </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Full Name:{{$invoice->nameship}} </p>
                    <p class="sub-heading">Address:{{$invoice->nameship}}  </p>
                    <p class="sub-heading">Phone Number:  {{$invoice->phoneship}} </p>
                </div>
            </div>
        </div>
<hr>
    <div class="container-fluid ">
     <div class="col-md-12">
        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($invoice->invoice_detail as $Item)
                    <tr>
                      @php $totail= '0' @endphp
                        <td>{{$Item->product_ivd->id}}</td>
                        <td>{{$Item->price}}</td>
                        <td>{{$Item->quantity}}</td>
                        <td>{{$Item->price*$Item->quantity }}</td>
                    </tr>
                  
                    @endforeach
                    <tr>
                      <td colspan="3" class="text-right">Money Ship</td>
                      <td> {{ $invoice->moneyship}}</td>
                  </tr>
             
                    <tr>
                        <td colspan="3" class="text-right">Sub Total</td>
                        <td> {{number_format($totail)}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3>
        </div>
    </div>      
    </div>
</div>

      
     
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection