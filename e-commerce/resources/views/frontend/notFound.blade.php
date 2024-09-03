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
                                            <span>404</span>
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
                        <div class="content">
                            <h1>404</h1>
                            <h2>Page not found</h2>
                            <p>Sory but  the page you are looking for does not exit, have been removed or name changed.
                                Go back Homepage or enter the key words to search, please!</p>
                            <form id="newsletter-validate">
                                <div class="input-box">
                                    <div class="input_warp">
                                        <input id="newsletter1" class="input-text"  placeholder="Enter the key words" type="text" name="email">
                                        <button class="button" title="Subscribe" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AND CONTENT -->
            @endsection
