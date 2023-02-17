<table class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <!-- <th><input type="checkbox" name="" id="chkcheckAll"/></th> -->
                     <th>Sr.No</th>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Enrollment No.</th>
                     <th>City</th>
                     <th>Category</th>
                     <th>Sub Category</th>
                     <th>Date</th>
                     <th>Action</th>
                  </tr>
               </thead>

               @foreach($student_alumni as $key=>$ad)
                 <tbody class="case_studies_{{$ad->id}}">
                    <tr>
                        <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ad->id}}"/></td> -->
                        <td>{{$key+1}}</td>
                        <td>
                           <img src="/uploads/{{$ad->image}}" width="100" height="100">
                        </td>
                        
                        <td>
                            {{$ad->name}}
                        </td>
                        
                        <td>
                            {{$ad->enrollment_no}}
                        </td>

                        <td>
                            {{$ad->city}}
                        </td>

                        <td>
                            @foreach($course_master as $cm)

                            @if($cm->id == $ad->category_id)
                            {{$cm->name}}
                            @endif

                            @endforeach
                        </td>

                        <td>
                           @foreach($student_course_list as $scl)

                           @if($scl->studentalumni_id == $ad->id)

                            {{$scl->sub_category}}<br>

                           @endif
                           
                           @endforeach
                        </td>

                        <td>
                            {{$ad->date}}
                        </td>
                        <td>
                          <a class="icon__1" href="{{url('admin/add_student_alumni_data')}}/{{$ad->id}}"><i class="fas fa-edit"></i></a>
                           <a class="icon__2" onclick="delete_cs_banner_list({{$ad->id}})"><i class="fas fa-trash-alt"></i></a>

                        </td>
                        
                    </tr>
                 </tbody>
               @endforeach
              
            </table>


            {{ $student_alumni->links('pagination') }}