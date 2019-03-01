<!DOCTYPE html>
<html lang = "en" _vik>
    <head _vik>
        <title _vik><?= $title ?></title>
        <meta charset = "UTF-8" _vik>
        <meta _vik name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="539161760083-8rg6soj4ome8jgg3dp257oeq2iaue4u0.apps.googleusercontent.com">
        <link _vik rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <style _vik><?php
$configFile = (base_path('public/media/bootstrap.min.css'));
$myfile = fopen($configFile, "r+") or die("Unable to open file!");
echo fread($myfile, filesize($configFile));
?>
        </style>
        <style _vik><?php
$configFile = (base_path('public/media/main.css'));
$myfile = fopen($configFile, "r+") or die("Unable to open file!");
echo fread($myfile, filesize($configFile));
?>
        </style>
        <script _vik >
        <?php
$configFile = (base_path('public/media/library.js'));
$myfile = fopen($configFile, "r+") or die("Unable to open file!");
echo fread($myfile, filesize($configFile));
?>
        </script>
        <script _vik >
        <?php
$configFile = (base_path('public/media/social.js'));
$myfile = fopen($configFile, "r+") or die("Unable to open file!");
echo fread($myfile, filesize($configFile));
?>
    var config = {};
        </script>
        <script _vik async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script _vik>
(adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1298952328055943",
    enable_page_level_ads: true
});
        </script>
    </head>
    <body _vik id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
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
                    <img src="{{ URL::asset('../storage/media/time/'.$file->file_name) }}" alt="{{$file->realfile_name}}"  width="1100" height="500" _vik />
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


        <?php
        $configFile = (base_path('public/media/config.json'));
        $myfile = fopen($configFile, "r+") or die("Unable to open file!");
        $config = fread($myfile, filesize($configFile));
        $configData = (json_decode($config, TRUE));
        if (!empty($configData)) {
            ?>
            <script _vik>
                config =<?php echo $config ?>;
            </script>
            <?php
        }
        fclose($myfile);
        ?>
        <div class="container" _vik>
            <div _vik class="row">
                <div class="col-sm-6" _vik >
                    <div class="" _vik>
                        <textarea _vik class="w-100 mt-3" placeholder="Enter json" rows="15"></textarea>
                    </div>
                </div>
                <div class="col-sm-6" _vik >
                    <div class="" _vik>
                        <div class="border border-info mt-3" _vik id="results">
                            <span _vik>{</span><span _vik>}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div _vik class="row">
                <div class="col-sm-12 text-center  h-100" _vik >
                    <button _vik type="button" id="show" onclick="go()" class="btn btn-primary">Show pretty Json</button>
                </div>
            </div>
            <div _vik class="row">
                <input _vik type="file" name="filetime" title="File you want" onchange="fileZone(this)" />
            </div>          
        </div>
        <div class="modal fade in" _vik id="myModal">
            <div _vik class="modal-dialog modal-dialog-centered modal-sm">
                <div _vik class="modal-content">
                    <div _vik class="modal-header">
                        <h4 _vik class="modal-title">Login</h4>
                        <button _vik type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div _vik class="modal-body">
                        Modal body..
                    </div>
                    <div _vik class="modal-footer hide">
                        <button _vik type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script _vik>
            var url = '{{env("BASE_URL")}}';
            config.ROOT_URL = '{{env("ROOT_URL")}}';
            config.BASE_URL = '{{env("BASE_URL")}}';
            var targetedUrl = location.href.replace(url, '');
            function processAjaxData(response, urlPath) {
                document.getElementById("content").innerHTML = response.html;
                document.title = response.pageTitle;
                window.history.pushState({"html": response.html, "pageTitle": response.pageTitle}, "", urlPath);
            }
            window.onpopstate = function (e) {
                if (e.state) {
                    // document.getElementById("content").innerHTML = e.state.html;
                    // document.title = e.state.pageTitle;
                }
            };
            /* DOM content change detect */


            MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

            var observer = new MutationObserver(window.Virus.domValidation);

            observer.observe(document, {subtree: true, attributes: true, childList: true, characterData: true, attributeOldValue: true, attributeNewValue: true});

            document.addEventListener('click', function (e) {
                if (e.target.tagName == "A") {
                    e.preventDefault();
                    Virus.openTargetBlock($(e.target).data('href'));
//                    console.log('BUTTON CLICKED', e);
                }
            })
            window.onresize = function ()
            {
                if ((window.outerHeight - window.innerHeight) > 100)
                    $('html').remove();
            }
            var oldHref = document.location.href;

            window.onload = function () {
                var bodyList = document.querySelector("body"), observer = new MutationObserver(function (mutations) {
                    mutations.forEach(function (mutation) {
                        if (oldHref != document.location.href) {
                            oldHref = document.location.href;
//                            console.log('BUTTON CLICKED ');
                            /* Changed ! your code here */
                        }
                    });
                });
                var config = {
                    childList: true,
                    subtree: true
                };
                observer.observe(bodyList, config);
                Virus.starts();
            };
            function getJson() {
                var j = JSON.parse(JSON.stringify($('textarea').val()));
//                console.log(j);
            }
            function fileZone(obj) {
                Virus.documentUpload(obj);
            }
            String.prototype.repeat = function (n) {
                result = '';
                for (var i = 0; i < n; i++)
                    result += this;
                return result;
            }
            var parser = new jsonFormater();

            function go() {
                var txt = $('textarea').val();
                if (txt.length) {
                    if (validateString(txt)) {
                        document.getElementById('results').innerHTML = parser.formatJson(txt);
                        parser.reset();
                    } else {
                        document.getElementById('results').innerHTML = 'Some Error in json'
                    }
                } else {
                    document.getElementById('results').innerHTML = 'Put some json on it'
                }
            }
            function validateString(txt) {
                var c1 = (txt.match(/{/g) || []).length;
                var c2 = (txt.match(/}/g) || []).length;
                var C1 = (txt.match(/\[/g) || []).length;
                var C2 = (txt.match(/]/g) || []).length;
                var c3 = (txt.match(/:/g) || []).length;

                if (c1 == c2 && C1 == C2 && c3) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>

        <script>
            const tokenDivId = 'token_div';
            const permissionDivId = 'permission_div';
//            if ('serviceWorker' in navigator) {
//                window.addEventListener('load', function () {
//                    navigator.serviceWorker.register('assets/sw.js').then(function (registration) {
//                        console.log('Service Worker successful with scope: ', registration.scope);
//                    }).catch(function (err) {
//                        console.log('ServiceWorker registration failed: ', err);
//                    });
//                });
//            }
        </script>
        <script src="https://apis.google.com/js/platform.js" ></script>
    </body>
</html>
