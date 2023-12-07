@extends('layout')
@section('content')

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js"></script>
</head>

<body style="background-color:white;overflow-y: auto;overflow-x: hidden;">

    <!-- Navigation menu -->
    <nav class="navbar navbar-expand-lg bg-white">
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
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Scholarships
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/allscholarships') }}">All Scholarships</a></li>
                            <li><a class="dropdown-item" href="{{ url('/scholarships') }}">Government Scholarships</a></li>
                            <li><a class="dropdown-item" href="{{ route('pvtscl.index') }}">Private Institute Scholarships</a></li>
                            <li><a class="dropdown-item" href="{{ route('dispscluser') }}">My applied Scholarships</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <script>
                            // Retrieve the 'token' from local storage
                            var token = localStorage.getItem('token');

                            // Function to navigate to the profile page with the token as a query parameter
                            function goToProfile() {
                                window.location.href = '/profile';
                            }
                        </script>
                        <a class="nav-link" onclick="goToProfile()" style="cursor: pointer" w;>Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer; color: #ff6a76; font-size: 20px;margin-right:20px" aria-current="page" href="{{ route('logout') }}" onclick="localStorage.clear();event.preventDefault();  document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
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
    </script>
    <!-- Navigation ends -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                margin: 0;
                overflow: hidden;
            }

            #container {
                display: flex;
                overflow: hidden;
                width: calc(50% * var(--card-count, 7));
                animation: scrollAnimation 20s linear infinite;
            }

            .card {
                margin-top: 20px;
                flex: 0 0 calc(100% / var(--card-count, 7));
                box-sizing: border-box;
                padding: 20px;
                box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.4) !important;
                margin-right: 10px;
                transition: transform 0.5s ease;
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .card img {
                max-width: 100%;
                height: auto;
                margin-bottom: 10px;
            }

            @keyframes scrollAnimation {
                0% {
                    transform: translateX(calc(100% / var(--card-count, 7)));
                }

                7% {
                    transform: translateX(calc(50% / var(--card-count, 7)));
                }

                14% {
                    transform: translateX(calc(0% / var(--card-count, 7)));
                }

                21% {
                    transform: translateX(calc(-50% / var(--card-count, 7)));
                }

                28% {
                    transform: translateX(calc(-100% / var(--card-count, 7)));
                }

                35% {
                    transform: translateX(calc(-150% / var(--card-count, 7)));
                }

                42% {
                    transform: translateX(calc(-200% / var(--card-count, 7)));
                }

                49% {
                    transform: translateX(calc(-250% / var(--card-count, 7)));
                }

                56% {
                    transform: translateX(calc(-300% / var(--card-count, 7)));
                }

                63% {
                    transform: translateX(calc(-350% / var(--card-count, 7)));
                }

                70% {
                    transform: translateX(calc(-400% / var(--card-count, 7)));
                }

                77% {
                    transform: translateX(calc(-450% / var(--card-count, 7)));
                }

                84% {
                    transform: translateX(calc(-500% / var(--card-count, 7)));
                }

                91% {
                    transform: translateX(calc(-550% / var(--card-count, 7)));
                }

                98% {
                    transform: translateX(calc(-600% / var(--card-count, 7)));
                }

                99% {
                    transform: translateX(calc(-650% / var(--card-count, 7)));
                }

                100% {
                    transform: translateX(calc(-700% / var(--card-count, 7)));
                }
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div id="container" style="--card-count: 7;">
            <div class="card">
                <h3>PMSSS ( Prime Ministers Special Scholarship Scheme)</h3>
                <p>Unlock your potential with PMSSS Scholarship. Apply now for a chance to win!</p>
                <a class="btn btn-primary" href="https://www.aicte-india.org/bureaus/jk">Apply Now</a>
            </div>

            <div class="card">
                <h3>SOF Girl Child Scholarship Scheme (G.C.S.S)</h3>
                <p>Empowering girl students through our scholarship scheme. Don't miss this opportunity!</p>
                <a class="btn btn-primary" href="https://sofworld.org/girl-child-scholarship-scheme-gcss">Apply Now</a>

            </div>

            <div class="card">
                <h3>Education Scholarship Scheme for Army Personnel (ESSA)</h3>
                <p>Avail the this scholarship. Seize the chance!</p>
                <a class="btn btn-primary" href="https://scholarship.awesindia.com/">Apply Now</a>

            </div>

            <div class="card">
                <h3>CSIR Innovation Award for School Children (CIASC)</h3>
                <p>Showcase your innovation and win the prestigious CSIR Innovation Award. Apply now!</p>
                <a class="btn btn-primary" href="https://www.csir.res.in/">Apply Now</a>

            </div>

            <div class="card">
                <h3>Shiksha ki Udaan Scholarship program for girls</h3>
                <p>Empower girls through our scholarship program. Join "Shiksha ki Udaan" today!</p>
                <a class="btn btn-primary" href="https://iiflsamasta.com/">Apply Now</a>
            </div>

            <div class="card">
                <h3>National Scholarship Scheme (SAKSHAM) HRDM</h3>
                <p>Embark on your educational journey with the National Scholarship Scheme. Apply now!</p>
                <a class="btn btn-primary" href="https://medhavionline.org/">Apply Now</a>
            </div>

            <div class="card">
                <h3>NSP Post Matric Scholarships Minorities</h3>
                <p>Scholarships for minorities. Secure your education with NSP Post Matric Scholarships!</p>
                <a class="btn btn-primary" href="https://scholarships.gov.in/">Apply Now</a>
            </div>
        </div>

        <script>
            function applyNow(scholarshipName) {
                alert('You are applying for: ' + scholarshipName);
                // You can replace the alert with actual code to handle the application process
            }
        </script>

        <script>
            const container = document.getElementById('container');

            container.addEventListener('mouseenter', () => {
                container.style.animationPlayState = 'paused';
            });

            container.addEventListener('mouseleave', () => {
                container.style.animationPlayState = 'running';
            });
        </script>

    </body>

    </html>

    <body>

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
        <!-- My Services Section Start -->
        <section class="services" id="services">
            <div class="content">
                <div class="title"><span>Choose Scholarship</span></div>
                <div class="boxes">
                    <div class="box">
                        <a href="{{ url('/scholarships') }}">
                            <div class="icon">
                                <i class="fa fa-institution fa-lg" style="padding-top:15px"></i>
                            </div>
                            <div class="topic">All Scholarships</div>
                            <p>
                                Explore a wide range of scholarships catering to various fields and qualifications.
                            </p>
                        </a>
                    </div>

                    <div class="box">
                        <a href="{{ url('/scholarships') }}"> <!-- Add the URL of the target page here -->
                            <div class="icon">
                                <i class="fa fa-handshake-o lg" style="padding-top:15px"></i>
                            </div>
                            <div class="topic">Government Scholarships</div>
                            <p>
                                Government Scholarships to elevate your future with support and opportunities.
                            </p>
                        </a>
                    </div>

                    <div class="box">
                        <a href="minority-scholarships.html"> <!-- Add the URL of the target page here -->
                            <div class="icon">
                                <i class="	fa fa-users lg" style="padding-top:15px"></i>
                            </div>
                            <div class="topic">Minority Scholarships</div>
                            <p>
                                Scholarships dedicated to minority community students.
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <!-- contct Section Start -->
    <section class="contact" id="contact" style="padding-bottom: 40px;">
        <div class="content" style="width: 550px;border: 4px solid rgba(64, 112, 244, 0.1); padding: 20px 100px;">
            <div class="title"><span>Contact Us</span></div>
            <!-- Contact Form -->
            @csrf
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" require>
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" require>
            </div>
            <br>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary" onclick="sendFeedback()">Submit</button><br>
        </div>


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
        if (message === '') {
            Swal.fire({
                icon: 'warning',
                title: 'Error',
                text: "Kindly provide a message in the designated field.",
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

</html>
@stop