<html>
<head>
  <title>Student</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="/css/home.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
      
</head>
<style type="text/css">
    .log_account {
    text-align: center;
    margin: 0;
    padding-top: 20px;
    font-weight: 500;
    font-size:20px;
}
.change-password {
    width: 70%;
    margin: 15% auto;
    box-shadow: 0px 0px 30px 1px rgb(0 0 0 / 20%);
    border-radius: 8px;
    background-size: cover;
}
.fa-solid, .fas {
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    margin-top: 33px;
}
.change-name textarea {
    width: 100%;
    height: 55px;
    border-radius: 5px;
    background-color: #F6F7F9;
    border: none;
    font-size: 16px;
    font-weight: 600;
    text-transform: capitalize;
    padding: 0px 18px;
    position: relative;
}
p.error_mes {
    color: red;
}
</style>

<div class="bg-change">
        <div class="container">
            <div class="change-password">
                <div class="password-title">
                    <h2>
                        sign in to your account
                    </h2>
                    <span>
                        <i class="fa-solid fa-key"></i>
                    </span>
                </div>
                <form action="{{url('Buyer/store_buyer')}}" method="post">
                    @csrf
                    <div class="change-name">
                        <label>name:</label>
                        <input type="text" name="name"  placeholder="enter your name">
                           @if($errors->has('name')) <p class="error_mes">{{ $errors->first('name') }}</p> @endif
                    </div>
                    <div class="change-name">
                        <label>e-mail:</label>
                        <input type="e-mail" name="email" placeholder="enter your e-mail">
                           @if($errors->has('email')) <p class="error_mes">{{ $errors->first('email') }}</p> @endif
                    </div>
                    <div class="change-name">
                        <label>phone number:</label>
                        <input type="number" name="mobile" placeholder="enter your phonenumber">
                           @if($errors->has('mobile')) <p class="error_mes">{{ $errors->first('mobile') }}</p> @endif
                    </div>
                    
                    <div class="change-name">
                        <label>password:</label>
                        <input type="password" name="password" placeholder="enter your address">
                           @if($errors->has('password')) <p class="error_mes">{{ $errors->first('password') }}</p> @endif
                    </div>
                    <div class="change-name">
                        <label>confirm password:</label>
                        <input type="password" name="confirm_password" placeholder="enter your address">
                           @if($errors->has('confirm_password')) <p class="error_mes">{{ $errors->first('confirm_password') }}</p> @endif
                    </div>

                    <div class="change-name">
                        <label>address:</label>
                        <textarea type="text" name="address"  placeholder="enter your address"></textarea>
                           @if($errors->has('address')) <p class="error_mes">{{ $errors->first('address') }}</p> @endif
                    </div>

                    <div class="re-btn">
                        <button type="submit">
                            sign in
                        </button>
                    </div>
                    <p class="log_account">Go Back To<a href="{{url('Buyer/buyer_login')}}">login Here</a></p>
                </form>
            </div>
        </div>
    </div>




    
</body>
</html>

 