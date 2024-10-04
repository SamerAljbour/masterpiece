@extends('layout.mainTwo')
@section('content')
<style>
    .flex-fill{
        display: none
    }
    .d-none{
        display: flex;
        align-items: center;
        justify-content: space-between
        /* flex-direction: row */
    }
    .pagination > .active > a, .pagination > .active > span,
    .pagination > .active > a:hover, .pagination > .active > span:hover,
    .pagination > .active > a:focus, .pagination > .active > span:focus {
    position: relative;
    float: left;
    padding: 5.7px 16px;
    margin-left: -1px;
    line-height: 1.42857143;
    background-color: #e34444 !important;
    color: white !important;
    text-decoration: none;
    background-color: #fff;
    border: 0px solid #ddd !important;
    border-color: #e34444 !important
}
.pagination > li > a, .pagination > li > span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: black !important;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.pager li > a, .pager li > span {
    display: inline-block;
    padding: 5px 14px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px !important;
}


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
                                    <a title="Go to Home Page" href="#">
                                        <i class="fa fa-home"></i>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="category3 last">
                                    <span>Funiture</span>
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


                                    <dt class="odd">Category</dt>
                                    <dd class="odd">
                                        <ol>
                                            <li>
                                                <a href="#">
                                                    Sofas & Couches
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Living Room Furniture
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Television Stands
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Bedroom Furniture
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Coffee Tables
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                        </ol>
                                    </dd>

                                    <dt class="odd">Price</dt>
                                    <dd class="odd">
                                        <ol class="js-price">
                                            <li><input type="text" id="amount-1" readonly style="border:0; color:#666;"
                                                    value="1250"></li>
                                            <li><input type="text" id="amount-2" readonly style="border:0; color:#666;"
                                                    value="9999"></li>
                                            <li class="style3">FILLTER</li>
                                        </ol>
                                        <div id="slider-range"></div>
                                    </dd>
                                    <dt class="even">Manufacturer</dt>
                                    <dd class="even">
                                        <ol class="configurable-swatch-list last-child">
                                            <li>
                                                <a class="swatch-link" href="#">
                                                    <span class="swatch-label"> Sofas & Couches </span>
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="swatch-link" href="#">
                                                    <span class="swatch-label"> Living Room Furniture </span>
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="swatch-link" href="#">
                                                    <span class="swatch-label"> Television Stands </span>
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="swatch-link" href="#">
                                                    <span class="swatch-label"> Bedroom Furniture </span>
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                        </ol>
                                    </dd>
                                    <dt class="last odd">Color</dt>
                                    <dd class="last odd color-img">
                                        <ol class="configurable-swatch-list last-child">
                                            <li style="line-height: 19px;">
                                                <a class="swatch-link has-image" href="#">
                                                    <span class="swatch-label" style="height:15px; width:15px;">
                                                        <img width="15" height="15" title="Red" alt="Red"
                                                            src="images/shopby/color1.jpg">
                                                        <span>Red</span>
                                                    </span>
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li style="line-height: 19px;">
                                                <a class="swatch-link has-image" href="#">
                                                    <span class="swatch-label" style="height:15px; width:15px;">
                                                        <img width="15" height="15" title="Yellow" alt="Yellow"
                                                            src="images/shopby/color2.jpg">
                                                        <span>Yellow</span>
                                                    </span>
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li style="line-height: 19px;">
                                                <a class="swatch-link has-image" href="#">
                                                    <span class="swatch-label" style="height:15px; width:15px;">
                                                        <img width="15" height="15" title="Blue" alt="Blue"
                                                            src="images/shopby/color3.jpg">
                                                        <span>Blue</span>
                                                    </span>
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                            <li style="line-height: 19px;">
                                                <a class="swatch-link has-image" href="#">
                                                    <span class="swatch-label" style="height:15px; width:15px;">
                                                        <img width="15" height="15" title="Green" alt="Green"
                                                            src="images/shopby/color4.jpg">
                                                        <span>Green</span>
                                                    </span>
                                                    <span class="count">(12)</span>
                                                </a>
                                            </li>
                                        </ol>
                                    </dd>
                                </dl>
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
                                    <div class="limiter">
                                        <label>Show</label>
                                        <div class="select-new">
                                            <div class="select-inner jqtransformdone">
                                                <div class="jqTransformSelectWrapper" style="z-index: 10; width: 80px;">
                                                    <div>
                                                        <span style="width: 50px;"> 20 </span>
                                                        <a class="jqTransformSelectOpen" href="#"></a>
                                                    </div>
                                                    <ul style="width: 78px; display: none; visibility: visible;">
                                                        <li>
                                                            <a class="selected" href="#"> 20 </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> 28 </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> 36 </a>
                                                        </li>
                                                    </ul>
                                                    <select class="select-limit-show jqTransformHidden"
                                                        onchange="setLocation(this.value)" style="">
                                                        <option selected="selected"> 20 </option>
                                                        <option> 28 </option>
                                                        <option> 36 </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <span>per page</span>
                                    </div>
                                    <div class="sort-by">
                                        <label>Sort by</label>
                                        <div class="select-new">
                                            <div class="select-inner jqtransformdone">
                                                <div class="jqTransformSelectWrapper" style="z-index: 10; width: 118px;">
                                                    <div>
                                                        <span style="width: 50px;"> Position </span>
                                                        <a class="jqTransformSelectOpen" href="#"></a>
                                                    </div>
                                                    <ul style="width: 116px; display: none; visibility: visible;">
                                                        <li class="active">
                                                            <a class="selected" href="#"> Position </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> Name </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"> Price </a>
                                                        </li>
                                                    </ul>
                                                    <select class="select-sort-by jqTransformHidden"
                                                        onchange="setLocation(this.value)" style="">
                                                        <option selected="selected"> Position </option>
                                                        <option> Name </option>
                                                        <option> Price </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  <a class="set-desc" title="Set Descending Direction" href="http://demo.snstheme.com/sns-simen/index.php/women.html?dir=desc&order=position"></a> -->
                                    </div>
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
                                    @foreach ($products as $product)
                                        <li class="item odd">
                                            <div class="item-inner product_list_style">
                                                <div class="col-left">
                                                    <div class="item-img">
                                                        <div class="ico-label">
                                                            <span class="ico-product ico-sale">Sale</span>
                                                        </div>
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
                                                                    <span class="price2">$ 600.00</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-block">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" style="width:60%"></div>
                                                            </div>
                                                            <span class="amount">
                                                                <a href="{{ route('productdetail', $product->id) }}#review">({{ $product->reviews->count() }} Reviews)</a>
                                                                <span class="separator">|</span>
                                                                <a href="#">Add Your Review</a>
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
@endsection
