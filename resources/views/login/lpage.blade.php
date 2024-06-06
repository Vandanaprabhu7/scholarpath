@extends('layout')
@section('content')
<!-- Navigation menu -->
<!-- Your HTML content goes here -->



<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
        <img src="/images/logo.png" style="height:30px;width:180px;padding-left:10px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Navigation ends -->
<div class="background-container">

    <div class="login-form" id="form-login" style="padding-top:70px;top:43%">
        <h2 style="text-align: center; color: #333;">Login Form</h2><br>
        <a href="/" class="close-button" style="top:3%;text-decoration: none;">x</a>
        <form action="{{ route('check') }}" method="post" class="log-form">
            {!! csrf_field() !!}

            <label>Email</label>
            <input type="email" name="semail" id="semail" class="form-control"><br>

            <label>Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="togglePassword">
                        <i id="passwordIcon" class="fa fa-eye"></i>
                    </button>
                </span>
            </div>

            <div class="captcha">
                <label for="captcha-input">Enter Captcha</label>
                <div class="preview"></div>
                <br>
                <div class="captcha-form">
                    <input type=" text" id="captcha" placeholder="Enter captcha text" style="margin-right: 5px;">
                    <button class="captcha-refresh" id="captchaRefresh">
                        <i class="fa fa-refresh"></i>
                    </button>
                </div>
            </div>

            <input type="submit" value="Submit" id="submit-btn" class="btn btn-success">
        </form>
        <p style="text-align: center; margin-top: 20px;">
            Don't have an account? <a href="{{ route('reg.create') }}">Register</a><br>
            Forgot Password? <a href="{{ route('login.password1') }}">Reset Password</a>
        </p>
    </div>
</div>

<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
<!-- Include your custom styles for the background image -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // Reload the current page (may use cached content)

    (function() {
        const fonts = ["cursive", "sans-serif", "serif", "monospace"];
        let captchaValue = "";
        let captchaGenerated = false; // Flag to check if CAPTCHA is generated
        function generateCaptcha() {
            let value = btoa(Math.random() * 1000000000);
            value = value.substr(0, 5 + Math.random() * 5);
            captchaValue = value;
            captchaGenerated = true; // Set the flag to true when CAPTCHA is generated
        }

        function setCaptcha() {

            const colors = ["red", "blue", "green", "purple", "orange"];
            let html = '';
            const captchaLetters = captchaValue.split("");
            for (let i = 0; i < captchaLetters.length; i++) {
                const font = Math.trunc(Math.random() * fonts.length);
                const color = colors[i % colors.length];
                const rotate = -30;
                const fontWeight = (i % 2 === 0) ? "bold" : "normal";
                html += `<span
              style="
                transform: rotate(${rotate}deg);
                font-family: ${fonts[font]};
                color: ${color};
                font-weight: ${fontWeight};
              "
            >${captchaLetters[i]}</span>`;
            }
            document.querySelector(".login-form .captcha .preview").innerHTML = html;
        }
        generateCaptcha();
        setCaptcha();

        function initCaptcha() {
            const refreshButton = document.getElementById("captchaRefresh");
            refreshButton.addEventListener("click", function(event) {
                event.preventDefault();
                document.getElementById('captcha').value = "";
                generateCaptcha();
                setCaptcha();
            });
        }
        initCaptcha();

        function isCaptchaValid(inputCaptcha) {
            return inputCaptcha === captchaValue;
        }
        document.querySelector(".log-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission
            let email = document.getElementById('semail').value;
            let password = document.getElementById('password').value;
            let captcha = document.getElementById('captcha').value;
            let isValid = true;
            if (email === "") {
                isValid = false;
                swal("Error", "Email is required field", "error");
            } else if ((!email.endsWith("@gmail.com") && !email.endsWith("@yahoo.com") && !email.endsWith("@nmamit.in"))) {
                isValid = false;
                swal("Error", "Invalid Email", "error");
            }
            if (isValid && password === "") {
                isValid = false;
                swal("Error", "Password is required field", "error");
            } else if (isValid && !isPasswordValid(password)) {
                isValid = false;
                swal("Error", "Password should be at least 8 characters with at least one number, one capital letter, and one symbol", "error");
            }
            if (isValid && !isCaptchaValid(captcha)) {
                isValid = false;
                swal("Error", "Invalid CAPTCHA", "error");
            }
            if (isValid) {
                if (localStorage.getItem('token')) {
                    swal("Error", "It is recommended to log out before attempting to log in again.", "error");
                } else {
                    document.getElementById('semail').setAttribute('readonly', "");
                    document.getElementById('captcha').setAttribute('readonly', "");
                    document.getElementById('password').setAttribute('readonly', "");
                    this.submit();
                }
            }
        });

        function isPasswordValid(password) {
            event.preventDefault();

            // Add your custom password validation logic here
            if (!/^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}$/.test(password)) {
                swal("Error", "Password should have 8 characters with at least one number, one capital letter, and one symbol", "error");
                return false;
            }
            return true;
        }
    })();
    (function() {
        // Function to toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', togglePasswordVisibility);

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    })();
</script>
@if (session('error'))
<script>
    swal("Error", "{{ session('error') }}", "error");
</script>
@endif

@endsection