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
                    <a class="navbar-brand fs-2" href="index.html"
                       style="color: #EF3A2E; text-shadow: 0 0 20px #EF3A2E; transition: all 0.3s ease-in-out;">
                        <b>forStudents</b>
                    </a>
                    <a class="link text-green-200" href="#discover">What We Do</a>
                    <a class="link text-green-200" href="#blog">Our Mentors</a>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="link text-green-200">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="link text-green-200">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="link text-green-200">Register</a>
                            @endif
                        @endauth
                    <a class="btn btn-danger text-green-200"
                       href="{{url('/forum/threads')}}"
                       style="box-shadow: 0 0 20px #EF3A2E; transition: all 0.3s ease-in-out;"
                       role="button">
                        Join The Forum
                    </a>
                </div>
                @endif
            </nav>
            <div class="container-fluid position-relative hero-container">
                {{--Hero image--}}
                <img src="{{url('img/images/img_1.png')}}" class="img-fluid newImage" alt="hero image">
                <div class="row hero-content">
                    {{-- Center --}}
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
                    container d-block justify-content-center text-center">
                        <h1 class="display-4 fw-bold text-center"
                            style="color: #EF3A2E" id="writing">
                            Find Your Helper...
                        </h1>
                        <div class="text-center d-flex justify-content-center">
                        <p class="text-center text-green-200 m-4" style="word-break: break-all; width: 900px">
                            We are a community of students who are passionate about helping other students
                            succeed in their studies. We are here to help you with your studies and to help you
                            achieve your goals.
                        </p>
                        </div>
                        <a class="btn btn-danger mx-auto m-4"
                           style="box-shadow: 0 0 20px #EF3A2E; transition: all 0.3s ease-in-out;"
                           href="{{url('/forum/threads')}}" role="button">
                            Join The Forum
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 hero-image-box">
                    </div>
                </div>
            </div>
            </header>

            <section class="features-icons text-center" style="background: #001625">
                <div class="do-title" id="discover">
                    <p class="text-green-400">What We Do</p>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                <div class="features-icons-icon d-flex text-center justify-center m-4">
                                    <img class="center" src="{{ asset('img/images/chooseTopic.svg') }}"
                                         alt="teaching" width="100px"
                                         height="100px">
                                </div>
                                <h3 class="text-green-200">1. Choose your topic</h3>
                                <p class="lead mb-0 text-gray-400">
                                    Choose a topic you are interested in and we will find the best articles for you
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                <div class="features-icons-icon d-flex justify-center m-4">
                                    <img class="center" src="{{ asset('img/images/findHelper.svg') }}"
                                         alt="helper" width="100px"
                                         height="100px">
                                </div>
                                <h3 class="text-green-200">2. Choose your Helper</h3>
                                <p class="lead mb-0 text-gray-400">
                                    We have a powerful tool to find the suitest and smartest helper for you</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                                <div class="features-icons-icon d-flex justify-center m-4">
                                    <img class="center" src="{{ asset('img/images/joinTheForum.svg') }}"
                                         alt="forum" width="100px"
                                         height="100px">
                                </div>
                                <h3 class="text-green-200">3. Join the Forum</h3>
                                <p class="lead mb-0 text-gray-400">
                                    Join the community of thousands students who are ready to help and share their experience
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="showcase " style="background: #001625">
                <div class="do-title" id="blog">
                    <p style="text-align: center" class="text-green-400">Our High Rated Helpers</p>
                </div>
                <div class="container" >
                    <div class="row g-0">
                        <div class="col-lg-6 order-lg-2 text-white showcase-img justify-center text-center mt-5">
                            <img src="https://randomuser.me/api/portraits/women/9.jpg?size=medium&seed=123"
                                 alt="cheap" width=300 height="300"
                                 class="rounded-circle mt-5"
                            >
                        </div>
                        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                            <h2 class="text-green-200">Hannah Anelish</h2>
                            <p class="lead mb-0 text-gray-400">
                                Hey there, I'm Hannah. I'm a student of the University of Narxoz.
                                I'm a native English speaker and I have been tutoring for 3 years.
                                I have a lot of experience in teaching English, Math, and Science.
                                I'm a very patient and friendly person, so I'm sure you'll enjoy our lessons together!
                            </p>
                            <button class="btn text-white" type="button"
                                    style="box-shadow: 0 0 20px #EF3A2E;
                                    transition: all 0.3s ease-in-out; margin-top: 1rem; background: #EF3A2E">
                                View Profile</button>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-lg-6 text-white showcase-img text-center mt-5">
                            <img src="https://randomuser.me/api/portraits/men/9.jpg?size=medium&seed=123"
                                 alt="cheap" width=300 height="300"
                                 class="rounded-circle mt-5 mx-5"
                            >
                        </div>
                        <div class="col-lg-6 my-auto showcase-text">
                            <h2 class="text-green-200">John Doe</h2>
                            <p class="lead mb-0 text-gray-400">
                                Hey there, I'm Joseph. I'm a student of the University of Narxoz.
                                I'm a native English speaker and I have been tutoring for 3 years.
                                I have a lot of experience in teaching English, Math, and Science.
                                I'm a very patient and friendly person, so I'm sure you'll enjoy our lessons together!
                            </p>
                            <button class="btn text-white" type="button"
                                    style="box-shadow: 0 0 20px #EF3A2E;
                                    transition: all 0.3s ease-in-out; margin-top: 1rem; background: #EF3A2E">
                                View Profile</button>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-lg-6 order-lg-2 text-white showcase-img mt-5">
                            <img src="https://randomuser.me/api/portraits/men/10.jpg?size=medium&seed=123"
                                 alt="cheap" width=300 height="300"
                                 class="rounded-circle mt-5"
                            >
                        </div>
                        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                            <h2 class="text-green-200">John Lemon</h2>
                            <p class="lead mb-0 text-gray-400">
                                Hey there, I'm John. I'm a student of the University of Narxoz.
                                I'm a native English speaker and I have been tutoring for 3 years.
                                I have a lot of experience in teaching English, Math, and Science.
                                I'm a very patient and friendly person, so I'm sure you'll enjoy our lessons together!
                            </p>
                            <button class="btn text-white" type="button"
                                    style="box-shadow: 0 0 20px #EF3A2E;
                                    transition: all 0.3s ease-in-out; margin-top: 1rem; background: #EF3A2E">
                                View Profile</button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="testimonials text-center bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <h2 class="mb-5">Join the Forum</h2>
                            <button class="btn btn-primary" type="button" style="margin-top: 1rem;">Join the Forum</button>
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
