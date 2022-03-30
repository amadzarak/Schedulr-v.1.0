<!--

=========================================================
* Neumorphism UI - v1.0.0
=========================================================

* Product Page: https://themesberg.com/product/ui-kits/neumorphism-ui
* Copyright 2020 Themesberg MIT LICENSE (https://www.themesberg.com/licensing#mit)

* Coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<?php

function logIP()
{
     $ipLog="/screenshot/log.txt"; // Your logfiles name here (.txt or .html extensions ok)

     // IP logging function by Dave Lauderdale
     // Originally published at: www.digi-dl.com

     $register_globals = (bool) ini_get('register_gobals');
     if ($register_globals) $ip = getenv(REMOTE_ADDR);
     else $ip = $_SERVER['REMOTE_ADDR'];

     $date=date ("l dS of F Y h:i:s A");
     $log=fopen("$ipLog", "a+");

     if (preg_match("/\\bhtm\\b/i", $ipLog) || preg_match("/\\bhtml\\b/i", $ipLog))
     {
          fputs($log, "Logged IP address: $ip - Date logged: $date<br>");
     }
     else fputs($log, "Logged IP address: $ip - Date logged: $date\
");

     fclose($log);
}
// Place the below function call wherever you want the script to fire.
logIp();


?>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Schedulr</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Neumorphism UI - Sign in">
<meta name="author" content="Themesberg">

<link rel="canonical" href="https://themesberg.com/product/ui-kits/neumorphism-ui/" />

<!--  Social tags -->
<meta name="keywords" content="neumorphism, neumorphism ui, neomorphism, neomorphism ui, neomorphism css, neumorphism css, neumorph, neumorphic, design system, login, form, table, tables, card, cards, navbar, modal, icons, icons, map, chat, carousel, menu, datepicker, gallery, slider, date, social, dropdown, search, tab, nav, footer, date picker, forms, tabs, time, button, select, input, timeline, cart, about us, account, log in, blog, profile, portfolio, landing page, ecommerce, shop, landing, register, app, contact, one page, sign up, signup, store, bootstrap 4, bootstrap4, dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, themesberg, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit">
<meta name="description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages.">

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="Neumorphism UI by Themesberg">
<meta itemprop="description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages.">
<meta itemprop="image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/neumorphism-ui/neumorphism-thumbnail.jpg">

<!-- Twitter Card data -->
<meta name="twitter:card" content="product">
<meta name="twitter:site" content="@themesberg">
<meta name="twitter:title" content="Neumorphism UI by Themesberg">
<meta name="twitter:description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages.">
<meta name="twitter:creator" content="@themesberg">
<meta name="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/neumorphism-ui/neumorphism-thumbnail.jpg">

<!-- Open Graph data -->
<meta property="fb:app_id" content="214738555737136">
<meta property="og:title" content="Neumorphism UI by Themesberg" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://demo.themesberg.com/neumorphism-ui/" />
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/neumorphism-ui/neumorphism-thumbnail.jpg"/>
<meta property="og:description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages." />
<meta property="og:site_name" content="Themesberg" />

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Fontawesome -->
<link type="text/css" href="vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

<!-- Pixel CSS -->
<link type="text/css" href="css/neumorphism.css" rel="stylesheet">

<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>
    <main>
        <!-- Section -->
        <section class="min-vh-100 d-flex bg-primary align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 justify-content-center">
                        <div class="card bg-primary shadow-soft border-light p-4">
                            <div class="card-header text-center pb-0">
                                <h2 class="h4">Sign in to our platform</h2>
                            </div>
                            <div class="card-body">

                                <form method="post" class="mt-4" name="login">
                                    <!-- Form -->
                                    <div class="form-group">
                                        <label for="exampleInputIcon3">Your Username</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-user"></span></span>
                                            </div>
                                            <input class="form-control" id="exampleInputIcon3" name="username" placeholder="Username" type="text" aria-label="username">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <div class="form-group">
                                        <!-- Form -->
                                        <div class="form-group">
                                            <label for="exampleInputPassword6">Password</label>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="fas fa-unlock-alt"></span></span>
                                                </div>
                                                <input class="form-control" name="password" id="exampleInputPassword6" placeholder="Password" type="password" aria-label="Password" required>
                                            </div>
                                        </div>
                                        <!-- End of Form -->

                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                                </form>
                                <?php
                                    }
                                ?>
                                <div class="d-block d-sm-flex justify-content-center align-items-center mt-4">
                                    <span class="font-weight-normal">
                                        Not registered?
                                        <a href="" class="font-weight-bold">Create account</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Core -->
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/headroom.js/dist/headroom.min.js"></script>

<!-- Vendor JS -->
<script src="vendor/onscreen/dist/on-screen.umd.min.js"></script>
<script src="vendor/nouislider/distribute/nouislider.min.js"></script>
<script src="vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="vendor/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendor/jarallax/dist/jarallax.min.js"></script>
<script src="vendor/jquery.counterup/jquery.counterup.min.js"></script>
<script src="vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
<script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script src="vendor/prismjs/prism.js"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Neumorphism JS -->
<script src="assets/js/neumorphism.js"></script>

</body>

</html>
