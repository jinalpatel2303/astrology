<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
	<link rel="icon" href="image/logo.png">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login page</title>
</head>
<body>
	<div class="bg-login">
		<div class="container">
			<div class="row new-row">
				<div class="col-lg-12">
					<div class="login-form">
						<h2>
							Login to your account
						</h2>

						<div id="message"></div>
						<form method="get">
							
							<div class="row">
								<div class="col-lg-12">
									<div class="re-name">
										<input type="text" name="username" id="username" placeholder="user name">
										<span>
											<i class="fa-solid fa-user"></i>
										</span>
										<p class="text-danger error-text username_err"></p>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="re-name">
										<input type="password" name="password" id="password" placeholder="password">
										<span>
											<i class="fa-solid fa-lock"></i>
										</span>
										<p class="text-danger error-text password_err"></p>
									</div>
								</div>
							</div>
							<div class="forget">
								<a href="changepassword.html">
									forget password?
								</a>
							</div>

							<div class="col-lg-12">
								<div class="login-btn">
									<button type="submit" id="submit1">
										login
									</button>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="ac-link">
									<a href="{{url('/register')}}">
										create an new account?
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
    <script type="text/javascript">

    	
    	
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

    </script>
</body>
</html>