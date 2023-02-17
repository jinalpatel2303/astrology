<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Astrology</title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
	<link rel="icon" href="/image/logo.png">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
	</title>
</head>
<body>
        
            <div class="bg-half-payment">
                <div class="container">
                    
                    <div class="re-form">

                           <div id="message"></div>
                        <h2>
                            Details
                        </h2>

                          <div id="loaderIcon" class="spinner-border text-primary" style="display:none" role="status">
                             <span class="sr-only">Loading...</span>
                        </div>
            
            
                        <form method="post"> 
                              {{ csrf_field() }}                 

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="text" name="first_name" placeholder="first name" id="first_name" >
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <p class="text-danger error-text first_name_err"></p>

                                    </div>

                                </div>
                        
                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="text" name="last_name" placeholder="last name" id="last_name" >
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                     
                                        <p class="text-danger error-text last_name_err"></p>
                                    </div>
                                </div>
                        
                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="email" name="email" placeholder="email address"  id="email" >
                                        <span>
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                           <p class="text-danger error-text email_err"></p>
                                    </div>
                                </div>
                    
                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="number" name="mobile_no" placeholder="mobile number" id="mobile_no" >
                                        <span> 
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <p class="text-danger error-text mobile_no_err"></p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="re-drop">
                                       <select name="course" id="course"  >  

                                         	<option>
                                       		  Select Course
                                       		</option>

                                            @foreach($course_master as $cm)

                                       		<option value="{{$cm->id}}">{{$cm->name}}</option>
                                            @endforeach
                                       	
                                       </select>
                                        
                                        <p class="text-danger error-text course_err"></p>
                                    </div>
                                </div>

                                   <div class="col-lg-12">
                                    <div class="re-drop">
                                       <select name="category" id="category" >
                                         	<option>
                                       			Select Category
                                       		</option>
                                       		
                                       </select>
                                        
                                        <p class="text-danger error-text category_err"></p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="re-name">
                                        <input type="number" name="amount" placeholder="Amount" id="price" value="" >
                                        <span> 
                                          <i class="fa-sharp fa-solid fa-indian-rupee-sign"></i>
                                        </span>
                                        <p class="text-danger error-text price_err"></p>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="re-btn-flex">
                                        <div class="re-btn ">
                                            <button type="submit" id="rzp-button1">
                                                PAY
                                            </button>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>  

<script type="text/javascript">

     $('#rzp-button1').click(function(e){
        e.preventDefault();
       

         $(".error-text").empty();
            var _token = $("input[name='_token']").val();             
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var email = $('#email').val();
            var mobile_no = $('#mobile_no').val();
            var price= $('#price').val();
            var category= $('#category').val();

            var course= $('#course').val();


            $.ajax({
                url: '/half_payment',
                type:'POST',
              data:{_token:_token,email:email,first_name:first_name,last_name:last_name,mobile_no:mobile_no , price:price,category:category, course:course},
              
                success: function(data) {
                    if($.isEmptyObject(data.error)){

                        if(data.status==0){

                            $("#message").html("Complete Your Registration <a href='http://127.0.0.1:8000/register'>Click here</a>");

                        }else{

                                $('#first_name').val('');
                                $('#last_name').val('');
                                $('#email').val('');
                                $('#mobile_no').val('');
                                $('#price').val('');
                                $('#selected_course').val('');



                             var options = {

                                                /*"key": "rzp_test_y5JaNSByNnd2GP",*/ 

                                               

                                                "key":"rzp_test_f5Nc4nKOhOrZX0", 

                                                "amount": "100",
                                                "currency": "INR",
                                                "name": data.first_name,
                                                "description": "Thank You for choosing us",
                                                "image": "https://images.unsplash.com/photo-1547699224-0924faf995c6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8ZG93bmxvYWR8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60",
                                     
                                                "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",


                                                 

                                                "handler": function (response){

                                                     $('#loaderIcon').show();

                                                     $.ajax({

                                                                url: '/pay_half_payment',
                                                                type:'post',
                                                                data:{_token:_token,email:data.email,payment_id:response.razorpay_payment_id, student_payment_id:data.student_payment_id,student_rid:data.student_rid, category:data.category, price:data.price},

                                                                success: function(response){
                                                                  
                                                                    if($.isEmptyObject(response.error)){
                                                                   

                                                                      window.location='/payment_success';

                                                                    }

                                                                                 
                                                                },

                                                            complete: function(){
                                                                  $('#loaderIcon').hide();
                                                                },
                                                                               


                                       

                                                             });
                                                         },
           
                                                  "prefill": {
                                                    "name": data.first_name,
                                                    "email": data.email,
                                                    "contact": data.mobile_no
                                                 },
                                                
                                                "theme": {
                                                    "color": "#3399cc"
                                                }
                                            };

                                        var rzp1 = new Razorpay(options);
                                    
                                            rzp1.open();



                        }



                      

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




       $(document).ready(function(){

            $('select[name="course"]').on('change',function(){
                var id=$(this).val();
         
          if(id){

                $.ajax({

                     url:'get_category_data/'+id,
                     type:'GET',
                     dataType:'json',
              success:function(data){

                    console.log(data);

                  /*  var json = JSON.stringify(data);
                      console.log(json);
                    */

                       $('select[name="category"]').empty(); 

                       $('select[name="category"]').append('<option value="">Select Category </option>');


                       $.each(data,function(key,value){

                       $('select[name="category"]').append('<option value="'+value.id+'">'+value.name+'</option>');

                     });

                   }

                }); 
              }else{

                   $('select[name=""]').empty();
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

      div#message {
          margin-left: 16px;
          font-weight: 600;
          font-size: 17px;
      }

      div#loaderIcon {
   
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 3;
    color: black!important;
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
       

</body>
</html>