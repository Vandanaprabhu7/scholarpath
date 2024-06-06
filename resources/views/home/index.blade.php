@extends('layouts.main')

@section('content')
<html>

<head>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://unpkg.com/sweetalert/dist/sweetalert.css">

</head>
</section><a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev" style="color: blue;">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden" style="color: blue;">Previous</span>
</a>

<div class="overlay" id="overlay1">
    <!doctype html>
    <html lang="en" data-bs-theme="auto">

    <head>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.118.2">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>ScholarPath</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    </head>
</div>

<body>
    <div class="toast fade show position-fixed" role="alert" aria-live="assertive" aria-atomic="true" style="bottom: 50px; right: 10px; z-index: 1000;">
        <div class="toast-header">
            <strong class="me-auto"> <img src="/images/logo.png" style="height:40px;width:180px;">
            </strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, Welcome to our website!
        </div>
    </div>
    <!-- Navigation menu -->
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid">
            <img src="/images/logo.png" style="height:30px;width:180px;padding-left:10px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav"> <!-- Align the navigation links to the right -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a> <!-- Add the "active" class to make "Home" active by default -->
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                    <li class="nav-item">
                        <a id="login-button" class="nav-link nav-link-login-signup2" style="cursor: pointer;">Login</a>
                    </li>

                    <li class="nav-item">
                        <a id="signup-button" class="nav-link nav-link-login-signup2" style="cursor: pointer;">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        document.getElementById('signup-button').addEventListener('click', function() {
            var token = localStorage.getItem('token');
            if (token) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Error',
                    text: 'Already Logged-in',
                    showConfirmButton: false,
                    timer: 1000
                });
            } else {
                window.location.href = '/reg';
            }
        });
        document.getElementById('login-button').addEventListener('click', function() {
            var token = localStorage.getItem('token');
            if (token) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Error',
                    text: 'Already Logged-in',
                    showConfirmButton: false,
                    timer: 1000
                });
            } else {
                window.location.href = '/login';
            }
        });

        function logout() {
            if (localStorage.getItem('token') !== null) {
                localStorage.removeItem('token');
                Swal.fire({
                    icon: 'success',
                    title: 'Logged Out',
                    text: 'Successfully logged out',
                    showConfirmButton: false,
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Cannot Logout',
                    text: 'Before you log out, make sure you are logged in.',
                    showConfirmButton: false,
                });
            }
        }
    </script>
    <!-- Navigation ends -->



    <!-- Home Section Start -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/bg.png" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block custom-caption" style="color:black;
                      text-align: left;
                      padding-top: 10%;
                      display: flex;
                      left: 5%;
                      margin-right: 10px;
                      justify-content: center;
                      align-items: center;
                      height: 100%;
                      color: #0E2431;
                      bottom: 0;">

                    <h1 style="margin-right:700px; margin-top:50px;font-size:40px;">Connecting Dreams</h1>
                    <p style="margin-right:550px ;margin-top:50px;font-size:20px">Our platform bridges the gap between scholarship providers and ambitious students. Scholarship providers can easily list their opportunities, while students can effortlessly apply and manage their documentation on our website, streamlining the path to educational success.</p>
                    <ol class="carousel-indicators" style="top:60%">
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></li>
                    </ol>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/bg2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block custom-caption" style="color:black;
                      text-align: left;
                      padding-top: 10%;
                      display: flex;
                      left: 5%;
                      margin-right: 10px;
                      justify-content: center;
                      align-items: center;
                      height: 100%;
                      color: #0E2431;
                      bottom: 0;">
                    <h1 style="margin-right:500px;margin-top:50px;font-size:40px;">Fueling Opportunities for All</h1>
                    <p style="margin-right: 550px; ;margin-top:50px;font-size:20px">Our inclusive platform invites scholarship providers to showcase their offerings and students to seize them. Providers can post scholarships, students can apply efficiently, and all documentation is managed seamlessly within our website. Join us on the journey to excellence.</p>
                    <ol class="carousel-indicators" style="top:60%">
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-label="Slide 1"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></li>
                    </ol>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/bg3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block custom-caption" style="color:black;
                     text-align: left;
                      padding-top: 10%;
                      display: flex;
                      left: 5%;
                      margin-right: 10px;
                      justify-content: center;
                      align-items: center;
                      height: 100%;
                      color: #0E2431;
                      bottom: 0;">
                    <h1 style="margin-right:700px;margin-top:50px;font-size:40px;">Empowering Education</h1>
                    <p style="margin-right:550px ;margin-top:50px;font-size:20px">Our dynamic platform unites scholarship providers and students on a shared mission. Providers post scholarships, students apply seamlessly, and all documentation resides in one convenient place on our website. Join our community, and together, we empower educational aspirations.</p>
                    <ol class="carousel-indicators" style="top:60%">
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-label="Slide 1"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="active" aria-current="true" aria-label="Slide 3"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Apply Process Area -->
    <section class="apply-process section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="process-item">
                        <div class="icon-wrapper">
                            <i class="fa fa-search" style="font-size:48px;" aria-hidden="true"></i></i> <!-- Add the Font Awesome icon here -->
                        </div>
                        <h4>Register</h4>
                        <p>Register as a user now to stay updated with the latest available Scholarships.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="process-item">
                        <div class="icon-wrapper">
                            <i class="fa fa-search" style="font-size:48px;" aria-hidden="true"></i></i> <!-- Add the Font Awesome icon here -->
                        </div>
                        <h4>Search for scholarship</h4>
                        <p>You will receive appropriate scholarship leads based on your preferred search.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="process-item">
                        <div class="icon-wrapper">
                            <i class="fa fa-handshake-o" style="font-size:48px;"></i>
                        </div>
                        <h4>Get Assistance</h4>
                        <p>Apply directly through official website of the scholarship or get assistance from us.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Section Start -->
        <section class="about" id="about">
            <div class="content">
                <div class="title"><span>About Us</span></div>
                <div class="about-details">
                    <div class="left">
                        <img src="https://media.istockphoto.com/id/1371896330/photo/happy-asian-woman-in-his-graduation-day.jpg?s=612x612&w=0&k=20&c=Ur3moWl1fKFms-6UACseglMjoYAynYKzsanZpgK8lFk=" alt="" />
                    </div>
                    <div class="right">
                        <p>
                            Our website is a comprehensive scholarship search and application portal, dedicated to helping both scholarship providers and students streamline the scholarship process. Scholarship providers can easily add their scholarship opportunities, while students can seamlessly apply for them, all within our user-friendly platform. We prioritize a smooth and secure documentation process, ensuring that both providers and applicants can manage scholarships efficiently. Discover the perfect scholarship or post your opportunities today with our user-centric scholarship portal.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- contct Section Start -->
        <section class="contact" id="contact" style="padding-bottom: 40px;">
            <div class="content" style="width: 550px;border: 4px solid rgba(64, 112, 244, 0.1); padding: 20px 100px;">
                <div class="title"><span>Contact Us</span></div>
                <!-- Contact Form -->
                @csrf
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" onclick="sendFeedback()">Submit</button>
                <!-- End Contact Form -->
            </div>
            <!-- Contact Page Content End -->
            </div>
        </section>
</body>

<br><br>
<footer class="footer" style="padding: 1px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <p style="color:white;padding-top:20px;">&copy; 2023 ScholarPath. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script src="/js/home.js"></script>
<script>
    function sendFeedback() {
        email = document.getElementById('email').value;
        name = document.getElementById('name').value;
        message = document.getElementById('message').value;
        if (email === '' || name === '' || message === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please fill in all the fields.',
                timer: 1000,
                showConfirmButton: false,
            });
        } else {
            var recipients = "vandanaprabhu702@gmail.com,shetvaish@gmail.com";
            console.log(email, message, name);
            Email.send({
                Host: "smtp.elasticemail.com",
                Username: "vandanaprabhu702@gmail.com",
                Password: "ECE65D1578529A982F0CCF537C56FD007684",
                To: email,
                From: 'vandanaprabhu702@gmail.com',
                Subject: "ScholarPath",
                Body: "Dear " + name + ",<br><br>Thank you for your time!"
            })
            Email.send({
                Host: "smtp.elasticemail.com",
                Username: "vandanaprabhu702@gmail.com",
                Password: "ECE65D1578529A982F0CCF537C56FD007684",
                To: recipients,
                From: 'vandanaprabhu702@gmail.com',
                Subject: "Feedback",
                Body: "Dear Admin,<br><br>" + name + " has sent you a feedback about ScholarPath:<br><br>\n" + message,
            }).then(() => {
                Swal.fire({
                    title: "Sent Successfully",
                    text: "Thank you for you time!",
                    icon: "success",
                    timer: 1000,
                    showConfirmButton: false,
                });
            });
            document.getElementById('email').value = "";
            document.getElementById('message').value = "";
            document.getElementById('name').value = "";
        }
    };
</script>
@endsection

</html>