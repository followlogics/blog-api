<nav _vik class="navbar navbar-expand-sm hide navbar-fixed-top navbar-light navbartransparent navbar-inverse sticky-top">
    <div _vik class="container">
        <a _vik class="navbar-brand" href="#"><img src="" id="siteLogo" style="width: 50px" class="hide" />My Task is VKRAB</a>
        <button _vik class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbars">
            <span _vik class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand/logo -->
        <div class="collapse navbar-collapse" id="navbars" _vik>
            <ul _vik class="navbar-nav">
                <li _vik class="nav-item">
                    <a _vik class="nav-link" href="/">Home <?php echo '&#8377; &#x20b9; :'; ?></a>
                </li>
                <li _vik class="nav-item">
                    <a _vik class="nav-link" data-href="login" href="login">Login</a>
                </li>
                <li _vik class="nav-item">
                    <a _vik class="nav-link" data-href="signup" href="signup">Signup</a>
                </li>
                <li class="nav-item"> <div class="g-signin2" data-onsuccess="onSignIn" data-onload="false" data-theme="dark"></div></li>
            </ul>
        </div>
    </div>
</nav>
<div id="demo" class="carousel slide hide" data-ride="carousel" _vik>

    <!-- Indicators -->
    <ul class="carousel-indicators" _vik>
        @foreach ($files as $f=>$file)
        <li data-target="#demo" data-slide-to="{{$f}}" class="@if($f==0)  active @endif" _vik></li>
        @endforeach
    </ul>
    <div class="carousel-inner" _vik>
        @foreach ($files as $f=>$file)
        <div class="carousel-item @if($f==0)  active @endif" _vik>
            <img src="{{ URL::asset('/storage/media/time/'.$file->file_name) }}" alt="{{$file->realfile_name}}"  width="1100" height="500" _vik />
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev" _vik>
        <span class="carousel-control-prev-icon" _vik></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next" _vik>
        <span class="carousel-control-next-icon" _vik></span>
    </a>
</div>
<header id="header-wrap" _vik>

    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar" _vik>
        <div class="container" _vik>
            <div class="navbar-header" _vik>
                <button class="navbar-toggler" _vik type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" _vik></span>
                    <span class="icon-menu" _vik></span>
                    <span class="icon-menu" _vik></span>
                    <span class="icon-menu" _vik></span>
                </button>
                <a href="#" class="navbar-brand" _vik><img src="public/me.jpg" alt="Logo" _vik></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar" _vik>
                <ul class="navbar-nav mr-auto w-100 justify-content-end" _vik>
                    <li class="nav-item active" _vik>
                        <a class="nav-link" href="#header-wrap" _vik>
                            Home
                        </a>
                    </li>
                    <li class="nav-item" _vik>
                        <a class="nav-link" href="#about" _vik>
                            About
                        </a>
                    </li>
                    <li class="nav-item" _vik>
                        <a class="nav-link" href="#team" _vik>
                            Speakers
                        </a>
                    </li>
                    <li class="nav-item" _vik>
                        <a class="nav-link" href="#gallery" _vik>
                            Gallery
                        </a>
                    </li>
                    <li class="nav-item" _vik>
                        <a class="nav-link" href="#faq" _vik>
                            Faq
                        </a>
                    </li>
                    <li class="nav-item" _vik>
                        <a class="nav-link" href="#google-map-area" _vik>
                            Contact
                        </a>
                    </li>
                    <li _vik class="nav-item">
                        <a _vik class="nav-link" data-href="login" href="login">Login</a>
                    </li>
                    <li _vik class="nav-item">
                        <a _vik class="nav-link" data-href="signup" href="signup">Signup</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
            <li>
                <a class="page-scrool" href="#header-wrap">Home</a>
            </li>
            <li>
                <a class="page-scrool" href="#about">About</a>
            </li>
            <li>
                <a class="page-scroll" href="#schedules">schedules</a>
            </li>
            <li>
                <a class="page-scroll" href="#team">Speakers</a>
            </li>
            <li>
                <a class="page-scroll" href="#gallery">Gallery</a>
            </li>
            <li>
                <a class="page-scroll" href="#faq">Faq</a>
            </li>
            </li>
            <li>
                <a class="page-scroll" href="#google-map-area">Contact</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

    </nav>
    <!--<img _vik src="public/img/banner.jpg" />-->
    <!-- Navbar End -->
</header>
<section class="services section-padding main-banner" _vik>
    <div class="container" _vik>
        <div class="row" _vik>
            <div class="col-sm-6" _vik>
                <form onsubmit="" _vik>
                    <input _vik type="text" placeholder="Enter Email for Signup" name="Signup" class="form-control" />
                    <button _vik type="button" class="btn btn-primary">Setup your panel</button>
                </form>
            </div>
        </div>
    </div>
</section>