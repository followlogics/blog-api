<!DOCTYPE html>
<html lang = "en" _vik>
    <head _vik>
        <title _vik><?= $title ?></title>
        <meta charset = "UTF-8" _vik>
        <meta _vik name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link _vik rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link _vik href="{{ url('media/main.css') }}" rel="stylesheet">
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
        @foreach ($files as $file)
        <br/>{{ $file->realfile_name }}
       @endforeach

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
            window.Virus = {
                starts: function () {
                    this.openTargetBlock()
                },
                domValidation: function (mutations, observer) {

                    mutations.length && mutations.forEach(function (mutation) {
                        if (mutation.type == 'childList' || mutation.type == "characterData") {
                            var ele = ':not([_vik])';
                            var allEle = document.querySelectorAll(ele);
                            if (allEle.length) {
                                allEle.forEach(function (v) {
                                    v.parentNode.removeChild(v);
                                })
                            }
                            if (mutation.addedNodes.length) {
                                mutation.addedNodes.forEach(function (v) {
                                    if (typeof v.data != 'undefined' && v.data.trim().length > 0) {
                                        //  location.reload();
                                    }
                                })
                            } else if (mutation && typeof mutation.target.data != 'undefined' && mutation.target.data.trim().length > 0) {
                                // location.reload();
                            }
                        } else if (mutation.type == "attributes") {
                            if (mutation.attributeName == "id") {
                                $('#' + mutation.target.id).parent().remove();
                            } else if (mutation.attributeName == "class" && mutation.target.className) {
//                                 var cl=mutation.target.className.split(' ');
//                                 for(var i in cl){
//                                     $('.'+cl[i]).removeClass(cl[i]);
//                                 }
                            }
                        }
                    });
                },
                openTargetBlock: function () {
                    switch (targetedUrl) {
                        case '/login':
                            $('#myModal').modal('toggle');
                            this.changeUrl(targetedUrl);
                            break;
                        case '/signup':
                            $('#myModal').modal('toggle');
                            this.changeUrl(targetedUrl);
                            break;
                        default :
                        jQuery.ajax({url: url + '/app-files',success: function (data) {
                            console.log(data);
                        }});        
                    }
                },
                changeUrl: function (url) {
                    window.history.pushState({}, "", url);
                },
                documentUpload: function (obj) {
                    var file = $(obj)[0].files[0];
                    var formData = new FormData();
                    formData.append("your_data", file);
                    jQuery.ajax({
                        type: "POST",
                        url: url + '/filetime',
                        success: function (data) {
                            // your callback here
                        },
                        error: function (error) {
                            // handle error
                        },
                        async: true,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        timeout: 60000
                    });
                },
                copy: function (txt) {
                    var text = (txt ? txt : "");
                    if (text) {
                        var el = document.createElement("textarea");
                        try {
                            el.value = text;
                            el.body.appendChild(textArea);
                            el.select();
                            if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
                                var editable = el.contentEditable;
                                var readOnly = el.readOnly;
                                el.contentEditable = true;
                                el.readOnly = false;
                                var range = document.createRange();
                                range.selectNodeContents(el);
                                var sel = window.getSelection();
                                sel.removeAllRanges();
                                sel.addRange(range);
                                el.setSelectionRange(0, 9);
                                el.contentEditable = editable;
                                el.readOnly = readOnly;
                            }
                            document.execCommand("Copy");
                            el.remove();
                        } catch (e) {
                            el.remove();
                        }
                    }
                }
            };

            MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

            var observer = new MutationObserver(window.Virus.domValidation);

            observer.observe(document, {subtree: true, attributes: true, childList: true, characterData: true, attributeOldValue: true, attributeNewValue: true});
            
            document.addEventListener('click', function (e) {
                if (e.target.tagName == "A") {
                    e.preventDefault();
                    targetedUrl = e.target.href.replace(url, '');
                    Virus.openTargetBlock()
                    console.log('BUTTON CLICKED', e);
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
                            console.log('BUTTON CLICKED ');
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
                console.log(j);
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

            function jsonFormater() {
                this.xData = {};
                this.parent = false;
                this.keys = {};
                this.reset = function () {
                    this.txt = '';
                    this.pos = 0;
                    this.result = '';
                    this.indent = 0;
                    this.classes = Array();

                };

                this.undoindent = function () {
                    this.indent -= 4;
                    this.nline();
                };

                this.doindent = function () {
                    this.indent += 4;
                    this.nline();
                };

                this.nline = function () {
                    this.result += '<br _vik />' + '&nbsp;'.repeat(this.indent);
                };

                this.chClass = function (neu) {
                    if (this.classes.length > 0)
                        this.result += '</span>';
                    this.result += '<span _vik class="' + neu + '">';
                    this.classes.push(neu);
                };

                this.endClass = function () {
                    this.classes.pop();
                    this.result += '</span>';
                    if (this.classes.length > 0)
                        this.result += '<span _vik class="' + this.classes[this.classes.length - 1] + '">';
                };

                this.formatJson = function (txt) {
                    this.txt = txt;
                    this.pos = 0;
                    this.result = '';
                    while (this.pos < this.txt.length) {
                        if (this.txt[this.pos] == '{')
                            this.parseObj();
                        else if (this.txt[this.pos] == '[')
                            this.parseArray();
                        this.pos++;
                    }

                    return this.result;
                }
                this.setParent = function (toggle) {
                    // for(var i in this.xData){
                    //     console.log(i,this.xData[i])
                    // }
//                    this.keys=this.xData[0];
//                    this.xData={};
                    this.parent = toggle;
                }
                this.parseObj = function (ende) {
                    if (typeof ende == 'undefined')
                        var ende = '}';
                    this.chClass('obj');

                    do {
                        if ((this.txt[this.pos] == '{') || (this.txt[this.pos] == '['))
                            this.nline();
                        this.result += this.txt[this.pos];
                        if (this.txt[this.pos] == ',')
                            this.nline();
                        if ((this.txt[this.pos] == '{') || (this.txt[this.pos] == '['))
                            this.doindent();
                        this.pos++;
                        if (this.txt[this.pos] == '{')
                            this.parseObj();
                        if (this.txt[this.pos] == '[')
                            this.parseArray();
                        if (this.txt[this.pos] == '"')
                            this.parseString();
                        if (this.txt[this.pos] == ':')
                            this.setParent(true);
                        if (/\d/.test(this.txt[this.pos]))
                            this.parseNum();
                        if ((this.txt[this.pos] == '}') || (this.txt[this.pos] == ']'))
                            this.undoindent();
                    } while ((this.pos < this.txt.length) && (this.txt[this.pos] != ende));

                    this.result += this.txt[this.pos];
                    this.pos++;
                    this.endClass();
                };

                this.parseArray = function () {
                    this.parseObj(']');
                };

                this.parseString = function () {
                    this.chClass('str');
                    var temp = '';
                    do {
                        this.result += this.htmlEscape(this.txt[this.pos]);
                        if ((this.pos < this.txt.length) && ((this.txt[this.pos] != '"') || (this.txt[this.pos - 1] == '\\'))) {
                            temp += this.htmlEscape(this.txt[this.pos])
                        }
                        this.pos++;
                    } while ((this.pos < this.txt.length) && ((this.txt[this.pos] != '"') || (this.txt[this.pos - 1] == '\\')));

                    this.result += this.htmlEscape(this.txt[this.pos]);
                    this.xData[temp] = this.pos;
                    this.pos++;
                    this.endClass();
                };

                this.parseNum = function () {
                    this.chClass('num');
                    do {
                        this.result += this.txt[this.pos];
                        this.pos++;
                    } while ((this.pos < this.txt.length) && (/[\d\.]/.test(this.txt[this.pos])));

                    this.endClass();
                };

                this.htmlEscape = function (txt) {
                    return txt.replace(/&/, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
                };

                this.reset();
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
                    document.getElementById('results').innerHTML = 'WTF put some json on it'
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
        <script _vik src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script _vik src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script _vik src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
