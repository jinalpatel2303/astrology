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
	.re-name textarea {
	    width: 100%;
	    height: 100px;
	    border-radius: 5px;
	    border: none;
	    margin: 16px 0px;
	    font-size: 16px;
	    font-weight: 600;
	    text-transform: capitalize;
	    padding: 0px 18px;
	    position: relative;
	}

	.re-name textarea:focus{
	    outline:none;
	    border:none;
	    background-color:white;
	    border:2px solid #ffba33;
	}
	.re-name textarea::-webkit-inner-spin-button {
	  -webkit-appearance: none;
	}
	.re-form .label{
		font-weight: 700;
		display: inline-block;
    	margin-bottom: 0.5rem;
    	padding-left: 18px;
	}
	.details_image img{
		width: 150px;
	    height: auto;
	    object-fit: cover;
	    margin-bottom: 20px;
	}
</style>
<body>
	<div class="bg-register">
		<div class="container">
			<div class="re-form">
				<h2>
					Send Your Review!
				</h2>

				@if ($message = Session::get('error'))
            <div  id="hideDiv" class="alert alert-success alert-block" >
                <!--     <input type="text" class="close" data-dismiss="alert"></input> -->
                <strong style="padding-top : 5px !important; display: inline-block;">{{ $message }}</strong>
             </div>
           @endif
           
				<form action="{{url('/submit_review')}}" method="post" enctype="multipart/form-data"> 
					@csrf
					<div class="row">
						<div class="col-lg-12">
							<div class="col-lg-4 label">
                           		<label>Image</label>
                        	</div>
                        	<div class="details_image">
		                        <img src="" id="blah">
		                     </div>
							<div class="re-name">
								<input type="file" name="image" onchange="readURL(this);">
								@if($errors->has('image')) <p class="error_mes">{{ $errors->first('image') }}</p> @endif
							</div>
						</div>

						<div class="col-lg-12">
							<div class="re-name">
								<input type="text" name="name" placeholder="name">
								@if($errors->has('name')) <p class="error_mes">{{ $errors->first('name') }}</p> @endif
								<span>
									<i class="fa-solid fa-user"></i>
								</span>
							</div>
						</div>
												

						<div class="col-lg-12">
							<div class="re-name">
								<input type="text" name="address" placeholder="address">
								@if($errors->has('address')) <p class="error_mes">{{ $errors->first('address') }}</p> @endif
								<span>
									<i class="fa-solid fa-location-dot"></i>
								</span>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="re-name">
								<textarea name="description" placeholder="Write Your Response ..."></textarea>
								@if($errors->has('description')) <p class="error_mes">{{ $errors->first('description') }}</p> @endif
								
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
							<div class="re-btn-flex">
								<div class="re-btn">
									<button type="submit">
										Submit
									</button>
								</div>
							</div>
						</div>
						<p class="log_account">Back to Home<a href="{{url('/')}}">Click here</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script type="text/javascript">

           function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
</html>