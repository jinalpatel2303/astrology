<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Astrology</title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
	<link rel="icon" href="/image/logo.png">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-159302727-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-159302727-1');
</script>
	
</head>
<style type="text/css">
	.user-main{
    position:relative;
    cursor:pointer;
}
.user-icon{
    text-align:center;
}

.user-icon i{
    font-size: 30px;
    color: #ffba33;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    line-height: 60px;
    text-align: center;
    background-color: white;
}
.user-dropdown {
    position:absolute;
    right: 15%;
    top: 75px;
    width:100%;
    display:none;
}   
.user-dropdown ul{
    background-color:white;
    border-radius:8px;
    padding:4px 0px;
}
.user-dropdown ul li{
    list-style:none;
    padding: 6px 18px;
}
.user-dropdown ul li:hover{
    background-color:black;
}
.user-dropdown ul li:hover a{
    color:#ffba33;

}
.user-dropdown ul li a{
    text-decoration: none;
    font-size: 20px;
    text-transform: capitalize;
    color: black;
    display:block;
}




</style>
<body class="body">
    <div class="options-wrapper">
		<div class="aeroland__toolbar">
	        <div class="inner beat-animation" data-bs-toggle="modal" data-bs-target="#myModal">
	            <a class="quick-option hint--bounce hint--left hint--black" href="#" aria-label="Quick Enquiry">
	               <img src="/image/classroom.svg"> 
	            </a>
	        </div>
	    </div>
    </div>
	<div class="as_header" id="dynamic">
    	<div class="row">
    		<div class="col-lg-2 col-12">
    			<div class="logo">
			        <a href="{{url('/')}}">
			           <img src="/image/logo.png">
			        </a>
	            </div>
    		</div>
    		<div class="col-lg-10 col-12">
    			<div class="header_top">
    				@foreach($admins as $a)
			        <ul class="header_icon">
			          <li><i class="fa-solid fa-calendar-days"></i> <?php 
                                                echo date("l , F j, Y",strtotime($mytime));
                                             ?></li>
			          <li><a href="mailto:info@gmail.com"><i class="fa-solid fa-envelope"></i> Email Us: {{$a->email}}</a></li>
			          <li><a href="tel:{{$a->phone_no}}"><i class="fa-solid fa-phone"></i> {{$a->phone_no}}</a></li>
			        </ul>
			        @endforeach

			        @foreach($social_links as $sl)
			        <ul class="social_icon ul_li">
			          <li><a href="{{$sl->facebook_url}}"><i class="fab fa-facebook-f"></i></a></li>
			          <!--<li><a href="{{$sl->twitter_url}}"><i class="fab fa-twitter"></i></a></li>-->
			          <li><a href="{{$sl->instagram_url}}"><i class="fab fa-instagram"></i></a></li>
			          <!--<li><a href="{{$sl->linkedin_url}}"><i class="fab fa-linkedin-in"></i></a></li>-->
			        </ul>
			        @endforeach
			    </div>
    			<div class="row">
    				<div class="col-lg-1 hd-clip">
    					<div class="inside-height"></div>
    				</div>
    				<div class="col-lg-11 head-top">
    					<div class="header-menu">
    						<div class="row header_bottom">
					            <div class="col-lg-10">
					            	<div class="bg_left">
										<ul class="bg_first">
											<li class="l_list"><a href="{{url('/')}}">Home</a></li>
											<li class="l_list"><a href="#">Courses</a>
												<ul class="bg_second">
												    <li class="has-sub">
														<a href="{{url('/courser_offered')}}">
															<span>Courses offered</span>
														</a>
													</li>

													@foreach($course_master as $cm)
													<li class="has-sub">
														<a href="{{url('/course_detail')}}/{{$cm->id}}">
															<span>{{$cm->name}}</span>
														</a>
														<ul class="bg_third">
															@foreach($category_master as $scm)
															@if($scm->course_id == $cm->id)
																<li><a href="{{url('/sub_course_detail')}}/{{$scm->id}}">{{$scm->name}}</a></li>
															@endif
															@endforeach
															<!-- <li><a href="astrology.html">astro master-ll level coures</a></li>
															<li><a href="astrology.html">astro analyst program</a></li> -->
														</ul>
													</li>
													@endforeach
													<!-- <li class="has-sub">
														<a href="astrology.html">
															<span>numerology</span>
														</a>
														<ul class="bg_third">
															<li><a href="#">Numerology basic-beginner's course</a></li>
															<li><a href="#">Numerology advance-be a professional</a></li>
														</ul>
													</li>
													<li class="has-sub">
														<a href="astrology.html">
															<span>vastu shastra</span>
														</a>
													</li>
													<li class="has-sub">
														<a href="astrology.html">
															<span>tarot reading</span>
														</a>
													</li> -->
												</ul>
											</li>
											<li class="l_list"><a href="{{url('/about_us')}}">about us</a></li>
											<li class="l_list"><a href="{{url('/blog')}}">Blog</a></li>
											<!--<li class="l_list"><a href="#">Shop</a>
												<ul class="bg_second">

													@foreach($product_category as $pc)
													<li class="has-sub">
														<a href="{{url('/product')}}/{{$pc->id}}">
															<span>{{$pc->category}}</span>
														</a>
													</li>
													@endforeach
												</ul>
											</li>-->
											
											<li class="l_list"><a href="#">Shop</a>
												<ul class="bg_second">

													
													<li class="has-sub">
														<a href="{{url('/product')}}/2">
															<span>Book</span>
														</a>
													</li>
													
												</ul>
											</li>
											<!--<li class="l_list"><a href="{{url('/consultation')}}">Consultation</a></li>-->
											<li class="l_list"><a href="{{url('/register')}}">register</a></li>
											<li class="l_list" type="button"  data-bs-toggle="modal" data-bs-target="#login-modal">
												<a href="#" >student login</a>
											</li>
											<li class="l_list"><a href="{{url('/contact_us')}}">Contact</a></li>
										</ul>
									</div>
					            </div>
					            
					            <div class="col-lg-2">

								@if(Auth::guard('buyer')->id() =='')
									    <ul class="login">
									    	<li>

									    	<div class="shop_btn" type="button"  >
					                          <a href="{{url('Buyer/buyer_login')}}"><button class="grow_spin" tabindex="-1">Log In</button></a>	
					                        </div>
					                    </li>
										
					                          
						
								       </ul>

                                   @else 

                                   	<div class="user-main">
										<div class="user-icon">
											<i class="fa-solid fa-user"></i>
										</div>
										<div class="user-dropdown">
											<ul>
												<li>
												 <a href="#">edit profile</a>
												</li>
												<li>
												 <a href="{{url('/view_cart')}}/{{Auth::guard('buyer')->id()}}">my cart</a>
												</li>
												<li>
												 <a href="{{url('/order_histroy')}}/{{Auth::guard('buyer')->id()}}">My order</a>
												</li>
												<li>
												<a href="{{url('Buyer/buyer_logout')}}">logout</a>
												</li>
											</ul>
										</div>
									</div>                                

                             @endif				 

								</div>
								
								<!--<div class="col-lg-2">
									<div class="bg_right">
							        	<ul class="contact">
								            <li>
								            	<i class="icon1 fas fa-search"></i>
								            </li>
							            </ul>
							            <a href="{{url('/blog')}}">
							            	<ul class="b_color">
							            	   <li><i class="fa-solid fa-shuffle"></i></li>
							                </ul>
							            </a>
							        </div>
								</div>-->
					        </div>
    					</div>
    				</div>
    			</div>
    			<div class="search-box1">
		            <div class="container">
		            	<form action="#">
				            <h3>Search anything you want.</h3>
				            <div class="form_item m-0">
				              <input type="search" name="search" placeholder="Search Here...">
				              <button type="button" class="search_submit_btn">Search Now</button>
				            </div>
			            </form>
		            </div>
		            <a class="srh-btn search_close"><i class="fa fa-times" aria-hidden="true"></i></a>
		        </div>
    		</div>
    	</div>
    </div>
    <div class="mobile_header" id="dynamic1">
		<div class="row">
			<div class="col-md-3 col-3 border-r">
				<div class="mo_logo">
		    		<a href="{{url('/')}}">
		    			<img src="/image/logo.png">
		    		</a>
		    	</div>
			</div>
			<div class="col-md-9 col-9 pa-1">
				<div class="mo-menu">
					<div class="second-menu">
			    		<div class="th-left">
			    			<ul>
			    				<li><i class="fa-solid fa-calendar-days"></i><span> Monday,October 17,2022</span></li>
			    				<li><a href="mailto:info@gmail.com"><i class="fa-solid fa-envelope"></i></a></li>
			    				<li><a href="tel:+1234567890"><i class="fa-solid fa-phone"></i></a></li>
			    			</ul>
			    		</div>
			    		<div class="th-right">
			    			<!--<a href="{{url('/blog')}}">
				            	<ul class="b_color">
				            	   <li><i class="fa-solid fa-shuffle"></i></li>
				                </ul>
				            </a>-->
			    		</div>
			    	</div>
			    	<div class="third-menu">
			    		<!--<div class="form_item m-0">
			                <input type="search" name="search" placeholder="Search Here...">
			                <button type="button" class="search_submit_btn">Search Now</button>
			            </div>-->
			            <div id="mySidepanel" class="sidepanel" style="height: 0px;">
					            <div class="m_menu">
					                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="far fa-times-circle"></i></a>
					                <a href="{{url('/')}}" class="link">Home</a>
					                <a class="link ss_1">Courses<i class="fa-solid fa-caret-down"></i></a>
					                    <ul class="service-dropdown">
					                    	<li><a class="link" href="courses-offered.html">Courses offered</a></li>
					                    	@foreach($course_master as $cm)
										    <li>
										    	<div class="link dd-flex">
										    		<a href="{{url('/course_detail')}}/{{$cm->id}}">{{$cm->name}}</a>
										    		<a class="ss_2" href="#"><i class="fa-solid fa-chevron-down"></i></a>
										    	</div>
										    	<ul class="service-dropdown1">
										    		@foreach($category_master as $scm)
													@if($scm->course_id == $cm->id)
													<li class="link c-color">
														<a href="{{url('/sub_course_detail')}}/{{$scm->id}}">{{$scm->name}}
														</a>
													</li>
													@endif
													@endforeach
												</ul>
										    </li>
										    @endforeach
										</ul>
									<a href="{{url('/about_us')}}" class="link">About us</a>
									<a href="{{url('/blog')}}" class="link">Blog</a>
									<a class="link  new-ss_1">category<i class="fa-solid fa-caret-down"></i></a>
					                    <ul class="new-src-dropdown">
					                        @foreach($product_category as $pc)
					                    	    <li><a class="link" href="{{url('/product')}}/{{$pc->id}}">{{$pc->category}}</a></li>
					                    	@endforeach
										</ul>
										
									<!--<a href="{{url('/consultation')}}" class="link">Consultation</a>-->
									<a href="{{url('/register')}}" class="link">Register</a>
									<a href="#"  type="button"  data-bs-toggle="modal" data-bs-target="#login-modal" class="link">student login</a>
									<a href="{{url('/contact_us')}}" class="link">Contact Us</a>
					            </div>
					        </div>
			                <button class="openbtn" onclick="openNav()"><i class="fa-solid fa-bars"></i></button>
			    	</div>
				</div>
			</div>
		</div>
    </div>

    @yield('content')
    
	<footer class="footer">
        <div class="wpo-upper-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="about-widget">
                            <div class="f_logo">
                                <a href="{{url('/')}}"><img src="/image/logo2.png"></a>
                            </div>
                            @foreach($footer_description as $fd)
                                <p>{{$fd->description}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="link-widget">
                            <div class="widget-title">
                                <h3>Company</h3>
                            </div>
                            <ul>
                            	<li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('/about_us')}}">About Us</a></li>
                                <!--<li><a href="{{url('/register')}}">Register</a></li>-->
                                <!--<li><a href="{{url('/studentalumni')}}">Student Alumni</a></li>-->
                                <li><a href="{{url('/contact_us')}}">Contact us</a></li>
                                <li><a href="{{url('/privacy_policy')}}">Privacy & Policy</a></li>
                                <li><a href="{{url('/term_and_condition')}}">Term and Condition</a></li>
                                <li><a href="{{url('/cancellation_refund')}}">Cancellation Refund</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="blog-widget">
                            <div class="widget-title">
                                <h3>Recent Blog</h3>
                            </div>
                            <ul>
                            	@foreach($blog_detail_footer as $bdf)
                                <li>
                                    <h4><a href="{{url('/blog')}}">{{$bdf->title}}</a></h4>
                                    <span><i class="fa-solid fa-calendar-days"></i> <?php 
                                                echo date(" j.m.Y",strtotime($bdf->date));
                                             ?></span>
                                </li>
                                @endforeach
                                <!-- <li>
                                    <h4><a href="{{url('/blog')}}">We are able to give truly independent advice</a></h4>
                                    <span><i class="fa-solid fa-calendar-days"></i> 10.02.2022</span>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="widget newsletter-widget">
                            <div class="widget-title">
                                <h3>Courses offered</h3>
                            </div>
                            <ul>
                            	@foreach($course_master as $cm)
                            		<li><a href="{{url('/course_detail')}}/{{$cm->id}}">{{$cm->name}}</a></li>
                            	@endforeach
                                
                            </ul>
                            <div class="as-contact">
                            	<h3>study astrology online!!</h3>
                            	<button><a href="{{url('/contact_us')}}">contact now</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ft-shape">
                <img src="/image/ft-shape.png" alt="shape">
            </div>
            <div class="ft-shape-s1">
                <img src="/image/Vector1.png">
            </div>
            <div class="ft-shape-s2">
                <img src="/image/Vector2.png">
            </div>
            <div class="zodiac box">
            	<img src="/image/zodiac.png">
            </div>
        </div>
        <div class="wpo-lower-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul>
                            <li>Copyright © 2022 <a href="{{url('/')}}" class="c_color">School of Occult Science</a>All rights reserved.</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                    	<div class="footer-link">
                    		@foreach($social_links as $sl)
                    		<ul>
                    			<li><a href="{{$sl->facebook_url}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                    			<!--<li><a href="{{$sl->twitter_url}}"><i class="fa-brands fa-twitter"></i></a></li>-->
                    			<li><a href="{{$sl->instagram_url}}"><i class="fa-brands fa-instagram"></i></a></li>
                    			<!--<li><a href="{{$sl->linkedin_url}}"><i class="fa-brands fa-linkedin-in"></i></a></li>-->
                    		</ul>
                    		@endforeach
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop active">
      <i class="far fa-dot-circle"></i>
      <span>Top</span>
    </a>
    
   <!--------------- The Modal ---------------------->
	<div class="modal login-modal" id="login-modal">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-body pop-up-form">
	      			<div class="pu-close-btn">
	      				 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	      			</div>
	      			
	        		<div class="row">
	        			<div class="col-lg-6 col-md-6">
	        				<div class="pop-up-img">
	        					<img src="/image/moon-inverse1.png">
	        					<div class="img_43">
	        						<img src="/image/image43.png">
	        					</div>
	        					<div class="img_44">
	        						<img src="/image/image44.png">
	        					</div>
	        				</div>
	        			</div>
	        			<div class="col-lg-6 col-md-6">
	        				<div class="inner-form">
	        					<h2>
	        						log in
	        					</h2>

	        					<div id="message" class="text-white"></div>
	        					<form method="get">
	        						<div class="row">
	        							<div class="col-lg-12">
	        								<div class="pu-name">
	        									<input type="text" name="username" id="username" placeholder="user name">
	        									<p class="text-danger error-text username_err"></p>
	        								</div>
	        							</div>
	        							<div class="col-lg-12">
	        								<div class="pu-name">
	        									<input type="password" name="password" id="password" placeholder="password">
	        									<p class="text-danger error-text password_err"></p>
	        								</div>
	        							</div>

	        							<div class="col-lg-12">
	        								<div class="shop_btn shop_btn1">
												<button id="submit1" type="submit" class="grow_spin" tabindex="0">Login Now</button>
											</div>
	        							</div>
	        							<div class="pop-up-forget">
											<a href="changepassword.html">
												forget password ?
											</a>
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
    
    <!------------- Inquiry-modal ------------>
    <div class="modal modal-address" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Quick Enquiry</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="co-form">
                    	
                    	<div id="message1" ></div>
                        <form method="post">
                            <div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>
                        	{{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contact-name">
                                        <input type="text" name="name" id="name" value="" placeholder="name">
                                        <p class="text-danger error-text name_err"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-name">
                                        <input type="email" name="email" value="" id="email" placeholder="email ID">
                                        <p class="text-danger error-text email_err"></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-name">
                                        <input type="number" name="phone_no" value="" id="phone_no" placeholder="phone number">
                                        <p class="text-danger error-text phone_no_err"></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-name">
                                        <input type="text" name="subject" id="subject" value="" placeholder="subject">
                                        <p class="text-danger error-text subject_err"></p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-name">
                                        <textarea placeholder="Your message" id="message2"></textarea>
                                        <p class="text-danger error-text message_err"></p>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="contact-btn">
                                        <button type="submit" id="submit2">
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
        </div>
    </div>

	
	

   
</body>

<script type="text/javascript">
	$(".new-ss_1").click(function(){
        $('.new-src-dropdown').slideToggle();
    });
    $(".user-icon").click(function(){
		$(".user-dropdown").slideToggle("slow");
	});
</script>
</html>