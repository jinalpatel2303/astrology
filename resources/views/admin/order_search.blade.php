<table class="table table-bordered table-striped">
               <thead>
                  <tr>
                  <!--   <th><input type="checkbox" name="" id="chkcheckAll"/></th> -->
                  
                     <th>Date</th>
                     <th>product_Image</th>
                     <th>product Name</th>
                     <th>Qty</th>
                     <th>Price</th>
                      <th>Name</th>
                       <th>Email</th>

                       <th>status</th>
                     <th>Action</th>
                  </tr>
               </thead>

                <tbody>

               @foreach($order_data as $key=>$n)

                
                    <tr id="order_list_{{$n->id}}">
                       <!--  <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$n->id}}"/></td> -->
                     
                        
                        <td>
                            <?php

                             echo date('d-m-Y', strtotime($n->date));

                            ?>
                         
                        </td>

                        <td>

                            @foreach($product_image as $pi)

                            @if($pi->product_id==$n->product_id)


                             <img src="/uploads/{{$pi->image}}" height="100" width="100">

                             @break


                            @endif

                            @endforeach
                            


                        </td>

                        <td>

                              {{$n->product_name}}
                            
                        </td>

                        <td>

                              {{$n->qty}}
                            
                        </td>

                        <td>

                              {{$n->price}}
                            
                        </td>


                             
                             

                      
                        <td>
                                {{$n->name}}
                        
                        </td>

                        <td>

                               {{$n->email}}

                        </td>

                        <td>

                             @if($n->status==0)

                                <h5 onclick="change_order_status({{$n->id}})">pending</h5>

                                @elseif($n->status==1)

                                <h5>complete</h5>

                                @else

                                <h5>cancelled</h5>




                             @endif
                            
                            
                        </td>

                        

                        
                        <td>
                          <a class="icon__1" href="{{url('admin/view_notes_detail')}}/{{$n->id}}"><i class="fa-solid fa-eye"></i></a>
                        

                        </td>
                        
                    </tr>
               
               @endforeach

                 </tbody>
              
            </table>

             {{ $order_data->links('pagination') }}

     