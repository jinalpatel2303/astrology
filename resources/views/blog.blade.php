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

<div class="co_blog">
    <div class="container">
        <div class="row">
        	<div class="col-xl-4 col-lg-5 col-md-5">
                <div class="set-part-2">
                    <div class="blog-search1">
                        <form action="{{url('/search_blog')}}" method="GET">
                            <input type="text" placeholder="Search..." name="search" value="">
                            <button type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    <div class="post1">
                        <h3 class="post">Recent Blog</h3>
                        @foreach($blog_detail_sb as $bds)
                        <div class="item">
                            <a href="{{url('/blog_detail')}}/{{$bds->id}}" class="img1"><span class="bg-img1 img-1" style="background-image :url('/uploads/{{$bds->image}}')"></span></a>
                            <div class="info">
                                <span><?php 
                                    echo date("j M , Y",strtotime($bds->date));
                                ?></span>
                                <h4><a href="{{url('/blog_detail')}}/{{$bds->id}}">{{$bds->title}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                        <!-- <div class="item">
                            <a href="#" class="img1"><span class="bg-img1 img-2"></span></a>
                            <div class="info">
                                <span>Oct 20, 2022</span>
                                <h4><a href="#">On the other hand we provide denounce with righteous</a></h4>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="img1"><span class="bg-img1 img-3"></span></a>
                            <div class="info">
                                <span>Oct 20, 2022</span>
                                <h4><a href="#">On the other hand we provide denounce with righteous</a></h4>
                            </div>
                        </div> -->
                    </div>
                    <div class="archive">
                        <h3 class="post">Courser offered</h3>
                        <ul class="item1">
                             
                            @foreach($course_master as $cm)
                                    <li><a href="{{url('/course_detail')}}/{{$cm->id}}">{{$cm->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="tag">
                        <h3 class="post">Register now</h3>
                        <div class="free-demo">
                    		<h3>Register For Free Demo Class</h3>
                    		<button class="free-btn"><a href="{{url('/contact_us')}}">contact now</a></button>
                    	</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="row">

                	@foreach($blog_detail as $bd)
                    <div class="col-lg-12 inner-blog1">
                        <div class="set-blog1 blog">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="img_ img_1">
                                        <img src="/uploads/{{$bd->image}}">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-12">
                                    <div class="detail detail-1">
                                        <h3><a href="#">{{$bd->title}}</a></h3>
                                        <ul class="blog-date">
                                            <li><i class="far fa-calendar-alt"></i><span><?php 
                                                echo date("j M , Y",strtotime($bd->date));
                                             ?></span></li>
                                            <li class="com1"><i class="far fa-comments"></i><span>{{$bd->comment}} comments</span></li>
                                        </ul>
                                        <p>{{$bd->description}}</p>
                                        <div class="blog-bottom-link">
                                            <a href="{{url('/blog_detail')}}/{{$bd->id}}">+ Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <ul class="pagination">
                    <!-- <li class="page-item">
                        <a class="page-link" href="#"><i class="fa-solid fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link active" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">...</li>
                    <li class="page-item">
                        <a class="page-link" href="#">10</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fa-solid fa-chevron-right"></i></a>
                    </li> -->

                    {{ $blog_detail->links('pagination') }}
                </ul>
            </div>
        </div>
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