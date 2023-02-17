
$('.grow_spin').click(function(){

          var sub_course_id = $('#sub_course_id').val();
          var price = $('#sub_course_price').val();
         
           $('#price').val(price);

           $('#selected_course').val(sub_course_id);

           $('#details-modal').modal('show');
 
    });

    $('#pay_btn').click(function(){

         $(".error-text").empty();
            var _token = $("input[name='_token']").val();  
           
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var email = $('#email').val();
            var mobile_no = $('#mobile_no').val();
            var price= $('#price').val();
            var selected_course= $('#selected_course').val();


            $.ajax({
                url: '/pay_for_course',
                type:'POST',
              data:{_token:_token,email:email,first_name:first_name,last_name:last_name,mobile_no:mobile_no , price:price,selected_course:selected_course},
              beforeSend: function(){

                             $('#loading-bar-spinner').show();
 
                             $('#overlay').fadeIn()
                             
                             $('#pay_btn').prop('disabled', true);
 
                           },

                        complete: function(){
                            
                              $('#pay_btn').removeAttr("disabled");

                           $('#loading-bar-spinner').hide();
 
                         },
                         
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

                                                                url: '/pay_amount',
                                                                type:'post',
                                                                data:{_token:_token,email:data.email,payment_id:response.razorpay_payment_id, student_payment_id:data.student_payment_id,student_rid:data.student_rid, selected_course:data.selected_course, price:data.price},

                                                                success: function(response){
                                                                  
                                                                    if($.isEmptyObject(response.error)){
                                                        
                                                                         var BASE_URL = "{{ url('/') }}";

                                                                         var id = response.student_rid;

                                                                           $.ajax({
                                                                                                    
                                                                                     url:'/change_student_status/'+id,
                                                                                     type:'GET',
                                                                                     dataType: "json",
                                                                                               
                                                                                     success: function(response){  
             

                                                                                        window.location='/payment_success'
                                                                         
                                                                                        },

                                                                                          complete: function(){
                                                                                             $('#loaderIcon').hide();
                                                                                            },
                                                                 
                                                                                      error: function(response) {
                                                                
                                                                                            alert('error');
                                                                          
                                                                                         },        
                                                                                  
                                                                                     });
                                                                                           
                                                                               }else{

                                                                                      alert('something went wrong !!');
                                                                                 }
                                                                             }
                                                                        });
                                                             },
           
                                                  "prefill": {
                                                    "name": data.name,
                                                    "email": data.email,
                                                    "contact": data.phone
                                                 },
                                                "notes": {
                                                    "address": data.address
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

