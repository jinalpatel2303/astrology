@extends('layout.header_footer')

@section('content')

	<style type="text/css">
		.bg-oh{
			padding:100px 0px;
		}
		.oh-box{
			transition:all 0.5s ease;
		}
		.oh-name h6 label{
			margin-bottom: 0px;
    		text-transform: capitalize;
    		font-size: 18px;
    		font-weight: 500;
    		padding-top: 8px;
    		letter-spacing: 0.5px;
		}
		.oh-box .row {
		    padding: 15px;
    		margin: 20px 0px;
		    border: 1px solid rgb(128 128 128 / 50%);
		    border-radius: 8px;
		    
		}
		.oh-box:hover{
			box-shadow: 2px 2px 12px rgb(128 128 128 / 40%);
    		border-radius: 8px;
		}
		.oh-box:hover .row{
			border:none;
		}
		.oh-product {
    		width:90px;
    		height:90px;
    		margin: auto;
		}
		.oh-product a{
			display:block;
		}
		.oh-product img{
			width:100%;
		}
		.oh-name a{
			text-transform:capitalize;
			text-decoration:none;
    		color: black;
    		font-size:22px;
    		font-weight: 600;
		}
		.oh-price span {
		    font-weight: 500;
		    font-size:22px;
		}
		.oh-status{
			display:flex;
			align-items:center;
		}
		.oh-status span{
    		width: 10px;
    		height: 10px;
    		background:green;
    		margin-right: 12px;
    		border-radius: 50%;
		}
		.oh-status h4{
    		text-transform: capitalize;
    		text-decoration: none;
    		font-size:22px;
    		font-weight: 500;
    		margin-bottom:0px;
		}
		.oh-dot-red span{
			background-color:red;
			border:none;
		}
		.oh-arriving span{
			background-color:unset;
			border:1px solid green;
		}

		@media screen and (max-width:767px){
			.oh-product{
				margin:unset;
			}
			.oh-price{
				margin-top:16px;
			}
			.oh-status{
				margin-top:16px;
			}
		}


	</style>





 <div class="in-banner">
        <div class="container">
            <h1>order-history</h1>
            <ul class="breadcrumb1">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>/</li>
                <li>order-history</li>
            </ul>
        </div>
    </div>

    @if($order_data_count !=0)

    <div class="bg-oh">
    	<div class="container">
    		<div class="oh-main-box">

              @foreach($order_data as $od)
    			<div class="oh-box">
    				<div class="row">
    					<div class="col-xl-3 col-lg-3 col-md-3 col-6">
    						<div class="oh-product">
   								<a href="#">

   									@foreach($product_image as $pi)

   									  @if($pi->product_id == $od->product_id)

   									   <img src="/uploads/{{$pi->image}}">

   									   @break

   									  @endif

    

   									@endforeach
   								</a>

   							</div>
    					</div>
    					<div class="col-xl-3 col-lg-3 col-md-3 col-6">
    						<div class="oh-name">
    							<a href="#">
    								{{$od->product_name}}
    							</a>
    							<h6>
    								<label>qty:</label>
    								<span>{{$od->qty}}</span>
    							</h6>
    						</div>
    					</div>
    					<div class="col-xl-3 col-lg-3 col-md-3 col-6">
    						<div class="oh-price">
    							<span>
    								<i class="fa-solid fa-indian-rupee-sign"></i>  {{$od->price}}
    							</span>
    						</div>
    					</div>
    					<!-- <div class="col-xl-3 col-lg-3 col-md-3 col-6">
    						<div class="oh-status">
    							<span>
    								
    							</span>
    							<h4>
    								delivered
    							</h4>
    						</div>
    					</div> -->
    				</div>
    			</div>

    			@endforeach
                                 
    		
    		</div>
    	</div>
    </div>


    @else


    <div class="bg-emtycart">
        <div class="container">
            <div class="emnty-cart">
                <div class="emty-cart-img">
                    <img src="/image/emty-cart-image.png">
                </div>

                <div class="emty-cart-info">
                    <h3>
                        look's like you haven't added anything to  your Order List
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




    @endif







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
    
    <style type="text/css">

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
 
        

      </style>
      
@endsection