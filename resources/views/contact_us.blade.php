@extends('layout.header_footer')

@section('content')

@foreach($banner_image as $bi)
<div class="in-banner" style="background-image:url('uploads/{{$bi->image}}')">
	<div class="container">
    <h1>{{$bi->title}}</h1>
    <ul class="breadcrumb1">
        <li><a href="{{url('/')}}">Home</a></li>
        <li>/</li>
        <li>{{$bi->title}}</li>
    </ul>
	</div>
</div>
@endforeach

<div class="bg-contact">
	<div class="container">
		@foreach($contact_title as $ct)
		<div class="row">
			<div class="col-lg-4 col-md-5 co-order">
				<div class="contact-box">
					<div class="contact-heading">
						<span>
							{{$ct->sub_title}}
						</span>
						<h2>
							{{$ct->title}}
						</h2>
					</div>
					@foreach($admins as $ad)
					<div class="contact-info">
						<div class="contact-icon">
							<i class="fa-solid fa-envelope"></i>
						</div>
						<div class="contact-name">
							<h5>
								e-mail:
							</h5>
							<h6>
								<a href="mailto:{{$ad->email}}">{{$ad->email}}</a>
							</h6>
						</div>
					</div>
					<div class="contact-info">
						<div class="contact-icon">
							<i class="fa-solid fa-phone"></i>
						</div>
						<div class="contact-name">
							<h5>
								phone:
							</h5>
							<h6>
								<a href="tel:{{$ad->phone_no}}">{{$ad->phone_no}}</a>
							</h6>
						</div>
					</div>
					<div class="contact-info">
						<div class="contact-icon">
							<i class="fa-solid fa-location-dot"></i>
						</div>
						<div class="contact-name">
							<h5>
								location:
							</h5>
							<h6>
								{{$ad->address}}
							</h6>
						</div>
					</div>
					@endforeach
				</div>
			</div>

			<div class="col-lg-8 col-md-7">
				@if ($message = Session::get('error'))
	            <div  id="hideDiv" class="alert alert-success alert-block" >
	                <!--     <input type="text" class="close" data-dismiss="alert"></input> -->
	                <strong style="padding-top : 5px !important; display: inline-block;">{{ $message }}</strong>
	             </div>
	           @endif
				<div class="co-form">
					<h2>
						{{$ct->form_title}}					
					</h2>
				
					<form action="{{url('/contact_admin')}}" method="post">
						@csrf
						<div class="row">
							<div class="col-lg-6">
								<div class="contact-name">
									<input type="text" name="name" value="" placeholder="name">
									@if($errors->has('name')) <p class="error_mes">{{ $errors->first('name') }}</p> @endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="contact-name">
									<input type="email" name="email" value="" placeholder="email ID">
									@if($errors->has('email')) <p class="error_mes">{{ $errors->first('email') }}</p> @endif
								</div>
							</div>
							<div class="col-lg-12">
								<div class="contact-name">
									<input type="number" name="phone_no" value="" placeholder="phone number">
									@if($errors->has('phone_no')) <p class="error_mes">{{ $errors->first('phone_no') }}</p> @endif
								</div>
							</div>
							<div class="col-lg-12">
								<div class="contact-name">
									<input type="text" name="subject" value="" placeholder="subject">
									@if($errors->has('subject')) <p class="error_mes">{{ $errors->first('subject') }}</p> @endif
								</div>
							</div>
							<div class="col-lg-12">
								<div class="contact-name">
									<textarea placeholder="Your message " name="message"></textarea>
									@if($errors->has('message')) <p class="error_mes">{{ $errors->first('message') }}</p> @endif
								</div>
							</div>

							<div class="col-lg-3">
								<div class="contact-btn">
									<button type="submit">
										submit
										<span><i class="fa-solid fa-paper-plane"></i></span>
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="co-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d112120.44114833402!2d77.21094016292321!3d28.57685507269324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce9d67f0f7e27%3A0xe5ef4be28260806a!2sSchool%20of%20Occult%20Science!5e0!3m2!1sen!2sin!4v1670497743219!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<style type="text/css">
	.error_mes{
		color: red;
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
        
        
        

    	$(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

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
</body>
</html>


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