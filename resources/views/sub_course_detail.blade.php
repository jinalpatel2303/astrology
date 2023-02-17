@extends('layout.header_footer')

@section('content')

@foreach($sub_course_banner_image as $cbi)
<div class="in-banner" style="background-image:url('/uploads/{{$cbi->image}}')">
    <div class="container">
        <h1>{{$cbi->title}}</h1>
        <ul class="breadcrumb1">
            <li><a href="{{url('/')}}">Home</a></li>
            <li>/</li>
            <li>{{$cbi->title}}</li>
        </ul>
    </div>
</div>
@endforeach


<div class="in-astrology">
	<div class="container">
		<div class="background-overlay3"></div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="astrology-images">
					<img src="/image/astro1.png">
				</div>
			</div>
			<div class="col-lg-6 col-md-6">

				@foreach($sub_course_detail as $cd)
				<div class="atrology-details">
					<h1>{{$cd->title1}}</h1>
					<h4>{{$cd->title2}}</h4>
					<p>{{$cd->description}}</p>
				</div>
				@endforeach

				<div class="shop_btn" type="button"  data-bs-toggle="modal" data-bs-target="">
                  

                        <input type="hidden" name="sub_course_id" id="sub_course_id" value="1">

                        <input type="hidden" name="sub_course_price" id="sub_course_price" value="12000">

					<button class="grow_spin">Register For Demo Class</button>

                    
				</div>
			</div>
		</div>
	</div>
</div>
<div class="in-co-details">
	<div class="container">
		<div class="background-overlay1"></div>
		<div class="c_back">
			<img src="/image/astrology-bg2.png">
		</div>
		@foreach($sub_course_description as $cds)
		<div class="co-details">
			<div class="co-details-img">
				<img src="/uploads/{{$cds->image}}">
			</div>
			<div class="courses-contain">
				{!!$cds->description!!}
			</div>
		</div>
		@endforeach
		<div class="left_img">
			<img src="/image/astro2.png">
		</div>
	</div>
</div>
<div class="as-register">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="register_main">
                    <div class="register_details">
                    	@foreach($home_demo as $hd)
                        <div class="register-text">
                            <span>{{$hd->title1}}</span>
                            <h3>{{$hd->title2}}</h3>
                            <h2>{{$hd->title3}}</h2>
                        </div>
                        @endforeach
                        <div class="shop_btn">
							<button class="grow_spin"><a href="{{url('/contact_us')}}">Call Us</a></button>
						</div>
                        <div class="register-shape">
                            <img src="/image/Vector3.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="details-modal">
  <div class="modal-dialog">
    <div class="modal-content">



      <!-- Modal body -->
        <div class="modal-body"> 

           <div id="message"></div>
                   
            <div class="bg-std-register">
                <div class="container">
                     <button type="button" class="btn-close" data-bs-dismiss="modal"></button>   
                    <div class="re-form">
                        <h2>
                            Details
                        </h2>


                        <div id="loaderIcon" class="spinner-border text-primary" style="display:none" role="status">
                             <span class="sr-only">Loading...</span>
                        </div>
            
                        <form action="" method="post"> 
                            @csrf

                         <input type="hidden" name="selected_course" id="selected_course" value="">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="text" name="first_name" placeholder="first name" id="first_name">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <p class="text-danger error-text first_name_err"></p>

                                    </div>

                                </div>
                        
                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="text" name="last_name" placeholder="last name" id="last_name">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                     
                                        <p class="text-danger error-text last_name_err"></p>
                                    </div>
                                </div>
                        
                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="email" name="email" placeholder="email address"  id="email">
                                        <span>
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                           <p class="text-danger error-text email_err"></p>
                                    </div>
                                </div>
                    
                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="number" name="mobile_no" placeholder="mobile number" id="mobile_no">
                                        <span> 
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <p class="text-danger error-text mobile_no_err"></p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="number" name="price" placeholder="price" id="price" value="" readonly>
                                        <span> 
                                          <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i>
                                        </span>
                                        <p class="text-danger error-text price_err"></p>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="re-btn-flex">
                                        <div class="re-btn ">
                                            <button type="submit" id="pay_btn">
                                                PAY
                                            </button>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script type="text/javascript" src="/js/full_payment.js"></script>

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
    
     $('.ss_1').click(function(){
      $('.service-dropdown').slideToggle();
    });
    $(document).ready(function(){

            $('.ss_2').click(function(){
              $(this).parent(".link").siblings("ul").slideToggle();
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



 

      </style>
@endsection