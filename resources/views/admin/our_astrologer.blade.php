@extends('admin.layout.header')

@section('content')

  <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               <a href=""><span>Consultation Detail</span></a>
            </li>
         </ul>
      </div>

      <style type="text/css">
         .set_width{

            height: 200px;
            width: 200px;
            object-fit: cover;
         }
      </style>

      <div class="page mt-4 hosting-page title1" style="display: block;">
         <div class="list1">
            <h4 class="mb-0">Our Astrologer List</h4>

            
            <div class="btn1-main">
                <!-- <button class="btn1 delete-btn1">all delete</button> -->
                <button class="btn1"><a href="{{url('admin/add_our_astrologer_data')}}/0" style="color:white;">ADD</a></button>
            </div>
         </div>
         <div class="sear-list">
            <div class="row">
               <div class="col-lg-12">
                  <div class="sear-main">
                    <!--  <label><input type="search" class="form-control " placeholder="Find..."></label> -->
                  </div>
               </div>
            </div>
         </div>
         <div class="pro-table table-responsive">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <!-- <th><input type="checkbox" name="" id="chkcheckAll"/></th> -->
                     <th>Sr.No</th>
                     <th>Image</th>
                     <th>Name Of Astrologer</th>
                     <th>Expertise</th>
                     <th>Experience in Year</th>
                     <th>Price/Min</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Action</th>
                  </tr>
               </thead>

               @foreach($our_astrologer as $key=>$ad)
                 <tbody class="case_studies_{{$ad->id}}">
                    <tr>
                        <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ad->id}}"/></td> -->
                        <td>{{$key+1}}</td>
                        
                        <td>
                            <img src="/uploads/{{$ad->image}}" width="100" height="100">
                        </td>

                        <td>{{$ad->name}}</td>

                        <td>
                           @foreach($expertise_list as $tcl)

                           @if($ad->id == $tcl->list_id)

                           {{$tcl->expertise}}<br>

                           @endif

                           @endforeach
                        </td>

                       <td>{{$ad->experience}}</td>

                       <td>{{$ad->price}}</td>

                        <td>{{$ad->title}}</td>

                       <td>{!!$ad->description!!}</td>
                        
                        <td>
                          <a class="icon__1" href="{{url('admin/add_our_astrologer_data')}}/{{$ad->id}}"><i class="fas fa-edit"></i></a>
                           <a class="icon__2" onclick="delete_cs_banner_list({{$ad->id}})"><i class="fas fa-trash-alt"></i></a>

                        </td>
                        
                    </tr>
                 </tbody>
               @endforeach
              
            </table>
         
         </div>
      </div>

    
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
          
      
      <script type="text/javascript">


        $(function() {
                 setTimeout(function() { $("#hideDiv").fadeOut(3000); }, 3000)

             });
             
               function delete_cs_banner_list($id){
                
                  swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Yes, delete it!',
                            className : 'btn btn-success'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {

                               var BASE_URL = "{{ url('/') }}";
            
                                var id = $id;
            
                                      $.ajax({
            
                                        
                                            url:BASE_URL+'/admin/delete_our_astrologer/'+id,
                                            type:'GET',
                                            dataType: "json",

            
                                            success: function(response){
            
                                                  $('.case_studies_'+id).hide();
                     
                                                 },
             
                                        error: function(response) {
            
                                                 alert('error');
                      
                                            },        
                      
                                       });

                      } else {
                       swal.close();
                     }
              });

           }



      </script> 




@endsection