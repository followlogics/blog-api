<!DOCTYPE html>
<html lang = "en" _vik>
    <head _vik>
        <title _vik><?= $title ?></title>
        <meta charset = "UTF-8" _vik>
        <meta _vik name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link _vik rel="stylesheet" href="{{ url('media/bootstrap.min.css') }}">
        <link _vik href="{{ url('media/main.css') }}" rel="stylesheet">
        <script _vik src="{{ url('media/library.js') }}" ></script>
        <script _vik src="{{ url('media/social.js') }}" ></script>
        <script _vik async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script _vik>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1298952328055943",
    enable_page_level_ads: true
  });
</script>
    </head>
    <body _vik id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <nav _vik class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <!-- Brand/logo -->
            <a _vik class="navbar-brand" href="#">My Task is completed</a>
            <ul _vik class="navbar-nav">
                <li _vik class="nav-item">
                    <a _vik class="nav-link" href="/">Home <?php echo '&#8377; &#x20b9; :'; ?></a>
                </li>
                <li _vik class="nav-item">
                    <a _vik class="nav-link" href="login">Login</a>
                </li>
                <li _vik class="nav-item">
                    <a _vik class="nav-link" href="signup">Signup</a>
                </li>
            </ul>
        </nav>
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                @foreach ($files as $f=>$file)
                <li data-target="#demo" data-slide-to="{{$f}}" class="@if($f==0)  active @endif"></li>
                 @endforeach
            </ul>
            <div class="carousel-inner">
                @foreach ($files as $f=>$file)
                <div class="carousel-item @if($f==0)  active @endif">
                    <img src="{{ URL::asset('../storage/media/time/'.$file->file_name) }}" alt="{{$file->realfile_name}}"  width="1100" height="500"/>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

       {{ $files->links() }}
        <?php
        $configFile = (base_path('public/media/config.json'));
        $myfile = fopen($configFile, "r+") or die("Unable to open file!");
        $config = fread($myfile, filesize($configFile));
        $configData = (json_decode($config, TRUE));
        if (!empty($configData)) {
            ?>
            <script _vik>
                var config =<?php echo $config ?>;
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
  
            <div class="modal fade" _vik id="myModal">
                <div _vik class="modal-dialog modal-dialog-centered">
                    <div _vik class="modal-content">
                        <div _vik class="modal-header">
                            <h4 _vik class="modal-title">Login</h4>
                            <button _vik type="button" class="close" data-dismiss="modal">&times;</button>
</div>
                        <div _vik class="modal-body">
                            Modal body..
                        </div>
                        <div _vik class="modal-footer">
                            <button _vik type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script _vik>
            var url = '{{url()}}';
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
                    targetedUrl = e.target.href.replace(url, '');
                    Virus.openTargetBlock()
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
    </body>
</html>
