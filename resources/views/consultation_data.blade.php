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

<div class="in-consultation">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="right-sidebar">
                    <div class="product-filter">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-12">
                                <ul class="product-card-type">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><i class="fa-solid fa-chevron-right"></i></li>
                                    <li>Talk to Astrologer</li>
                                </ul>
                            </div>
                            <div class="col-lg-9 col-md-8 col-12">
                                <div class="sort-by">
                                    <div class="inner-sort">
                                    	<form action="{{url('/filter_data')}}">
	                                        <label>sort by :</label>
	                                        <select name="select_val" id="search">
	                                            <option selected="" value="0">Short by Best Astrologer</option>
	                                            <option value="1">Experience : High to Low</option>
	                                            <option value="2">Experience : Low to High</option>
	                                            <option value="3">Price : High to Low</option>
	                                            <option value="4">Price : Low to High</option>
	                                        </select>
                                        </form>
                                    </div>
                                    <div class="inner-sort inner-sort1">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="consultation_list">
                    	<div class="row">
                    		@foreach($our_astrologer as $oa)
                    		<div class="col-lg-4 col-md-6">
                    			<div class="consult-details">
                    				<div class="consult-img">
                    					<a href="#"><img src="/uploads/{{$oa->image}}"></a>
                    				</div>
                    				<div class="consult-more">
                						<h3><a href="#">{{$oa->name}}</a></h3>
                						
                						<div class="expertise">
	                						@foreach($expertise_list as $key=>$el)
	                						@if($oa->id == $el->list_id)
	                						@if($key+1 <= 3)
	                    						<span> {{$el->expertise}},</span>
	                    					@endif
	                    					@endif
	                    					@endforeach
                    					</div>

                    					<div class="language">
	                    					@foreach($expertise_list as $key=>$el)
	                    					@if($oa->id == $el->list_id)
	                						@if($key+1 >= 4)
	                    						<span>{{$el->expertise}},</span>
		                  					@endif
		                  					@endif
	                    					@endforeach
                    					</div>
                    					
                    					<p>Exp:{{$oa->experience}} year</p>
                    					<span> ₹ {{$oa->price}} / min</span>
                    					<div class="question1">
					                        <div class="q_main1">
						                        <div class="read-more-content">
						                           <div class="q_main1">
						                           	<h3>{{$oa->title}}</h3>
						                               <p>{{$oa->description}}</p>
						                           </div>
						                        </div>
						                        <a class="read-more" title="Read More" style="cursor: pointer;">Read More</a>
						                    </div>
						                </div>
                    				</div>
                    			</div>
                    		</div>
                    		@endforeach
                    	</div>
                    </div>
                    <div class="container">
                    	{{ $our_astrologer->links('pagination') }}
                    </div>
                    
                </div>
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
        
        

    	$(document).ready(function(){
        
    	$('.read-more').click(function() {
	        $(this).prev().slideToggle();
	        if (($(this).text()) == "Read More") {
	            $(this).text("Read Less");
	        } else {
	            $(this).text("Read More");
	        }
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