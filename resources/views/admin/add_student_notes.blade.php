@extends('admin.layout.header')

@section('content')

 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               
               <a href=""><span>Update Notes</span></a>
             
            
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
          
            <h4 class="mb-4">Update Notes</h4>
          
         </div>
         <form action="{{url('admin/store_student_notes')}}/{{$member_id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">

                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Notes</label>
                        </div>
                        <div class="col-lg-10 data">
                        <select name="notes[]" id="notes" multiple >
                           <option value="">Select Notes</option>

                             @foreach($student_notes as $sn)

                              
                              <option value="{{ $sn->id}}">{{ $sn->notes_title}}</option>
                         

                             @endforeach 
                                       
                       </select>
                         @if($errors->has('notes')) <p class="error_mes">{{ $errors->first('notes') }}</p> @endif

                        </div>
                     </div>   
                  </div>
               </div>
                  <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Start Date</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="date" placeholder="Enter date" name="start_date" value="" >
                             @if($errors->has('start_date')) <p class="error_mes">{{ $errors->first('start_date') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

                  <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>End Date</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="date" placeholder="Enter date" name="end_date" value="" >
                             @if($errors->has('end_date')) <p class="error_mes">{{ $errors->first('end_date') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>      
                       
               <div class="uplode-btn" style="text-align: center;">
                  <button>submit</button>
                  <a href="{{url('admin/home')}}">Back to Home?</a>
               </div>
            </div>
         </div>

         </form>
      </div>
     




@endsection