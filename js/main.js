window.fbAsyncInit = function () {
    FB.init({
        appId: '849171741848303',
        cookie: true, // enable cookies to allow the server to access 
        // the session
        xfbml: true, // parse social plugins on this page
        version: 'v2.2' // use version 2.2
    });
};

// Load the Facebook SDK asynchronously
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(function () {
    $('#logout-btn').click(function () {
        logout();
    });
});

/*
 * Log in using Facebook.
 */
function fbLogin() {
    FB.login(function (response) {
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            processFBLogin();
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
        }
    });
}

/*
 * Get user details and send them to the server to process user login.
 */
function processFBLogin() {
    //get user email to add to session for unique identification
    FB.api('/me?fields=email', function (response) {
        $.post("auth.php?cmd=login", {email: response.email})
                .done(function (data) {
                    alert("Success: " + data);
                    // Person is now logged in, go to home page (or wherever)
                    window.location = 'index.php';
                })
                .fail(function () {
                    alert("error");
                });
    });
}

/*
 * Register using Facebook.
 */
function fbRegister() {
    FB.login(function (response) {
        // handle the response
        if (response.status === 'connected') {
            processFBRegistration();
        }
    }, {scope: 'public_profile,email'});
}

/*
 * Get user details and send them to the server to process user registration.
 */
function processFBRegistration() {
    //get user details for sign up
    FB.api('/me?fields=email,first_name,last_name', function (response) {
        $.post("auth.php?cmd=register", {
            first_name: response.first_name,
            last_name: response.last_name,
            email: response.email})
                .done(function (data) {
                    alert("Success: " + data);
                    //do what you want, i.e. send email link for authentication, log 
                    //user in with limited privileges until authenticated... In this case,
                    //user is redirected to login page to show login functionality.
                    window.location = 'login.php';
                })
                .fail(function () {
                    alert("error");
                });
    });
}

/*
 * Log out.
 */
function logout() {
    $.get("auth.php", {cmd: "logout"})
            .done(function (data) {
                alert("success: " + data);
                // Person is now logged out, reload page
                window.location.reload();
            })
            .fail(function () {
                alert("error");
            });
}

