@extends('layout.mainTwo')
@section('content')
<style>


</style>
    <!-- BREADCRUMBS -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
                                    <span>Shop</span>
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
    <div id="sns_content" class="wrap layout-lm">
        <div class="container">
            <div class="row">

                <!-- sns_left -->
                <div id="sns_left" class="col-md-3">
                    <div class="wrap-in">
                        <div class="block block-layered-nav block-layered-nav--no-filters">
                            <div class="block-title">
                                <strong>
                                    <span>Shop By</span>
                                </strong>
                            </div>
                            <div class="block-content toggle-content">
                                <dl id="narrow-by-list">

                                    <form method="GET" action="{{ route('productList') }}">
                                        @csrf
                                        <dt class="odd">Category</dt>
                                        <dd class="odd">
                                            <ol class="category-list">
                                                @foreach ($categories as $category)
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                            <span class="count">({{ $category->products_count }})</span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </dd>




                                    <dt class="odd">Price</dt>
                                    <dd class="odd">
                                        <ol class="js-price">
                                            <li><input type="number" id="amount-1" min="0" name="minPrice"   style="border:0; color:#666;"
                                                    value="" placeholder="Min"></li>
                                            <li><input type="number" id="amount-2" name="maxPrice" style="border:0; color:#666;"
                                                    value="" placeholder="Max"></li>
                                            <li class="style3" style="display: none"></li>
                                        </ol>
                                        {{-- <div id="slider-range"></div> --}}
                                    </dd>


                                </dl>
                                <button type="submit" class="btn-filter " style="margin-top: 10px">Filter Products</button>
                            </form>

                            </div>
                        </div>
                        <div class="block block_cat">
                            <a class="banner5" href="#">
                                <img src="images/banner_right.jpg" alt="">
                            </a>
                        </div>


                        <div class="bestsale">
                            <div class="title">
                                <h3>RECOMMEND</h3>
                            </div>
                            <div class="content">
                                <div id="products_slider12" class="products-slider12 owl-carousel owl-theme"
                                    style="display: inline-block">
                                    <div class="item-row">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/10.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/11.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/12.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/13.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-row">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/14.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/15.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/16.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/17.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-row">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/18.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/19.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/20.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="prd">
                                                    <div class="item-img clearfix">
                                                        <a class="product-image have-additional" href="index3-detail.html"
                                                            title="Modular Modern">
                                                            <span class="img-main">
                                                                <img alt="" src="images/products/21.jpg">
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a href="index3-detail.html" title="Modular Modern">
                                                                    Modular Modern </a>
                                                            </div>
                                                            <div class="item-price">
                                                                <span class="price">
                                                                    <span class="price1">$ 540.00</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="action-bot">
                                                            <div class="wrap-addtocart">
                                                                <button class="btn-cart" title="Add to Cart">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    <span>Add to Cart</span>
                                                                </button>
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


                    </div>
                </div>
                <!-- sns_left -->


                <div id="sns_main" class="col-md-9 col-main">
                    <div id="sns_mainmidle">
                        <div class="page-title category-title">
                            <h1>Women</h1>
                        </div>
                        <div class="category-cms-block"></div>
                        <p class="category-image banner5">
                            <a href="#">
                                <img src="images/banner-grid.jpg" alt="">
                            </a>
                        </p>

                        <div class="category-products">

                            <!-- toolbar clearfix -->

                            <div class="toolbar clearfix">
                                <div class="toolbar-inner">
                                    <p class="view-mode">
                                        <label>View as</label>
                                        <a class="icon-grid" title="Grid" href="index3-listing-grid.html"></a>
                                        <strong class="icon-list" title="List"></strong>
                                    </p>

                                        {{-- <span>per page</span> --}}
                                    </div>
                                    <form action="{{ route('productList') }}" method="GET">
                                        @csrf

                                        <div class="sort-by">
                                            <label>Show</label>
                                            <div class="select-new">
                                                <select name="show" id="leftSelect" class="custom-select">
                                                    <option value="">Select show</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                </select>

                                                <label>Sort by</label>
                                                <select name="sortBy" id="rightSelect" class="custom-select">
                                                    <option value="">Select sort</option>
                                                    <option value="Date desc">Newest First</option>
                                                    <option value="Date asc">Oldest First</option>
                                                    <option value="Price asc">Price: Low to High</option>
                                                    <option value="Price desc">Price: High to Low</option>
                                                    <option value="Rate asc">Rating: Low to High</option>
                                                    <option value="Rate desc">Rating: High to Low</option>
                                                </select>
                                            </div>
                                            <button class="btn-filterTwo" type="submit">Filter</button>
                                        </div>
                                    </form>


                                    <div class="pager">
                                        <p class="amount">
                                            <span>1 to 20 </span>
                                            123 item (s)
                                        </p>
                                        <div class="pages">
                                            <strong>Pages:</strong>
                                            <ol>
                                                <li class="current">1</li>
                                                <li>
                                                    <a href="#">2</a>
                                                </li>
                                                <li>
                                                    <a href="#">3</a>
                                                </li>
                                                <li>
                                                    <a class="next i-next" title="Next" href="#"> Next </a>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- toolbar clearfix -->

                            {{-- ------------------------------------- products ------------------------------------------- --}}

                            <!-- sns-products-container -->
                            <div class="sns-products-container clearfix">
                                <ol id="products-list" class="products-list clearfix">
                                    @if ($products->count() > 0)


                                    @foreach ($products as $product)
                                        <li class="item odd">
                                            <div class="item-inner product_list_style">
                                                <div class="col-left">
                                                    <div class="item-img">
                                                        @if ($product->on_sale)

                                                        <div class="ico-label">
                                                            <span class="ico-product ico-sale">Sale</span>
                                                        </div>
                                                        @endif
                                                        <a class="product-image have-additional" title="Cfg Armani Black"
                                                            href="{{ route('productdetail', $product->id) }}">
                                                            <span class="img-main">
                                                                <img alt="Modular Modern"
                                                                    src="{{ Storage::url($product->image_url) }}">
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-right">
                                                    <div class="item-title">
                                                        <a title="Modular Modern"
                                                            href="{{ route('productdetail', $product->id) }}">{{ $product->name }}</a>
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
                                                    <div class="rating-block">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                @if ($product->reviews->count() > 0)
                                                                <div class="rating" style="width:{{ ($product->reviews->sum('rating') / $product->reviews->count()) * 20 }}%;"></div>
                                                                @else
                                                                <div class="rating" style="width:0%;"></div>

                                                                @endif
                                                            </div>
                                                            <span class="amount">
                                                                <a href="{{ route('productdetail', $product->id) }}#review">({{ $product->reviews->count() }} Reviews)</a>
                                                                <span class="separator">|</span>
                                                                <a href="http://127.0.0.1:8000/productdetail/{{ $product->id }}#review">Add Your Review</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="desc std">
                                                        <p>
                                                            {{ $product->description }}
                                                        </p>
                                                    </div>
                                                    <div class="actions">
                                                        <form action="{{ route('storeToCart') }}" method="POST">
                                                            @csrf
                                                            <input id="qty" class="input-text qty" type="hidden" title="Qty" value="1" name="quantity">
                                                            <input type="hidden" value="{{ Auth::user()->id }}"  name="cart_id">
                                                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                            <input type="hidden" value="{{ $product->price }}" name="price">
                                                            @if ($product->variants->isNotEmpty() && $product->variants->first())
                                                                <input type="hidden" value="{{ $product->variants->first()->id }}" name="variant_id">
                                                            @endif


                                                            <button class="btn-cart" title="Add to Cart"  type="submit">
                                                                Add to Cart
                                                            </button>

                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a class="link-wishlist"
                                                                        data-original-title="Add to Wishlist"
                                                                        data-toggle="tooltip" href="#"
                                                                        title=""></a>
                                                                </li>
                                                                <li>
                                                                    <a class="link-compare"
                                                                        data-original-title="Add to Compare"
                                                                        data-toggle="tooltip" href="#"
                                                                        title=""></a>
                                                                </li>
                                                                <li>
                                                                    <div class="wrap-quickview" data-id="qv_item_8">
                                                                        <div class="quickview-wrap">
                                                                            <a class="sns-btn-quickview qv_btn"
                                                                                data-original-title="View"
                                                                                data-toggle="tooltip" href="#">
                                                                                <span>View</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </form>
                                                        {{-- <button class="btn-cart" title="Add to Cart" onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->image_url }}')">
                                                            Add to Cart
                                                        </button> --}}


                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    @else
                                    <div class="no-products-container">
                                        <img src="{{ asset('assets/img/no product found.png') }}" alt="No Products Found" class="no-products-image">
                                        <p class="no-products-message">Sorry, no products match your selected filters.
                                            <br> Please try adjusting the criteria.</p>
                                    </div>
                                @endif
                                </ol>

                            </div>
                            <!-- sns-products-container -->


                            <!-- toolbar clearfix  bottom-->

                            <div class="toolbar clearfix">
                                <div class="toolbar-inner">
                                    <div class="pager">
                                        <div >{{ $products->links('pagination::bootstrap-5') }}</div>
                                    </div>
                                </div>
                            </div>
                            <!-- toolbar clearfix bottom -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- AND CONTENT -->

    <!-- PARTNERS -->
    <div id="sns_partners" class="wrap">
        <div class="container">
            <div class="slider-wrap">
                <div class="partners_slider_in">
                    <div id="partners_slider1" class="our_partners owl-carousel owl-theme owl-loaded"
                        style="display: inline-block">
                        <div class="item">
                            <a class="banner11" href="#" target="_blank">
                                <img alt="" src="images/brands/1.png">
                            </a>
                        </div>
                        <div class="item">
                            <a class="banner11" href="#" target="_blank">
                                <img alt="" src="images/brands/2.png">
                            </a>
                        </div>
                        <div class="item">
                            <a class="banner11" href="#" target="_blank">
                                <img alt="" src="images/brands/3.png">
                            </a>
                        </div>
                        <div class="item">
                            <a class="banner11" href="#" target="_blank">
                                <img alt="" src="images/brands/4.png">
                            </a>
                        </div>
                        <div class="item">
                            <a class="banner11" href="#" target="_blank">
                                <img alt="" src="images/brands/5.png">
                            </a>
                        </div>
                        <div class="item">
                            <a class="banner11" href="#" target="_blank">
                                <img alt="" src="images/brands/6.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- AND PARTNERS -->
    <script>
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
