@extends('layout.mainTwo')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    /* Contact Section Styles */
    .contact-section {
        padding: 80px 0;
        background-color: #f5f5f5;
    }

    .section-title {
        color: #333;
        margin-bottom: 20px;
        font-size: 36px;
    }

    .section-subtitle {
        color: #666;
        margin-bottom: 50px;
    }

    /* Contact Cards */
    .contact-card {
        background: #fff;
        padding: 30px;
        margin-bottom: 30px;
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .icon-wrapper {
        width: 50px;
        height: 50px;
        background: #c0935b;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .icon-wrapper i {
        color: #fff;
        font-size: 20px;
    }

    .contact-card h4 {
        color: #333;
        margin-bottom: 15px;
    }

    .contact-card p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* Contact Form */
    .contact-form {
        background: #fff;
        padding: 40px;
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .form-control {
        height: 46px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
        resize: vertical;
        max-height: 40vh;
        /* min-height: 20vj */
    }

    textarea.form-control {
        height: auto;
    }

    .btn-primary {
        background-color: #c0935b;
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        letter-spacing: 1px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #b08449;
    }
    </style>
          <!-- Get in Touch Section -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-title">Get in Touch</h2>
                <p class="section-subtitle">We'd love to hear from you. Our team is always here to help.</p>
            </div>
        </div>

        <div class="row">
            <!-- Contact Info Cards -->
            <div class="col-md-4">
                <!-- Visit Us Card -->
                {{-- <div class="contact-card">
                    <div class="icon-wrapper">
                        <i class="glyphicon glyphicon-map-marker"></i>
                    </div>
                    <h4>Visit Us</h4>
                    <p>123 Design Street<br>
                    Furniture District<br>
                    New York, NY 10001</p>
                </div> --}}

                <!-- Call Us Card -->
                <div class="contact-card">
                    <div class="icon-wrapper" >
                        <i class="fas fa-phone" style=" margin-bottom: 13px;"></i>
                                        </div>
                    <h4>Call Us</h4>
                    <p>+962 (077) 045 2442<br>
                    Mon - Fri, 9am - 6pm</p>
                </div>

                <!-- Email Us Card -->
                <div class="contact-card">
                    <div class="icon-wrapper">
                        <i class="glyphicon glyphicon-envelope"></i>
                    </div>
                    <h4>Email Us</h4>
                    <p>
                        samerseran34@gmail.com</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <form class="contact-form" action="{{ route('contactus.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="subject" type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" rows="6" style="min-height:20vh" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                </form>
            </div>
        </div>
    </div>
</section>


            @endsection
