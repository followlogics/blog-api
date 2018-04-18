<!DOCTYPE html>
<html lang = "en">
    <head>
        <title><?= $title ?></title>

        <meta charset = "UTF-8">
        <meta name="google-signin-client_id" content="5ftgyhujijieu0.apps.googleusercontent.com">
        <script src = "https://d3js.org/d3.v4.min.js"></script>

    </head>
    <body>
        <div>
            <h1>Greeting</h1>
            <p>Hello World!</p>
        </div>
        <div class="myclass">
            My Classes
        </div>
        <ul id="list">
            <li></li>
            <li></li>

        </ul>
        <div class="g-signin2" data-redirect_uri="http://localhost/test12/blog/public/" data-onsuccess="onSignIn"></div>
        <div class="myclass" id="vclasses">
            My Id Classes
        </div>
        <svg width = "500" height = "500">
        <rect x = "0" y = "0" width = "300" height = "200" fill = "yellow"></rect>
        </svg>
        <script>
            d3.select(".myclass").attr("style", "color: red");
            d3.select("#list").selectAll("li")
                    .data([10, 20, 30, 25, 15])
                    .text(function (d) {
                        return "This is pre-existing element and the value is " + d;
                    })
                    .enter()
                    .append("li")
                    .text(function (d)
                    {
                        return "This is dynamically created element and the value is " + d;
                    });
            function remove() {
                d3.selectAll("li").data([1])
                        .exit().remove()
            }
        </script>
        <?php
//echo '&#8377; &#x20b9; Testing :' . ($name);
        ?>
        <?php
        $configFile = (base_path('public/media/config.json'));

        $myfile = fopen($configFile, "r+") or die("Unable to open file!");
        $config = fread($myfile, filesize($configFile));
        $configData = (json_decode($config, TRUE));
        if (!empty($configData)) {
            ?>
            <script>
                var config =<?php echo $config ?>;
            </script>
            <?php
        }

        fclose($myfile);
        ?>
        <script>



            window.fbAsyncInit = function () {
                FB.init({
                    appId: '435165086916049',
                    xfbml: true,
                    version: 'v2.5'
                });
                FB.getLoginStatus(function (response) {
                    if (response.status === 'connected') {
                        document.getElementById('status').innerHTML = 'we are connected';
                    } else if (response.status === 'not_authorized') {
                        document.getElementById('status').innerHTML = 'we are not logged in.'
                    } else {
                        document.getElementById('status').innerHTML = 'you are not logged in to Facebook';
                    }
                });
                // FB.AppEvents.logPageView();
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            function login() {
                FB.login(function (response) {
                    if (response.status === 'connected') {
                        document.getElementById('status').innerHTML = 'we are connected';
                    } else if (response.status === 'not_authorized') {
                        document.getElementById('status').innerHTML = 'we are not logged in.'
                    } else {
                        document.getElementById('status').innerHTML = 'you are not logged in to Facebook';
                    }

                }, {scope: 'read_custom_friendlists,basic_info,user_friends,public_profile,email,user_likes'});
            }
            // get user basic info

            function getInfo() {
                FB.api('/me', 'GET', {fields: 'email,first_name,last_name,name,id'}, function (response) {
                    console.log(response);
                    if (typeof response.id != 'undefined') {
                        document.getElementById('status').innerHTML = response.id;
                        var img = {1: 'large', 2: 'normal', 3: 'small', 4: 'square'};
                        for (var i in img) {
                            console.log(i, img[i]);
                            document.getElementById('img' + i).src = 'https://graph.facebook.com/' + response.id + '/picture?type=' + img[i];
                        }
                        getFrdlist();
                    }
                });
                FB.api('/me?fields=friends{first_name,birthday}',
                        'POST', {},
                        function (response) {
                            console.log('posopst', response);
                        }
                );
            }
            function getFrdlist() {
                var ids = document.getElementById('status').innerHTML;
                FB.api('/' + ids + '/friends', 'GET', {fields: 'name,id'}, function (response) {
                    console.log(response);
                });
                FB.api('/me', 'GET', {},
                        function (response) {
                            console.log(response);
                        }
                );
                FB.api('/' + ids + '/friendlists', 'GET', {fields: 'name,id'}, function (response) {
                    console.log(response);

                });
            }
            //        function getFrdlist() {
            //            var ids=document.getElementById('status').innerHTML;
            //            FB.api('/'+ids+'/friendlists', 'GET', {fields: 'name,id'}, function (response) {
            //                console.log(response);
            //                
            //            });
            //        }
            function logout() {
                FB.logout(function (response) {
                    document.location.reload();
                });
            }
            function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();
                console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                console.log('Name: ' + profile.getName());
                console.log('Image URL: ' + profile.getImageUrl());
                console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
            }
        </script>
        <div id="status"></div>
        <img id="img1">
        <img id="img2">
        <img id="img3">
        <img id="img4">
        <button onclick="getInfo()">Get Info</button> 
        <button onclick="login()">login</button>
        <button onclick="logout()">logout</button>
        <div id="content">
            This is the content
        </div>
        <button type="button" id="addContent">Add Content</button>
        <script>
            function processAjaxData(response, urlPath) {
                document.getElementById("content").innerHTML = response.html;
                document.title = response.pageTitle;
                window.history.pushState({"html": response.html, "pageTitle": response.pageTitle}, "", urlPath);
            }
            window.onpopstate = function (e) {
                if (e.state) {
                    document.getElementById("content").innerHTML = e.state.html;
                    document.title = e.state.pageTitle;
                }
            };
            /* DOM content change detect */
            window.Virus = {
                starts: function () {

                    if (typeof document.body.addEventListener != 'undefined') {
                        document.body.addEventListener('DOMSubtreeModified', function () {
                            console.log('Content Cahnge on virus', new Date());
                        }, false);
                    } else if (typeof document.body.attachEvent != 'undefined') {
                        document.body.attachEvent('DOMSubtreeModified', function () {
                            document.title = 'Changed at ' + new Date();
                            console.log('Content Cahnge on virus', new Date());
                        }, false);
                    }
                    var customEvent = new Event("infected");
                    var content = document.getElementById('content');
                    var btn = document.getElementById('addContent');
                    btn.addEventListener('click', function () {
                        content.innerHTML = 'click on blog add contemt button';
                        content.dispatchEvent(customEvent);
                    });
                    content.addEventListener('infected', function () {
                        console.log('Virus infected')
                    });
                }
            };
            Virus.starts();
            MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

            var observer = new MutationObserver(function (mutations, observer) {
                console.log(mutations, observer);
            });

            observer.observe(document, {
                subtree: true,
                attributes: true
            });
        </script>
        <a href="#" onclick="signOut();">Sign out</a>
        <script>
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                    console.log('User signed out.');
                });
            }
        </script>
                <!--<script src="https://apis.google.com/js/client:platform.js" async defer></script>-->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </body>
</html>