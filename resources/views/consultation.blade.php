@extends('layout.header_footer')

@section('content')

<div id="table_data">
	@include('consultation_data')
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
        
        

    

    	$(document).on('click', '.pagination a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
         });

         function fetch_data(page)
         {
            let search_string = $("#search").val();
            
          $.ajax({
           url:"/filter_data?page="+page,
           method: 'GET',
           data:{search_string:search_string},
           success:function(res)
           {
            $('#table_data').html(res);
            $('#search').val(search_string);
           },
          });
         }
         
       
  


    //search product
$(document) .on('change',function(e){
    e.preventDefault();
     let search_string = $("#search").val();

     $.ajax({
         url:"{{url('/filter_data')}}",
         method: 'GET',
        data:{search_string:search_string},
        success:function(res){

             $('#table_data').html(res);
             $('#search').val(search_string);
            if(res. status== 'nothing_found'){
                $('#table_data').html('<span class="text-danger"> '+'Nothing Found'+'</span>');
        }
    	},
    	error:function(){

    		alert(11);
    	}
    });

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