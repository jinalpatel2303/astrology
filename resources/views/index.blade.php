@extends('layout.header_footer')

@section('content')

<style type="text/css">
    .read_expd{
        height: 120px;
        overflow: hidden;
    }
    .read_more a {
        color: #ffba33;
        text-decoration: none;
        font-size: 20px;
        font-weight: 600;
        padding-left:8px;
    }
    .read_more {
        margin-bottom: 10px;
    }

</style>



<div class="as_banner">
	<div class="banner_silder">
		@foreach($home_banner as $hb)
		<div class="banner_main">
			<div class="banner_img">
				<img src="/uploads/{{$hb->image}}">
				<div class="banner_details">
					<h2>{{$hb->title1}}</h2>
					<h1>{{$hb->title2}}<BR> {{$hb->title3}}</h1>
					<p>{{$hb->description}}</p>
					<div class="shop_btn" type="button">
						<button class="grow_spin"><a href="{{url('/register')}}">Register Now</a></button>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>

       @if(Session::has('id'))

         <div class="alert alert-success">{{Session::get('id')}}</div>

            <input type="hidden" name="login_user" id="login_user" value="{{Session::get('id')}}">

       @else

         
         <input type="hidden" name="login_user" id="login_user" value="">

     @endif



</div>
<div class="notice-animation">
    <div class="row">
		<div class="col-lg-12">
			<div class="marquee">
				<div>
					<ul>
                        @foreach($home_advertise as $ho)
                        <li>
                            {{$ho->advertise}}
                        </li>
                        @endforeach
					</ul>
				</div>
		    </div>
		</div>
	</div>
</div>
<div class="as_about">
	<div class="container">
		@foreach($home_about_description as $had)
		<div class="abouty_head">
			<h3>{{$had->title}}</h3>
		    <p>{{$had->description}}</p>
		</div>
		@endforeach

		@foreach($home_about as $ha)
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="as_service_img">
                    <img src="image/service_img2.png" alt="" class="as_service_circle img-responsive">
                    <img src="/uploads/{{$ha->image}}" alt="" class="as_service_img img-responsive">
                </div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="as_about_detail">
                    <h1 class="as_heading">{{$ha->title}}</h1>
                    <div class="as_paragraph">
                        {!!$ha->description!!}
                    </div>

                    <div class="as_contact_expert">
                        <span class="as_icon">
                           <img src="/uploads/{{$ha->image1}}" alt="">
                        </span>
                        <span class="as_year_ex">
                            {{$ha->count}}
                        </span>
                        <div>
                            <h5>years of</h5>
                            <h1>{{$ha->count_name}}</h1>
                        </div>
                    </div>
                    <div class="shop_btn">
						<button class="grow_spin" tabindex="0"><a href="{{url('/about_us')}}" tabindex="0">Read More</a></button>
					</div>
                </div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="as_blog">
	<div class="container">
		@foreach($home_blog_description as $hbd)
		<div class="blog_head">
			<h3>{{$hbd->title}}</h3>
			<p>{{$hbd->description}}</p>
		</div>
		@endforeach


		<div class="row">
			@foreach($blog_detail as $bd)
			<div class="col-lg-4 col-md-6">
				<div class="as_blog_box">
                    <div class="as_blog_img">
                        <a href="{{url('/blog_detail')}}/{{$bd->id}}"><img src="/uploads/{{$bd->image}}" alt=""></a>
                        <span class="as_btn"><?php 
                                                echo date("j M , Y",strtotime($bd->date));
                                            ?></span>
                    </div>
                    <div class="as_blog_detail">
                        <ul>
                            <li><a href="{{url('/blog_detail')}}/{{$bd->id}}"><i class="fa-solid fa-calendar-days"></i>
                            				<?php 
                                                echo date("j M , Y",strtotime($bd->date));
                                            ?></a></li>
                            <li><a href="{{url('/blog_detail')}}/{{$bd->id}}"><i class="fa-solid fa-user"></i>{{$bd->name}}</a></li>
                        </ul>
                        <h4 class="as_subheading"><a href="{{url('/blog_detail')}}/{{$bd->id}}">{{$bd->title}}</a></h4>
                        <p class="as_font14 as_margin0">{{$bd->description}}</p>
                        <div class="shop_btn">
							<button class="grow_spin"><a href="{{url('/blog_detail')}}/{{$bd->id}}">Learn More</a></button>
						</div>
                    </div>
                </div>
			</div>
			@endforeach
			
		</div>
	</div>
</div>

<div class="as_faq" style="background-image:url('/uploads/{{$faq_bg_image}}')">
    <div class="container">
        <div class="blog_head quora-head">
			<h3>Questions From Quora</h3>
		
		</div>
	    <div class="row">
		  	<div class="col-lg-6 col-md-6">
		  		<div class="faq_img">
		  			<img src="/uploads/{{$faq_image}}">
		  		</div>
		  	</div>
		    <div class="col-lg-6 col-md-6">
				<div class="accordion1" id="accordionExample">
					@foreach($home_faq as $key=>$hf)
					<div class="accordion-item">
					    <h2 class="accordion-header" id="heading{{$hf->id}}">
					      <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$hf->id}}" aria-expanded="true" aria-controls="collapse{{$hf->id}}">
					        {{$hf->question}}<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>

					    @if($key+1 == 1)
					    <div id="collapse{{$hf->id}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$hf->id}}" data-bs-parent="#accordionExample">
					      <div class="accordion-body read_expd">
					        {{$hf->answer}}
					      </div>
					      <div class="read_more">
                              <a href="{{$hf->link}}" target="_blank">Read More</a>
                          </div>
					    </div>
					    @else
					    <div id="collapse{{$hf->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$hf->id}}" data-bs-parent="#accordionExample">
					      <div class="accordion-body read_expd">
					        {{$hf->answer}}
					      </div>
					      <div class="read_more">
                              <a href="{{$hf->link}}" target="_blank">Read More</a>
                          </div>
					    </div>
					    @endif

					</div>
					@endforeach
				    
			    </div>
		    </div>
	    </div>
	    
	     <div class="shop_btn">
        	<button class="grow_spin"><a href="{{url('/faq')}}">view more</a></button>
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
<!--<div class="as_testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hs_about_heading_main_wrapper">
                	@foreach($home_testimonial_description as $htd)
                    <div class="testimonial_heading">
                        <h3>{{$htd->title}}</h3>
                        <p>{{$htd->description}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="as_testi_slider">
                    <div class="test-silder">
                        @foreach($home_testimonial as $key=>$ht)
                        <div class="item">
                            <div class="row">
                            
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="testi_main">
                                        <div class="as_testi_sub">
                                            <div class="testi_quote">
                                                <i class="fa fa-quote-left"></i>
                                            </div>
                                            <div class="testi_quote_cont">
                                                <p id="style-7">{{$ht->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testi_client">
                                        <div class="cont_sec">
                                            <h2>{{$ht->name}}</h2>
                                            <p>{{$ht->address}}</p>
                                        </div>
                                        <div class="cont_img_sec">
                                            <img src="/uploads/{{$ht->image}}">
                                        </div>
                                    </div>
                                </div>
                               
                              
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->



<div class="as_testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hs_about_heading_main_wrapper">
                    <div class="testimonial_heading">
                        <h3>{{$htd->title}}</h3>
                        <p>{{$htd->description}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="as_testi_slider">
                    <div class="test-silder">
                        @foreach($home_testimonial as $key=>$ht)
                        <div class="item">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="testi_main">
                                    	<div class="testi_client">
                                    	    @if($ht->image == '')
                                    	    <div class="cont_img_sec">
                                            	<img src="/uploads/dummy_image.webp">
                                        	</div>
                                    	    @else
                                        	<div class="cont_img_sec">
                                            	<img src="/uploads/{{$ht->image}}">
                                        	</div>
                                        	@endif
                                    	</div>
                                        <div class="as_testi_sub">
                                            <div class="testi_quote">
                                                <i class="fa fa-quote-left"></i>
                                            </div>
                                            <div class="testi_quote_cont">
                                                <p  id="style-7">{{$ht->description}} 
                                            	</p>
                                            </div>
                                            <div class="testimonal-info">
                                            	<h2>{{$ht->name}}</h2>
                                            	<p>{{$ht->address}}</p>
                                        	</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="modal" id="timing-modal">
    <div class="modal-dialog">
        <div class="modal-content">   
            <div class="modal-body">
                <div class="bg-timing-popup">
                    <button type="button" class="button-icon" >
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <div class="container">
                        <div id="message1" ></div>
                        <div class="re-form">
                            <h2>
                                Register for demo class
                            </h2>
                            <form  method="Post"> 
                                @csrf
                                <div class="row">


                                    <div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>
                                    <div class="col-lg-12 ">
                                        <div class="re-name">
                                            <input type="text" name="first_name" placeholder="First name" id="first_name">
                                            <p class="text-danger error-text first_name_err"></p>
                                            <span>
                                                <i class="fa-solid fa-user"></i>
                                            </span> 
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="re-name">
                                            <input type="text" name="last_name" placeholder="Last name" id="last_name">
                                         <p class="text-danger error-text last_name_err"></p>
                                            <span>
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                     <div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>
                                    <div class="col-lg-12">
                                        <div class="re-name">
                                          <input type="email" name="email" placeholder="Email address" id="email" >
                                           <p class="text-danger error-text email_err"></p>
                                            <span>
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="re-name">
                                          <input type="number" name="mobile_no" placeholder="mobile number" id="mobile_no">
                                            <p class="text-danger error-text mobile_no_err"></p>
                                            <span> 
                                                <i class="fa-solid fa-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="re-check">
                                            <label>
                                                 select course:
                                            </label>                                
                                            <div class="row">

                                          @foreach($course_master as $cm)
                                             <div class="col-lg-6 col-md-6">
                                               <input type="checkbox" id="subject{{$cm->id}}" value="{{$cm->id}}" name="subject" >
                                              <label for="subject{{$cm->id}}">{{$cm->name}}</label>
                                            </div>
                                          @endforeach

                                              <p class="text-danger error-text subject_err"></p>
                                           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="re-btn-flex">
                                            <div class="re-btn">
                                                <button type="submit" id="register">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div>

                                <input type="checkbox"  value="1"  id="checkbox">


                                 If already Register, Ingore this pop-up !
                                

                            </div>

                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



 <style>
     #timing-modal .modal-content{
       max-width:430px;
      margin:auto;
      }
     #timing-modal{

      display: none;
      margin-top: 200px;
    }
     #timing-modal .modal-body{
    background-color:#f3f3f3;
    border-radius:20px;
     }
    .button-icon{
    border: none;
    width: 30px;
    height: 30px;
    font-size: 22px;
    line-height: 28px;
    text-align: center;
    border-radius: 4px;
    color: white;
    background-color: #ffba33;
    position: absolute;
    right: -11%;
    top: -3%;
    transition:all 0.5s ease;
   }
    .bg-timing-popup .re-form {
    padding:30px 35px;
    width:100%;
    box-shadow:none;
    padding:0px;
  }
    .bg-timing-popup .re-form h2 {
    font-size:24px;
    margin-bottom:20px;
  }
    .bg-timing-popup .re-name input{
    height:45px;
    font-size:15PX;
 }
    .bg-timing-popup .re-btn button{
    height:40PX;
    font-size:16px;
    margin-top:20px;
 }
    .bg-timing-popup .re-check {
    margin:0px;
 }
    .bg-timing-popup .re-check .course-box{
    display:flex;
    align-items:center;
    margin-bottom: 10px;
    margin-left: 20px;
  }
    .bg-timing-popup .re-check .course-box label{
    font-weight: 600;
    font-size:14px;
    text-transform: capitalize;
    padding-left: 8px;
    margin-bottom:0px;
  }
    .bg-timing-popup .re-check .course-box input{
    width:15px;
    height:15px;
 }
    .bg-timing-popup .re-name span{
    font-size:15px
 }
    .button-icon:hover{
    background-color:transparent;
    color:#ffba33;
 }


 .re-name p {
    margin-top: -13px;
    margin-bottom: 2px;
}

#loading-bar-spinner.spinner {
    left: 50%;
    margin-left: -20px;
    top: 44%;
    margin-top: -20px;
    position: absolute;
    z-index: 19 !important;
    display: none;
    width: 20%;
    animation:unset!important;
}
#loading-bar-spinner.spinner .spinner-icon {
    width: 40px;
    height: 40px;
    border: solid 6px transparent;
    border-top-color: black !important;
    border-left-color: black !important;
    border-radius: 50%;
    animation: loading-bar-spinner 700ms linear infinite;
}
    
    @media screen and (max-width:767px){
     .button-icon{
        position: relative;
        left:95%;
        width:25px;
        height:25px;
        line-height:25px;
        font-size:18px;
        text-align:center;
     }
    }

</style>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  
    <script type="text/javascript">

        $(document).ready(function(){
                $("#timing-modal").modal({
                show:false,
                backdrop:'static'
                });
        });

      /*  function reloadPage(){

           location.reload(true);

         }
*/


      $(document).ready(function(){

        var login_user = $('#login_user').val();

        alert(login_user);

      
       setInterval(function(){    

        if(login_user ==''){

             $('#timing-modal').modal('show');

          }

         },2000);


         

       });


     $(function() {
     $('#checkbox').click(function() {
     
          $.ajax({
                url: '/check_register_student',
                type:'Get',     
                         
                success: function(data) {
                  console.log(data.error)
                    if($.isEmptyObject(data.error)){


                         location.reload(true);         
                  
                }
            });
         }
     });
 });






     $(document).ready(function() {
        $("#register").click(function(e){
            e.preventDefault();

            $(".error-text").empty();
            var _token = $("input[name='_token']").val();  
            var email = $('#email').val();
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var mobile_no = $('#mobile_no').val();


              var allids=[];

            
                  $("input:checkbox[name=subject]:checked").each(function(){

                         allids.push($(this).val());

                        
                      });

               

            $.ajax({
                url: '/register_student',
                type:'POST',
              data: {_token:_token,email:email,first_name:first_name,last_name:last_name,mobile_no:mobile_no,subject:allids},
              
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

              

                     $("#message1").append("<b>Registration successfull. We will connect you soon !</b>");
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
        
        
         function myFunction() {
              var dots = document.getElementById("dots");
              var moreText = document.getElementById("more");
              var btnText = document.getElementById("myBtn");
            
              if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more"; 
                moreText.style.display = "none";
              } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less"; 
                moreText.style.display = "inline";
              }
            }
        
        
		
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
        
        
        
    	$('.test-silder').slick({
        	autoplay: false,
        	autoplaySpeed: 1500,
            slidesToShow:1,
            slidesToScroll: 1,
            dots: false,
            arrows:true,
            focusOnSelect: true,
            prevArrow: '<div class="banner-arrow slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></div>',
            nextArrow: '<div class="banner-arrow slide-arrow next-arrow"><i class="fa-solid fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 1,
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
    	$('.banner_silder').slick({
        	autoplay:true,
        	autoplaySpeed: 1500,
            slidesToShow:1,
            slidesToScroll: 1,
            dots: false,
            arrows:true,
            speed:2000,
            focusOnSelect: true,
            prevArrow: '<div class="banner-arrow slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></div>',
            nextArrow: '<div class="banner-arrow slide-arrow next-arrow"><i class="fa-solid fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 1,
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