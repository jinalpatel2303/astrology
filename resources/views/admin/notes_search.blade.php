<table class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <th><input type="checkbox" name="" id="chkcheckAll"/></th>
                  
                     <th>Date</th>
                     <th>Course</th>
                     <th>Category</th>
                     <th>Notes Title</th>
                     <th>Action</th>
                  </tr>
               </thead>

                <tbody  >

               @foreach($data as $key=>$n)

                
                    <tr id="notes_list_{{$n->id}}">
                        <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$n->id}}"/></td>
                     
                        
                        <td>
                            <?php

                            echo date('d-m-Y', strtotime($n->date));

                            ?>
                         
                        </td>
                      
                        

                        <td>

                        
                            

                            {{$n->sname}}
                            


                        </td>

                        <td>

                           {{$n->cname}}

                        </td>

                        <td>{{$n->notes_title}}</td>

                        
                        <td>
                          <a class="icon__1" href="{{url('admin/view_notes_detail')}}/{{$n->id}}"><i class="fa-solid fa-eye"></i></a>
                          <a class="icon__1" href="{{url('admin/update_notes')}}/{{$n->id}}"><i class="fas fa-edit"></i></a>
                           <a class="icon__2" onclick="delete_notes({{$n->id}})"><i class="fas fa-trash-alt"></i></a>

                        </td>
                        
                    </tr>
               
               @endforeach

                 </tbody>
              
            </table>

            {{ $data->links('admin.pagination') }}