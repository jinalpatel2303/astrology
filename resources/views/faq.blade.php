@extends('layout.header_footer')

@section('content')

<div class="in-banner">
    <div class="container">
        <h1>questions of quora</h1>
        <ul class="breadcrumb1">
            <li><a href="{{url('/')}}">Home</a></li>
            <li>/</li>
            <li>Questions of Quora</li>
        </ul>
    </div>
</div>

<!--<div class="as_faq bg-faq">
    <div class="container">
    	<div class="inner-faq">
    		<div class="blog_head">
			<h3>questions of quora</h3>
		</div>
	    <div class="row">
		    <div class="col-lg-6 col-md-6">
				<div class="accordion1" id="accordionExample">
					<div class="accordion-item">
					    <h2 class="accordion-header" id="headingOne">
					      <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					        Question on Marriage timing<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>
					    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
					      <div class="accordion-body">
					       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</p>
					      </div>
					    </div>
					</div>
				    <div class="accordion-item">
					    <h2 class="accordion-header" id="headingTwo">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					        Question on Marriage timing<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>
					    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
					      <div class="accordion-body">
					        Quisque sapien augue, ornare id leo a, tristique elementum justo. Praesent non nulla sagittis, sollicitudin justo id, varius erat. Nunc sed pharetra nisl. Cras et suscipit felis, in lacinia sapien. Integer venenatis sagittis massa, eu eleifend nibh venenatis in. Pellentesque a aliquet urna. Curabitur tortor metus, ultrices sed mi at, sagittis imperdiet turpis. Suspendisse nec luctus nunc. Fusce in arcu quis lacus mollis ultrices.
					      </div>
					    </div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="headingThree">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					        Question on Marriage timing<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>
					    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
					      <div class="accordion-body">
					        Praesent nec ipsum scelerisque dui condimentum pellentesque eu at lectus. Vivamus purus purus, bibendum in vestibulum ac, pharetra sit amet sapien. Nunc luctus, orci vel luctus cursus, nibh nisl ullamcorper ipsum, eu malesuada arcu augue id nisi. In auctor mi ac ante tincidunt tincidunt.
					      </div>
					    </div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="headingFour">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					        Question on Marriage timing<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>
					    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
					      <div class="accordion-body">
					        Praesent nec ipsum scelerisque dui condimentum pellentesque eu at lectus. Vivamus purus purus, bibendum in vestibulum ac, pharetra sit amet sapien. Nunc luctus, orci vel luctus cursus, nibh nisl ullamcorper ipsum, eu malesuada arcu augue id nisi. In auctor mi ac ante tincidunt tincidunt.
					      </div>
					    </div>
					</div>
			    </div>
		    </div>
		    <div class="col-lg-6 col-md-6">
				<div class="accordion2" id="accordionExample1">
					<div class="accordion-item">
					    <h2 class="accordion-header" id="headingOne">
					      <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapseOne">
					        Question on Marriage timing<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>
					    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample1">
					      <div class="accordion-body">
					       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</p>
					      </div>
					    </div>
					</div>
				    <div class="accordion-item">
					    <h2 class="accordion-header" id="headingTwo">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapseTwo">
					        Question on Marriage timing<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>
					    <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample1">
					      <div class="accordion-body">
					        Quisque sapien augue, ornare id leo a, tristique elementum justo. Praesent non nulla sagittis, sollicitudin justo id, varius erat. Nunc sed pharetra nisl. Cras et suscipit felis, in lacinia sapien. Integer venenatis sagittis massa, eu eleifend nibh venenatis in. Pellentesque a aliquet urna. Curabitur tortor metus, ultrices sed mi at, sagittis imperdiet turpis. Suspendisse nec luctus nunc. Fusce in arcu quis lacus mollis ultrices.
					      </div>
					    </div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="headingThree">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseThree">
					        Question on Marriage timing<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>
					    <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample1">
					      <div class="accordion-body">
					        Praesent nec ipsum scelerisque dui condimentum pellentesque eu at lectus. Vivamus purus purus, bibendum in vestibulum ac, pharetra sit amet sapien. Nunc luctus, orci vel luctus cursus, nibh nisl ullamcorper ipsum, eu malesuada arcu augue id nisi. In auctor mi ac ante tincidunt tincidunt.
					      </div>
					    </div>
					</div>
					<div class="accordion-item">
					    <h2 class="accordion-header" id="headingFour">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseFour">
					        Question on Marriage timing<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>
					    <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample1">
					      <div class="accordion-body">
					        Praesent nec ipsum scelerisque dui condimentum pellentesque eu at lectus. Vivamus purus purus, bibendum in vestibulum ac, pharetra sit amet sapien. Nunc luctus, orci vel luctus cursus, nibh nisl ullamcorper ipsum, eu malesuada arcu augue id nisi. In auctor mi ac ante tincidunt tincidunt.
					      </div>
					    </div>
					</div>
			    </div>
		    </div>
	    </div>              
    	</div>
    	
	</div>
</div>-->	

<div class="as_faq bg-faq">
    <div class="container">
    	<div class="inner-faq">
    		<div class="blog_head">
			<h3>questions of quora</h3>
		</div>
	    <div class="row">
		    <div class="col-lg-6 col-md-6">
				<div class="accordion1" id="accordionExample">
					@foreach($home_faq as $key=>$hf)
					@if($key %2==0)
					<div class="accordion-item">
					    <h2 class="accordion-header" id="heading{{$hf->id}}">
					      <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$hf->id}}" aria-expanded="true" aria-controls="collapse{{$hf->id}}">
					        {{$hf->question}}<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>

					    @if($key+1 == 1)
					    <div id="collapse{{$hf->id}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$hf->id}}" data-bs-parent="#accordionExample">
					      <div class="accordion-body">
					       <p>{{$hf->answer}}</p>
					       <a href="{{$hf->link}}">{{$hf->link}}</a>
					      </div>
					    </div>
					    @else
					    <div id="collapse{{$hf->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$hf->id}}" data-bs-parent="#accordionExample">
					      <div class="accordion-body">
					        <p>{{$hf->answer}}</p>
					      </div>
					      <a href="{{$hf->link}}">{{$hf->link}}</a>
					    </div>
					    @endif
					</div>
					@endif
					@endforeach
				   
			    </div>
		    </div>
		    <div class="col-lg-6 col-md-6">
				<div class="accordion2" id="accordionExample1">
					@foreach($home_faq as $key=>$hf)
					@if($key %2!=0)
					<div class="accordion-item">
					    <h2 class="accordion-header" id="heading{{$hf->id}}">
					      <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$hf->id}}" aria-expanded="true" aria-controls="collapse{{$hf->id}}">
					        {{$hf->question}}<i class="fa-solid fa-plus"></i>
					      </button>
					    </h2>

					    <div id="collapse{{$hf->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$hf->id}}" data-bs-parent="#accordionExample1">
					      <div class="accordion-body">
					       <p>{{$hf->answer}}</p>
					       <a href="{{$hf->link}}">{{$hf->link}}</a>
					      </div>
					    </div>
					</div>
					@endif
					@endforeach
				   
			    </div>
		    </div>
	    </div> 
	    
	    {{ $home_faq->links('pagination') }}
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

          $(".new-ss_1").click(function(){
          	 $('.new-src-dropdown').slideToggle();
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









 				