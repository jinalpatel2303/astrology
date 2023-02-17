@extends('admin.layout.header')

@section('content')

<style type="text/css">
   .arr_d{
      display: flex;
      flex-wrap: wrap;
   }
   .arr_d1{
      width: 50%;
   }
   .arr_d tr th{
      display: block;
   }
   .table-title{
      font-size: 20px;
      color: #6b6b7a;
   }
   button.clo.btn0 {
       display: block;
       margin-left: auto;
       margin-top: 2%;
       margin-bottom: 2%;
   }
   .btn0 a{
      padding: 10px 12px!important;
   }
   .button-new{
      margin-right: auto;
      margin-left: 5px!important;
   }
</style>

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Product Detail</span></a>
            </li>
         </ul>
      </div>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Product Detail</h4>
         
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                
               </div>
            </div>
         </div>
         <div class="pro-table">
            <table class="table table-bordered table-striped text">
               <tbody class="arr_d">

            	@foreach($product as $ab)
                        <tr class="w-100">
                          <th>Image</th>
                          <th>
                           @foreach($product_image as $pi)
                           @if($ab->id == $pi->product_id)
                              <img src="/uploads/{{$pi->image}}" height="150" width="200">
                           @endif
                           @endforeach
                           </th>
                        </tr>

                        <tr class="w-100">
                          <th>Product Name</th>
                          <th class="text">{{$ab->product_name}}</th>
                        </tr>

                        <tr class="w-100">
                          <th>Price</th>
                          <th class="text">{{$ab->price}}</th>
                        </tr>

                        <tr class="w-100">
                          <th>Quantity</th>
                          <th class="text">{{$ab->quantity}}</th>
                        </tr>

                        <tr class="w-100">
                          <th>Category</th>
                          <th class="text">
                           @foreach($product_category as $pc)
                           @if($pc->id == $ab->category_id)
                              {{$pc->category}}
                           @endif
                           @endforeach
                           </th>
                        </tr>

                        <tr class="w-100">
                          <th>Sub Category</th>
                          <th class="text">
                           @foreach($product_sub_category as $psc)
                           @if($psc->id == $ab->sub_category_id)
                              {{$psc->sub_category}}
                           @endif
                           @endforeach
                           </th>
                        </tr>

                        <tr class="w-100">
                       	   <th>Description</th>
                           <th class="text">{{$ab->description}}</th>
                        </tr>

                 @endforeach
               </tbody>
              
            </table>
            
         </div>
      </div>

      <div class="d-flex mx-auto">
      @foreach($product as $cs)
         <button class="clo btn0"><a href="{{url('/admin/add_product_data')}}/{{$cs->id}}">Update Details</a></button>
      @endforeach

      <button class="clo btn0 button-new"><a href="{{url('/admin/product')}}">Back to Details</a></button>
      </div>



   
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">


        $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });


      </script> 


@endsection