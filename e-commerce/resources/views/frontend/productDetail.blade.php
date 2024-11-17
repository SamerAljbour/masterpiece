@extends('layout.mainTwo')
@section('content')
    <!-- AND HEADER -->
<style>

</style>

@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += '{{ $error }}\n';
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessages,
            });
        });
    </script>
@endif

    <!-- BREADCRUMBS -->
    <div id="sns_breadcrumbs" class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="sns_titlepage"></div>
                    <div id="sns_pathway" class="clearfix">
                        <div class="pathway-inner">
                            <span class="icon-pointer "></span>
                            <ul class="breadcrumbs">
                                <li class="home">
                                    <a title="Go to Home Page" href="{{ route('home') }}">
                                        <i class="fa fa-home"></i>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="category3 last">
                                    <span>{{ $product->name }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- AND BREADCRUMBS -->

    <!-- CONTENT -->
    <div id="sns_content" class="wrap layout-m">
        <div class="container">
            <div class="row">
                <div id="sns_main" class="col-md-12 col-main">
                    <div id="sns_mainmidle">
                        <div class="product-view sns-product-detail">
                            <div class="product-essential clearfix">
                                <div class="row row-img">

                                    <div class="product-img-box col-md-4 col-sm-5">
                                        <div class="detail-img">
                                            <img src="{{ Storage::url($product->image_url) }}" alt="" style="max-height:391px !important; width:100% !important">

                                        </div>
                                        <div class="small-img">
                                            <div id="sns_thumbail" class="owl-carousel owl-theme">
                                                @foreach ($product->photos as $photos)
                                                    <div class="item">
                                                        <img src="{{ Storage::url($photos->photo_url) }}" alt="">
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div id="product_shop" class="product-shop col-md-8 col-sm-7">
                                        <div class="item-inner product_list_style">
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a title="Modular Modern"
                                                        href="{{ route('productdetail', $product->id) }}">{{ $product->name }}</a>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box">
                                                        <span class="regular-price">
                                                            @if ($product->on_sale)
                                                            <span class="price">{{ $product->price - ($product->price * $product->on_sale) }} JOD</span>
                                                            <span class="price2" style=" margin-left: 3px ;text-decoration: line-through;">{{ $product->price }} JOD</span>
                                                            @else
                                                            <span class="price">{{ $product->price - ($product->price * $product->onsale) }} JOD</span>

                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="availability">
                                                        @if ( $product->total_stock > 0 )
                                                        <p class="style1 " ><span class="instock">in stock : </span>  <span class="numberofstock">{{ $product->total_stock }}</span></p>
                                                        @else
                                                        <p class="style1 outofstock">out of stock </p>

                                                        @endif
                                                </div>
                                                <div class="rating-block">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            @if ($reviews->count() > 0)
                                                            <div class="rating" style="width:{{ ($reviews->sum('rating') / $reviews->count()) * 20 }}%;"></div>
                                                            @else
                                                            <div class="rating" style="width:0%;"></div>

                                                            @endif
                                                        </div>
                                                        <span class="amount">
                                                            <a href="#">({{ $reviews->count() }} Reviews)</a>
                                                            <span class="separator">|</span>
                                                            <a href="http://127.0.0.1:8000/productdetail/{{ $product->id }}#review">Add Your Review</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="desc std">
                                                    <h5>Description</h5>
                                                    <p>{{$product->description}}</p>
                                                </div>

                                                <form>


                                                    <p class="mg-color">Variant
                                                        <span>*</span>
                                                    </p>
                                                    <select name="variant_id" id="variant_id" class="style-color"  onchange="setvariant()">
                                                        <option value="" > select Variant</option>
                                                        @foreach ($product->variants as $variant)
                                                            <option value="{{ $variant->id }}" {{ $variant->stock > 0 ? "" : "disabled" }} style='{{ $variant->stock > 0 ? "" : "color:red" }}'>
                                                                {{ ($variant->variant_options->size ?? '') . ' ' .
                                                                   ($variant->variant_options->color ?? '') . ' ' .
                                                                   ($variant->variant_options->type ?? '') . ' ' .
                                                                   ($variant->variant_options->resolution ?? '') . ' ' .
                                                                   ($variant->variant_options->processor ?? '') . ' ' .
                                                                   ($variant->variant_options->flavor ?? '') . ' ' .
                                                                   ($variant->variant_options->material ?? '') }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </form>


                                                <div class="actions">
                                                    <form action="{{ route('storeToCartQua') }}" method="POST">
                                                        @csrf
                                                        <label class="gfont" for="qty">Qty : </label>
                                                        <div class="qty-container">
                                                            <button class="qty-decrease"
                                                                onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty ) && qty > 1 ) qty_el.value--;return false;"
                                                                type="button"></button>

                                                            <input id="qty" name="quantity" class="input-text qty" type="text" title="Qty" value="1"  />

                                                            <button class="qty-increase"
                                                                onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;"
                                                                type="button">+</button>
                                                        </div>
                                                        @if (Auth::user())
                                                        <input type="hidden" value="{{ Auth::user()->id }}" name="cart_id">

                                                        @endif
                                                        <input type="hidden" value="{{ $product->id }}" name="product_id">

                                                        @if ($product->on_sale)
                                                            <input type="hidden" value="{{ $product->price - ($product->price * $product->on_sale) }}" name="price">
                                                        @else
                                                            <input type="hidden" value="{{ $product->price }}" name="price">
                                                        @endif

                                                        <input type="hidden" value="" id="variant" name="variant_id"> <!-- Set to a default if not used -->

                                                        <button class="btn-cart" title="Add to Cart" type="submit">
                                                            Add to Cart
                                                        </button>

                                                        {{-- <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-wishlist" data-original-title="Add to Wishlist"
                                                                    data-toggle="tooltip" href="#" title=""></a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" data-original-title="Add to Compare"
                                                                    data-toggle="tooltip" href="#" title=""></a>
                                                            </li>
                                                            <li>
                                                                <div class="wrap-quickview" data-id="qv_item_8">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            data-original-title="View" data-toggle="tooltip"
                                                                            href="#">
                                                                            <span>View</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul> --}}
                                                    </form>





                                                </div>
                                                <div class="addthis_native_toolbox"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom row">
                <div class="2coloum-left">
                    <div id="sns_left" class="col-md-3">
                        <div class="bestsale">
                            <div class="title">
                                <h3>BEST SALE</h3>
                            </div>
                            <div class="content">
                                <div id="products_slider12" class="products-slider12 owl-carousel owl-theme"
                                    style="display: inline-block">
                                    @foreach ($bestSales->chunk(5) as $chunk)
                                    <div class="item-row">
                                        @foreach ($chunk as $item)
                                            <div class="item">
                                                <div class="item-inner">
                                                    <div class="prd">
                                                        <div class="item-img clearfix">
                                                            <a class="product-image have-additional" href="{{ route('productdetail', $item->id) }}" title="{{ $item->name }}">
                                                                <span class="img-main">
                                                                    <img alt="{{ $item->name }}" src="{{ Storage::url($item->image_url) }}" style="width: 200px !important; height:150px !important">
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title">
                                                                    <a href="{{ route('productdetail', $item->id) }}" title="{{ $item->name }}">
                                                                        {{ $item->name }}
                                                                    </a>
                                                                </div>
                                                                <div class="item-price">
                                                                    <span class="price">
                                                                        @if ($item->on_sale)
                                                                        <span class="price2">{{ $item->price - ($item->price * $item->on_sale) }} JOD</span>
                                                                        @else
                                                                        <span class="price1">{{ $item->price }} JOD</span>
                                                                        @endif
                                                                    </span>
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
                                                                        <input type="hidden" value="{{ $item->id }}" name="product_id">
                                                                        @if ($product->on_sale)
                                                                        <input type="hidden" value="{{ $product->price - ($product->price * $product->on_sale) }}" name="price">
                                                                    @else
                                                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                                                    @endif                                                                        @if ($item->variants->isNotEmpty() && $item->variants->first())
                                                                            <input type="hidden" value="{{ $item->variants->first()->id }}" name="variant_id">
                                                                        @endif


                                                                        <button type="submit" class="btn-cart" title="Add to Cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                            <span>Add to Cart</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ico-label">
                                                            @if ($item->created_at->diffInDays() < 3)
                                                                <span class="ico-product ico-new">New</span>
                                                            @endif
                                                            @if ($item->on_sale)
                                                                <span class="ico-product ico-sale">Sale</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                                    @foreach ($bestSales->chunk(5) as $chunk)
            <div class="item-row">
                @foreach ($chunk as $item)
                    <div class="item">
                        <div class="item-inner">
                            <div class="prd">
                                <div class="item-img clearfix">
                                    <a class="product-image have-additional" href="{{ route('productdetail', $item->id) }}" title="{{ $item->name }}">
                                        <span class="img-main">
                                            <img alt="{{ $item->name }}" src="{{ Storage::url($item->image_url) }}">
                                        </span>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title">
                                            <a href="{{ route('productdetail', $item->id) }}" title="{{ $item->name }}">
                                                {{ $item->name }}
                                            </a>
                                        </div>
                                        <div class="item-price">
                                            <span class="price">
                                                <span class="price1">{{ $item->price }} JOD</span>
                                                @if ($item->on_sale)
                                                    <span class="price2">{{ $item->price - ($item->price * $item->on_sale) }} JOD</span>
                                                @endif
                                            </span>
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
                                                <input type="hidden" value="{{ $item->id }}" name="product_id">
                                                @if ($product->on_sale)
                                                <input type="hidden" value="{{ $product->price - ($product->price * $product->on_sale) }}" name="price">
                                            @else
                                                <input type="hidden" value="{{ $product->price }}" name="price">
                                            @endif                                                                        @if ($item->variants->isNotEmpty() && $item->variants->first())
                                                    <input type="hidden" value="{{ $item->variants->first()->id }}" name="variant_id">
                                                @endif


                                                <button type="submit" class="btn-cart" title="Add to Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <span>Add to Cart</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="ico-label">
                                    @if ($item->created_at->diffInDays() < 3)
                                        <span class="ico-product ico-new">New</span>
                                    @endif
                                    @if ($item->on_sale)
                                        <span class="ico-product ico-sale">Sale</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        @foreach ($bestSales->chunk(5) as $chunk)
        <div class="item-row">
            @foreach ($chunk as $item)
                <div class="item">
                    <div class="item-inner">
                        <div class="prd">
                            <div class="item-img clearfix">
                                <a class="product-image have-additional" href="{{ route('productdetail', $item->id) }}" title="{{ $item->name }}">
                                    <span class="img-main">
                                        <img alt="{{ $item->name }}" src="{{ Storage::url($item->image_url) }}">
                                    </span>
                                </a>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title">
                                        <a href="{{ route('productdetail', $item->id) }}" title="{{ $item->name }}">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                    <div class="item-price">
                                        <span class="price">
                                            <span class="price1">{{ $item->price }} JOD</span>
                                            @if ($item->on_sale)
                                                <span class="price2">{{ $item->price - ($item->price * $item->on_sale) }} JOD</span>
                                            @endif
                                        </span>
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
                                            <input type="hidden" value="{{ $item->id }}" name="product_id">
                                            @if ($product->on_sale)
                                            <input type="hidden" value="{{ $product->price - ($product->price * $product->on_sale) }}" name="price">
                                        @else
                                            <input type="hidden" value="{{ $product->price }}" name="price">
                                        @endif                                                                        @if ($item->variants->isNotEmpty() && $item->variants->first())
                                                <input type="hidden" value="{{ $item->variants->first()->id }}" name="variant_id">
                                            @endif


                                            <button type="submit" class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="ico-label">
                                @if ($item->created_at->diffInDays() < 3)
                                    <span class="ico-product ico-new">New</span>
                                @endif
                                @if ($item->on_sale)
                                    <span class="ico-product ico-sale">Sale</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="block block-banner banner5">
                            @if (isset($ads))

                            <a class="banner5" href="{{ route('productdetail', $ads->product->id) }}">
                                <img src="{{ Storage::url($ads->product->image_url) }}" alt="" >
                            </a>
                            @else
                            <a >
                                <img src="/assets/img/adshere.png" alt="" >
                            </a>
                            @endif
                        </div>
                    </div>
                    <div id="sns_mainm" class="col-md-9">
                        {{-- <div id="sns_description" class="description">
                            <div class="sns_producttaps_wraps1">
                                <h3 class="detail-none">Description
                                    <i class="fa fa-align-justify"></i>
                                </h3>
                                <!-- Nav tabs -->
                                   <!-- Nav tabs -->
                                   <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active style-detail"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product Description</a></li>
                                    <li role="presentation" class="style-detail"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                    <li role="presentation" class="style-detail"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Product Tags</a></li>
                                </ul>




                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <div class="style1">
                                            <p class="top">
                                                {{ $product->description }}
                                            </p>
                                            <p class="mid">
                                                {{ $product->description }}
                                            </p>
                                            <p class="bot">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="messages">
                                        <div class="collateral-box">
                                            <p>
                                                <img alt="" src="http://placehold.it/240x180"
                                                    style="margin-top: 5px;">
                                            </p>
                                            <p>Retra faucibus eu laoreet nunc. Tincidunt nulla a Nulla eu convallis
                                                scelerisque sociis nulla interdum et. Cursus senectus aliquet pretium at
                                                tristique hac ullamcorper adipiscing et Donec. Enim montes parturient.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}



                        <div class="products-upsell">
                            <div class="detai-products1">
                                <div class="title">
                                    <h3>Related products</h3>
                                </div>
                                <div class="products-grid">
                                    <div id="related_upsell" class="item-row owl-carousel owl-theme"
                                        style="display: inline-block">

                                        @foreach ($relatedProducts as $relatedProduct)
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <div class="ico-label">
                                                            @if ($relatedProduct->created_at->diffInDays() < 3)
                                                                <span class="ico-product ico-new">New</span>
                                                            @endif

                                                            @if ($relatedProduct->on_sale)
                                                                <span class="ico-product ico-sale">Sale</span>
                                                            @endif
                                                        </div>

                                                        <a class="product-image have-additional " style="display:flex" href="{{ route('productdetail', $relatedProduct->id) }}" title="{{ $product->name }}">
                                                            <span class="img-main " >
                                                                <img alt="" src="{{ Storage::url($relatedProduct->image_url) }}" style="height: 30vh ;">
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="{{ route('productdetail', $relatedProduct->id) }}" title="{{ $relatedProduct->name }}">
                                                                    {{ $relatedProduct->name }}
                                                                </a>
                                                            </div>

                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            <span class="price1">{{ $relatedProduct->price }} JOD</span>
                                                                            @if ($relatedProduct->on_sale)
                                                                                <span class="price2">{{ $relatedProduct->price - ($relatedProduct->price * $relatedProduct->on_sale) }} JOD</span>
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
                                                                <input type="hidden" value="{{ $relatedProduct->id }}" name="product_id">
                                                                @if ($relatedProduct->on_sale)
                                                                <input type="hidden" value="{{ $relatedProduct->price - ($relatedProduct->price * $relatedProduct->on_sale) }}" name="price">
                                                            @else
                                                                <input type="hidden" value="{{ $relatedProduct->price }}" name="price">
                                                            @endif                                                                    @if ($relatedProduct->variants->isNotEmpty() && $relatedProduct->variants->first())
                                                                    <input type="hidden" value="{{ $relatedProduct->variants->first()->id }}" name="variant_id">
                                                                @endif


                                                                <button type="submit" class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <p style="visibility: hidden"><</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="products-related">
                            <div class="detai-products1">
                                <div class="title">
                                    <h3>Upsell products</h3>
                                </div>
                                <div class="products-grid">

                                    <div id="related_upsell1" class="item-row owl-carousel owl-theme"
                                        style="display: inline-block">

                                        @foreach ($onSale as $item)


                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">

                                                        <div class="ico-label">
                                                            @if ($item->on_sale)

                                                            <span class="ico-product ico-sale">Sale</span>
                                                            @endif
                                                        </div>
                                                        <a class="product-image have-additional" style="display:flex" href="{{ route('productdetail'  ,$item->id) }}"
                                                            title="{{ $item->name }}">
                                                            <span class="img-main" >
                                                                <img alt="" src="{{ Storage::url($item->image_url) }}" style="height: 30vh ; ">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="{{ route('productdetail'  ,$item->id) }}" title="{{ $item->name }}">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box">
                                                                    <span class="regular-price">
                                                                        <span class="price">
                                                                            @if ($item->on_sale)
                                                                            <span class="price1">{{ $item->price - ($item->price * $item->on_sale) }} JOD</span>
                                                                            <span class="price2">{{ $item->price }} JOD</span>
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
                                                                <input type="hidden" value="{{ $item->id }}" name="product_id">
                                                                @if ($product->on_sale)
                                                                <input type="hidden" value="{{ $product->price - ($product->price * $product->on_sale) }}" name="price">
                                                            @else
                                                                <input type="hidden" value="{{ $product->price }}" name="price">
                                                            @endif                                                                        @if ($item->variants->isNotEmpty() && $item->variants->first())
                                                                    <input type="hidden" value="{{ $item->variants->first()->id }}" name="variant_id">
                                                                @endif


                                                                <button type="submit" class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        {{-- <div class="actions">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist" title="Add to Wishlist"
                                                                        href="#">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare" title="Add to Compare"
                                                                        href="#">
                                                                        <i class="fa fa-random"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                                    <div class="quickview-wrap">
                                                                        <a class="sns-btn-quickview qv_btn"
                                                                            href="#">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div> --}}
                                                        <p style="visibility: hidden">></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                    <section id="review" style="margin: 7vh">
                                        <div class="collateral-box">
                                            <div class="form-add">
                                                <h2>Write Your Own Review</h2>
                                                <form id="review-form" action="{{ route('submitreview') }}" method="POST">
                                                    @csrf
                                                    <fieldset>
                                                        <h3>
                                                            You're reviewing:
                                                            <span><b>{{ $product->name }}</b></span>
                                                        </h3>
                                                        <ul class="form-list">
                                                            <li>
                                                                <label class="required" for="review_field">
                                                                    <em>*</em> Review
                                                                </label>
                                                                <div class="input-box">
                                                                    <textarea id="review_field" name="comment" class="form-control" rows="3" placeholder="Write your review here..."></textarea>
                                                                </div>
                                                            </li>
                                                            @if (Auth::user())

                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                            @endif
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <li>
                                                                <label class="required" for="rating_field">
                                                                    <em>*</em> Your Rating
                                                                </label>
                                                                <div class="stars" id="rating-stars">
                                                                    <i class="fa fa-star" data-value="1"></i>
                                                                    <i class="fa fa-star" data-value="2"></i>
                                                                    <i class="fa fa-star" data-value="3"></i>
                                                                    <i class="fa fa-star" data-value="4"></i>
                                                                    <i class="fa fa-star" data-value="5"></i>
                                                                </div>
                                                                <input type="hidden" id="rating-value" name="rating" value="1">
                                                            </li>
                                                        </ul>
                                                        <div class="buttons-set">
                                                            <button class="btn-custom btn-sm" type="submit" title="Submit Review">
                                                                Submit Review
                                                            </button>
                                                        </div>
                                                    </fieldset>
                                                </form>

                                            </div>
                                        </div>
                                       </section>
                                       <div class="col-md-12  ">
                                        <div class="page-header">
                                            @if ( $reviews->count()  == 0)
                                            <h1 class="commentTitle"><small class="pull-right ">0 comments</small> Comments </h1>
                                            @elseif ( $reviews->count()  == 1)
                                            <h1 class="commentTitle"><small class="pull-right clearfix">{{ $reviews->count() }} comment</small> Comments </h1>
                                            @else
                                            <h1 class="commentTitle"><small class="pull-right clearfix">{{ $reviews->count() }} comments</small> Comments </h1>
                                            @endif
                                        </div>
                                         <div class="comments-list">
                                            {{-- in productlist cont --}}
                                            @foreach ($reviews as $review)

                                            <div class="media">
                                                <p class="pull-right clearfix"><small>{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y')}} </small> </p>
                                                <div class="photoAndName">

                                                    <a class="media-left" href="#">
                                                        <img width="50px"class="profilePhoto" src="{{ Storage::url($review->user->user_image) }}">
                                                    </a>
                                                    <h4 class="media-heading user_name">{{ $review->user->name }}</h4>
                                                </div>
                                                <div class="media-body">
                                                    <div  class="col-md-12 ">
                                                        <p >{{$review->comment}}</p>

                                                    </div>
                                                    <br>
                                                    <div class="rating-box" >
                                                        <div class="rating" style="width: {{ $review->rating * 20 }}%; "></div>
                                                    </div>
                                                    <div class="pull-right"  id="iconReview">

                                                        <p >
                                                            <form action="{{ route('deletereview' , $review->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                                                <button type="submit"  style="background: none; border: none; cursor: pointer;" title="Delete">
                                                                    <i class="fa fa-trash" id="iconsize" style="color:red; margin-bottom:4px"></i>
                                                                </button>

                                                            </form>
                                                            <a href="" ><i class="fa fa-edit" id="iconsize"  style="color:blue"></i></a>
                                                    </p>
                                                    </div>


                                                 </div>

                                               </div>
                                            @endforeach


                                         </div>



                                      </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </div>

    </div>
    <!-- AND CONTENT -->


<script>
    function setvariant() {
    let selectInput = document.getElementById('variant_id');
    let selectedVariantId = selectInput.value;
    // console.log(selectedVariantId)
    let hiddenInput = document.getElementById('variant');
    hiddenInput.value = selectedVariantId;
    // console.log(hiddenInput.value);
}


    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Errors',
                html: '<ul>' +
                    @foreach ($errors->all() as $error)
                        '<li>{{ $error }}</li>' +
                    @endforeach
                '</ul>',
            });
        @endif
    });
</script>
@endsection
