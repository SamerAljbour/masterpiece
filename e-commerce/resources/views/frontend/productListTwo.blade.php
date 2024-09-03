@extends('layout.mainTwo')
@section('content')


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
                                                    <li><input type="text" id="amount-1" readonly style="border:0; color:#666;" value="1250"></li>
                                                    <li><input type="text" id="amount-2" readonly style="border:0; color:#666;" value="9999"></li>
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
                                            <dt class="last odd">Colors</dt>
                                            <dd class="last odd color-img">
                                                <ol class="configurable-swatch-list last-child">
                                                    <li style="line-height: 19px;">
                                                        <a class="swatch-link has-image" href="#">
                                                            <span class="swatch-label" style="height:15px; width:15px;">
                                                                <img width="15" height="15" title="Red" alt="Red" src="images/shopby/color1.jpg">
                                                                <span>Red</span>
                                                            </span>
                                                            <span class="count">(12)</span>
                                                        </a>
                                                    </li>
                                                    <li style="line-height: 19px;">
                                                        <a class="swatch-link has-image" href="#">
                                                            <span class="swatch-label" style="height:15px; width:15px;">
                                                                <img width="15" height="15" title="Yellow" alt="Yellow" src="images/shopby/color2.jpg">
                                                                <span>Yellow</span>
                                                            </span>
                                                            <span class="count">(12)</span>
                                                        </a>
                                                    </li>
                                                    <li style="line-height: 19px;">
                                                        <a class="swatch-link has-image" href="#">
                                                            <span class="swatch-label" style="height:15px; width:15px;">
                                                                <img width="15" height="15" title="Blue" alt="Blue" src="images/shopby/color3.jpg">
                                                                <span>Blue</span>
                                                            </span>
                                                            <span class="count">(12)</span>
                                                        </a>
                                                    </li>
                                                    <li style="line-height: 19px;">
                                                        <a class="swatch-link has-image" href="#">
                                                            <span class="swatch-label" style="height:15px; width:15px;">
                                                                <img width="15" height="15" title="Green" alt="Green" src="images/shopby/color4.jpg">
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
                                        <div id="products_slider12" class="products-slider12 owl-carousel owl-theme" style="display: inline-block">
                                            <div class="item-row">
                                                <div class="item">
                                                    <div class="item-inner">
                                                        <div class="prd">
                                                            <div class="item-img clearfix">
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/10.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/11.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/12.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/13.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/14.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/15.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/16.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/17.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/18.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/19.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/20.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                                <a class="product-image have-additional" href="index3-detail.html" title="Modular Modern">
                                                                    <span class="img-main">
                                                                        <img alt="" src="images/products/21.jpg">
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title">
                                                                        <a href="index3-detail.html" title="Modular Modern"> Modular Modern </a>
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
                                                 <strong class="icon-grid" title="Grid"></strong>
                                                 <a class="icon-list" title="List" href="index3-listing-list.html"></a>
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
                                                             <select class="select-limit-show jqTransformHidden" onchange="setLocation(this.value)" style="">
                                                                 <option selected="selected" value="http://demo.snstheme.com/sns-simen/index.php/women.html?limit=20"> 20 </option>
                                                                 <option value="http://demo.snstheme.com/sns-simen/index.php/women.html?limit=28"> 28 </option>
                                                                 <option value="http://demo.snstheme.com/sns-simen/index.php/women.html?limit=36"> 36 </option>
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
                                                             <select class="select-sort-by jqTransformHidden" onchange="setLocation(this.value)" style="">
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



                                     <!-- sns-products-container -->
                                     <div class="sns-products-container clearfix">
                                         <div class="products-grid row style_grid">

                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label">
                                                                <span class="ico-product ico-sale">Sale</span>
                                                            </div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/1.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot action123">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/2.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot action123">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label">
                                                                <span class="ico-product ico-new">New</span>
                                                            </div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/3.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot action123">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/4.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot action123">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/5.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/6.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label">
                                                                <span class="ico-product ico-new">New</span>
                                                            </div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/7.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/8.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label">
                                                                <span class="ico-product ico-sale">Sale</span>
                                                                <span class="ico-product ico-new">New</span>
                                                            </div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/9.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="http://demo.snstheme.com/sns-simen/index.php/wishlist/index/add/product/7/form_key/6iZ4DMZ3uAVETUtc/"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/10.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label">
                                                                <span class="ico-product ico-new">New</span>
                                                            </div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/11.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/12.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label">
                                                                    <span class="ico-product ico-sale">Sale</span>
                                                                    <span class="ico-product ico-new">New</span>
                                                                </div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/25.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/14.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/15.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/16.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label">
                                                                <span class="ico-product ico-sale">Sale</span>
                                                                <span class="ico-product ico-new">New</span>
                                                            </div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/17.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/18.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/19.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare"
                                                                            href="#"
                                                                            title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="item col-lg-3 col-md-4 col-sm-4 col-xs-6 col-phone-12">
                                                 <div class="item-inner">
                                                     <div class="prd">
                                                         <div class="item-img clearfix">
                                                             <div class="ico-label"></div>
                                                             <a class="product-image have-additional"
                                                                title="Modular Modern"
                                                                href="index3-detail.html">
                                                                <span class="img-main">
                                                               <img src="images/products/20.jpg" alt="">
                                                                </span>
                                                             </a>
                                                         </div>
                                                         <div class="item-info">
                                                             <div class="info-inner">
                                                                 <div class="item-title">
                                                                     <a title="Modular Modern"
                                                                        href="index3-detail.html">
                                                                         Modular Modern </a>
                                                                 </div>
                                                                 <div class="item-price">
                                                                     <div class="price-box">
                                                                <span class="regular-price">
                                                                    <span class="price">
                                                                        <span class="price1">$ 540.00</span>
                                                                        <span class="price2">$ 600.00</span>
                                                                    </span>
                                                                </span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="action-bot">
                                                             <div class="wrap-addtocart">
                                                                 <button class="btn-cart"
                                                                         title="Add to Cart">
                                                                     <i class="fa fa-shopping-cart"></i>
                                                                     <span>Add to Cart</span>
                                                                 </button>
                                                             </div>
                                                             <div class="actions">
                                                                 <ul class="add-to-links">
                                                                     <li>
                                                                         <a class="link-wishlist"
                                                                            href="#"
                                                                            title="Add to Wishlist">
                                                                             <i class="fa fa-heart"></i>
                                                                         </a>
                                                                     </li>
                                                                     <li>
                                                                         <a class="link-compare" href="#" title="Add to Compare">
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
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>




                                         </div>
                                     </div>
                                     <!-- sns-products-container -->


                                     <!-- toolbar clearfix  bottom-->

                                     <div class="toolbar clearfix">
                                         <div class="toolbar-inner">
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
                            <div id="partners_slider1" class="our_partners owl-carousel owl-theme owl-loaded" style="display: inline-block">
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
