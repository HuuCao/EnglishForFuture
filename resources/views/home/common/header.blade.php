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
                <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a
                    questions?</a>
                <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> (+84 798 012
                    416)</a>
                <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span>
                    caominhhuu2108@gmail.com</a>
            </div>
            <div class="col-lg-3 text-right">
                @if (Session::get('username') == null)
                    <a href="{{ asset('login') }}" class="small mr-3"><span class="icon-unlock-alt"></span> Log
                        In</a>
                    <a href="register" class="small btn btn-primary px-4 py-2 rounded-0"><span
                            class="icon-users"></span> Register</a>
                @else
                    <p>{{ Session::get('username') }}</p>
                    <a href="{{ asset('logout') }}" class="small mr-3"><span class="icon-unlock-alt"></span>
                        Log Out</a>
                @endif
            </div>
        </div>
    </div>
</div>
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="{{ asset('home') }}" class="d-block">
                    <img src="{{ asset('public/home/images/logo.png') }}" alt="Image" class="img-fluid">
                </a>
            </div>
            <div class="mr-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active">
                            <a href="" class="nav-link text-left">Home</a>
                        </li>
                        <li class="has-children">
                            <a href="#" class="nav-link text-left">About Us</a>
                            <ul class="dropdown">
                                <li><a href="#">Our Teachers</a></li>
                                <li><a href="#">Our School</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-left">Admissions</a>
                        </li>
                        <li>
                            <a href="{{ asset('course') }}" class="nav-link text-left">Courses</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-left">Contact</a>
                        </li>
                        <li>
                            <a href="{{ asset('test') }}" class="nav-link text-left">Test</a>
                        </li>
                    </ul>
                    </ul>
                </nav>

            </div>
            <div class="ml-auto">
                <div class="social-wrap">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-google"></span></a>
                    <a href="#"><span class="icon-qrcode"></span></a>

                    <a href="#"
                        class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                            class="icon-menu h3"></span></a>
                </div>
            </div>

        </div>
    </div>

</header>