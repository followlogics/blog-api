
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

    }, { scope: 'read_custom_friendlists,basic_info,user_friends,public_profile,email,user_likes' });
}
// get user basic info

function getInfo() {
    FB.api('/me', 'GET', { fields: 'email,first_name,last_name,name,id' }, function (response) {
        console.log(response);
        if (typeof response.id != 'undefined') {
            document.getElementById('status').innerHTML = response.id;
            var img = { 1: 'large', 2: 'normal', 3: 'small', 4: 'square' };
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
    FB.api('/' + ids + '/friends', 'GET', { fields: 'name,id' }, function (response) {
        console.log(response);
    });
    FB.api('/me', 'GET', {},
        function (response) {
            console.log(response);
        }
    );
    FB.api('/' + ids + '/friendlists', 'GET', { fields: 'name,id' }, function (response) {
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
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
}