
@extends('layout.mainTwo')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
        text-transform: uppercase;
    }

    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .containerPayment {
        /* min-height: calc(100vh - 120px);  */
        /* background: #eee; */
        display: flex;
        align-items: center;
        justify-content: center;
        flex-flow: column;
        padding-bottom: 60px;
        margin-top: 7%;

    }

    .containerPayment form {
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 10px 15px rgba(0,0,0,.1);
        padding: 20px;
        width: 800px;
        padding-top: 160px;
    }

    .containerPayment form .inputBox {
        margin-top: 20px;
    }

    .containerPayment form .inputBox span {
        display: block;
        color: #999;
        padding-bottom: 5px;
    }

    .containerPayment form .inputBox input,
    .containerPayment form .inputBox select {
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid rgba(0,0,0,.3);
        color: #444;
    }

    .containerPayment form .flexbox {
        display: flex;
        gap: 15px;
    }

    .containerPayment form .flexbox .inputBox {
        flex: 1 1 150px;
    }

    .containerPayment form .submit-btn {
        width: 100%;
        background: linear-gradient(45deg, blueviolet, #3270fc);
        margin-top: 20px;
        padding: 10px;
        font-size: 20px;
        color: #fff;
        border-radius: 10px;
        cursor: pointer;
        transition: .2s linear;
    }

    .containerPayment form .submit-btn:hover {
        letter-spacing: 2px;
        opacity: .8;
    }

    .containerPayment .card-container {
        margin-bottom: -150px;
        position: relative;
        height: 250px;
        width: 400px;
    }

    .containerPayment .card-container .front {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background: linear-gradient(45deg, blueviolet, #3270fc);
        border-radius: 5px;
        backface-visibility: hidden;
        box-shadow: 0 15px 25px rgba(0,0,0,.2);
        padding: 20px;
        transform: perspective(1000px) rotateY(0deg);
        transition: transform .4s ease-out;
    }

    .containerPayment .card-container .front .image {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 10px;
    }

    .containerPayment .card-container .front .image img {
        height: 50px;
    }

    .containerPayment .card-container .front .card-number-box {
        padding: 30px 0;
        font-size: 22px;
        color: #fff;
    }

    .containerPayment .card-container .front .flexbox {
        display: flex;
    }

    .containerPayment .card-container .front .flexbox .box:nth-child(1) {
        margin-right: auto;
    }

    .containerPayment .card-container .front .flexbox .box {
        font-size: 15px;
        color: #fff;
    }

    .containerPayment .card-container .back {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: linear-gradient(45deg, blueviolet, #3270fc);
        border-radius: 5px;
        padding: 20px 0;
        text-align: right;
        backface-visibility: hidden;
        box-shadow: 0 15px 25px rgba(0,0,0,.2);
        transform: perspective(1000px) rotateY(180deg);
        transition: transform .4s ease-out;
    }

    .containerPayment .card-container .back .stripe {
        background: #000;
        width: 100%;
        margin: 10px 0;
        height: 50px;
    }

    .containerPayment .card-container .back .box {
        padding: 0 20px;
    }

    .containerPayment .card-container .back .box span {
        color: #fff;
        font-size: 15px;
    }

    .containerPayment .card-container .back .box .cvv-box {
        height: 50px;
        padding: 10px;
        margin-top: 5px;
        color: #333;
        background: #fff;
        border-radius: 5px;
        width: 100%;
    }

    .containerPayment .card-container .back .box img {
        margin-top: 30px;
        height: 30px;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    .success-message {
        color: green;
        font-size: 16px;
        margin-bottom: 20px;
        text-align: center;
    }
    </style>
</head>
<body>

<div class="containerPayment">

    <div class="card-container">

        <div class="front">
            <div class="image">
                <img src="{{ asset('images/chip.jpg') }}" alt="chip">
                 <img src="{{ asset('images/visa.png') }}" alt="">
                {{-- <img src="{{ asset('properties/9VlWkokvQFhzhfuyeicfG0cZx37zLcSYxLykqg14.png"') }}" alt="Chip"> --}}
                {{-- <img src="{{ asset('storage/properties/8jr1X7Ft3D07vsM6k7UW0gProf7lzg7SKWKsRKOu.jpg') }}" alt="Visa"> --}}
                {{-- <img src="{{ asset('storage/properties/9QN6JuWYFgGdDSbr0mwcE9dRjniFH07cgy6SjBoW.webp') }}" alt="Visa"> --}}


            </div>
            <div class="card-number-box">################</div>
            <div class="flexbox">
                <div class="box">
                    <span>card holder</span>
                    <div class="card-holder-name">full name</div>
                </div>
                <div class="box">
                    <span>expires</span>
                    <div class="expiration">
                        <span class="exp-month">mm</span>
                        <span class="exp-year">yy</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="back">
            <div class="stripe"></div>
            <div class="box">
                <span>cvv</span>
                <div class="cvv-box"></div>
                <img src="{{ asset('image/visa.png') }}" alt="">
            </div>
        </div>

    </div>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pay') }}" method="POST">
        @csrf
        <div class="inputBox">
            <span>card number</span>
            <input type="text" name="card_number" maxlength="16" class="card-number-input" value="{{ old('card_number') }}">
            @error('card_number')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        <div class="inputBox">
            <span>card holder</span>
            <input type="text" name="card_holder" class="card-holder-input" value="{{ old('card_holder') }}">
            @error('card_holder')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        <div class="flexbox">
            <div class="inputBox">
                <span>expiration mm</span>
                <select name="exp_month" class="month-input">
                    <option value="" disabled>Select month</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ sprintf('%02d', $i) }}" {{ old('exp_month') == sprintf('%02d', $i) ? 'selected' : '' }}>
                            {{ sprintf('%02d', $i) }}
                        </option>
                    @endfor
                </select>
                @error('exp_month')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>expiration yy</span>
                <select name="exp_year" class="year-input">
                    <option value="" disabled>Select year</option>
                    @for($i = 2024; $i <= 2034; $i++)
                        <option value="{{ $i }}" {{ old('exp_year') == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
                @error('exp_year')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputBox">
                <span>cvv</span>
                <input type="text" name="cvv" maxlength="3" class="cvv-input" value="{{ old('cvv') }}">
                @error('cvv')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <input type="submit" value="submit" class="submit-btn">
    </form>

</div>

<script>
document.querySelector('.card-number-input').oninput = () =>{
    document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
}

document.querySelector('.card-holder-input').oninput = () =>{
    document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
}

document.querySelector('.month-input').oninput = () =>{
    document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
}

document.querySelector('.year-input').oninput = () =>{
    document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
}

document.querySelector('.cvv-input').onmouseenter = () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
}

document.querySelector('.cvv-input').onmouseleave = () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
}

document.querySelector('.cvv-input').oninput = () =>{
    document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
}
</script>

</body>
</html>
@endsection
