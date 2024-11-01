                @extends('layout.main')
                @section('content')


                <!-- Slideshow -->
                <div id="sns_slideshows3">
                    <div id="slishow_wrap12" class="sns-slideshow owl-carousel owl-theme owl-loaded">
                        <div class="item">
                            <img src="/assets/img/homebanner1.png" style="height: 667px !important; width:100% !importent; object-fit: cover;"  width="1098px" height="543px" alt="No Products Found" class="no-products-image">                        </div>
                            {{-- <img src="/assets/img/homebanner11.jpeg" style="height: 667px !important; width:100% !importent; object-fit: cover;"  width="1098px" height="543px" alt="No Products Found" class="no-products-image">                        </div> --}}
                        <div class="item">
                        <img src="/assets/img/homebanner22.png" style="height: 667px !important; width:100% !importent; object-fit: cover;"  width="1098px" height="543px" >

                    </div>
                    <div class="item">
                            <img src="/assets/img/homebanner33.png" style="height: 667px !important; width:100% !importent; object-fit: cover;"  width="1098px" height="543px" >

                        </div>
                    </div>
                </div>
            </div>
            <!-- AND HEADER -->

            <!-- CONTENT -->
            <div id="sns_content" class="wrap layout-m">
                <div class="container">
                    <div class="row">
                        <div id="sns_main" class="col-md-12 col-main">
                            <div id="sns_mainmidle">
                                <div class="policy-page3">
                                    <ul class="ca-menu">
                                        <li class="col-md-4 col-sm-6">
                                            <a >
                                                <span class="ca-icon"><i class="fa fa-truck"></i></span>
                                                <div class="ca-content">
                                                    <h2 class="ca-main">Fast Reach</h2>
                                                    <h3 class="ca-sub">We connect you with the seller across the country!</h3>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-md-4 col-sm-6 rsbd-no">
                                            <a >
                                                <span class="ca-icon" id="heart"><i class="fa fa-dollar"></i></span>
                                                <div class="ca-content">
                                                    <h2 class="ca-main">save money</h2>
                                                    <h3 class="ca-sub">By buying same quality of product in lower price!</h3>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="col-md-4 col-sm-6">
                                            <a >
                                                <span class="ca-icon"><i class="fa fa-support"></i></span>
                                                <div class="ca-content">
                                                    <h2 class="ca-main">best support</h2>
                                                    <h3 class="ca-sub">We are committed to providing exceptional support to our customers.</h3>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                                <div id="sns_producttaps1" class="sns_producttaps_wraps">
                                    <h3 class="precar">PRODUCT TAPS</h3>
                                  <!-- Nav tabs -->
                                  <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{ $categoryOne->name }}</a></li>
                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ $categoryTwo->name }}</a></li>
                                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">{{ $categoryThree->name }}</a></li>
                                    <li role="presentation"><a href="#bedroom" aria-controls="bedroom" role="tab" data-toggle="tab">{{ $categoryFour->name }}</a></li>
                                  </ul>

                                  <!-- Tab panes -->
                                  <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="products-grid row style_grid">
                                            @foreach ($categoryOneProducts as $product)


                                            <div class="item col-lg-2d4 col-md-3 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                            <div class="ico-label">

                                                                @if ($product->created_at->diffInDays() < 3)
                                                        <div class="ico-label">
                                                            <span class="ico-product ico-new">New</span>
                                                        </div>
                                                    @endif
                                                      @if ($product->on_sale)

                                                    <div class="ico-label">
                                                        <span class="ico-product ico-sale">Sale</span>
                                                    </div>
                                                    @endif
                                                            </div>

                                                             <a class="product-image have-additional"
                                                                title="{{ $product->name }}"
                                                                href="{{ route('productdetail', $product->id) }}">
                                                                <span class="img-main">
                                                               <img src="{{ Storage::url($product->image_url) }}" width="100%" height="190px" style="object-fit:cover !important"  alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="{{ $product->name }}"
                                                                        href="{{ route('productdetail', $product->id) }}">
                                                                         {{ $product->name }} </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1"> {{ $product->price }} JOD</span>
                                                                        @if ($product->on_sale)

                                                                        <span class="price2"> {{ $product->price -($product->price  *  $product->on_sale)}} JOD</span>
                                                                        @endif
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                <form action="{{ route('storeToCart') }}" method="POST">
                                                                    @csrf
                                                                    <input id="qty" class="input-text qty" type="hidden" title="Qty" value="1" name="quantity">
                                                                    @if (Auth::user())

                                                                    <input type="hidden" value="{{ Auth::user()->id }}"  name="cart_id">
                                                                    @endif
                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                                    @if ($product->variants->isNotEmpty() && $product->variants->first())
                                                                        <input type="hidden" value="{{ $product->variants->first()->id }}" name="variant_id">
                                                                    @endif


                                                                    <button type="submit" class="btn-cart"
                                                                    title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                                    </form>

                                                             </div>
                                                             <div class="actions">
                                                                <p style="visibility: hidden">s</p>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
 @endforeach
                                        </div>
                                    </div>




                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <div class="products-grid row style_grid">
                                            @foreach ($categoryTwoProducts as $product)


                                            <div class="item col-lg-2d4 col-md-3 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                            @if ($product->created_at->diffInDays() < 3)
                                                            <div class="ico-label">
                                                                <span class="ico-product ico-new">New</span>
                                                            </div>
                                                        @endif
                                                          @if ($product->on_sale)

                                                        <div class="ico-label">
                                                            <span class="ico-product ico-sale">Sale</span>
                                                        </div>
                                                        @endif

                                                             <a class="product-image have-additional"
                                                                title="{{ $product->name }}"
                                                                href="{{ route('productdetail', $product->id) }}">
                                                                <span class="img-main">
                                                               <img src="{{ Storage::url($product->image_url) }}"  width="100%" height="190px" style="object-fit:cover !important"  alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="{{ $product->name }}"
                                                                        href="{{ route('productdetail', $product->id) }}">
                                                                         {{ $product->name }} </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1"> {{ $product->price }} JOD</span>
                                                                        @if ($product->on_sale)

                                                                        <span class="price2"> {{ $product->price -($product->price  *  $product->on_sale)}} JOD</span>
                                                                        @endif
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                <form action="{{ route('storeToCart') }}" method="POST">
                                                                    @csrf
                                                                    <input id="qty" class="input-text qty" type="hidden" title="Qty" value="1" name="quantity">
                                                                    @if (Auth::user())

                                                                    <input type="hidden" value="{{ Auth::user()->id }}"  name="cart_id">
                                                                    @endif                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                                    @if ($product->variants->isNotEmpty() && $product->variants->first())
                                                                        <input type="hidden" value="{{ $product->variants->first()->id }}" name="variant_id">
                                                                    @endif


                                                                    <button type="submit" class="btn-cart"
                                                                    title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                                    </form>

                                                             </div>
                                                             <div class="actions">
                                                                <p style="visibility: hidden">s</p>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
 @endforeach


                                        </div>
                                    </div>


                                    <div role="tabpanel" class="tab-pane" id="messages">
                                        <div class="products-grid row style_grid">
                                            @foreach ($categoryThreeProducts as $product)


                                            <div class="item col-lg-2d4 col-md-3 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                            @if ($product->created_at->diffInDays() < 3)
                                                        <div class="ico-label">
                                                            <span class="ico-product ico-new">New</span>
                                                        </div>
                                                    @endif
                                                      @if ($product->on_sale)

                                                    <div class="ico-label">
                                                        <span class="ico-product ico-sale">Sale</span>
                                                    </div>
                                                    @endif

                                                             <a class="product-image have-additional"
                                                                title="{{ $product->name }}"
                                                                href="{{ route('productdetail', $product->id) }}">
                                                                <span class="img-main">
                                                               <img src="{{ Storage::url($product->image_url) }}"  width="100%" height="190px" style="object-fit:cover !important" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="{{ $product->name }}"
                                                                        href="{{ route('productdetail', $product->id) }}">
                                                                         {{ $product->name }} </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1"> {{ $product->price }} JOD</span>
                                                                        @if ($product->on_sale)

                                                                        <span class="price2"> {{ $product->price -($product->price  *  $product->on_sale)}} JOD</span>
                                                                        @endif
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                <form action="{{ route('storeToCart') }}" method="POST">
                                                                    @csrf
                                                                    <input id="qty" class="input-text qty" type="hidden" title="Qty" value="1" name="quantity">
                                                                    @if (Auth::user())

                                                                    <input type="hidden" value="{{ Auth::user()->id }}"  name="cart_id">
                                                                    @endif                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                                    @if ($product->variants->isNotEmpty() && $product->variants->first())
                                                                        <input type="hidden" value="{{ $product->variants->first()->id }}" name="variant_id">
                                                                    @endif


                                                                    <button type="submit" class="btn-cart"
                                                                    title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                                    </form>

                                                             </div>
                                                             <div class="actions">
                                                                <p style="visibility: hidden">s</p>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
 @endforeach




                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="bedroom">
                                        <div class="products-grid row style_grid">
                                            @foreach ($categoryFourProducts as $product)


                                            <div class="item col-lg-2d4 col-md-3 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                            @if ($product->created_at->diffInDays() < 3)
                                                            <div class="ico-label">
                                                                <span class="ico-product ico-new">New</span>
                                                            </div>
                                                        @endif
                                                          @if ($product->on_sale)

                                                        <div class="ico-label">
                                                            <span class="ico-product ico-sale">Sale</span>
                                                        </div>
                                                        @endif

                                                             <a class="product-image have-additional"
                                                                title="{{ $product->name }}"
                                                                href="{{ route('productdetail', $product->id) }}">
                                                                <span class="img-main">
                                                               <img src="{{ Storage::url($product->image_url) }}"  width="100%" height="190px" style="object-fit:cover !important" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="{{ $product->name }}"
                                                                        href="{{ route('productdetail', $product->id) }}">
                                                                         {{ $product->name }} </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1"> {{ $product->price }} JOD</span>
                                                                        @if ($product->on_sale)

                                                                        <span class="price2"> {{ $product->price -($product->price  *  $product->on_sale)}} JOD</span>
                                                                        @endif
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                <form action="{{ route('storeToCart') }}" method="POST">
                                                                    @csrf
                                                                    <input id="qty" class="input-text qty" type="hidden" title="Qty" value="1" name="quantity">
                                                                    @if (Auth::user())

                                                                    <input type="hidden" value="{{ Auth::user()->id }}"  name="cart_id">
                                                                    @endif                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                                                    @if ($product->variants->isNotEmpty() && $product->variants->first())
                                                                        <input type="hidden" value="{{ $product->variants->first()->id }}" name="variant_id">
                                                                    @endif


                                                                    <button type="submit" class="btn-cart"
                                                                    title="Add to Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <span>Add to Cart</span>
                                                            </button>
                                                                    </form>

                                                             </div>
                                                             <div class="actions">
                                                                <p style="visibility: hidden">s</p>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
 @endforeach

                                        </div>
                                    </div>
                                  </div>
                                  <h3 class="bt-more">
                                    {{-- <span>Load more items</span> --}}
                                  </h3>
                                </div>

                                <div class="sns_banner">
                                    <a href="#">
                                        <img src="images/banner11.jpg" alt="">
                                    </a>
                                    <div class="style-title">Explore Unique Items from</div>
                                    <div class="style-text1"> Talented Sellers</div>
                                    <div class="style-text2">
                                        Explore our exclusive collection crafted by talented artisans! From beautiful furniture to stylish kitchenware and elegant lighting, each piece reflects quality and design. Transform your space with unique items that elevate your home and showcase the creativity of their makers.
                                    </div>
                                    <div ><a href="{{ route('productList') }}" class="style-button ">Shopnow</a> </div>
                                </div>
                               <!--  <div class="clearfix"></div> -->


                               <div class="sns-products-list">
                                    <div class="row">
                                        <div class="products-small" style="display: inline-block">
                                            <div class="item-row col-md-4 col-sm-6 col-lg-3">
                                                <h3>Featured</h3>
                                                <div class="item-content" >
                                                    @foreach ($RandomProducts as $product  )


                                                    <div class="item" style='height:38vh'>
                                                        <div class="item-inner">
                                                             <div class="prd">
                                                                 <div class="item-img clearfix" style="height: 150px !important">
                                                                     <a class="product-image have-additional"
                                                                        title="{{ $product->name }}"
                                                                        href="{{ route('productdetail' , $product->id) }}">
                                                                        <span class="img-main">
                                                                       <img src="{{ Storage::url($product->image_url) }}" style="height: 150px !important; width:160px !important" alt="">
                                                                        </span>
                                                                     </a>
                                                                 </div>
                                                                 <div class="item-info">
                                                                     <div class="info-inner">
                                                                         <div class="item-title">
                                                                             <a title="Modular Modern"
                                                                                href="{{ route('productdetail' , $product->id) }}">
                                                                                {{ $product->name }} </a>
                                                                         </div>
                                                                         <div class="item-price">
                                                                             <div class="price-box">
                                                                        <span class="regular-price">
                                                                            <span class="price">
                                                                                @if ($product->on_sale)
                                                                                <span class="price">{{ $product->price - ($product->price * $product->on_sale) }} JOD</span>
                                                                                <span class="price2" style=" margin-left: 3px ;text-decoration: line-through;">{{ $product->price }} JOD</span>
                                                                                @else
                                                                                <span class="price">{{ $product->price - ($product->price * $product->onsale) }} JOD</span>

                                                                                @endif                                                                            </span>
                                                                        </span>
                                                                             </div>
                                                                         </div>
                                                                     </div>

                                                                 </div>

                                                             </div>
                                                         </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="item-row col-md-4 col-sm-6 col-lg-3">
                                                <h3>Best sale</h3>
                                                <div class="item-content " >
                                                    @if ($bestSale->count() > 0)
                                                    @foreach ($bestSale as $product)
                                                    <div class="item" style='height:38vh'>
                                                        <div class="item-inner">
                                                             <div class="prd">
                                                                 <div class="item-img clearfix"style="height: 150px !important; ">
                                                                     <a class="product-image have-additional"
                                                                        title="{{ $product->name }}"
                                                                        href="{{ route('productdetail' , $product->id) }}">
                                                                        <span class="img-main">
                                                                       <img src="{{ Storage::url($product->image_url) }}" alt="" style="height: 150px !important; width:160px !important">
                                                                        </span>
                                                                     </a>
                                                                 </div>
                                                                 <div class="item-info">
                                                                     <div class="info-inner">
                                                                         <div class="item-title">
                                                                             <a title="{{ route('productdetail' , $product->id) }}"
                                                                                href="{{ route('productdetail' , $product->id) }}">
                                                                                {{ $product->name }} </a>
                                                                         </div>
                                                                         <div class="item-price">
                                                                             <div class="price-box">
                                                                        <span class="regular-price">
                                                                            <span class="price">
                                                                                @if ($product->on_sale)

                                                                                <span class="price1">{{ $product->price - ($product->price * $product->on_sale) }} JOD</span>
                                                                                <span class="price2">{{ $product->price }} JOD</span>
                                                                                @else
                                                                                <span class="price1">{{ $product->price }}</span>

                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                             </div>
                                                                         </div>
                                                                     </div>

                                                                 </div>

                                                             </div>
                                                         </div>
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    <p> no sold product </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="item-row col-md-4 col-sm-6 col-lg-3">
                                                <h3>On Sale</h3>
                                                <div class="item-content " >
                                                    @foreach ($onSale as $product  )


                                                    <div class="item" style='height:38vh'>
                                                        <div class="item-inner">
                                                             <div class="prd">
                                                                 <div class="item-img clearfix" style="height: 150px !important; ">
                                                                     <a class="product-image have-additional"
                                                                        title="{{ $product->name }}"
                                                                        href="{{ route('productdetail' , $product->id) }}">
                                                                        <span class="img-main">
                                                                       <img src="{{ Storage::url($product->image_url) }}" alt="" style="height: 150px !important; width:160px !important">
                                                                        </span>
                                                                     </a>
                                                                 </div>
                                                                 <div class="item-info">
                                                                     <div class="info-inner">
                                                                         <div class="item-title">
                                                                             <a title="Modular Modern"
                                                                                href="{{ route('productdetail' , $product->id) }}">
                                                                                {{ $product->name }} </a>
                                                                         </div>
                                                                         <div class="item-price">
                                                                             <div class="price-box">
                                                                        <span class="regular-price">
                                                                            <span class="price">
                                                                                @if ($product->on_sale)
                                                                                <span class="price">{{ $product->price - ($product->price * $product->on_sale) }} JOD</span>
                                                                                <span class="price2" style=" margin-left: 3px ;text-decoration: line-through;">{{ $product->price }} JOD</span>
                                                                                @else
                                                                                <span class="price">{{ $product->price - ($product->price * $product->onsale) }} JOD</span>

                                                                                @endif                                                                            </span>
                                                                        </span>
                                                                             </div>
                                                                         </div>
                                                                     </div>

                                                                 </div>

                                                             </div>
                                                         </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="item-row col-md-4 col-sm-6 col-lg-3">
                                                <h3>Top rate</h3>
                                                <div class="item-content " >
                                                    @if ($topRated->count() > 0)


                                                    @foreach ($topRated as $product)


                                                    <div class="item" style='height:38vh'>
                                                        <div class="item-inner">
                                                             <div class="prd">
                                                                 <div class="item-img clearfix" style="height: 150px !important; ">
                                                                     <a class="product-image have-additional"
                                                                        title="{{ $product->name }}"
                                                                        href="{{ route('productdetail' , $product->id) }}">
                                                                        <span class="img-main">
                                                                       <img src="{{ Storage::url( $product->image_url) }}" alt="" style="height: 150px !important; width:160px !important">
                                                                        </span>
                                                                     </a>
                                                                 </div>
                                                                 <div class="item-info">
                                                                     <div class="info-inner">
                                                                         <div class="item-title">
                                                                             <a title="{{ $product->name }}"
                                                                                href="{{ route('productdetail'  , $product->id) }}">
                                                                                 {{ $product->name }} </a>
                                                                         </div>
                                                                         <div class="item-price">
                                                                             <div class="price-box">
                                                                        <span class="regular-price">
                                                                            <span class="price">
                                                                                @if ($product->on_sale)

                                                                                <span class="price1">{{ $product->price - ($product->price * $product->on_sale) }} JOD</span>
                                                                                <span class="price2">{{ $product->price }} JOD</span>
                                                                                @else
                                                                                <span class="price1">{{ $product->price }}</span>

                                                                                @endif
                                                                            </span>
                                                                        </span>
                                                                             </div>
                                                                         </div>
                                                                     </div>

                                                                 </div>

                                                             </div>
                                                         </div>
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    <p> no product reviewed</p>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                 <div id="header-slideshow">

                                     <div class="item-row mb-4 " style="    margin-bottom: 5%;">
                                          <div id="sns_producttaps1" class="sns_producttaps_wraps">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Sponsored Products</a></li>
                                          </ul>

                                         </div>
                                         </div>
                                    <div class="row">
                                        <div class="slideshows col-md-6 col-sm-8">
                                            <div id="slider123456">
                                                <div class="item style1 banner5">
                                                    <a href="{{ route('productdetail' ,$ads [0]->product->id) }}">
                                                        <img src="{{ Storage::url($ads[0]->product->image_url) }}" alt="" height="460px">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-right col-md-6 col-sm-4" >
                                             <div class="banner6 banner5 dbn col-md-6 col-sm-6" style="width: 49% !important; margin-right:4px">
                                                <a href="{{ route('productdetail' ,$ads [1]->product->id) }}">
                                                    <img src="{{ Storage::url($ads[1]->product->image_url) }}" alt="" height="220px">
                                                </a>
                                            </div>
                                             <div class="banner6 banner5 dbn col-md-6 col-sm-6">
                                                <a href="{{ route('productdetail' ,$ads [2]->product->id) }}">
                                                    <img src="{{ Storage::url($ads[2]->product->image_url) }}" alt="" height="220px">
                                                </a>
                                            </div>
                                             <div class="banner6 pdno col-md-12 col-sm-12">
                                                <div class="banner7 banner6  banner5 col-md-6 col-sm-12"style="width: 49% !important; margin-right:4px">
                                                    <a href="{{ route('productdetail' ,$ads [3]->product->id) }}">
                                                        <img src="{{ Storage::url($ads[3]->product->image_url) }}" alt="" height="220px">
                                                    </a>
                                                </div>
                                                <div class="banner8 banner6  banner5 col-md-6 col-sm-12">
                                                    <a href="{{ route('productdetail' ,$ads [4]->product->id) }}">
                                                        <img src="{{ Storage::url($ads[4]->product->image_url) }}" alt="" height="220px">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="sns-latestblog">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="block-title">
                                                <h3>LATEST POSTS</h3>
                                            </div>
                                        </div>
                                        <div id="latestblog132" class="latestblog-content owl-carousel owl-theme" style="display: inline-block">
                                            <div class="item">
                                                <div class="banner5">
                                                    <a href="blog-detail.html">
                                                        <img src="images/blog/blog5.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-page">
                                                    <div class="blog-left">
                                                        <p class="text1">08</p>
                                                        <p class="text2">JAN</p>
                                                    </div>

                                                    <div class="blog-right">
                                                        <p class="style1"><a href="blog-detail.html">Chair furnitured</a></p>
                                                        <p class="style2">Lorem Ipsum has been the industry's </p>
                                                        <p class="style3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="banner5">
                                                    <a href="blog-detail.html">
                                                        <img src="images/blog/blog6.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-page">
                                                    <div class="blog-left">
                                                        <p class="text1">06</p>
                                                        <p class="text2">JAN</p>
                                                    </div>

                                                    <div class="blog-right">
                                                        <p class="style1"><a href="blog-detail.html">Leather Sofas</a></p>
                                                        <p class="style2">When an unknown printer took galley</p>
                                                        <p class="style3">When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only ...</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="banner5">
                                                    <a href="blog-detail.html">
                                                        <img src="images/blog/blog7.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-page">
                                                    <div class="blog-left">
                                                        <p class="text1">05</p>
                                                        <p class="text2">JAN</p>
                                                    </div>

                                                    <div class="blog-right">
                                                        <p class="style1"><a href="blog-detail.html">Chair furnitured</a></p>
                                                        <p class="style2">Lorem Ipsum has been </p>
                                                        <p class="style3">Lorem Ipsum is simply dummy text of the printing and typesetting industry ...</p>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="item">
                                                <div class="banner5">
                                                    <a href="blog-detail.html">
                                                        <img src="images/blog/blog5.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-page">
                                                    <div class="blog-left">
                                                        <p class="text1">08</p>
                                                        <p class="text2">JAN</p>
                                                    </div>

                                                    <div class="blog-right">
                                                        <p class="style1"><a href="blog-detail.html">Chair furnitured</a></p>
                                                        <p class="style2">Lorem Ipsum has been the industry's </p>
                                                        <p class="style3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="banner5">
                                                    <a href="blog-detail.html">
                                                        <img src="images/blog/blog6.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-page">
                                                    <div class="blog-left">
                                                        <p class="text1">06</p>
                                                        <p class="text2">JAN</p>
                                                    </div>

                                                    <div class="blog-right">
                                                        <p class="style1"><a href="blog-detail.html">Leather Sofas</a></p>
                                                        <p class="style2">When an unknown printer took galley</p>
                                                        <p class="style3">When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only ...</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <a href="blog-detail.html">
                                                        <img src="images/blog/blog7.jpg" alt="">
                                                    </a>
                                                <div class="blog-page">
                                                    <div class="blog-left">
                                                        <p class="text1">05</p>
                                                        <p class="text2">JAN</p>
                                                    </div>

                                                    <div class="blog-right">
                                                        <p class="style1"><a href="blog-detail.html">Chair furnitured</a></p>
                                                        <p class="style2">Lorem Ipsum has been </p>
                                                        <p class="style3">Lorem Ipsum is simply dummy text of the printing and typesetting industry ...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AND CONTENT -->



           <!-- FOOTER -->

           @endsection
