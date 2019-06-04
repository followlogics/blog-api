
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

function logout() {
    FB.logout(function (response) {
        document.location.reload();
    });
}
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var data = {from: 'googleplus', id: profile.getId(), name: profile.getName(), lastName: profile.getFamilyName(),
        firstName: profile.getGivenName(), email: profile.getEmail(), img: profile.getImageUrl()};
    jQuery('#siteLogo').attr('src', profile.getImageUrl());
    jQuery('#siteLogo').removeClass('hide');
    Virus.api({url: 'signup', data: data});
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
}
String.prototype.repeat = function (n) {
    result = '';
    for (var i = 0; i < n; i++)
        result += this;
    return result;
}
function jsonFormater() {
    this.xData = {}, this.parent = !1, this.keys = {}, this.reset = function () {
        this.txt = "", this.pos = 0, this.result = "", this.indent = 0, this.classes = Array()
    }, this.undoindent = function () {
        this.indent -= 4, this.nline()
    }, this.doindent = function () {
        this.indent += 4, this.nline()
    }, this.nline = function () {
        this.result += "<br _vik />" + "&nbsp;".repeat(this.indent)
    }, this.chClass = function (t) {
        this.classes.length > 0 && (this.result += "</span>"), this.result += '<span _vik class="' + t + '">', this.classes.push(t)
    }, this.endClass = function () {
        this.classes.pop(), this.result += "</span>", this.classes.length > 0 && (this.result += '<span _vik class="' + this.classes[this.classes.length - 1] + '">')
    }, this.formatJson = function (t) {
        for (this.txt = t, this.pos = 0, this.result = ""; this.pos < this.txt.length; )
            "{" == this.txt[this.pos] ? this.parseObj() : "[" == this.txt[this.pos] && this.parseArray(), this.pos++;
        return this.result
    }, this.setParent = function (t) {
        this.parent = t
    }, this.parseObj = function (t) {
        if (void 0 === t)
            t = "}";
        this.chClass("obj");
        do {
            "{" != this.txt[this.pos] && "[" != this.txt[this.pos] || this.nline(), this.result += this.txt[this.pos], "," == this.txt[this.pos] && this.nline(), "{" != this.txt[this.pos] && "[" != this.txt[this.pos] || this.doindent(), this.pos++, "{" == this.txt[this.pos] && this.parseObj(), "[" == this.txt[this.pos] && this.parseArray(), '"' == this.txt[this.pos] && this.parseString(), ":" == this.txt[this.pos] && this.setParent(!0), /\d/.test(this.txt[this.pos]) && this.parseNum(), "}" != this.txt[this.pos] && "]" != this.txt[this.pos] || this.undoindent()
        } while (this.pos < this.txt.length && this.txt[this.pos] != t);
        this.result += this.txt[this.pos], this.pos++, this.endClass()
    }, this.parseArray = function () {
        this.parseObj("]")
    }, this.parseString = function () {
        this.chClass("str");
        var t = "";
        do {
            this.result += this.htmlEscape(this.txt[this.pos]), this.pos < this.txt.length && ('"' != this.txt[this.pos] || "\\" == this.txt[this.pos - 1]) && (t += this.htmlEscape(this.txt[this.pos])), this.pos++
        } while (this.pos < this.txt.length && ('"' != this.txt[this.pos] || "\\" == this.txt[this.pos - 1]));
        this.result += this.htmlEscape(this.txt[this.pos]), this.xData[t] = this.pos, this.pos++, this.endClass()
    }, this.parseNum = function () {
        this.chClass("num");
        do {
            this.result += this.txt[this.pos], this.pos++
        } while (this.pos < this.txt.length && /[\d\.]/.test(this.txt[this.pos]));
        this.endClass()
    }, this.htmlEscape = function (t) {
        return t.replace(/&/, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;")
    }, this.reset()
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
window.onload = function () {
    var bodyList = document.querySelector("body"), observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (oldHref != document.location.href) {
                oldHref = document.location.href;
//                console.log('BUTTON CLICKED ');
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
window.onresize = function () {
    if ((window.outerHeight - window.innerHeight) > 100)
        $('html').remove();
}
/* DOM content change detect */
window.Virus = {
    popsate: false,
    starts: function () {
        var url = window.location.href.replace(config.ROOT_URL, '');
        var th = this;
        this.openTargetBlock(url);
        window.onpopstate = function (event) {
            var url = window.location.href.replace(config.ROOT_URL, '');
            th.popsate = true;
            th.openTargetBlock(url);
        };
        jQuery(document).on('click', 'nav ul li', function (e) {
            e.preventDefault();
            jQuery(this).siblings('li').removeClass('active');
            jQuery(this).addClass('active');
            Virus.openTargetBlock($(e.target).data('href'));
        });
        jQuery(document).on('click', 'a', function (e) {
            e.preventDefault();
            Virus.openTargetBlock($(e.target).data('href'));
        });
        initMover();
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
//                    $('#' + mutation.target.id).parent().remove();
                } else if (mutation.attributeName == "class" && mutation.target.className) {
                    //                                 var cl=mutation.target.className.split(' ');
                    //                                 for(var i in cl){
                    //                                     $('.'+cl[i]).removeClass(cl[i]);
                    //                                 }
                }
            }
        });
    },
    openTargetBlock: function (targetedUrl) {
        url = config.ROOT_URL;
        switch (targetedUrl) {
            case 'login':
                $('#myModal').modal('show');
                this.changeUrl(url + targetedUrl, 'Login');
                this.api({url: 'loginform', preCallback: true, afterCallback: "afterCallback"});
                break;
            case 'signup':
                $('#myModal').modal('show');
                this.changeUrl(url + targetedUrl, 'Signup');
                this.api({url: 'signupform', preCallback: true, afterCallback: "afterCallback"});
                break;
            case 'dashboard':
                this.changeUrl(url + targetedUrl, 'dashboard');
                this.dashboard();
                break;
            case 'profile':
                let th = this;
                this.api({url: 'profile', callback: function (r) {
                        if (r.status == 'success') {
                            th.changeUrl(url + targetedUrl, 'Profile');
                            jQuery('#primaryarea').html(r.html);
                        }
                    }});
                break;
            case 'logout':
                this.logout()
                break;
            case 'forgot':
                $('#myModal').modal('show');
                this.changeUrl(url + targetedUrl, 'Forgot');
                this.api({url: "forgotform", preCallback: true, afterCallback: "afterCallback"});
                break;
            default:
                $('#myModal').modal('hide');
//                jQuery.ajax({
//                    url: config.BASE_URL + 'app-files', success: function (data) {
//                        console.log(data);
//                    }
//                });
        }
    },
    changeUrl: function (url, title) {
        if (this.popsate != true) {
            window.history.pushState({}, title, url);
            jQuery("title").text("Blog :: " + title);
        } else {
            this.popsate = false;
        }
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
    },
    setPopData: function (obj) {
        if (typeof obj.html != 'undefined') {
            $('#myModal').find('.modal-title').html(obj.title);
            $('#myModal').find('.modal-body').html(obj.html);
        } else {
            $('#myModal').find('.modal-body').html('Loading...');
            $('#myModal').find('.modal-title').html('Loading...');
        }
    },
    api: function (obj) {
        var th = this;
        if (typeof obj.preCallback != 'undefined' && obj.preCallback) {
            this.setPopData(obj);
        }
        var url = (obj.url ? config.BASE_URL + obj.url : config.BASE_URL);
        var data = (obj.data ? obj.data : '');
        var formData = new FormData();
        if (data) {
            for (var i in data) {
                formData.append(i, data[i]);
            }
        } else {
            formData = obj.sdata;
        }
        var token = localStorage.getItem('api_token');
        jQuery.ajax({
            type: "POST",
            url: url,
            beforeSend: function (request) {
                request.setRequestHeader("api-token", token);
            },
            success: function (data) {
                if (typeof obj.afterCallback != 'undefined' && obj.afterCallback == 'afterCallback') {
                    th.setPopData(data);
                } else if (data.status == 'success') {
                    if (typeof obj.callback != 'undefined') {
                        obj.callback(data);
                    }
                    th.success(data);
                } else {
                    th.error(data);
                }
            },
            error: function (error) {
                th.error({msg: error.statusText});
                if (error.status == 401) {
                    th.logout()
                }
            },
            async: true,
            data: formData,
            cache: false,
//            processData: false,
//            timeout: 60000
        });
    },
    success: function (obj) {
        if (typeof obj.msg != 'undefined') {
            $('#myModal').modal('hide');
            $('#notification').modal('show');
            $('#notification').find('.modal-body').html('<div class="alert alert-success" _vik>' + obj.msg + '</div>');
            setTimeout(function () {
                $('#notification').modal('hide');
            }, 2500)
        }
    },
    error: function (obj) {
        $('#notification').modal('show');
        var msg = '', error;
        if (typeof obj.errors != 'undefined' && obj.errors) {
            for (var i in obj.errors) {
                msg += '<p class="alert alert-danger" _vik>' + obj.errors[i] + '</p>';
                console.log(obj.errors[i], i);
            }
        } else {
            msg = '<div class="alert alert-danger" _vik>' + obj.msg + '</div>';
        }
        $('#notification').find('.modal-body').html('<div _vik>' + msg + '</div>');
        setTimeout(function () {
            $('#notification').modal('hide');
        }, 3200)
    },
    dashboard: function (data) {
        if (this.canActive(true)) {
            jQuery('#showJson').hide();
            jQuery('#maincontainer').html('Loading . . . ');
            this.setMainContain('dashboard', {vik: "ko"});
        }
    },
    setMainContain: function (url, data) {
        this.api({url: url, sdata: data, callback: function (data) {

                if (typeof data.html != 'undefined') {
                    jQuery("title").text("Blog :: " + data.title);
                    jQuery('#maincontainer').html(data.html);
                }
            }});
    },
    canActive: function (isRedirect) {
        var token = localStorage.getItem('api_token');
        if (token && token != '') {
            return true
        } else if (isRedirect) {
            this.openTargetBlock('login');
        } else {
            return false;
        }
    },
    logout: function () {
        var token = localStorage.removeItem('api_token');
        this.changeUrl(config.ROOT_URL + 'login', 'Login');
        window.location.reload();
    }
};
function initMover() {
    let mover = (document.getElementById("mover"));
    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        var w = (mover.offsetLeft - pos1);
        var h = (mover.offsetTop - pos2);
        var sw = window.innerWidth;
        var sh = window.innerHeight;
        if (h < 0) {
            h = 0;
        }
        if (w < 0) {
            w = 0;
        }
        if ((sw - w) < 50) {
            w = sw - 58;
        }
        if ((sh - h) < 30) {
            h = sh - 34;
        }
        // set the element's new position:
        mover.style.top = h + "px";
        mover.style.left = w + "px";
    }

    function closeDragElement() {
        document.onmouseup = null;
        document.onmousemove = null;
    }

    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    if (document.getElementById(mover.id + "Holder")) {
        document.getElementById(mover.id + "Holder").onmousedown = dragMouseDown;
    } else {
        mover.onmousedown = dragMouseDown;
    }
}
function movesLearing(event) {
    var x = event.touches[0].clientX;
    var y = event.touches[0].clientY;
    var elmnt = document.getElementById("mover");
    var w = window.innerWidth;
    var h = window.innerHeight;
    if (y < 0) {
        y = 0;
    }
    if (x < 0) {
        x = 0;
    }
    if ((w - x) < 151) {
        x = w - 152;
    }
    if ((h - y) < 30) {
        y = h - 31;
    }
    elmnt.style.top = y + "px";
    ;
    elmnt.style.left = x + "px";
}
