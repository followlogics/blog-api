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
    <body _vik id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" onmousemove="vmousemove()">
        <div id="maincontainer" _vik>
            @include('homemenu')

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
            <section id="about" class="section-padding" _vik>
                <div class="container" _vik>
                    <div class="row" _vik>
                        <div class="col-12" _vik>
                            <div class="section-title-header text-center" _vik>
                                <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s" _vik>About us</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row" _vik>
                        <div class="col-xs-12 col-md-6 col-lg-4" _vik>
                            <div class="about-item" _vik>
                                <img class="img-fluid" src="assets/img/about/img1.jpg" alt="" _vik>
                                <div class="about-text" _vik>
                                    <h3 _vik><a href="#" _vik>Our Mission</a></h3>
                                    <p _vik>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
                                    <a _vik class="btn btn-common btn-rm" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4" _vik>
                            <div class="about-item" _vik>
                                <img class="img-fluid" _vik src="assets/img/about/img2.jpg" alt="">
                                <div class="about-text" _vik>
                                    <h3 _vik><a href="#" _vik>What you will learn.</a></h3>
                                    <p _vik>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
                                    <a class="btn btn-common btn-rm" _vik href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4" _vik>
                            <div class="about-item" _vik>
                                <img class="img-fluid" _vik src="assets/img/about/img3.jpg" alt="">
                                <div class="about-text" _vik>
                                    <h3 _vik><a _vik href="#">What are the benifits.</a></h3>
                                    <p _vik>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
                                    <a _vik class="btn btn-common btn-rm" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container" id="showJson" _vik>
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
                        <h5 _vik class="modal-title">Loding...</h5>
                        <button _vik type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div _vik class="modal-body">
                        Loding...
                    </div>
                    <div _vik class="modal-footer hide">
                        <button _vik type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade in out" _vik id="notification">
            <div _vik class="modal-dialog modal-dialog-centered modal-sm">
                <div _vik class="modal-content">
                    <div _vik>
                        <button _vik type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div _vik class="modal-body" data-dismiss="modal">
                        Loding...
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
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            var timeout;
            var vmousemove = function () {
                clearTimeout(timeout);
                jQuery('.snow').addClass('hide')
                timeout = setTimeout(function () {
                    jQuery('.snow').removeClass('hide')
                }, 6000);
                var a = Math.floor(Math.random() * Math.floor(200));
                var b = Math.floor(Math.random() * Math.floor(200));
                var c = Math.floor(Math.random() * Math.floor(200));
                var d = Math.floor(Math.random() * Math.floor(200));
                jQuery('button').css('border-radius', a + '% ' + b + '% ' + c + '% ' + d + '%');
                let bgcolor=getRandomColor();
                jQuery("button").css("background-color",'#'+bgcolor);
                jQuery("button").css("color",'#'+invertHex(bgcolor) );
            }
            function invertHex(hex) {
                return (Number(`0x1${hex}`) ^ 0xFFFFFF).toString(16).substr(1).toUpperCase()
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
        <div id="mover" _vik>
            <div id="moverHolder" _vik ontouchmove="movesLearing(event)">Mover</div>
            This is testing.
        </div>
        <!-- Footer Section Start -->
        <footer class="footer-area section-padding" _vik>
            <div class="container" _vik>
                <div class="row" _vik>
                    <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" _vik>
                        <h3 _vik><img src="assets/img/logo.png" _vik alt="">TESTING</h3>
                        <p _vik>
                            Vik ipsum dolor sit ipsum dolor sit ipsum dolor sit ipsum dolor sit ipsum dolor sit ipsum dolor sit
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" _vik>
                        <h3 _vik>QUICK LINKS</h3>
                        <ul _vik>
                            <li _vik><a _vik href="#">About Conference</a></li>
                            <li _vik><a _vik href="#">Our Speakers</a></li>
                            <li><a href="#">Event Shedule</a></li>
                            <li _vik><a _vik href="#">Latest News</a></li>
                            <li><a href="#">Event Photo Gallery</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" _vik>
                        <h3 _vik>RECENT POSTS</h3>
                        <ul _vik class="image-list">
                            <li _vik>
                                <figure class="overlay">
                                    <img class="img-fluid" src="assets/img/art/a1.jpg" alt="">
                                </figure>
                                <div class="post-content" _vik>
                                    <h6 class="post-title" _vik> <a _vik href="blog-single.html">Lorem ipsm dolor sumit.</a> </h6>
                                    <div _vik class="meta"><span class="date">May 12, 2019</span></div>
                                </div>
                            </li>
                            <li _vik>
                                <figure class="overlay" _vik>
                                    <img class="img-fluid" src="assets/img/art/a2.jpg" alt="">
                                </figure>
                                <div class="post-content">
                                    <h6 class="post-title"><a href="blog-single.html">Lorem ipsm dolor sumit.</a></h6>
                                    <div class="meta"><span class="date">May 01, 2019</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" _vik>
                        <h3 _vik>SUBSCRIBE US</h3>
                        <div class="widget" _vik>
                            <div class="newsletter-wrapper" _vik>
                                <form method="post" id="subscribe-form" onsubmit="return false" name="subscribe-form" class="validate" _vik>
                                    <div class="form-group is-empty" _vik>
                                        <input _vik type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Your email" required="">
                                        <button _vik type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i _vik class="fas fa-rocket"></i></button>
                                        <div _vik class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.widget -->
                        <div class="widget" _vik>
                            <h3 _vik>FOLLOW US ON</h3>
                            <ul class="footer-social" _vik>
                                <li _vik><a class="" _vik href="#"><i _vik class="fab fa-facebook fa-2x"></i></a></li>
                                <li _vik><a class="" _vik href="#"><i _vik class="fab fa-twitter fa-2x"></i></a></li>
                                <li _vik><a class="" _vik href="#"><i _vik class="fab fa-linkedin fa-2x"></i></a></li>
                                <li _vik><a class="" _vik href="#"><i _vik class="fab fa-google-plus-square fa-2x"></i></a></li>
                            </ul>
                            <a _vik href="https://stackoverflow.com/users/3717849/vikash-ambani?theme=dark">
                                <img _vik src="https://stackoverflow.com/users/flair/3717849.png" width="208" height="58" alt="Profile for Vikash Ambani at Stack Overflow" title="Profile for Vikash Ambani at Stack Overflow">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="">
            <div class="snow hide hidden-sm hidden-xs">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1536" preserveAspectRatio="xMidYMax slice">
                <g fill="#FFF" fill-opacity=".15" transform="translate(55 42)">
                <g id="snow-bottom-layer">
                <ellipse cx="6" cy="1009.5" rx="6" ry="5.5"/>
                <ellipse cx="138" cy="1110.5" rx="6" ry="5.5"/>
                <ellipse cx="398" cy="1055.5" rx="6" ry="5.5"/>
                <ellipse cx="719" cy="1284.5" rx="6" ry="5.5"/>
                <ellipse cx="760" cy="1155.5" rx="6" ry="5.5"/>
                <ellipse cx="635" cy="1459.5" rx="6" ry="5.5"/>
                <ellipse cx="478" cy="1335.5" rx="6" ry="5.5"/>
                <ellipse cx="322" cy="1414.5" rx="6" ry="5.5"/>
                <ellipse cx="247" cy="1234.5" rx="6" ry="5.5"/>
                <ellipse cx="154" cy="1425.5" rx="6" ry="5.5"/>
                <ellipse cx="731" cy="773.5" rx="6" ry="5.5"/>
                <ellipse cx="599" cy="874.5" rx="6" ry="5.5"/>
                <ellipse cx="339" cy="819.5" rx="6" ry="5.5"/>
                <ellipse cx="239" cy="1004.5" rx="6" ry="5.5"/>
                <ellipse cx="113" cy="863.5" rx="6" ry="5.5"/>
                <ellipse cx="102" cy="1223.5" rx="6" ry="5.5"/>
                <ellipse cx="395" cy="1155.5" rx="6" ry="5.5"/>
                <ellipse cx="826" cy="943.5" rx="6" ry="5.5"/>
                <ellipse cx="626" cy="1054.5" rx="6" ry="5.5"/>
                <ellipse cx="887" cy="1366.5" rx="6" ry="5.5"/>
                <ellipse cx="6" cy="241.5" rx="6" ry="5.5"/>
                <ellipse cx="138" cy="342.5" rx="6" ry="5.5"/>
                <ellipse cx="398" cy="287.5" rx="6" ry="5.5"/>
                <ellipse cx="719" cy="516.5" rx="6" ry="5.5"/>
                <ellipse cx="760" cy="387.5" rx="6" ry="5.5"/>
                <ellipse cx="635" cy="691.5" rx="6" ry="5.5"/>
                <ellipse cx="478" cy="567.5" rx="6" ry="5.5"/>
                <ellipse cx="322" cy="646.5" rx="6" ry="5.5"/>
                <ellipse cx="247" cy="466.5" rx="6" ry="5.5"/>
                <ellipse cx="154" cy="657.5" rx="6" ry="5.5"/>
                <ellipse cx="731" cy="5.5" rx="6" ry="5.5"/>
                <ellipse cx="599" cy="106.5" rx="6" ry="5.5"/>
                <ellipse cx="339" cy="51.5" rx="6" ry="5.5"/>
                <ellipse cx="239" cy="236.5" rx="6" ry="5.5"/>
                <ellipse cx="113" cy="95.5" rx="6" ry="5.5"/>
                <ellipse cx="102" cy="455.5" rx="6" ry="5.5"/>
                <ellipse cx="395" cy="387.5" rx="6" ry="5.5"/>
                <ellipse cx="826" cy="175.5" rx="6" ry="5.5"/>
                <ellipse cx="626" cy="286.5" rx="6" ry="5.5"/>
                <ellipse cx="887" cy="598.5" rx="6" ry="5.5"/>
                </g>
                </g>
                <g fill="#FFF" fill-opacity=".3" transform="translate(65 63)">
                <g id="snow-top-layer">
                <circle cx="8" cy="776" r="8"/>
                <circle cx="189" cy="925" r="8"/>
                <circle cx="548" cy="844" r="8"/>
                <circle cx="685" cy="1115" r="8"/>
                <circle cx="858" cy="909" r="8"/>
                <circle cx="874" cy="1438" r="8" transform="rotate(180 874 1438)"/>
                <circle cx="657" cy="1256" r="8" transform="rotate(180 657 1256)"/>
                <circle cx="443" cy="1372" r="8" transform="rotate(180 443 1372)"/>
                <circle cx="339" cy="1107" r="8" transform="rotate(180 339 1107)"/>
                <circle cx="24" cy="1305" r="8" transform="rotate(180 24 1305)"/>
                <circle cx="8" cy="8" r="8"/>
                <circle cx="189" cy="157" r="8"/>
                <circle cx="548" cy="76" r="8"/>
                <circle cx="685" cy="347" r="8"/>
                <circle cx="858" cy="141" r="8"/>
                <circle cx="874" cy="670" r="8" transform="rotate(180 874 670)"/>
                <circle cx="657" cy="488" r="8" transform="rotate(180 657 488)"/>
                <circle cx="443" cy="604" r="8" transform="rotate(180 443 604)"/>
                <circle cx="339" cy="339" r="8" transform="rotate(180 339 339)"/>
                <circle cx="24" cy="537" r="8" transform="rotate(180 24 537)"/>
                </g>
                </g>
                </svg>
            </div>
        </div>
        <!-- Footer Section End -->
    </body>    
</html>
