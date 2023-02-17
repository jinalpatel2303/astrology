@extends('layout.header_footer')

@section('content')

<div class="in-banner">
    <div class="container">
        <h1>cart</h1>
        <ul class="breadcrumb1">
            <li><a href="">Home</a></li>
            <li>/</li>
            <li>cart</li>
        </ul>
    </div>
</div>


@if($cart_count ==0 )

   <div class="bg-emtycart">
        <div class="container">
            <div class="emnty-cart">
                <div class="emty-cart-img">
                    <img src="/image/emty-cart-image.png">
                </div>

                <div class="emty-cart-info">
                    <h3>
                        look's like you haven't added anything to  your cart
                    </h3>

                    <button>
                        <a href="{{url('/')}}">
                            return home
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @else

     <div class="bg-cart">
	<div class="container">
		<div class="cart inner-wishlist table-responsive">
			<table>
					<thead>
						<tr>
							<th>
								
							</th>
							<th>
									
							</th>
							<th>
								product name
							</th>
							<th>
								price
							</th>
							<th>
								quantity
							</th>
							<th>
								Subtotal
							</th>
						</tr>
					</thead>
					<tbody>

						@foreach($cart_data as $cd)
					
						<tr class="case_studies_{{$cd->cart_id}}">
							<td>
								<div class="wish-icon">
								

									<i class="fa-solid fa-trash-can"  onclick="delete_add_cart({{$cd->cart_id}})"></i>
								
								</div>
							</td>
							<td>
								<div class="wish-product">
									<a href="#">
										@foreach($product_image as $pi)
										@if($pi->product_id == $cd->id)
										<img src="/uploads/{{$pi->image}}">
										@break
										@endif
										@endforeach
									</a>
								</div>
							</td>
							<td>
								<div class="wish-name">
									<h4>
										<a href="#">
											{{$cd->product_name}}	
										</a>
									</h4>
								</div>
							</td>
							<td class="per_price">
								<input type="hidden" name="per_price" value="{{$cd->price}}">
								<div class="wish-price">
									<!--<del>
										$80.00
									</del>-->
									<span>
										<i class="fa-solid fa-indian-rupee-sign"></i> {{$cd->price}} 
									</span>
								</div>
							</td>
							<td>
								<div class="counter">
								<a class="counter__minus cart-qty-minus" onclick="minus_qty({{$cd->cart_id}})"><span>-</span></a>
								<input name="counter" type="text" id="qty_{{$cd->cart_id}}" class="counter__input qty" value="{{$cd->cart_quantity}}" readonly="">
								<a class="counter__plus cart-qty-plus" onclick="plus_qty({{$cd->cart_id}})" id="counter__minus_q3"><span>+</span></a>
								</div>

                               <div class="alert_max text-danger"></div>
                               <input id="total_qty_{{$cd->cart_id}}" name="total_qty" type="hidden" value="{{$cd->quantity}}">

							</td>
							<td class="total_price">
								<div class="wish-price">

									<span>
										<i class="fa-solid fa-indian-rupee-sign"></i> <div class="c_price d-inline-block" id="c_price_{{$cd->cart_id}}"> <?php  echo bcmul ($cd->price,$cd->cart_quantity);
										?></div>
									</span>
								</div>
							</td>
						</tr>
					
						@endforeach
						
					</tbody>
				</table>
		   </div>

		   @if(count($cart_data)!=0)
			<div class="cart-check">
					<div class="container">
					
							<div class="row">
								<div class="col-lg-7 col-md-4">
									
								</div>
								<div class="col-lg-5 col-md-8">
									<div class="inner-order-detail cart-detail">
                                	<table>
                                    	<tbody>
                                    		<tr>
                                    			<td>
                                    				<div class="cart-heading">
                                    					<h2>
                                    						order-summary
                                    					</h2>
                                    				</div>
                                    			</td>
                                    		</tr>

                                        	<tr class="tbl-data">
                                            	<td>
                                                	subtotal
                                            	</td>
                                            	 <td class="order-total1">
                                                	<i class="fa-solid fa-indian-rupee-sign"></i><span class="order-total">{{$total_amount}}</span>
                                            	</td>
                                       	 	</tr>
                                      
                                        	<tr class="odr-total">
                                            	<td>Total</td>
                                             <td class="order-total-amount1"><i class="fa-solid fa-indian-rupee-sign"></i> <span class="order-total-amount">{{$total_amount}}</span></td>
                                       	 	</tr>
                                    	</tbody>	
                                	</table>
                               		<div class="checkout-btn">
                               			<a href="{{url('/checkout')}}">
                               				<button type="submit">
                                    		process to checkout
                               	 		</button>
                               				
                               			</a>
                                		
                            		</div>
                            	</div>
								</div>
							</div>
						
					</div>
				</div>
				@endif
		</div>
	</div>
	
	<style>
	    
	    .wish-icon i {
            width: 28px;
            height: 28px;
            line-height: 28px;
            text-align: center;
            font-size: 18px;
            background-color: white;
            border-radius: 9%;
            cursor: pointer;
        }
	</style>

    @endif


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">




/*	$(document).ready(function(){

		$(".counter a").click(function(){

			var per_price = $(this).parents('tr').children('.per_price').find('input');

			var per_price1=Number(per_price.val());

			var qty=$(this).siblings('.qty');

			var qty1=Number(qty.val());

			var total_price = qty1 * per_price1;

			var add_price = $(this).parents('tr').children('.total_price').find('.c_price');

			add_price.empty();

			add_price.html(total_price);

		});
	});*/


  function minus_qty($id){

  	    $.ajaxSetup({
           headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
               });


            var BASE_URL = "{{ url('/') }}"
            var _token = $("input[name='_token']").val(); 
            var cart_id = $id;
            var qty=$('#qty_'+cart_id).val();

            var new_qty =qty-1; 

            if(new_qty>0){

            $('#qty_'+cart_id).val(new_qty);

             $.ajax({
                 url:BASE_URL+'/minus_qty',                
                 type:'POST',
                 data: {_token:_token,cart_id:cart_id,new_qty:new_qty},
  
                 success: function(response){

                 
                 	var product_amount=response.price*response.qty;


                 	 $('#c_price_'+cart_id).text('');

                 	 $('#c_price_'+cart_id).text(product_amount);

                 	  $('.order-total').text('');

                 	 $('.order-total').text(response.total); 


                 	   $('.order-total-amount').text('');

                 	 $('.order-total-amount').text(response.total); 

                 	 
                                         
                     }
  
                 });

            }else{


            }

  }


   function plus_qty($id){

  	    $.ajaxSetup({
           headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
               });


  	      var cart_id = $id;

  	       var total_qty=$('#total_qty_'+cart_id).val();

            var BASE_URL = "{{ url('/') }}"
            var _token = $("input[name='_token']").val(); 
          
            var qty=$('#qty_'+cart_id).val();

             var qty1=parseInt(qty);

            var new_qty =qty1+1; 

            if(new_qty<=total_qty){

            $('#qty_'+cart_id).val(new_qty);

          
             $.ajax({
                 url:BASE_URL+'/plus_qty',                
                 type:'POST',
                 data: {_token:_token,cart_id:cart_id,new_qty:new_qty},
  
                 success: function(response){

                 
                 	var product_amount=response.price*response.qty;
                 	 $('#c_price_'+cart_id).text('');

                 	 $('#c_price_'+cart_id).text(product_amount);

                 	  $('.order-total').text('');

                 	 $('.order-total').text(response.total); 


                 	   $('.order-total-amount').text('');

                 	 $('.order-total-amount').text(response.total); 


                                                       
                     }
  
                 });

            }else{


            }

  }
   
   
   


	$(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });
             
               function delete_add_cart($id){
                
                  swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, delete it!',
                            className : 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {

                               var BASE_URL = "{{ url('/') }}";
            
                                var id = $id;
            
                                      $.ajax({
            
                                        
                                            url:BASE_URL+'/delete_add_cart/'+id,
                                            type:'GET',
                                            dataType: "json",

            
                                            success: function(response){
            
                                                  $('.case_studies_'+id).hide();

                                                  	  $('.order-total').text('');

                 	                                  $('.order-total').text(response.total); 


                 	                                   $('.order-total-amount').text('');

                 	                                   $('.order-total-amount').text(response.total); 


                                                    if(response.total==0){

                 	 	                             /* $('.cart-check').css("display","none");

                                                       $('.bg-cart').css("display","none");

                                                     
                                                         $(".bg-emtycart").show();*/


                                                            location.reload(true);

                                                       

                                                      

                 	                                }
                     
                                                 },
             
                                        error: function(response) {
            
                                                 alert('error');
                      
                                            },        
                      
                                       });

                      } else {
                       swal.close();
                     }
              });

           }






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
	                btn.addClass('active');  
	            }
	            else {
	                btn.removeClass('active');
	            }
	        });
	        btn.on('click', function(e) {
	            e.preventDefault();
	        $('html, body').animate({scrollTop:0}, '300');
	    });





	    var btn = $('.scrollToTop');
	        $(window).scroll(function() {
	            if ($(window).scrollTop() > 300) {
	                btn.addClass('active');  
	            }
	            else {
	                btn.removeClass('active');
	            }
	        });
	        btn.on('click', function(e) {
	            e.preventDefault();
	        $('html, body').animate({scrollTop:0}, '300');
	    });



	var incrementPlus;
	var incrementMinus;

	var buttonPlus  = $(".cart-qty-plus");
	var buttonMinus = $(".cart-qty-minus");

	var incrementPlus = buttonPlus.click(function() {

    var max_q=$('#qty').val();
	var $n = $(this)
		.parent(".counter")
		.find(".qty");
    $(this).parent(".counter").siblings('.alert_max').empty();

    var quantity=Number($n.val());
    if(max_q <= quantity){
        $(this).parent(".counter").siblings('.alert_max').html('Max quantity Reach !!');
    }
    else{
    /*    $n.val(Number($n.val())+1 );*/
        
    }
	
});

	var incrementMinus = buttonMinus.click(function() {
			var $n = $(this)
			.parent(".counter")
			.find(".qty");
		$(this).parent(".counter").siblings('.alert_max').empty();
		var amount = Number($n.val());
		if (amount > 1) {
			/*$n.val(amount-1);*/
		}
	});

</script>

@endsection
