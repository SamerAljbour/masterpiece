@extends('layout.mainTwo')
@section('content')
    <style>

        .success-container {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .success-icon {
            font-size: 48px;
            color: #c8a165;
            margin-bottom: 20px;
        }
        .success-message {
            font-size: 24px;
            font-weight: 300;
            color: #333;
            margin-bottom: 20px;
        }
        .redirect-message {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }
        .home-button {
            background-color: #c8a165;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
        }
        .home-button:hover, .home-button:focus {
            background-color: #b18c55;
            color: #fff;
        }
        .model-image {
            max-width: 100%;
            height: auto;
            margin: 30px 0;
        }
        .order-details {
            background-color: #f9f9f9;
            border-left: 3px solid #c8a165;
            padding: 15px;
            margin-top: 30px;
        }
        .order-number {
            font-weight: bold;
            color: #c8a165;
        }
        .header {
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #c8a165;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="success-container">
                    <div class="header">
                        <span class="logo">SIMEN</span>
                    </div>
                    <div class="text-center">
                        <div class="success-icon">✓</div>
                        <h1 class="success-message">Payment Successful</h1>

                        <p class="redirect-message text-center">You will be redirected to the homepage in <span id="countdown">5</span> seconds.</p>
                    </div>
                    {{-- <div class="order-details">
                        <p>Order Number: <span class="order-number">#12345678</span></p>
                        <p>Thank you for your payment! Your transaction has been successfully processed.

                        </p>                    </div> --}}
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="btn home-button">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    var seconds = 5;
    var countdownElement = document.getElementById("countdown");

    var countdownTimer = setInterval(function() {
        seconds--;
        countdownElement.textContent = seconds; // Update the countdown display

        if (seconds <= 0) {
            clearInterval(countdownTimer);
            window.location.href = "http://127.0.0.1:8000/home"; // Replace with your home page URL
        }
    }, 1000);
});

    </script>
@endsection
