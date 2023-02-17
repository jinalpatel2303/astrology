@extends('admin.layout.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
 <div class="head-banner">
         <ul class="breadcrumb">
            <li>
               <a href="{{url('admin/home')}}">Home</a>
            </li>
            <li>
               @if($id==0)
               <a href=""><span>Add Product</span></a>
               @else
               <a href=""><span>Update Product</span></a>
               @endif
            </li>
         </ul>
      </div>
      <div class="page mt-4 hosting-page title1 page-with" style="display: block;">
         <div class="list1">
           @if($id==0)
            <h4 class="mb-4">Add Product</h4>
          @else
            <h4 class="mb-4">Update Product</h4>
            @endif
         </div>
         <form action="{{url('admin/store_add_product_data')}}/{{$id}}" method="post" enctype="multipart/form-data">
         	@csrf
         <div class="detail table-responsive">
            <div class="details_main">

                <div class="details_inner">

                  <div class="part-1">
                     <div class="col-lg-4 label">
                           <label>Sub Image</label>
                     </div>
                     <div class="col-md-12 d-flex justify-content-between">
                        @if($id!=0)
                        @foreach($product_image as $pi)
                        <img id="blah1" src="/uploads/{{$pi->image}}" width="100px" height="100px" alt="">
                        <a href="{{url('/admin/update_product_image')}}/{{$pi->id}}"><i class="fas fa-edit"></i></a>
                        <a href="{{url('/admin/delete_product_image')}}/{{$pi->id}}"><i class="fas fa-trash-alt"></i></a>
                       @endforeach
                       @endif
                     </div>  
                  </div> 
               </div>

               <div class="details_inner">

                  <div class="part-1">
                     <div class="col-lg-4 label">
                           <label>Image</label>
                     </div>
                     <div class="details_sub">
                        <input type="file" name="image[]" multiple onchange="readURL(this);" >
                          @if($errors->has('m_image')) <p class="error_mes">{{ $errors->first('m_image') }}</p> @endif
                      <!-- <img id="blah" src="#" alt=""> -->
                     </div>  
                  </div> 

                              
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Category Name</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="text" placeholder="Enter product_name" name="product_name" value="{{$product_name}}" >
                             @if($errors->has('product_name')) <p class="error_mes">{{ $errors->first('product_name') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Price</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="number" placeholder="Enter price" name="price" value="{{$price}}" >
                             @if($errors->has('price')) <p class="error_mes">{{ $errors->first('price') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Quantity</label>
                        </div>
                        <div class="col-lg-10 data">
                           <input type="number" placeholder="Enter quantity" name="quantity" value="{{$quantity}}" >
                             @if($errors->has('quantity')) <p class="error_mes">{{ $errors->first('quantity') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Category</label>
                        </div>
                        <div class="col-lg-10 data">
                           <select name="category_id" id="category">
                               <option value="{{$category_id}}">{{$category_name}}</option>
                               @foreach($product_category as $pc)
                               @if($pc->id != $category_id)

                               <option value="{{$pc->id}}">{{$pc->category}}</option>
                               
                               @endif
                               @endforeach
                           </select>
                             @if($errors->has('category')) <p class="error_mes">{{ $errors->first('category') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

               <div class="details_inner hide_cat" style="display:none;">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Sub Category</label>
                        </div>
                        <div class="col-lg-10 data">
                           <select name="sub_category_id" id="subcategory">
                               <option value="{{$sub_category_id}}">{{$sub_category_name}}</option>
                               @foreach($product_sub_category as $pc)
                               @if($pc->id != $sub_category_id)

                               <option value="{{$pc->id}}">{{$pc->sub_category}}</option>
                               
                               @endif
                               @endforeach
                           </select>
                             @if($errors->has('price')) <p class="error_mes">{{ $errors->first('price') }}</p> @endif
                        </div>
                     </div>   
                  </div>
               </div>

                <div class="details_inner">
                  <div class="part">
                     <div class="row">
                        <div class="col-lg-4 label">
                           <label>Description</label>
                        </div>
                        <div class="col-lg-10 data">
                             <textarea type="text" name="description">{{$description}}</textarea>   
                           
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
     

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script type="text/javascript">

           function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#summernote').summernote({
        placeholder: 'About Us',
        tabsize: 2,
        height: 120,
        callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                }
        },
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
      /*    ['view', ['fullscreen', 'codeview', 'help']]*/
        ]
      });




        $(document).ready(function () {
          $('#category').on('change',function(e) {
            var cat_id = e.target.value;

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
      });

        $.ajax({
          url:"/admin/open_cat",
          type:"POST",
          data: {
             cat_id: cat_id
          },
        success:function(data) {
              
              $('#subcategory').empty();

               $('#subcategory').html(data);

               $('.hide_cat').show();

           }
          });
          });
        });


</script>



@endsection