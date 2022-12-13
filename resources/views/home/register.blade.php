<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Academics &mdash; EnglishForFuture</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('public/home/fonts/icomoon/style.css')}}">
        
        <link rel="stylesheet" href="{{asset('public/home/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/home/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('public/home/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/home/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/home/css/owl.theme.default.min.css')}}">
        
        <link rel="stylesheet" href="{{asset('public/home/css/jquery.fancybox.min.css')}}">
        
        <link rel="stylesheet" href="{{asset('public/home/css/bootstrap-datepicker.css')}}">
        
        <link rel="stylesheet" href="{{asset('public/home/fonts/flaticon/font/flaticon.css')}}">
        
        <link rel="stylesheet" href="{{asset('public/home/css/aos.css')}}">
        <link href="{{asset('public/home/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="{{asset('public/home/css/style.css')}}">
        
        </head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a> 
            <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a> 
            <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@mydomain.com</a> 
          </div>
          <div class="col-lg-3 text-right">
            <a href="{{asset('login')}}" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
            <a href="{{asset('register')}}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>
          </div>
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html" class="d-block">
              <img src="{{asset('public/home/images/logo.jpg')}}" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                  <a href="index.html" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="about.html" class="nav-link text-left">About Us</a>
                  <ul class="dropdown">
                    <li><a href="teachers.html">Our Teachers</a></li>
                    <li><a href="about.html">Our School</a></li>
                  </ul>
                </li>
                <li>
                  <a href="admissions.html" class="nav-link text-left">Admissions</a>
                </li>
                <li>
                  <a href="courses.html" class="nav-link text-left">Courses</a>
                </li>
                <li>
                    <a href="contact.html" class="nav-link text-left">Contact</a>
                  </li>
              </ul>                                                                                                                                                                                                                                                                                          </ul>
            </nav>

          </div>
          <div class="ml-auto">
            <div class="social-wrap">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>

              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
            </div>
          </div>
         
        </div>
      </div>

    </header>

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('{{asset('public/home/images/bg_1.jpg')}}')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Register</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Register</span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
          
          <form action="" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div style="color: red">{{Session::get('errthongbao')}}</div>
                        <div class="col-md-12 form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control form-control-lg" value="{{Session::get('username')}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{Session::get('email')}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" value="{{Session::get('first_name')}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" value="{{Session::get('last_name')}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" id="birthday" name="birthday" class="form-control form-control-lg" value="{{Session::get('birthday')}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" class="form-control form-control-lg" value="{{Session::get('phone')}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Giới tính</label>
                            <div style="display: flex; margin-top: 10px">
                              <div style="display: flex; align-items: center" class="form-check">
                                  <input style="width: 20px; height: 20px" class="form-check-input" type="radio" name="sex" value="0"
                                         id="display"checked />
                                  <label style="
                                   font-family: 'Montserrat';
                                   font-style: normal;
                                   font-weight: 400;
                                   font-size: 15px;
                                   color: #666666;
                                   margin-left: 10px;
                                   margin-top: 5px;
                                   " class="form-check-label" for="flexRadioDefault1">
                                      Nam
                                  </label>
                              </div>
                              <div style="
                                display: flex;
                                align-items: center;
                                margin-left: 30px;
                                " class="form-check">
                                  <input style="width: 20px; height: 20px" class="form-check-input" type="radio" value="1" name="sex"
                                         id="display1"  />
                                  <label style="
                                   font-family: 'Montserrat';
                                   font-style: normal;
                                   font-weight: 400;
                                   font-size: 15px;
                                   color: #666666;
                                   margin-left: 10px;
                                   margin-top: 5px;
                                   " class="form-check-label" for="flexRadioDefault2">
                                      Nữ
                                  </label>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="password" id="pword" name="pword" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword2">Re-type Password</label>
                            <input type="password" id="pword2" name="pword2" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Register" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>

    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4"><img src="{{asset('public/home/images/logo.png')}}" alt="Image" class="img-fluid"></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>  
            <p><a href="#">Learn More</a></p>
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Our Campus</span></h3>
            <ul class="list-unstyled">
                <li><a href="#">Acedemic</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Our Interns</a></li>
                <li><a href="#">Our Leadership</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Human Resources</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Our Courses</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Math</a></li>
                  <li><a href="#">Science &amp; Engineering</a></li>
                  <li><a href="#">Arts &amp; Humanities</a></li>
                  <li><a href="#">Economics &amp; Finance</a></li>
                  <li><a href="#">Business Administration</a></li>
                  <li><a href="#">Computer Science</a></li>
              </ul>
          </div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Contact</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Help Center</a></li>
                  <li><a href="#">Support Community</a></li>
                  <li><a href="#">Press</a></li>
                  <li><a href="#">Share Your Story</a></li>
                  <li><a href="#">Our Supporters</a></li>
              </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

  </div>
  <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="{{asset('public/home/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('public/home/js/jquery-migrate-3.0.1.min.js')}}')}}"></script>
  <script src="{{asset('public/home/js/jquery-ui.js')}}"></script>
  <script src="{{asset('public/home/js/popper.min.js')}}"></script>
  <script src="{{asset('public/home/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/home/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('public/home/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('public/home/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('public/home/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('public/home/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('public/home/js/aos.js')}}"></script>
  <script src="{{asset('public/home/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('public/home/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('public/home/js/jquery.mb.YTPlayer.min.js')}}"></script>




  <script src="{{asset('public/home/js/main.js')}}"></script>

</body>

</html>