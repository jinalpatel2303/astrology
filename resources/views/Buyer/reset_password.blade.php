<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>user-login</title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
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
</head>
<style type="text/css">
	
	
	.bg-user-login{
    margin:15% auto;
}

.forget-link {
    padding:12px 0px;
}
.forget-link:hover a{
    color:#ffba33;
}

.forget-link a{
    text-decoration: none;
    font-size: 18px;
    font-weight: 600;
    color: black;
    text-transform: capitalize;
    font-family: unset;
}
p.error_mes {
    color: red;
}
</style>
<body class="body">
	
	<div class="bg-user-login">
		<div class="container">
			<div class="change-password">
				<div class="password-title">
					<h2>
						Reset Password
					</h2>
					<span>
						<i class="fa-solid fa-key"></i>
					</span>
				</div>


               @if ($message = Session::get('success'))
               <div  id="hideDiv1" class="alert alert-success alert-block" >
                <!--     <input type="text" class="close" data-dismiss="alert"></input> -->
                <strong style="padding-top : 5px !important; display: inline-block;">{{ $message }}</strong>
                </div>
              @endif

                 @if ($message = Session::get('error'))
               <div  id="hideDiv" class="alert alert-danger alert-block" >
                <!--     <input type="text" class="close" data-dismiss="alert"></input> -->
                <strong style="padding-top : 5px !important; display: inline-block;">{{ $message }}</strong>
                </div>
              @endif


				<form action="{{url('Buyer/update_password')}}/{{$id}}" method="post">
					@csrf
					
					<div class="change-name">
						<label>password:</label>
						<input type="e-mail" name="password" placeholder="enter your new password">
						 @if($errors->has('password')) <p class="error_mes">{{ $errors->first('password') }}</p> @endif
					</div>
					
					<div class="change-name">
						<label>confirm password:</label>
						<input type="password" name="confirm_password" placeholder="enter your confirm_password">
						 @if($errors->has('confirm_password')) <p class="error_mes">{{ $errors->first('confirm_password') }}</p> @endif
					</div>
					
					<div class="forget-link">
						<a href="{{url('Buyer/buyer_login')}}">
							Back to login?
						</a>
					</div>

					<div class="re-btn">
						<button type="submit">
							submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <script type="text/javascript">

    $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });

      $(function() {
                 setTimeout(function() { $("#hideDiv1").fadeOut(3000); }, 3000)

             });
         </script>

</body>
</html>
