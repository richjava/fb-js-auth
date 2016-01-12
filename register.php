<!DOCTYPE html>
<html>
    <head>
        <title>Register | Facebook JavaScript Login Example</title>
        <meta charset="UTF-8">
        <!-- Bootstrap core CSS -->
        <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <?php require 'header.php'; ?>
            <form class="form-signin" role="form">
                <div id="status"></div>
                <h2 class="form-signin-heading">User Registration</h2>

                <label for="inputFname" class="sr-only">First Name</label>
                <input type="text" id="inputFname" class="form-control" placeholder="First Name" required autofocus>

                <label for="inputLname" class="sr-only">First Name</label>
                <input type="text" id="inputLname" class="form-control" placeholder="Last Name" required >

                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required >

                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button> 
                <button class="btn btn-sm btn-primary btn-block" onclick="fbRegister();" type="submit">Sign Up using Facebook</button>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
        <script>
                // Load the SDK asynchronously
                (function (thisdocument, scriptelement, id) {
                    var js, fjs = thisdocument.getElementsByTagName(scriptelement)[0];
                    if (thisdocument.getElementById(id))
                        return;

                    js = thisdocument.createElement(scriptelement);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js"; //you can use 
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));

                window.fbAsyncInit = function () {
                    FB.init({
                        appId: '849171741848303', //Your APP ID
                        cookie: true, // enable cookies to allow the server to access 
                        // the session
                        xfbml: true, // parse social plugins on this page
                        version: 'v2.1' // use version 2.1
                    });

                    // These three cases are handled in the callback function.
//                    FB.getLoginStatus(function (response) {
//                        statusChangeCallback(response);
//                    });

                };

                // This is called with the results from from FB.getLoginStatus().
                function statusChangeCallback(response) {
                    if (response.status === 'connected') {
                        // Logged into your app and Facebook.
                        processFBRegistration();
                    } else if (response.status === 'not_authorized') {
                        // The person is logged into Facebook, but not your app.
                        document.getElementById('status').innerHTML = 'Please log ' +
                                'into this app.';
                    }
                }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>