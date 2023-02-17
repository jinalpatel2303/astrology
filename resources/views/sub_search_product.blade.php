                <div class="row">
                    @foreach($product as $p)
	    			<div class="col-lg-4">
	    				<div class="arrival-1">
                		    <div class="product-img">
                		    	<a href="{{url('/product_detail')}}/{{$p->id}}" tabindex="0">
                                    @foreach($product_image as $pi)
                                    @if($pi->product_id == $p->id)
                                    <img src="/uploads/{{$pi->image}}">
                                    @break
                                    @endif
                                    @endforeach
                                </a>
                		    </div>
                		    <div class="product-info">
                		        <div class="ratings-container">
                                    <!--<div class="product-ratting pr_1">
                                        <ul>
                                            <li><a href="#" tabindex="0"><i class="star fas fa-star"></i></a></li>
                                            <li><a href="#" tabindex="0"><i class="star fas fa-star"></i></a></li>
                                            <li><a href="#" tabindex="0"><i class="star fas fa-star"></i></a></li>
                                            <li><a href="#" tabindex="0"><i class="star fas fa-star"></i></a></li>
                                            <li><a href="#" tabindex="0"><i class="star far fa-star"></i></a></li>
                                            <li class="review-total"><a href="#" tabindex="0">(3)</a></li>
                                        </ul>
                                    </div>-->
                                </div>
                		    	<h4><a href="#">{{$p->product_name}}</a></h4>
                		    	<h6>${{$p->price}}<!--<del>$80</del>--><!--<span class="al-orange">(37.5% Off)</span>--></h6>
                		    	<div class="product-btn">
									<div class="re-btn">
										<button>
											<a href="checkoutpage.html">
												buy now
											</a>
										</button>
									</div>
                		    	</div>
                		    </div>
                		    <div class="buttons">
                                <!--<a href="wishlist.html" class="tooltip tooltip--left" data-tooltip="wishlist"><i class="far fa-heart"></i></a>
                                <a href="add-cart.html" class="tooltip tooltip--left" data-tooltip="Add to cart"><i class="fa-solid fa-cart-plus"></i></a>
                                <a href="add-cart.html"data-bs-toggle="modal" data-bs-target="#productmodal" tabindex="0"><i class="fa-solid fa-eye"></i></a>-->
                            </div>
                	    </div>
	    			</div>
                    @endforeach
	    		</div>
                {{ $product->links('pagination') }}
            