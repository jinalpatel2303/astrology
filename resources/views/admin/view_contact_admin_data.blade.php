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
               <a href=""><span>Inquiry Detail</span></a>
            </li>
         </ul>
      </div>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Inquiry  detail</h4>
         
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

            	@foreach($contact_admin_data as $ab)
                        
                        <tr class="w-100">
                          <th>Name</th>
                          <th class="text">{{$ab->name}}</th>
                        </tr>

                        <tr class="w-100">
                          <th>Email</th>
                          <th class="text">{{$ab->email}}</th>
                        </tr>

                        <tr class="w-100">
                          <th>Phone_no</th>
                          <th class="text">{{$ab->phone_no}}</th>
                        </tr>

                        <tr class="w-100">
                          <th>Subject</th>
                          <th class="text">{{$ab->subject}}</th>
                        </tr>

                        <tr class="w-100">
                       	   <th>Message</th>
                           <th class="text">{{$ab->message}}</th>
                        </tr>

                        <tr class="w-100">
                           <th>Date</th>
                           <th class="text">{{$ab->date}}</th>
                        </tr>


                 @endforeach
               </tbody>
              
            </table>
            
         </div>
      </div>

      <div class="d-flex mx-auto">
         <button class="clo btn0 button-new"><a href="{{url('/admin/contact_admin_data')}}">Back to Details</a></button>
      </div>



   
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">


        $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });


      </script> 


@endsection