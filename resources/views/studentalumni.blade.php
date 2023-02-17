@extends('layout.header_footer')

@section('content')

@foreach($banner_image as $bi)
<div class="in-banner" style="background-image: url('/uploads/{{$bi->image}}');">
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

<div class="bg-student">
	<div class="container">
		<div class="student-title">
			<h3>
				our students
			</h3>
		</div>
		<div class="row">
			@foreach($student_data as $sd)
			<div class="col-lg-3 col-md-6">
				<div class="student-box">
					<div class="student-img">
						<img src="/uploads/{{$sd->image}}">
					</div>
					<div class="student-detail">
						<h4>
							{{$sd->name}}
						</h4>
						<h6>

                            <ul>
                                <li>
                                    <b>course</b>:
                                    <p>
                                        @foreach($student_course_list as $cm)

                                        @if($cm->studentalumni_id == $sd->id)

                                        <span>{{$cm->sub_name}},</span>

                                        @endif

                                        @endforeach

                                    </p>
                                </li>
                                <li>
                                    <b>date</b>:<p><span>
                                            <?php 
                                                echo date('j-m-Y',strtotime($sd->date));
                                            ?>
                                            </span>
                                        </p>
                                </li>
                                <li>
                                    <b>city</b>:<p><span>{{$sd->city}}</span>
                                </li>

                                <li>
                                    <b>Enroll.No</b>:<p><span>{{$sd->enrollment_no}}</span>
                                </li>
                            </ul>
						</h6>
					</div>
				</div>
			</div>
			@endforeach
			
		</div>
		{{ $student_data->links('pagination') }}
	</div>
</div>

<style type="text/css">
    .student-detail li {
        list-style: none;
        text-align: start;
        display: flex;
        padding-left: 10px;
    }

    .student-detail p {
        margin: 0;
        padding-left: 12px;
    }

    .student-detail b {
        padding-right: 2px;
    }
    .bg-student .col-lg-3.col-md-6 {
        display: flex;
    }
    .student-box{
        width: 100%;
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

@endsection





