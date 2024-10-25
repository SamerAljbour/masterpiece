<div id="sns_footer" class="footer_style vesion2 wrap">
    <div id="sns_footer_top" class="footer">
        <div class="container">
            <div class="container_in">
                <div class="row">

                    <div class="col-md-3 col-sm-12 col-xs-12 column0">
                        <div class="contact_us">
                            <h6>Contact us</h6>
                            <ul class="fa-ul">
                                <li class="pd-right" style="display: flex; align-items: center;">
                                    <i class="fa-li fa fw fa-home"> </i>
                                    Amman , Jordan
                                </li>
                                <li style="display: flex; align-items: center;">
                                    <i class="fa-li fa fw fa-phone"> </i>
                                    <p>+962 (077) 045 2442</p>

                                </li>
                                <li style="display: flex; align-items: center;">
                                    <i class="fa-li fa fw fa-envelope"> </i>
                                    <p >
                                        <a  href="mailto:info@yourdomain.com">samerseran34@gmail.com</a>
                                    </p>

                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-phone-12 col-xs-8 col-sm-5 col-md-4 column column4">
                        <h6>about us</h6>
                        <ul>
                            <div class="module">

                                <div class="content">
                                    an online platform connect seller with the customer across the country
                                </div>
                                <div class="module_ct">
                                    <div class="sns-social">
                                        <!-- <h6>Join in</h6> -->
                                        <!-- <p>Lorem Ipsum is simply dummy text of the.</p> -->
                                        <ul>
                                            <li><a href="#" target="_self" title="SNS Theme" class="fa fa fa-facebook"></a></li>
                                            <li><a href="#" target="_self" title="SNS Theme"  class="fa fa-twitter"> </a></li>
                                            <li><a href="#" target="_self" title="SNS Theme" class="fa fa-google"></a></li>
                                            <li><a href="#" target="_self" title="SNS Theme" class="fa fa-pinterest"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                    <div class="col-phone-12 col-xs-6 col-sm-3 col-md-2 column column2">
                        <h6>account</h6>
                        <ul>
                            <li>
                                <a href="{{ route('userProfile') }}">My account</a>
                            </li>

                            <li>
                                <a href="{{ route('userProfile') }}">Order history</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-phone-12 col-xs-6 col-sm-3 col-md-3 column column4">
                        <div class="subcribe-footer">
                            <div class="block_border block-subscribe">
                                <div class="block_head">
                                    <h6>Newsletter</h6>
                                    <p>Register your email for news</p>
                                </div>
                                <form id="newsletter-validate-detail">
                                    <div class="block_content">
                                        <div class="input-box">
                                            <div class="input_warp">
                                                <input id="newsletter" class="input-text required-entry validate-email" type="text" title="Sign up for our newsletter" placeholder="Your email here" name="email">
                                            </div>
                                            <div class="button_warp">
                                                <button class="button gfont" title="Subcribe" type="submit">
                                                    <span>
                                                        <span>Subscribe</span>
                                                    </span>
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
    </div>

    <div id="sns_footer_bottom" class="footer">
        <div class="container">
            <div class="row">
                <div class="bottom-pd1 col-sm-12">
                    <div class="sns-copyright " style="display: flex;     justify-content: center;">
                        © 2024  All Rights Reserved. Developer by
                        <a title="" data-original-title="Visit SNSTheme.Com!" data-toggle="tooltip" href="https://www.linkedin.com/in/sameraljbour/"> SamerAljbour</a>
                    </div>
                </div>
                <div class="bottom-pd2 col-sm-6">
                    {{-- <div class="payment">
                        <img src="images/sns_paymal.png" alt="">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- AND FOOTER -->

<!-- Scripts -->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/less.min.js"></script>
<script src="js/owl-carousel/owl.carousel.min.js"></script>
<script src="js/sns-extend.js"></script>
<script src="js/custom.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
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
<script src="js/main.js"></script>
</body>
</html>
