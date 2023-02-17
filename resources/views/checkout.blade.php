@extends('layout.header_footer')

@section('content')

<style type="text/css">
	select#c_state {
	    width: 100%;
	    height: 50px;
	    border-radius: 6px;
	    border: none;
	    border: 1px solid #0000003d;
	    font-size: 17px;
	    font-weight: 600;
	    text-transform: capitalize;
	    padding: 0px 12px;
	    margin: 20px 0px;
	}
	div#message11 b{
    	background-color: #ffba33;
    	padding: 10px;
    	margin-bottom: 10px;
    	font-size: 20px;
    	width: 50%;
    	display: inline-block;
	}

	  #myModal{

          top: 0px;
          text-align: center;
        }

   .login-inner{
        position: relative;
      }

   .login-inner:after{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
        width: 100%;
        height: 100%;
        background: rgb(0 0 0 / 40%);
        display: none;

      }

      div#message {
          margin-left: 16px;
          font-weight: 600;
          font-size: 17px;
      }

      div#loaderIcon {
   
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 3;
    color: black!important;
}
            
      
        #loading-bar-spinner.spinner {
         left: 50%;
         margin-left: -20px;
         top: 44%;
         margin-top: -20px;
         position: absolute;
         z-index: 19 !important;
         animation: loading-bar-spinner 700ms linear infinite;
         display: none;
      }
       #loading-bar-spinner.spinner .spinner-icon {
         width: 40px;
         height: 40px;
         border: solid 6px transparent;
         border-top-color: black !important;
         border-left-color: black !important;
         border-radius: 50%;
      }
       @keyframes loading-bar-spinner {
         0% {
           transform: rotate(0deg);
           transform: rotate(0deg);
        }
         100% {
          transform: rotate(360deg);
         transform: rotate(360deg);
        }
}


}
</style>
   <div class="in-banner">
        <div class="container">
            <h1>checkout</h1>
            <ul class="breadcrumb1">
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
	<div class="bg-checkout">
		<div class="container">
			<form method="post">
				<div id="message11" class="text-center"></div>
				<div class="checkout-section">
					<div class="row">
						<div class="col-lg-6">

							  <div id="loaderIcon" class="spinner-border text-primary" style="display:none" role="status">
                             <span class="sr-only">Loading...</span>
                        </div>
							
							<div class="biiling-detail">
								
				 				<div class="billing-heading">
		 							<h2>
		 								billing detail
		 							</h2>
		 						</div>
		 						<div class="billing-info">
		 							<div class="row">
		 								<div class="col-lg-12">
		 									<div class="billing-name">
		 										<input type="text" name="c_name" value="{{$name}}" placeholder="name" id="c_name">
		 										<p class="text-danger error-text c_name_err"></p>
		 									</div>	
		 								</div>
		 								
		 								<div class="col-lg-12">
		 									<div class="billing-name">
		 										<input type="text" name="c_email" value="{{$email}}" placeholder="email address" id="c_email">
		 										<p class="text-danger error-text c_email_err"></p>
		 									</div>
		 								</div>
		 								<div class="col-lg-12">
		 									<div class="billing-name">
		 										<input type="text" name="c_phone_no" value="{{$country_code}} {{$mobile}}" placeholder="phone" id="c_phone_no">
		 										<p class="text-danger error-text c_phone_no_err"></p>
		 									</div>
		 								</div>
		 								<div class="col-lg-12 d-flex">
		 									@if($address_type == '1')
		 									<div class="shipping-type">
                                                <input type="radio" id="radio_1" value="{{$address_type}}" name="address_type" checked="">
                                                <label for="radio_1" class="me-3">home</label>
                                            </div>
                                            <div class="shipping-type">
                                                <input type="radio" id="radio_2" value="2" name="address_type">
                                                <label for="radio_2">work</label>
                                            </div>
                                            @else
                                            <div class="shipping-type">
                                                <input type="radio" id="radio_1" value="1" name="address_type">
                                                <label for="radio_1" class="me-3">home</label>
                                            </div>
                                            <div class="shipping-type">
                                                <input type="radio" id="radio_2" value="{{$address_type}}" name="address_type" checked="">
                                                <label for="radio_2">work</label>
                                            </div>
                                            @endif
		 								</div>
		 								<div class="col-lg-12">
		 									<div class="billing-name">
		 										<input type="text" name="c_address" value="{{$address}}" placeholder="street address" id="c_address">
		 										<p class="text-danger error-text c_address_err"></p>
		 									</div>
		 								</div>
		 								<div class="col-lg-12">
		 									<div class="billing-name">
		 										<input type="text" name="c_city" value="{{$city}}" placeholder="city" id="c_city">
		 										<p class="text-danger error-text c_city_err"></p>
		 									</div>
		 								</div>
		 								<div class="col-lg-6">
		 									<div class="billing-name">
		 										<select name="c_state" id="c_state">

		 											@if($state == '')
		 												<option value="">Select State</option>
		 											@else
		 												<option value="{{$state}}">{{$state}}</option>
		 											@endif

		 											@foreach($states as $s)
		 												<option value="{{$s->name}}">{{$s->name}}</option>
		 											@endforeach
		 										</select>
		 										<p class="text-danger error-text c_state_err"></p>
		 									</div>
		 								</div>
		 								<div class="col-lg-6">
		 									<div class="billing-name">
		 										<input type="text" name="c_pincode" value="{{$pincode}}" placeholder="pincode" id="c_pincode">
		 										<p class="text-danger error-text c_pincode_err"></p>
		 									</div>
		 								</div>
		 								
		 								
		 							</div>

		 							
		 						</div>
							</div>
					
						</div>
						<div class="col-lg-6">
                            <div class="order-detail">
                                <div class="order-heading">
                                    <h2>
                                        your order
                                    </h2>
                                </div>
                                <div class="inner-order-detail">
                                    <table>
                                        <thead>
                                            <tr class="tbl-heading">
                                                <th>
                                                    product
                                                </th>
                                                <th>
                                                    subtotal
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            
                                          @foreach($cart_data as $cd)
                                            <tr class="tbl-data">
                                                <td>
                                                   {{$cd->product_name}}
                                                    <span>
                                                        @if($product_id==0)

                                                        x {{$cd->cart_quantity}}

                                                       @else

                                                        X 1

                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                	<input type="hidden" name="buyer_id" value="{{Auth::guard('buyer')->id()}}" id="c_buyer_id">
                                               @if($product_id==0)
                                                <i class="fa-solid fa-indian-rupee-sign"></i>   <?php  echo bcmul ($cd->price,$cd->cart_quantity);
                                                ?> 
                                                <input type="hidden" name="cart_id[]" value="{{$cd->cart_id}}" id="c_cart_id">
                                                  @else

                                                   <i class="fa-solid fa-indian-rupee-sign"></i> {{$cd->price}}
                                                   <input type="hidden" name="product_id" value="{{$product_id}}" id="c_product_id"> 

                                                  @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                            <tr class="tbl-data">
                                                <td>
                                                    subtotal
                                                </td>
                                                <td>
                                                
                                                  <i class="fa-solid fa-indian-rupee-sign" ></i> {{$total_amount}}
                                                </td>
                                            </tr>
                                            <!--<tr class="order-shipping">
                                                <td colspan="2">
                                                    <div class="shipping-amount">
                                                        <h5>
                                                        	shipping method
                                                        </h5>
                                                        <span class="amount">$35.00</span>
                                                    </div>
                                                    <div class="shipping-type">
                                                        <input type="radio" id="radio1" name="shipping" checked="">
                                                        <label for="radio1">Free Shippping</label>
                                                    </div>
                                                    <div class="shipping-type">
                                                        <input type="radio" id="radio2" name="shipping">
                                                        <label for="radio2">Local</label>
                                                    </div>
                                                    <div class="shipping-type">
                                                        <input type="radio" id="radio3" name="shipping">
                                                        <label for="radio3">Flat rate</label>
                                                    </div>
                                                </td>
                                            </tr>-->
                                            <tr class="odr-total">
                                                <td>Total</td>
                                                  <input type="hidden" name="total_amount" value="{{$total_amount}}" id="total_amount"> 
                                                <td class="order-total-amount"><i class="fa-solid fa-indian-rupee-sign"></i>{{$total_amount}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                              
                                <div class="checkout-btn">
                                    <button type="submit" id="submit3">
                                        process to checkout
                                    </button>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </form>
		</div>
	</div>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	
	  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script type="text/javascript">
    
    
    $(document).ready(function() {
        $("#submit2").click(function(e){
            e.preventDefault();

            $(".error-text").empty();
            var _token = $("input[name='_token']").val();  
            var email = $('#email').val();
            var name = $('#name').val();
            var phone_no = $('#phone_no').val();
            var subject = $('#subject').val();
            var message = $('#message2').val();





            /*alert(email);
            alert(name);
            alert(phone_no);
            alert(subject);*/
            

              /*var email= $(this).find('input[name="email"]').val();
               var name= $(this).find('input[name="name"]').val();
                var phone_no= $(this).find('input[name="phone_no"]').val();
                 var subject= $(this).find('input[name="subject"]').val();*/
  


            $.ajax({
                url: '/getinquiry',
                type:'POST',
              data: {_token:_token,email:email,name:name,phone_no:phone_no,subject:subject , message:message},
              beforeSend: function(){

                            $('#loading-bar-spinner').show();
 
                             $('#overlay').fadeIn()
                             
                              $('#submit2').prop('disabled', true);

                           },

                        complete: function(){
                            
                            $('#submit2').removeAttr("disabled");

                           $('#loading-bar-spinner').hide();
 
                         },
                         
                success: function(data) {
                  console.log(data.error)
                    if($.isEmptyObject(data.error)){

                    $('form').each(function() {
                         this.reset();
                          
                         
                         
                       });








                     $("#message1").append("<b>your message submit sucessfully!!!</b>");
                     $('#message1').delay(3000).fadeOut(3000);

                     


                    }else{
                        printErrorMsg(data.error);


                  
                     
                    }
                }
            });
        }); 

        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
            console.log(key);
              $('.'+key+'_err').text(value);
            });
        }
    });



    
    
    $(document).ready(function(){

            $('#submit1').click(function(e){

                e.preventDefault();

                var _token = $("input[name='_token']").val();

                var username = $("#username").val();

                var password = $("#password").val();

                $.ajax({

                    url:"/login_user",
                    type:'get',
                    data:{_token:_token,username:username,password:password},
                    success:function(data){

                        console.log(data);

                    if($.isEmptyObject(data.error)){

                        var user_id=data.status
                        
                        window.location.href = "/student/home/"+user_id;
                    }

                    else{
                        $('#message').html("invalid credentials !!");
                        $(".error-text").empty();
                        printErrorMsg(data.error);
                        setTimeout(function() { $(".error-text").fadeOut(3000); }, 3000);
                        
                        }
                    }
                    
                });
            });

            function printErrorMsg (msg) {
                $.each( msg, function( key, value ) {
                console.log(key);
                  $('.'+key+'_err').text(value);
                  $(".error-text").show();
                });
            }

        });



    	$(document).ready(function() {
        $("#submit3").click(function(e){
            e.preventDefault();

            $(".error-text").empty();
            var _token = $("input[name='_token']").val();  
            var email = $('#c_email').val();
            var name = $('#c_name').val();
            var phone_no = $('#c_phone_no').val();
            var address = $('#c_address').val();
            var pincode = $('#c_pincode').val();
            var city = $('#c_city').val();
            var state = $('#c_state').val();
            var total_amount=$('#total_amount').val();
            var address_type = $("input[name='address_type']:checked").val();



            var buyer_id = $('#c_buyer_id').val();
            var cart_id = $("input[name='cart_id[]']").map(function(){return $(this). val();}). get();
            var product_id = $('#c_product_id').val();



            $.ajax({
                url: '/checkout_process',
                type:'POST',
              data: {_token:_token,email:email,name:name,phone_no:phone_no,address:address , pincode:pincode, city:city, state:state, address_type:address_type, buyer_id:buyer_id, cart_id:cart_id, product_id:product_id, total_amount:total_amount},
              beforeSend: function(){

                            $('#loading-bar-spinner').show();
 
                             $('#overlay').fadeIn()
                             
                              $('#submit3').prop('disabled', true);

                           },

                        complete: function(){
                            
                              $('#submit3').removeAttr("disabled");

                           $('#loading-bar-spinner').hide();
 
                         },

               

                         
                success: function(data) {
                 
                    if($.isEmptyObject(data.error)){




                                var options = {
                                                "key": "rzp_test_f5Nc4nKOhOrZX0", // Enter the Key ID generated from the Dashboard
                                                "amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                                "currency": "INR",
                                                "name": 'School Of Occult Science',
                                                "description": "Thank You for choosing us",
                                                "image": "https://schoolofoccultscience.com/image/logo.png",
                                        /*   "order_id": "order_9A33XWu170gUtm",*/ //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                                "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",

                                        /*        "handler" : function(response){

                                                       alert( response.razorpay_payment_id ) ;
    
                                                        },*/


                                                   "handler": function (response){

                                                   	            $('#loaderIcon').show();

                                                               $.ajax({

                                                                       url: '/place_order',
                                                                       type:'post',
                                                                       data:{_token:_token,email:data.email,name:data.name,phone_no:data.phone_no,total_amount:data.total_amount,address:data.address,address_type:data.address_type,city:data.city,state:data.state,pincode:data.pincode,buyer_id:data.buyer_id,cart_id:data.cart_id,product_id:data.product_id,payment_id:response.razorpay_payment_id},
                                                                       success: function(response){
                                                                  
                                                                             if($.isEmptyObject(response.error)){

                                                                             	  var BASE_URL = "{{ url('/') }}";

                                                                                  window.location=BASE_URL+'/order_success'

                                                                                           
                                                                                    }else{

                                                                                        alert('something went wrong !!')


                                                                                 }
                                                                             },

                                                                              complete: function(){

                                                                                $('#loaderIcon').hide();
                                                                               },
                                                                        });
                                                        
                                                                 },
           
                                                  "prefill": {
                                                    "name": data.name,
                                                    "email": data.email,
                                                    "contact": data.phone
                                                 },
                                                "notes": {
                                                    "address": data.address
                                                },
                                                "theme": {
                                                    "color": "#ffffff"
                                                }
                                            };

                                        var rzp1 = new Razorpay(options);
                                    
                                            rzp1.open();               


                    }else{
                        printErrorMsg(data.error);


                  
                     
                    }
                }
            });
        }); 

        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
            console.log(key);
              $('.'+'c_'+key+'_err').text(value);
            });
        }
    });
        
        

    

    	$(document).on('click', '.pagination a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
         });

         function fetch_data(page)
         {
            let search_string = $("#search").val();
            
          $.ajax({
           url:"/filter_data?page="+page,
           method: 'GET',
           data:{search_string:search_string},
           success:function(res)
           {
            $('#table_data').html(res);
            $('#search').val(search_string);
           },
          });
         }
         
       
  


    //search product
$(document) .on('change',function(e){
    e.preventDefault();
     let search_string = $("#search").val();

     $.ajax({
         url:"{{url('/filter_data')}}",
         method: 'GET',
        data:{search_string:search_string},
        success:function(res){

             $('#table_data').html(res);
             $('#search').val(search_string);
            if(res. status== 'nothing_found'){
                $('#table_data').html('<span class="text-danger"> '+'Nothing Found'+'</span>');
        }
    	},
    	error:function(){

    		alert(11);
    	}
    });

});

    
     function openNav() {
            document.getElementById("mySidepanel").style.height = "100%";
            }
            function closeNav() {
                document.getElementById("mySidepanel").style.height = "0";
            }
            
             $(document).on("click", '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
        
         $('.ss_1').click(function(){
          $('.service-dropdown').slideToggle();
        });
        $(document).ready(function(){

            $('.ss_2').click(function(){
              $(this).parent(".link").siblings("ul").slideToggle();
            });
        });
        
        
        

    	$(window).scroll(function(){
            if ($(this).scrollTop() > 150) {
                $('#dynamic').addClass('newClass');
            } else {
                $('#dynamic').removeClass('newClass');
            }
        });
        
        $(window).scroll(function(){
            if ($(this).scrollTop() > 150) {
                $('#dynamic1').addClass('newClass');
            } else {
                $('#dynamic1').removeClass('newClass');
            }
        });

    	$(document).ready(function(){
	            $(".icon1").click(function(){
	                $(".search-box1").slideDown("slow");
	            });
	            $(".search-box1 a").click(function(){
	                $(".search-box1").slideUp("slow");
	            });
	        });

	    $('.search-toggle').addClass('closed');
	        $('.search-toggle .search-icon').click(function(e) {
	            if ($('.search-toggle').hasClass('closed')) {
	                $('.search-toggle').removeClass('closed').addClass('opened');
	                $('.search-toggle, .search-container').addClass('opened');
	                $('#search-terms').focus();
	            } else {
	                $('.search-toggle').removeClass('opened').addClass('closed');
	                $('.search-toggle, .search-container').removeClass('opened');
	            }
	        });

	    var btn = $('.scrollToTop');
	        $(window).scroll(function() {
	            if ($(window).scrollTop() > 300) {
	                $('.scrollToTop').addClass('active');  
	            }
	            else {
	                $('.scrollToTop').removeClass('active');
	            }
	        });
	        $(document).ready(function() {
	        $('.scrollToTop').on('click', function(e) {
	            e.preventDefault();
	        $('html, body').animate({scrollTop:0}, '300');
	        });
	    });
    </script>