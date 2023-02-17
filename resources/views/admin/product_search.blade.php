<table class="table table-bordered table-striped">
               <thead>
                  <tr>
                    <!-- <th><input type="checkbox" name="" id="chkcheckAll"/></th> -->
                     <th>Sr.No</th>
                     <th>Image</th>
                     <th>Product Name</th>
                     <th>Price</th>
                     <th>Quantity</th>
                     <th>Category</th>
                     <th>Sub Category</th>
                     <th>Action</th>
                     <th>View Detail</th>
                  </tr>
               </thead>

               @foreach($product as $key=>$ad)
                 <tbody class="case_studies_{{$ad->id}}">
                    <tr>
                        <!-- <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$ad->id}}"/></td> -->
                        <td>{{$key+1}}</td>

                        <td>
                            @foreach($product_image as $pi)

                            @if($ad->id == $pi->product_id)

                            <img src="/uploads/{{$pi->image}}" width="100" height="100">

                            @break;

                            @endif

                            @endforeach
                        </td>
                                              
                        <td>{{$ad->product_name}}</td> 

                        <td>{{$ad->price}}</td>

                        <td>{{$ad->quantity}}</td>
                        <td>
                            @foreach($product_category as $cp)

                            @if($cp->id == $ad->category_id)

                            {{$cp->category}}

                            @endif

                            @endforeach
                        </td> 
                        <td>
                            @foreach($product_sub_category as $csp)

                            @if($csp->id == $ad->sub_category_id)

                            {{$csp->sub_category}}

                            @endif

                            @endforeach
                        </td> 

                          
                        <td>
                          <a class="icon__1" href="{{url('admin/add_product_data')}}/{{$ad->id}}"><i class="fas fa-edit"></i></a>
                           <a  class="icon__2" onclick="delete_cs_banner_list({{$ad->id}})"><i class="fas fa-trash-alt"></i></a>

                        </td>
                        <td class="clo">
                           <button class="clo btn0"><a href="{{url('/admin/view_product')}}/{{$ad->id}}">view</a></button>
                        </td>
                        
                    </tr>
                 </tbody>
               @endforeach
              
            </table>

            {{ $product->links('admin.pagination') }}