@extends('layout.header_footer')

@section('content')



<div class="bg-product-detail">
	<div class="container">
		@foreach($product as $p)
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="pd-image">
					<div class="pd-slider pd-slider-for">
						@foreach($product_image as $pi)
						@if($pi->product_id == $p->id)
						<div class="pd-inner-image">
							<img src="/uploads/{{$pi->image}}">
						</div>
						@endif
						@endforeach
					</div>
					<div class="pd-slider pd-slider-nav">
					    @foreach($product_image as $pi)
						@if($pi->product_id == $p->id)
						<div class="pd-inner-image">
							<img src="/uploads/{{$pi->image}}">
						</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
                <form method="post" action="{{url('/add_cart')}}/{{$p->id}}">
                    @csrf
				<div class="pd-main">
					<div class="pd-info">
						<div class="pd-heading">
							<h2>
								{{$p->product_name}}
							</h2>
						</div>
						<div class="pd-price">
							<h6>
								<i class="fa-solid fa-indian-rupee-sign"></i> {{$p->price}}
							</h6>
						</div>
						<div class="pd-para">
							<p>
								{{$p->description}}
							</p>
						</div>
						<div class="pd-quantity">
							<h5>
								Quantity:
							</h5>
							<div class="counter">
								<a class="counter__minus cart-qty-minus"><span>-</span></a>
								<input id="total_qty" name="counter" type="text" class="counter__input qty" value="1" readonly="">
								<a class="counter__plus cart-qty-plus" id="counter__minus_q3"><span>+</span></a>
								</div>
                                <div class="alert_max text-danger"></div>
                            <!--     <input type="hidden" name="buyer_id" value="1"> -->
                                <input id="qty" name="qty" type="hidden" value="{{$p->quantity}}">
						</div>


						<div class="pd-flex">

                            @if($already_in_cart==0)


                            <div class="re-btn">
                                <button type="submit">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                        <a>
                                        add to cart
                                        </a>
                                 </button>
                            </div>



                            @else

                               <div class="re-btn cart_btn">


                                <a href="{{url('/view_cart')}}/{{Auth::guard('buyer')->id()}}" style="color: black;">
                                  <i class="fa-solid fa-cart-shopping"></i> 
                              
                                 
                                    
                                       Go to cart
                                   
                            
                               </a>
                            </div>


                           @endif




                       
					    <div class="re-btn buy_btn">
							
    							<a href="{{url('/buy_product')}}/{{$p->id}}">

                                    <i class="fa-solid fa-bag-shopping"></i>
    								buy now
    							</a>
									
							</div>
						</div>
					</div>
				</div>
                </form>
			</div>
		</div>
		@endforeach
	 	</div>
</div>

<div class="bg-related-product">
 	<div class="container">
		<div class="re-product">
			<h2>
					related products
				</h2>
		</div>
		<div class="inner-product">
			<div class="row product-slider">
				@foreach($related_product as $rp)
				<div class="col-lg-4">
	    			<div class="arrival-1">
                		<div class="product-img">

                		    <a href="add-cart.html" tabindex="0">
                		    	@foreach($product_image as $pi)
                		    	@if($pi->product_id == $rp->id)
                		    		<img src="/uploads/{{$pi->image}}">
                		    	@break
                		    	@endif
                		    	@endforeach
                		    </a>

                		</div>
                		<div class="product-info">
                		   	<h4><a href="#">{{$rp->product_name}}</a></h4>
                		    <h6>${{$rp->price}}</h6>
                		    <div class="product-btn">
								<div class="re-btn">
									<button>
									<a href="{{url('/buy_product')}}/{{$rp->id}}">
											buy now
										</a>
									</button>
								</div>
                		    </div>
                		</div>
                	<!--	<div class="buttons">
                            <a href="wishlist.html" class="tooltip tooltip--left" data-tooltip="wishlist"><i class="far fa-heart"></i></a>
                            <a href="add-cart.html" class="tooltip tooltip--left" data-tooltip="Add to cart"><i class="fa-solid fa-cart-plus"></i></a>
                            <a href="add-cart.html" data-bs-toggle="modal" data-bs-target="#productmodal" tabindex="0"><i class="fa-solid fa-eye"></i></a>
                        </div>-->
                	</div>
	    		</div>
	    		@endforeach
	    		
			</div>
		</div>
 	</div>	
</div>

<!------------------------- product-modal ----------------------->



<style>
   .cart_btn a {
    width: 100%;
    height: 45px;
    border: none;
    border-radius: 5px;
   
    font-size: 18px !important;
    font-weight: 600 !important;
    transition: all 0.5s ease;
    background-color: #ffba33;
    color: white !important;
    display: block;
    text-align: center;
    line-height: 45px;
}
.cart_btn a:hover{
    color: black !important;
}

.cart_btn i.fa-solid.fa-cart-shopping {
    margin-right: 12px;
}
.cart_btn a:after{
  content:"";
  position :absolute;
  width:24px;
  height:24px;
  top:0px;
  left:0px;
  border-top:2px solid #ffba33;
  border-left:2px solid #ffba33;
  transition:all 0.25s;
}
.cart_btn a:hover:before ,.cart_btn a:hover:after{
  width:100%;
  height:100%;
}
.cart_btn a:hover{
    background-color: unset;
    color: black;
}
.cart_btn a:before{
  content:"";
  position :absolute;
  width:24px;
  height:24px;
  bottom:0px;
  right:0px;
  border-bottom:2px solid #ffba33;
  border-right:2px solid #ffba33;
  transition:all 0.30s;
}


.buy_btn a {
    width: 100%;
    height: 45px;
    border: none;
    border-radius: 5px;
   
    font-size: 18px !important;
    font-weight: 600 !important;
    transition: all 0.5s ease;
    background-color: black;
    color: white !important;
    display: block;
    text-align: center;
    line-height: 45px;
}
.buy_btn a:hover{
    color: black !important;
}

.buy_btn i.fa-solid.fa-cart-shopping {
    margin-right: 12px;
}
.buy_btn a:after{
  content:"";
  position :absolute;
  width:24px;
  height:24px;
  top:0px;
  left:0px;
  border-top:2px solid black;
  border-left:2px solid black;
  transition:all 0.25s;
}
.buy_btn a:hover:before ,.buy_btn a:hover:after{
  width:100%;
  height:100%;
}
.buy_btn a:hover{
    background-color: unset;
    color: black;
}
.buy_btn a:before{
  content:"";
  position :absolute;
  width:24px;
  height:24px;
  bottom:0px;
  right:0px;
  border-bottom:2px solid black;
  border-right:2px solid black;
  transition:all 0.30s;
}
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
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


    $('.read-more').click(function() {
        $(this).prev().slideToggle();
        if (($(this).text()) == "Read More") {
            $(this).text("Read Less");
        } else {
            $(this).text("Read More");
        }
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
    $('.alert_max').empty();

    var quantity=Number($n.val());
    if(max_q <= quantity){
        $('.alert_max').html('Max quantity Reach !!');
    }
    else{
        $n.val(Number($n.val())+1 );
        
    }
	
});

var incrementMinus = buttonMinus.click(function() {
		var $n = $(this)
		.parent(".counter")
		.find(".qty");
        $('.alert_max').empty();
	var amount = Number($n.val());
	if (amount > 1) {
		$n.val(amount-1);
	}
});


$('.pd-slider-for').slick({
slidesToShow: 1,
slidesToScroll: 1,
arrows: true,
prevArrow: '<div class="product-arrow slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></div>',
nextArrow: '<div class="product-arrow slide-arrow next-arrow"><i class="fa-solid fa-chevron-right"></i></div>',
fade: true,
asNavFor: '.pd-slider-nav'
});

$('.pd-slider-nav').slick({
slidesToShow: 3,
slidesToScroll: 1,
asNavFor: '.pd-slider-for',
dots:false,
focusOnSelect: true
});


$('.product-slider').slick({
    	autoplay:true,
    	autoplaySpeed: 1500,
        slidesToShow:4,
        slidesToScroll: 1,
        dots: false,
        arrows:true,
        focusOnSelect: true,
        prevArrow: '<div class="product-arrow slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></div>',
        nextArrow: '<div class="product-arrow slide-arrow next-arrow"><i class="fa-solid fa-chevron-right"></i></div>',
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                adaptiveHeight: true,
              },
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
        ],
    });


    



        
</script>


@endsection

