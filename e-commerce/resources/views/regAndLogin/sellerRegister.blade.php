<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMcZ6ZKKjCz3WXABHgPfcu7z5aGA4m1ZZkFfgzL" crossorigin="anonymous">

    <!-- Fonts and icons -->
    <base href="{{ url('/') }}/">

  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            padding: 20px;
        }
        .auth-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            overflow: hidden;
            width: 420px;
            max-width: 100%;
            position: relative;
        }
        .auth-header {
            position: relative;
            color: white;
            padding: 30px 20px;
            text-align: center;
            overflow: hidden;
        }
        .auth-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, #4e73df, #224abe);
            opacity: 0.9;
            z-index: 1;
        }
        .auth-header h3 {
            position: relative;
            z-index: 2;
            font-size: 28px;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        .auth-toggle {
            position: relative;
            z-index: 2;
            display: flex;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 5px;
            margin-top: 15px;
        }
        .toggle-btn {
            flex: 1;
            padding: 10px;
            border: none;
            background: transparent;
            color: white;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 8px;
            font-weight: 500;
        }
        .toggle-btn.active {
            background: white;
            color: #4e73df;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .auth-body {
            padding: 40px 30px;
            position: relative;
            height: 400px;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .auth-form {
            position: absolute;
            top: 40px;
            left: 30px;
            right: 30px;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .form-floating {
            margin-bottom: 1.2rem;
        }
        .form-floating > .form-control {
            padding: 1rem 0.75rem;
            height: calc(3.5rem + 2px);
            line-height: 1.25;
            border-radius: 10px;
            border: 2px solid #e1e5f1;
            transition: all 0.3s;
        }
        .form-floating > label {
            padding: 1rem 0.75rem;
        }
        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.25rem rgba(78,115,223,0.1);
        }
        .btn-primary {
            background: linear-gradient(45deg, #4e73df, #224abe);
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(78,115,223,0.2);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(78,115,223,0.3);
        }
        .social-login {
            display: flex;
            justify-content: center;
            margin-top: 25px;
        }
        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
            color: white;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .social-btn:hover {
            transform: translateY(-3px) scale(1.05);
        }
        .facebook { background: linear-gradient(45deg, #3b5998, #1a237e); }
        .google { background: linear-gradient(45deg, #db4437, #d32f2f); }
        .twitter { background: linear-gradient(45deg, #1da1f2, #039be5); }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
            color: #6c757d;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e1e5f1;
        }
        .divider span {
            padding: 0 10px;
        }

        .form-check-input {
            width: 1.1em;
            height: 1.1em;
            margin-top: 0.2em;
            cursor: pointer;
        }
        .form-check-input:checked {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        /* Animation classes */
        .slide-out {
            opacity: 0;
            transform: translateX(-100%);
        }
        .slide-in {
            opacity: 1;
            transform: translateX(0);
        }

        /* Decorative elements */
        .decoration {
            position: absolute;
            background: linear-gradient(45deg, #4e73df33, #224abe33);
            border-radius: 50%;
            z-index: 0;
        }
        .decoration-1 {
            width: 100px;
            height: 100px;
            top: -50px;
            left: -50px;
        }
        .decoration-2 {
            width: 150px;
            height: 150px;
            bottom: -75px;
            right: -75px;
        }
        /* Keeping most of the original styles */
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            padding: 20px;
        }
        .auth-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            overflow: hidden;
            width: 420px;
            max-width: 100%;
            position: relative;
        }
        /* ... keeping other original styles ... */

        /* Updated styles for form visibility */


        .auth-form.active {
            display: block; /* Show only active form */
            opacity: 1;
        }

        /* Adjusting form floating styles for new fields */
        .form-floating {
            margin-bottom: 1rem;
        }
        .form-floating > .form-control {
            padding: 1rem 0.75rem;
            height: calc(3.5rem + 2px);
        }

        /* Scroll bar styling */
        .auth-body::-webkit-scrollbar {
            width: 6px;
        }
        .auth-body::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .auth-body::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="decoration decoration-1"></div>
    <div class="decoration decoration-2"></div>
    <div class="auth-header">
        <h3><i class="fas fa-chart-line me-2"></i>KaiAdmin</h3>
        <div class="auth-toggle">
            <button class="toggle-btn active" id="loginToggle">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </button>
            <button class="toggle-btn" id="registerToggle">
                <i class="fas fa-user-plus me-2"></i>Register
            </button>
        </div>
    </div>
    <div class="auth-body" id="authBody" style="overflow: hidden">
        <!-- Login Form -->
        <form class="auth-form login-form active" id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-floating">
                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="name@example.com">
                <label for="loginEmail"><i class="fas fa-envelope me-2"></i>Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Password">
                <label for="loginPassword"><i class="fas fa-lock me-2"></i>Password</label>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        Remember me
                    </label>
                </div>
                <a href="#" class="text-primary text-decoration-none">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </button>

            <div class="divider">
                <span>or continue with</span>
            </div>

            <div class="social-login">
                <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-btn google"><i class="fab fa-google"></i></a>
                <a href="#" class="social-btn twitter"><i class="fab fa-twitter"></i></a>
            </div>
        </form>

        <!-- Register Form -->
       <form class="auth-form register-form" action="{{ route('storeNeweUser') }}" method="POST" id="registerForm" style="opacity: 0; transform: translateX(100%);">
    @csrf

    {{-- Display Validation Errors --}}
    <div id="errorMessages" class="alert alert-danger d-none">
        <ul id="errorList"></ul>
    </div>

    <div class="form-floating">
        <input type="text" class="form-control" name="name" id="registerName" placeholder="Full Name" value="{{ old('name') }}">
        <label for="registerName"><i class="fas fa-user me-2"></i>Full Name</label>
        <div class="invalid-feedback" id="nameError"></div> <!-- Error message for Full Name -->
    </div>

    <div class="form-floating">
        <input type="email" name="email" class="form-control" id="registerEmail" placeholder="name@example.com" value="{{ old('email') }}">
        <label for="registerEmail"><i class="fas fa-envelope me-2"></i>Email address</label>
        <div class="invalid-feedback" id="emailError"></div> <!-- Error message for Email -->
    </div>

    <div class="form-floating">
        <input type="password" name="password" class="form-control" id="registerPassword" placeholder="Password">
        <label for="registerPassword"><i class="fas fa-lock me-2"></i>Password</label>
        <div class="invalid-feedback" id="passwordError"></div> <!-- Error message for Password -->
    </div>

    <div class="form-floating">
        <input type="text" name="location" class="form-control" id="registerLocation" placeholder="Location" value="{{ old('location') }}">
        <label for="registerLocation"><i class="fas fa-map-marker-alt me-2"></i>Location</label>
        <div class="invalid-feedback" id="locationError"></div> <!-- Error message for Location -->
    </div>

    <div class="form-floating">
        <input type="text" name="phone" class="form-control" id="registerPhone" placeholder="Phone Number" value="{{ old('phone') }}">
        <label for="registerPhone"><i class="fas fa-phone me-2"></i>Phone Number</label>
        <div class="invalid-feedback" id="phoneError"></div> <!-- Error message for Phone Number -->
    </div>

    <div class="form-floating">
        <input type="text" name="address" class="form-control" id="registerAddress" placeholder="Address" value="{{ old('address') }}">
        <label for="registerAddress"><i class="fas fa-home me-2"></i>Address</label>
        <div class="invalid-feedback" id="addressError"></div> <!-- Error message for Address -->
    </div>

    <div class="form-floating">
        <input type="file" name="user_image" class="form-control" id="registerImage">
        <label for="registerImage"><i class="fas fa-image me-2"></i>Image</label>
    </div>

    <input type="hidden" name="role_id" value="2">

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-user-plus me-2"></i>Create Account
    </button>
</form>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginToggle = document.getElementById('loginToggle');
    const registerToggle = document.getElementById('registerToggle');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const authBody = document.getElementById('authBody');

    function switchForm(showLogin) {
        if (showLogin) {
            loginToggle.classList.add('active');
            registerToggle.classList.remove('active');
            registerForm.style.opacity = 0;
            registerForm.style.transform = 'translateX(100%)';
            loginForm.style.opacity = 1;
            loginForm.style.transform = 'translateX(0)';
            authBody.style.overflowY = 'hidden'; // Hide overflow in login form

        } else {
            registerToggle.classList.add('active');
            loginToggle.classList.remove('active');
            loginForm.style.opacity = 0;
            loginForm.style.transform = 'translateX(-100%)';
            registerForm.style.opacity = 1;
            registerForm.style.transform = 'translateX(0)';
            authBody.style.overflowY = 'auto'; // Show overflow in register form

        }
    }

    loginToggle.addEventListener('click', () => switchForm(true));
    registerToggle.addEventListener('click', () => switchForm(false));
});
document.addEventListener('DOMContentLoaded', function () {
        @if(session('successRegister'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('successRegister') }}",
            });
        @endif

        @if(session('failedLogin'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('failedLogin') }}",
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
    // validtion
    document.getElementById('registerForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting
    let isValid = true;
    let errorMessages = [];

    // Clear previous error messages
    document.getElementById('errorList').innerHTML = '';
    document.getElementById('errorMessages').classList.add('d-none');

    // Validate Full Name
    const name = document.getElementById('registerName').value.trim();
    const nameRegex = /^[A-Za-z\s]{2,}$/; // 2 words with no digits or special characters
    if (!nameRegex.test(name)) {
        isValid = false;
        errorMessages.push('Full Name must be at least 2 words and contain no digits or special characters.');
        document.getElementById('nameError').innerText = 'Invalid full name';
    }

    // Validate Email
    const email = document.getElementById('registerEmail').value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email regex
    if (!emailRegex.test(email)) {
        isValid = false;
        errorMessages.push('Email address is not valid.');
        document.getElementById('emailError').innerText = 'Invalid email address';
    }

    // Validate Password
    const password = document.getElementById('registerPassword').value;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,12}$/; // 8-12 characters, at least one upper, one lower, one digit, and one special character
    if (!passwordRegex.test(password)) {
        isValid = false;
        errorMessages.push('Password must be 8-12 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.');
        document.getElementById('passwordError').innerText = 'Invalid password';
    }

    // Validate Location
    const location = document.getElementById('registerLocation').value.trim();
    if (!location) {
        isValid = false;
        errorMessages.push('Location cannot be empty.');
        document.getElementById('locationError').innerText = 'Location is required';
    }

    // Validate Phone Number
    const phone = document.getElementById('registerPhone').value.trim();
    const phoneRegex = /^\d{10}$/; // Must be exactly 10 digits
    if (!phoneRegex.test(phone)) {
        isValid = false;
        errorMessages.push('Phone number must be exactly 10 digits long.');
        document.getElementById('phoneError').innerText = 'Invalid phone number';
    }

    // Validate Address
    const address = document.getElementById('registerAddress').value.trim();
    if (!address) {
        isValid = false;
        errorMessages.push('Address cannot be empty.');
        document.getElementById('addressError').innerText = 'Address is required';
    }

    // Show error messages
    if (!isValid) {
        document.getElementById('errorMessages').classList.remove('d-none');
        errorMessages.forEach(function (message) {
            const li = document.createElement('li');
            li.textContent = message;
            document.getElementById('errorList').appendChild(li);
            window.scrollTo({ top: 0, behavior: 'smooth' });

        });
    } else {
        // If valid, submit the form
        this.submit();
    }
});
</script>

</body>
</html>
