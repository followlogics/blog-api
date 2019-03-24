<nav _vik class="navbar navbar-expand-sm navbar-fixed-top navbar-light navbartransparent navbar-inverse sticky-top">
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
<div id="demo" class="carousel slide" data-ride="carousel" _vik>

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