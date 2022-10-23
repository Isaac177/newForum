<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>forStudents</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/app.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/new.css') }}">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-white">
            <header>
            <nav class="navbar shadow-sm p-3 mb-5 sticky-lg-top">
                @if (Route::has('login'))
                <div class="container text-white">
                    <a class="navbar-brand fs-2" href="index.html" style="color: #EF3A2E">
                        <b>forStudents</b>
                    </a>
                    <a class="link" href="#discover">What We Do</a>
                    <a class="link" href="#blog">Our Mentors</a>
                    <a class="link" href="#contact">Get In Touch With Us</a>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="link">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="link">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="link">Register</a>
                            @endif
                        @endauth
                    <a class="btn btn-danger" href="{{url('/forum')}}" role="button">Join The Forum</a>
                </div>
                @endif
            </nav>
            <div class="container-fluid position-relative hero-container">
                <div class="row hero-content">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h1 class="display-4 fw-bold" style="color: #EF3A2E">Find Your Helper...</h1>
                        <p class="fs-8">We are a community of students who are passionate about helping other students
                            succeed in their studies. We are here to help you with your studies and to help you
                            achieve your goals.</p>
                        <a class="btn btn-danger" href="{{url('/forum')}}" role="button">Join The Forum</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 hero-image-box">
                        <img src="{{url('/img/images/heroImg.png')}}" alt="Image" class="hero-image"/>
                    </div>
                </div>
            </div>
            </header>

            <section class="features-icons bg-light text-center">
                <div class="do-title" id="discover">
                    <p>What We Do</p>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                <div class="features-icons-icon d-flex text-center justify-center m-4">
                                    <img class="center" src="{{ asset('img/images/chooseTopic.svg') }}" alt="teaching" width="100px"
                                         height="100px">
                                </div>
                                <h3>1. Choose your topic</h3>
                                <p class="lead mb-0">Choose a topic you are interested in and we will find the best articles for you</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                <div class="features-icons-icon d-flex justify-center m-4">
                                    <img class="center" src="{{ asset('img/images/findHelper.svg') }}" alt="helper" width="100px"
                                         height="100px">
                                </div>
                                <h3>2. Choose your Helper</h3>
                                <p class="lead mb-0">We have a powerful tool to find the suitest and smartest helper for you</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                                <div class="features-icons-icon d-flex justify-center m-4">
                                    <img class="center" src="{{ asset('img/images/joinTheForum.svg') }}" alt="forum" width="100px"
                                         height="100px">
                                </div>
                                <h3>3. Join the Forum</h3>
                                <p class="lead mb-0">Join the community of thousands students who are ready to help and share their experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="showcase bg-white">
                <div class="do-title" id="blog">
                    <p style="text-align: center; margin: 4rem 0 4rem 0;">Our High Rated Helpers</p>
                </div>
                <div class="container bg-white" >
                    <div class="row g-0">
                        <div class="col-lg-6 order-lg-2 text-white showcase-img justify-center text-center">
                            {{--avatar--}}
                            <img src="{{ asset('img/images/heroImg.png') }}" alt="cheap" width=500 height="500">
                        </div>
                        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                            <h2>Hannah Anelish</h2>
                            <p class="lead mb-0">
                                Hey there, I'm Hannah. I'm a student of the University of Narxoz. I'm a native English speaker and I have been tutoring for 3 years. I have a lot of experience in teaching English, Math, and Science. I'm a very patient and friendly person, so I'm sure you'll enjoy our lessons together!
                            </p>
                            <button class="btn btn-primary" type="button" style="margin-top: 1rem;">View Profile</button>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-lg-6 text-white showcase-img">
                            <img src="{{ asset('img/images/heroImg.png') }}" alt="cheap" width=500 height="500">
                        </div>
                        <div class="col-lg-6 my-auto showcase-text">
                            <h2>Joseph Clinton</h2>
                            <p class="lead mb-0">
                                Hey there, I'm Joseph. I'm a student of the University of Narxoz. I'm a IT specialist and I have been tutoring for 3 years. I have a lot of experience in teaching English, Math, and Science. I'm a very patient and friendly person, so I'm sure you'll enjoy our lessons together!
                            </p>
                            <button class="btn btn-primary" type="button" style="margin-top: 1rem;">View Profile</button>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-lg-6 order-lg-2 text-white showcase-img">
                            <img src="{{ asset('img/images/heroImg.png') }}" alt="cheap" width=500 height="500">
                        </div>
                        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                            <h2>John Lemon</h2>
                            <p class="lead mb-0">
                                Hey there, I'm John. I'm a student of the University of Narxoz. I'm Finance specialist and I have been tutoring for 3 years. I have a lot of experience in teaching English, Math, and Science. I'm a very patient and friendly person, so I'm sure you'll enjoy our lessons together!
                            </p>
                            <button class="btn btn-primary" type="button" style="margin-top: 1rem;">View Profile</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="testimonials text-center bg-light">
                {{--big button join the forum--}}
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <h2 class="mb-5">Join the Forum</h2>
                            <button class="btn btn-primary" type="button" style="margin-top: 1rem;">Join the Forum</button>
                        </div>
                    </div>
            </section>

            <section class="call-to-action text-white text-center" id="signup">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-xl-6">
                            <h2 class="mb-4">Get in touch with us</h2>

                            <div class="contact-form" id="contact">
                                <div class="container-form">
                                    <form action="form.php" method="post">
                                        <input type="text" name="name" placeholder="Enter your name" required><br>
                                        <input type="email" name="email" placeholder="Enter your email address" required><br>
                                        <input type="text" name="subject" placeholder="Enter your subject" required><br>
                                        <textarea type="text" name="message" rows="8" id="message" placeholder="Message" required></textarea><br>
                                        <button type="submit" id="submitButton" class="btn btn-primary btn-lg">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 about-us" data-aos="fade-right" data-aos-delay="200">
                            <h2 class="text-white-50">About us</h2>
                            <p style="text-align: justify;" class="text-white-50">
                                We are a team of students who are ready to help you with your homework. We have a lot of experience in different subjects and we are ready to share it with you. We are ready to help you with your homework and we are ready to share our experience with you.
                            </p>
                        </div>
                        <div class="col-lg-3 newsletter" data-aos="fade-right" data-aos-delay="200">
                            <h2 class="text-white-50">Newsletter</h2>
                            <p class="text-white-50">Stay update with our latest news</p>
                            <div class="form-element">
                                <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 Contact Us" data-aos="fade-left" data-aos-delay="200">
                            <h2 class="text-white-50">What we do</h2>
                            <div class="flex-row">
                                <p style="text-align: justify;" class="text-white-50">
                                    We help students with their homework. We have a lot of experience in different subjects and we are ready to share it with you. We are ready to help you with your homework, and we are ready to share our experience with you.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 follow" data-aos="fade-left" data-aos-delay="200">
                            <h2 class="text-white-50">Follow us</h2>
                            <p class="text-white-50">Let us be Social</p>
                            <div>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-4">
                                        <a href="#!"><i class="bi-facebook fs-3"></i></a>
                                    </li>
                                    <li class="list-inline-item me-4">
                                        <a href="#!"><i class="bi-twitter fs-3"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#!"><i class="bi-instagram fs-3"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rights flex-row text-center">
                    <h4 class="droits text-white-50">
                        © Copyright 2022 All rights reserved
                    </h4>
                </div>
                <div class="move-up">
                <span>
                   <a href="#nav"><i class="fas fa-arrow-circle-up fa-2x"></i></a>
                </span>
                </div>
            </footer>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

            <script src="js/scripts.js"></script>

            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            </body>
    </body>
</html>
