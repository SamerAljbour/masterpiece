<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMEN - Login/Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
     <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        :root {
            --primary-color: #c87065;
            --primary-hover: #b15a4f;
            --background-light: #f8f9fa;
        }

        body {
            background-color: var(--background-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .auth-container {
            width: 100%;
            max-width: 450px;
            margin: 20px;
            position: relative;
        }

        .auth-box {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
        }

        .auth-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            padding: 30px;
            text-align: center;
            color: white;
        }

        .auth-header i {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .auth-header h2 {
            margin: 0;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .auth-body {
            padding: 40px;
        }

        .nav-pills {
            margin-bottom: 30px;
            justify-content: center;
        }

        .nav-pills .nav-link {
            color: #666;
            border-radius: 50px;
            padding: 10px 30px;
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link i {
            margin-right: 8px;
        }

        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }

        .form-floating {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-control {
            border-radius: 50px;
            padding: 12px 20px 12px 50px;
            height: auto;
            border: 2px solid #eee;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(200,112,101,0.25);
        }

        .form-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            z-index: 2;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 50px;
            padding: 12px 20px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        .btn-primary i {
            margin-right: 8px;
        }

        .image-upload {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .image-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #eee;
            border-radius: 10px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .image-upload-label:hover {
            border-color: var(--primary-color);
        }

        .image-upload-label i {
            font-size: 24px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        .image-preview {
            max-width: 100px;
            max-height: 100px;
            margin-top: 10px;
            border-radius: 10px;
            display: none;
        }

        .social-login {
            margin-top: 20px;
            text-align: center;
        }

        .social-login p {
            color: #666;
            margin-bottom: 15px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-icons .facebook {
            background: #3b5998;
        }

        .social-icons .google {
            background: #db4437;
        }

        .social-icons .twitter {
            background: #1da1f2;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }

        .forgot-password a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .tab-pane {
            animation: fadeIn 0.5s ease;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-box animate__animated animate__fadeInUp">
            <div class="auth-header">
                <i class="fas fa-couch"></i>
                <h2>Welcome to SIMEN</h2>
            </div>
            <div class="auth-body">
                <ul class="nav nav-pills" id="authTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="pill" data-bs-target="#login" type="button" role="tab">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="pill" data-bs-target="#register" type="button" role="tab">
                            <i class="fas fa-user-plus"></i> Register
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="authTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-floating">

                                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="name@example.com">
                                <label for="loginEmail"> Email address</label>
                            </div>
                            <div class="form-floating">

                                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password">
                                <label for="loginPassword"> Password</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </form>
                        <div class="social-login">
                             Or login as <a href="{{ route('loginRegisterSeller') }}">seller</a></p>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel">
                        <form action="{{ route('storeNeweUser') }}" method="POST">
                            @csrf
                            <div class="form-floating">

                                <input type="text" class="form-control" id="registerName" name="name" placeholder="John Doe">
                                <label for="registerName">   Full Name</label>
                            </div>
                            <div class="form-floating">

                                <input type="email" class="form-control" id="registerEmail" name="email" placeholder="name@example.com">
                                <label for="registerEmail">Email address</label>
                            </div>
                            <div class="form-floating">

                                <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Password">
                                <label for="registerPassword">Password</label>
                            </div>
                            <div class="form-floating">

                                <input type="text" class="form-control" id="registerName" name="phone" placeholder="John Doe">
                                <label for="registerName">   Phone Number</label>
                            </div>
                            <input type="hidden" class="form-control" id="registerPassword" name="role_id" value="1" placeholder="Password">
                            <div class="image-upload">
                                <label for="profileImage" class="image-upload-label">
                                    <div class="text-center">

                                        <p class="mb-0">Click to upload profile image</p>
                                    </div>
                                </label>
                                <input type="file" id="profileImage" class="d-none" accept="image/*" onchange="previewImage(this)">
                                <img id="imagePreview" src="{{ Storage::url('public/usersImages/userDefaultImage.jpeg') }}" class="image-preview mx-auto d-block" alt="Profile preview">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-user-plus"></i> Create Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
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
    </script>
</body>
</html>
