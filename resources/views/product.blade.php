@extends('layout.header_footer')

@section('content')

<style type="text/css">
    .info h4 {
        overflow: hidden;
        height: 45px;
    }
</style>

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

<div class="co_blog">
    <div class="container">
        <div class="row">
        	<div class="col-xl-4 col-lg-4  col-md-5">
                <div class="set-part-2">
                    <div class="blog-search1">
                        <form action="{{url('/search_product_ck')}}/{{$id}}" method="GET">
                            <input type="text" placeholder="Search..." name="search" value="" id="search">
                            <input type="hidden" name="id" value="{{$id}}" id="category_id">
                            <button type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    
                    <div class="pd-category">
                    	<div class="category-heading">
                    		<h3 class="post">category</h3>
                    	</div>

                    	<div class="inner-category">
                    		<ul>
                                @foreach($product_category as $pc)
                    			<div class="list-product">
                    				<div class="inner-list-product">
                    					<li>
                    						<a href="{{url('/product')}}/{{$pc->id}}">
                    							{{$pc->category}}
                    						</a>
                    					</li>
                    					<span>
                    						<i class="fa-solid fa-chevron-down"></i>
                    					</span>
                    				</div>
                    				<div class="sub-product">
                    					<ul>
                                            @foreach($product_sub_category as $psc)
                                            @if($psc->category_id == $pc->id)
                    						  <li><a href="{{url('/sub_product')}}/{{$psc->id}}">{{$psc->sub_category}}</a></li>
                                            @endif
                                            @endforeach
											
                    					</ul>
                    				</div>
                    			</div>
                                @endforeach
                    			
                    		</ul>
                    	</div>
                    </div>
                    <div class="post1">
                        <h3 class="post">Recent Product</h3>
                        @foreach($side_product as $sp)
                        <div class="item">
                            <a href="{{url('/product_detail')}}/{{$sp->id}}" class="img1">
                                @foreach($product_image as $pi)
                                @if($pi->product_id == $sp->id)
                                <span class="bg-img1 product-img-1" style="background-image: url('/uploads/{{$pi->image}}');"></span>
                                @break
                                @endif
                                @endforeach
                            </a>
                            <div class="info">
                                <h5>{{$sp->product_name}}</h5>
                                <h4><a href="{{url('/product_detail')}}/{{$sp->id}}">{{$sp->description}}</a></h4>
                            </div>
                        </div>
                        @endforeach
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
                    		<button class="free-btn"><a href="contact-us.html">contact now</a></button>
                    	</div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-8 col-lg-8 col-md-7" id="table_data">

                @include('search_product')

            </div>

        </div>
    </div>
</div>


<!------------------------- product-modal ----------------------->



<div class="modal productmodal fade" id="productmodal">
	<div class="modal-dialog">
		<div class="modal-content">
  			<div class="modal-header">
    			<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
  			</div>
 
  			<div class="modal-body">
    			<div class="row">
    				<div class="col-lg-6 col-md-6">
    					<div class="pm-img">
    						<img src="/image/product1.jpg">
    					</div>
    				</div>
    				<div class="col-lg-6 col-md-6">
    					<div class="pm-info">
    						<div class="pm-heading">
    							<h2>
    								gemstone
    							</h2>
    						</div>
    						<div class="wish-price">
								<del>
									$80.00
								</del>
								<span>
									$49.00
								</span>
							</div>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut neque risus. Nunc urna mauris, auctor vitae ipsum ut, pharetra vestibulum dui. Ut accumsan
							</p>

							<div class="pm-flex">
								<div class="counter">
								<a class="counter__minus cart-qty-minus"><span>-</span></a>
									<input name="counter" type="text" class="counter__input qty" value="1" readonly="">
								<a class="counter__plus cart-qty-plus" id="counter__minus_q3"><span>+</span></a>
								</div>
								<div class="wish-btn">
									<button>
										<a href="add-cart.html">
											add to cart
										</a>
									</button>
								</div>
							</div>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script type="text/javascript">


    $(document).on('click', '.pagination a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page)
;
         });

         function fetch_data(page)

         {
            let search_string = $("#search").val();

            var id = $("#category_id").val();
            
          $.ajax({
           url:"/search_product/" + id +"?page="+page,
           method: 'GET',
           data:{search_string:search_string,id:id},
           success:function(res)
           {
            $('#table_data').html(res);
            $('#search').val(search_string);
           }
          });
         }
         
       
  


    //search product
$(document) .on('keyup',function(e){
    e.preventDefault();
     let search_string = $("#search").val();
     var id = $("#category_id").val();
     $.ajax({
         url:"{{url('/search_product')}}/"+id,
         method: 'GET',
        data:{search_string:search_string,id:id},
        success:function(res){

             $('#table_data').html(res);
            if(res. status== 'nothing_found'){
                $('#table_data').html('<span class="text-danger"> '+'Nothing Found'+'</span>');
        }
    }
    });

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


        $('.read-more').click(function() {
	        $(this).prev().slideToggle();
	        if (($(this).text()) == "Read More") {
	            $(this).text("Read Less");
	        } else {
	            $(this).text("Read More");
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


	        

	var incrementPlus;
	var incrementMinus;

	var buttonPlus  = $(".cart-qty-plus");
	var buttonMinus = $(".cart-qty-minus");

	var incrementPlus = buttonPlus.click(function() {
		var $n = $(this)
			.parent(".counter")
			.find(".qty");
		$n.val(Number($n.val())+1 );
	});

	var incrementMinus = buttonMinus.click(function() {
			var $n = $(this)
			.parent(".counter")
			.find(".qty");
		var amount = Number($n.val());
		if (amount > 1) {
			$n.val(amount-1);
		}
	});


    $(".inner-list-product span").click(function(){
				$(this).parent(".inner-list-product").toggleClass("bg-color");
				$(this).parent(".inner-list-product").siblings(".sub-product").slideToggle();

			});




	        
</script>
</body>
</html>

@endsection

