@extends('layout')
@section('content')

<head>
    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session("error") }}'
    });
</script>
@endif
<!-- Navigation menu -->
<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
        <img src="/images/logo.png" style="height:30px;width:180px;padding-left:10px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<!-- Navigation ends -->
<div class="w3-cursive" style="text-align:center;font-size:200%">REGISTRATION FORM</div>
<div class="background-container">
    <div class="login-form" style="padding-top:70px;top:40%;">
        <a href="/" class="close-button" style="top:3%;text-decoration: none;">x</a>
        <form action="{{ route('register') }}" method="post" class="reg-form">
            {!! csrf_field() !!}
            <div class="custom-form">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" class="form-control">
                </div><br>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" class="form-control">
                </div>
            </div>
            <br>

            <div class="form-group">
                <label for="semail">Email</label>
                <input type="email" name="semail" id="semail" class="form-control">
            </div><br>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="togglePassword">
                            <i id="passwordIcon" class="fa fa-eye"></i>
                        </button>
                    </span>
                </div>
            </div><br>

            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <div class="input-group">
                    <input type="password" name="cpassword" id="cpassword" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="toggleCPassword">
                            <i id="cpasswordIcon" class="fa fa-eye"></i>
                        </button>
                    </span>
                </div>
            </div>
            <br>
            <label>Are you User/Provider? Select an option</label>
            <select name="dropdown" id="dropdown" class="form-control" required>
                <option value="" disabled selected>Select</option>
                <option value="Admin">Scholarship Provider</option>
                <option value="Client">User</option>
            </select>

            <br>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>

    </div>
</div>

<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
<!-- Include your custom styles for the background image -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    (function() {
        document.querySelector(".reg-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission
            let fname = document.getElementById('fname').value;
            let email = document.getElementById('semail').value;
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('cpassword').value;
            let isValid = true;
            if (fname === "") {
                isValid = false;
                swal("Error", "First Name is required field", "error");
            }
            if (isValid && email === "") {
                isValid = false;
                swal("Error", "Email is required field", "error");
            } else if (isValid && (!email.endsWith("@gmail.com") && !email.endsWith("@yahoo.com") && !email.endsWith("@nmamit.in"))) {
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
            if (isValid && confirmPassword === "") {
                isValid = false;
                swal("Error", "Confirm Password is required field", "error");
            } else if (isValid && confirmPassword !== password) {
                isValid = false;
                swal("Error", "Password and Confirm Password do not match", "error");
            }
            if (isValid) {
                if (localStorage.getItem('token')) {
                    swal("Error", "It is recommended to log out before attempting to Signup.", "error");
                } else {
                    // swal({
                    //     title: "Signing in...",
                    //     text: "You are being redirected.",
                    //     icon: "success",
                    //     timer: 3000, // 2 seconds
                    //     buttons: false, // Disable the "OK" button
                    // });
                    if (localStorage.getItem('token')) {
                        swal("Error", "It is recommended to log out before attempting to sign in.", "error");
                    } else {
                        document.getElementById('fname').setAttribute('readonly', "");
                        document.getElementById('lname').setAttribute('readonly', "");
                        document.getElementById('cpassword').setAttribute('readonly', "");
                        document.getElementById('password').setAttribute('readonly', "");
                        document.getElementById('semail').setAttribute('readonly', "");
                        this.submit();
                    }
                }
            }
        });

        function isPasswordValid(password) {
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
        document.getElementById('toggleCPassword').addEventListener('click', toggleCPasswordVisibility);

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

        function toggleCPasswordVisibility() {
            const cpasswordInput = document.getElementById('cpassword');
            const cpasswordIcon = document.getElementById('cpasswordIcon');
            if (cpasswordInput.type === 'password') {
                cpasswordInput.type = 'text';
                cpasswordIcon.classList.remove('fa-eye');
                cpasswordIcon.classList.add('fa-eye-slash');
            } else {
                cpasswordInput.type = 'password';
                cpasswordIcon.classList.remove('fa-eye-slash');
                cpasswordIcon.classList.add('fa-eye');
            }
        }
    })();
</script>
@endsection