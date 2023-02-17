<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
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

</head>
<style type="text/css">
	.error_mes{
		color: red;
	}
</style>
<body>
	<div class="bg-register">
		<div class="container">
			<div class="re-form">
				<h2>
					Register Now!
				</h2>
				@if ($message = Session::get('error'))
                <div  id="hideDiv" class="alert alert-success alert-block" >
                    <!--     <input type="text" class="close" data-dismiss="alert"></input> -->
                    <strong style="padding-top : 5px !important; display: inline-block;">{{ $message }}</strong>
                 </div>
               @endif
				<form action="{{url('/register_user')}}" method="post"> 
					@csrf
					<div class="row">
						<div class="col-lg-12">
							<div class="re-name">
								<input type="text" name="first_name" placeholder="first name">
								@if($errors->has('first_name')) <p class="error_mes">{{ $errors->first('first_name') }}</p> @endif
								<span>
									<i class="fa-solid fa-user"></i>
								</span>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="re-name">
								<input type="text" name="last_name" placeholder="last name">
								@if($errors->has('last_name')) <p class="error_mes">{{ $errors->first('last_name') }}</p> @endif
								<span>
									<i class="fa-solid fa-user"></i>
								</span>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="re-name">
								<input type="email" name="email" placeholder="email id">
								@if($errors->has('email')) <p class="error_mes">{{ $errors->first('email') }}</p> @endif
								<span>
									<i class="fa-solid fa-envelope"></i>
								</span>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="re-name">
								<input type="number" name="mobile_no" placeholder="mobile number">
								@if($errors->has('mobile_no')) <p class="error_mes">{{ $errors->first('mobile_no') }}</p> @endif
								<span> 
									<i class="fa-solid fa-phone"></i>
								</span>
							</div>
						</div>

						<!--<div class="col-lg-12">-->
						<!--	<div class="re-name">-->
						<!--		<input type="password" name="" placeholder="password">-->
						<!--		<span>-->
						<!--			<i class="fa-solid fa-lock"></i>-->
						<!--		</span>-->
						<!--	</div>-->
						<!--</div>-->

						<!--<div class="col-lg-12">-->
						<!--	<div class="re-name">-->
						<!--		<input type="password" name="" placeholder="confirm password">-->
						<!--		<span>-->
						<!--			<i class="fa-solid fa-lock"></i>-->
						<!--		</span>-->
						<!--	</div>-->
						<!--</div>-->

						<div class="col-lg-12">
							<div class="re-check">
								<label>
									select course:
								</label><br>
								<div class="row">

									  @foreach($course_master as $cm)
									<div class="col-lg-6 col-md-6">
										<input type="checkbox" id="subject{{$cm->id}}" value="{{$cm->id}}" name="subject[]">
										<label for="subject{{$cm->id}}">{{$cm->name}}</label>
									</div>
									@endforeach
								
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="re-btn-flex">
								<div class="re-btn">
									<button type="submit" >
										register
									</button>
								</div>
							</div>
						</div>
						<p class="log_account">Already Have An Account?<a href="{{url('/login')}}">login here</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>