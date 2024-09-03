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
                                            <span>Contact Us</span>
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
                        <div id="contact_gmap" class="col-md-12">
                            <div class="page-title">
                                <h1>Contact Us</h1>
                            </div>
                            <div id="googleMap" style="width:1170px; height:400px; margin: 0 auto;"></div>


                            <div class="row clearfix">
                                <div class="col-md-4 contact-info">
                                    <p>Lorem Ipsum has been the industry's standard dummy text
                                        ever since.Lorem Ipsum is simyp.</p>
                                    <ul class="fa-ul">
                                        <li><i class="fa-li fa fa-map-marker"></i>5 Avenue Anatole France 75007</li>
                                        <li><i class="fa-li fa fa-phone"></i>+00-123-456-789</li>
                                        <li><i class="fa-li fa fa-envelope-o"></i><a href="mailto:contact@paris.com">info@yourdomain.com</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-8">
                                    <p class="style1">Send an email. All fields with an (*) are required.</p>
                                    <form id="contactForm">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input name="name" class="form-control required-entry input-text" id="name" placeholder="Name (*)" title="Name" value="" type="text" />
                                                </div>
                                                <div class="form-group">
                                                    <input name="email" class="form-control input-text required-entry validate-email" id="email" placeholder="E-mail (*)" title="Email" value="" type="text" />
                                                </div>
                                                <div class="form-group">
                                                    <input class="input-text form-control" name="telephone" id="telephone" placeholder="Telephone" title="Telephone" value="" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <textarea name="comment" placeholder="Comment (*)" id="comment" title="Comment" class="form-control required-entry input-text" cols="5" rows="3"></textarea>
                                                </div>
                                                <div class="buttons-set">
                                                    <input type="text" name="hideit" id="hideit" value="" style="display:none !important;" />
                                                    <button type="submit" title="Submit" class="button">
                                                        <span>Send Email</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
