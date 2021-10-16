

@extends('frontend.layout.app')
@section('content')
<div class="col-sm-9 padding-right">





    @php $hinh = json_decode($product[0]->hinh); @endphp
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                @if(is_array($hinh) && !empty($hinh))
                    <img class="hinhlon" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[0])}}" alt="" />
                    <a class="hinhzoom" href="{{asset('upload/user/product/'.$product[0]->id_user.'to-'.$hinh[0])}}" rel="prettyPhoto"><h3>ZOOM</h3></a>                  
                @endif
                
                
                
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                
                  <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @if(is_array($hinh) && !empty($hinh))
                            <div class="item active">
                                <a><img class="hinhsl" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[0])}}" alt=""></a>
                                <a><img class="hinhsl" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[1])}}" alt=""></a>
                                <a><img class="hinhsl" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[2])}}" alt=""></a>
                            </div>
                            <div class="item">
                                <a><img class="hinhsl" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[0])}}" alt=""></a>
                                <a><img class="hinhsl" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[1])}}" alt=""></a>
                                <a><img class="hinhsl" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[2])}}" alt=""></a>
                            </div>
                            <div class="item">
                                <a><img class="hinhsl" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[0])}}" alt=""></a>
                                <a><img class="hinhsl" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[1])}}" alt=""></a>
                                <a><img class="hinhsl" src="{{asset('upload/user/product/'.$product[0]->id_user.'vua-'.$hinh[2])}}" alt=""></a>
                            </div>
                        @endif
                        
                        
                    </div>

                  <!-- Controls -->
                  <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                  </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                
                <h2>{{$product[0]->tensp}}</h2>
                <p>Web ID: {{$product[0]->id}}</p>
                <img src="images/product-details/rating.png" alt="" />
                <span>
                    <span>${{$product[0]->giasp}}</span>
                    <label>Số lượng:</label>
                    <input type="text" value="3" />
                    <button type="button" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>
                </span>
                <p><b>Loại sản phẩm:  </b> {{$product[0]->loaisp}}</p>
                <p><b>Thương hiệu:  </b> {{$product[0]->thuonghieu}}</p>
                
                @if ($product[0]->giamgia == 0)
                    <p><b>Giảm giá: </b>0 %</p>
                @else
                    <p><b>Giảm giá: </b> {{$product[0]->sale}} %</p>
                @endif
                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                <div class="pager-area">
                    <ul class="pager pull-right">
                        @if (!empty($datapre))
                            <li><a href="{{URL::to('frontend/productdetail/'.$datapre)}}">Pre</a></li>
                        @endif
                        @if (!empty($datanext))
                            <li><a href="{{URL::to('frontend/productdetail/'.$datanext)}}">next</a></li>
                        @endif
                                                    
                    </ul>
                </div>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->

    



    
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Details</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="companyprofile" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="tag" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>
                    
                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name"/>
                            <input type="email" placeholder="Email Address"/>
                        </span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
    </div><!--/category-tab-->
    
  
    
</div>
@endsection


@section('script')
<Script>

    $(document).ready(function(){
       
        $('img.hinhsl').click(function(){
            var value = $(this).attr('src');
            $('img.hinhlon').attr('src' , value);
            $('a.hinhzoom').attr('href' , value);
        })

    })

</Script>
    
@endsection





