<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>forStudents</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/app.css" rel="stylesheet" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <style>
            /*html{line-height:1.15;-webkit-text-size-adjust:100%}
            body{margin:0}
            a{background-color:transparent}[hidden]{display:none}
            html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}
            *,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}*/
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background: #05182D;
            }

        </style>
    </head>
    <body class="bg-white">

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            {{--nav must be sticky--}}
            <nav class="navbar static-top shadow-sm p-3 mb-5 sticky-lg-top">
                @if (Route::has('login'))
                <div class="container">
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

            <header class="masthead">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-xl-6">
                            <div class="text-center text-white">
                                <h1 class="mb-5" style="font-size: 60pt; color: rgb(231, 117, 9);">FIND YOUR HELPER</h1>
                                <h3><i>Struggling with your homeworks? Here you'll find your savior</i> </h3>
                            </div>
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
