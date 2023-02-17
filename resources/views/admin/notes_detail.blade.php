@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Notes Details</span></a>
            </li>
         </ul>
      </div>

   


      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Notes Details</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
              
            </div>
         </div>
        <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sear-main">
                    
                    
                  </div>
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                     
                   <th>Date</th>

                   <th>{{$date}}</th>
                 
                 
                  </tr>
                  <tr>
                     
                   <th>Course</th>

                   <th>{{$course}}</th>
                 
                 
                  </tr>
                  <tr>
                     
                   <th>Category</th>

                   <th>{{$category}}</th>
                 
                 
                  </tr>
                   <tr>
                     
                   <th>Notes Title</th>

                   <th>{{$notes_title}}</th>
                 
                 
                  </tr>

                   <tr>
                     
                   <th>Description</th>

                   <th>{{$description}}</th>
                 
                 
                  </tr>

                   <tr>
                     
                   <th>file</th>

                   <th>{{$file}} <a id="moo" href="/uploads/notes/{{$file}}#toolbar=0">_click here</a></th>

                  <!--  <th>{{$file}} <a id="{{$file}}" class="pdf_view">_click here</a></th>
 -->
                  </tr>
               </thead>

              </table>




         
         </div>
      </div>

         <div class="btn1-main">
                <button class="btn1 delete-btn1"><a href="{{url('admin/notes')}}" style="color: white;">Back</a></button>
              
            </div>

            <style type="text/css">

                .btn1-main{

                    position: relative;
                }

                
                .btn1 {
  
                top: 0px !important; 
 
                }
                .pdf_view{

                   color: bule;
                   cursor: pointer;

                }
               
            </style>

         
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/jscript">

  $(document).ready(function() {
    $("a").click(function(event) {

           var BASE_URL = "{{ url('/') }}";

          var openpopup =BASE_URL+'/uploads/'+event.target.id;


          $('.pro-table').html('<iframe src="http://docs.google.com/gview?url='+openpopup+'&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>');

        

    });
});

 
</script>
       

@endsection