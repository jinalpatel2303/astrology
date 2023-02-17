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

<div class="in_about">
	<div class="container">
		@foreach($aboutus_about as $aa)
		<div class="row">
			<div class="col-lg-6">
				<div class="about-img">
					<img src="/uploads/{{$aa->image}}">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="in-about-details">

					@foreach($aboutus_about_description as $aad)
					<!--<p class="about-text">
						<span>{{$aad->sub_title}}</span>
					</p>-->
					<h1 class="ab_head">{{$aad->title}}</h1>
					<p>{{$aad->description}}</p>
					@endforeach

					<h3 class="ab_head">{{$aa->title}}</h3>
					{!!$aa->description!!}
					<div class="as_contact_expert">
	                    <span class="as_icon">
	                       <img src="image/about.svg" alt="">
	                    </span>
	                    <span class="as_year_ex">
	                        {{$aa->count}}
	                    </span>
	                    <div>
	                        <h5>years of</h5>
	                        <h1>{{$aa->count_name}}</h1>
	                    </div>
	                </div>
	                <div class="shop_btn">
						<button class="grow_spin" tabindex="0"><a href="{{url('/contact_us')}}" tabindex="0">Contact Now</a></button>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="back_img">
		<img src="image/zodiac.png">
	</div>
</div>


<div class="in_occult" style="background-image: url(/uploads/{{$occult_banner}});">
	<div class="container">
		@foreach($aboutus_occult as $ao)
		<div class="row">
			<div class="col-lg-6 col-md-6 order">
				<div class="occult-details">
					<h1>{{$ao->title}}</h1>
					{!!$ao->description!!}
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="Occult-img">
					<div class="f_image">
						<img src="image/hand_bg.png">
					</div>
					<div class="s_image">
						<img src="/uploads/{{$ao->image}}">
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

<div class="astronomy">
	<div class="container">
		@foreach($aboutus_astronomy_description as $ad)
		<div class="row">
			<div class="col-lg-6">
				<div class="thumb">
	              <img src="/uploads/{{$ad->image}}" alt="Thumb">
	              <img src="/uploads/{{$ad->image1}}" alt="Thumb">
	              <div class="overlay sz-img1">
	                 <div class="content">
	                    <h4>{{$ad->sub_title}}</h4>
	                 </div>
	              </div>
	           </div>
			</div>
			<div class="col-lg-6">
				<div class="astronomy-details">
					<h1>{{$ad->title}}</h1>
					{!!$ad->description!!}
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="in_Predicting">
	<div class="container">
		<div class="row">
			@foreach($aboutus_detail as $keys=>$ad)
			@if($keys %2==0)
			<div class="col-lg-12">
				<div class="Predicting">
					<div class="Predicting_main ast_palm_left">
						<div class="ast_palm_img">
							<img src="/uploads/{{$ad->image}}">
						</div>	
						<div class="Predicting-details">
							<h4>{{$ad->title}}</h4>
							<div class="over_details">
								  <div class="outer" id="portfolio{{$keys+1}}">
								  	{!!$ad->description!!}
								  </div>
								  <div class="b_ten">
								    <a>
								      <strong id="expandbtn{{$keys+1}}">Read More</strong>
								    </a>
								  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@else

			
			<div class="col-lg-12">

				<div class="Predicting_main ast_palm_right" style="display: block;">
					<div class="ast_palm_img">
						<img src="/uploads/{{$ad->image}}" alt="" class="img-responsive">
					</div>	
					<div class="Predicting-details">
						<h4>{{$ad->title}}</h4>
						<div class="over_details">
							  <div class="outer" id="portfolio{{$keys+1}}">
							  	{!!$ad->description!!}
							  </div>
							  <div class="b_ten">
							    <a>
							      <strong id="expandbtn{{$keys+1}}">Read More</strong>
							    </a>
							  </div>
						</div>
					</div>
				</div>
			</div>
			@endif

			@endforeach
			
		</div>
	</div>
</div>
<div class="as-register">
	<div class="container">
		@foreach($home_demo as $hd)
	    <div class="row">
	        <div class="col-12">
	            <div class="register_main" style="background-image:url('/uploads/{{$hd->image}}')">
	                <div class="register_details">
	                	
	                    <div class="register-text">
	                        <span>{{$hd->title1}}</span>
	                        <h3>{{$hd->title2}}</h3>
	                        <h2>{{$hd->title3}}</h2>
	                    </div>
	                    
	                    <div class="shop_btn">
							<button class="grow_spin"><a href="{{url('/contact_us')}}">Call Us</a></button>
						</div>
	                    <div class="register-shape">
	                        <img src="image/Vector3.png">
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    @endforeach
	</div>
</div>

	 

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
        
        
    	$(document).ready(function () {
		  $("#expandbtn").click(function () {
		    if ($("#portfolio").hasClass("readmore")) {
		      $("#expandbtn").html("Read More");
		      $("#portfolio").removeClass("readmore");
		    } else {
		      $("#expandbtn").html("Read Less");
		      $("#portfolio").addClass("readmore");
		    }
		  });
		});

		$(document).ready(function () {
		  $("#expandbtn1").click(function () {
		    if ($("#portfolio1").hasClass("readmore")) {
		      $("#expandbtn1").html("Read More");
		      $("#portfolio1").removeClass("readmore");
		    } else {
		      $("#expandbtn1").html("Read Less");
		      $("#portfolio1").addClass("readmore");
		    }
		  });
		});

		$(document).ready(function () {
		  $("#expandbtn2").click(function () {
		    if ($("#portfolio2").hasClass("readmore")) {
		      $("#expandbtn2").html("Read More");
		      $("#portfolio2").removeClass("readmore");
		    } else {
		      $("#expandbtn2").html("Read Less");
		      $("#portfolio2").addClass("readmore");
		    }
		  });
		});

		$(document).ready(function () {
		  $("#expandbtn3").click(function () {
		    if ($("#portfolio3").hasClass("readmore")) {
		      $("#expandbtn3").html("Read More");
		      $("#portfolio3").removeClass("readmore");
		    } else {
		      $("#expandbtn3").html("Read Less");
		      $("#portfolio3").addClass("readmore");
		    }
		  });
		});

		$(document).ready(function () {
		  $("#expandbtn4").click(function () {
		    if ($("#portfolio4").hasClass("readmore")) {
		      $("#expandbtn4").html("Read More");
		      $("#portfolio4").removeClass("readmore");
		    } else {
		      $("#expandbtn4").html("Read Less");
		      $("#portfolio4").addClass("readmore");
		    }
		  });
		});

		$(document).ready(function () {
		  $("#expandbtn5").click(function () {
		    if ($("#portfolio5").hasClass("readmore")) {
		      $("#expandbtn5").html("Read More");
		      $("#portfolio5").removeClass("readmore");
		    } else {
		      $("#expandbtn5").html("Read Less");
		      $("#portfolio5").addClass("readmore");
		    }
		  });
		});

		$(document).ready(function () {
		  $("#expandbtn6").click(function () {
		    if ($("#portfolio6").hasClass("readmore")) {
		      $("#expandbtn6").html("Read More");
		      $("#portfolio6").removeClass("readmore");
		    } else {
		      $("#expandbtn6").html("Read Less");
		      $("#portfolio6").addClass("readmore");
		    }
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