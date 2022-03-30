<?php
require('db.php');
include("auth_session.php");
?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Schedulr</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Neumorphism UI">
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
<link rel="apple-touch-icon" sizes="120x120" href="./assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="./assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="./assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">


<!-- Fontawesome -->
<link type="text/css" href="./vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

<!-- Pixel CSS -->
<link type="text/css" href="./css/neumorphism.css" rel="stylesheet">

<?php
date_default_timezone_set("America/New_York");



/**
 * Function to query information based on
 * a parameter: in this case, location.
 *
 */

require "config.php";
require "common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
            FROM users
            WHERE location = :location";

    $location = date("Y-m-d");
    $statement = $connection->prepare($sql);
    $statement->bindParam(':location', $location, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/navbar.php"; ?>
<?php require "templates/header.php"; ?>



<!--//$data = date("m/d/Y");
<form method="post">
  <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
  <label for="location">Location</label>
  <input type="text" id="location" name="location">
  <input type="submit" name="submit" value="View Results">
</form>-->



</br></br>
<div class="row row-cols-2">
      <div class="col">

          <h3>Schedule for <?php


          session_id(thedate);
          session_start();
          include("DBConfig.php");

$data = $_GET["data"];
$_SESSION['date'] = $data;
if( $data == "")
    {
        $data = date('m/d/Y');
        $_SESSION['date'] = date('m/d/Y');
    }

$facility = $_GET['facility'];
$prac = $_GET['prac'];
// Provides: <body text='black'>
$facc = str_replace ("'","\'",$facility);
$data = date("m/d/Y", strtotime($data));
$where = "WHERE data = '$data'";
$_SESSION['facc'] = $facc;
$_SESSION['prac'] = $prac;

if(!empty($_GET['facility'])){
$where .= "AND facility = '$facc'";

}

if(!empty($_GET['prac'])){
$where .= "AND prac = '$prac '";

}

$_SESSION['where'] = $where;
$_SESSION['facility'] = $facc;

$result = mysqli_query($conn, "SELECT * FROM patient $where ORDER BY facility ASC");
$namesoffac = array();


echo date('F d, Y', strtotime($data));

?></h3></div></div></br>

          <!-- mb-4 mb-lg-5 Form.  -lg-4 col-sm-6 --> <!---sm4-->
          <div class="row mb-5">

               <div class="col-auto">
              <form method="get">

    <?php
    $link2 = mysqli_connect("localhost","u226247330_rulr",">M]2jpFi3","u226247330_schedulr");
    $sql2 = "SELECT name FROM facility GROUP BY name;";
    $result2 = mysqli_query($link2,$sql2);
    if ($result2 != null) {
        echo '<select class="custom-select" name="facility" id="facility">';
        echo '<option value="">--</option>';
        $num_results2 = mysqli_num_rows($result2);
        for ($i=0;$i<$num_results2;$i++) {
            $row2 = mysqli_fetch_array($result2);
            $fac = $row2['name'];

            echo '<option value="' .$fac. '">' .$fac. '</option>';
        }
        echo '</select>';
    }
    mysqli_close($link2);
    ?>
<label for="facility">Facility</label>
</div>
      <div class="col-auto">
<?php
    $link2 = mysqli_connect("localhost","u226247330_rulr",">M]2jpFi3","u226247330_schedulr");
    $sql2 = "SELECT lastname FROM providers GROUP BY lastname;";
    $result2 = mysqli_query($link2,$sql2);
    if ($result2 != null) {
        echo '<select class="custom-select" name="prac" id="prac">';
        echo '<option value="">--</option>';
        $num_results2 = mysqli_num_rows($result2);
        for ($i=0;$i<$num_results2;$i++) {
            $row2 = mysqli_fetch_array($result2);
            $prov = $row2['lastname'];
            echo '<option value="' .$prov. '">' .$prov. '</option>';
        }
        echo '</select>';
    }
    mysqli_close($link2);
    ?>
    <label for="prov">Provider</label>
   </div>
   <div class="col-auto">
          <!-- <div class="form-group mb-4">-->
 <div class="input-group">
      <div class="input-group-prepend">
         <span class="input-group-text">
         <span class="far fa-calendar-alt"></span>
         </span>
          </div>

          <input type="text" class="form-control datepicker" value="<?php echo date("m/d/Y"); ?>" name="data" id="data" autocomplete="off">
     </div></div>

       <!--<div class="input-group expand">
      <div class="input-group-prepend">
         <span class="input-group-text">
         <span class="far fa-calendar-alt"></span>
         </span>
          </div>

          <input type="date" class="form-control datepicker" value="<php echo date("m/d/Y"); ?>" name="data" id="data" autocomplete="off">
     </div>-->


     <!--</div>-->
     <div class="col-auto">
          <input class="btn btn-primary" type="submit" name="submit" value="Submit">

      </div>

</form>
</div>
<style>
        .expander { display: none; }
        .expander td:first-child { text-indent: 20px }
        .tiggle { cursor: pointer; color: #adadad; font-family: FontAwesome; }
        .tiggle:hover { color: #777777; }
        .tiggle.toggle:after { content: '\f055'; }
    @media only screen and (max-width: 900px) {
        .mobicol{
            display: none;
        }


    }
    @media only screen and (min-width: 900px) {
        .expand{
            display: none;
        }

    }

</style>

<div class="mb-5">
<table class="table shadow-soft rounded" id="myTable">
  <thead>
 <tr>
   <th class="border-0">First Name</th>
   <th class="border-0">Last Name</th>
   <th class="border-0 mobicol">Facility</th>
   <th class="border-0 mobicol">Room Number</th>
   <th class="border-0 mobicol">Chief Complain</th>
   <th class="border-0 mobicol">Practitioner</th>
   <th class="border-0 mobicol">Date</th>
   <th class="border-0 expand"></th>
 </tr>
</thead>





 <?php

 while($test = mysqli_fetch_array($result))
 {
 echo "<tbody>";
 echo" <tr><td>".$test['firstname']."</td>";
 echo"<td>".$test['lastname']."</td>";
 echo"<td class='mobicol'>".$test['facility']."</td>";
 $namesoffac[] = $test['facility'];
 echo"<td class='mobicol'>".$test['rmnum']."</td>";
 echo"<td class='mobicol'>".$test['chiefcomp']."</td>";
 echo"<td class='mobicol'>".$test['prac']."</td>";
 echo"<td class='mobicol'>".$test['data']."</td>";
 echo"<td class='expand'><span class='toggle tiggle'></span></td>";
 echo "</tr>";
 echo "<tr style='background-color:#FFF' class='border-0 expander'><td><h6><strong>Facility: </strong></h6></td><td>".$test['facility']."</td><td></td></tr>";
 echo "<tr style='background-color:#FFF' class='border-0 expander'><td><h6><strong>Room: </strong></h6></td><td>".$test['rmnum']."</td><td></td></tr>";
 echo "<tr style='background-color:#FFF' class='border-0 expander'><td><h6><strong>Complaint: </strong></h6></td><td>".$test['chiefcomp']."</td><td></td></tr>";
 echo "<tr style='background-color:#FFF' class='border-0 expander'><td><h6><strong>Provider: </strong></h6></td><td>".$test['prac']."</td><td></td></tr>";
 echo "<tr style='background-color:#FFF' class='border-0 expander'><td><h6><strong>Next Visit: </strong></h6></td><td>".$test['data']."</td><td></td></tr>";
 echo "</tbody>";
 }



 mysqli_close($conn);


 ?>
</table>


<?php
//echo $_SESSION['date'];


//if(isset($_GET['facility']))
    //{
  //     $facility = strval($_GET['facility']);
    //}

//echo $facility;
//$prac = $_GET['prac'];
//echo $prac;




//$res['id']
$_SESSION['facility'] = $namesoffac;

$pdfdate = date('F d, Y', strtotime($data));
$_SESSION['pdfdate'] = $pdfdate;

//print_r($namesoffac);
//echo $namesoffac[1];
?></br>
<form class="form-inline" method="post" action="libs/index.php">
<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary">Generate PDF</button>
</form>




</div>


<?php require "templates/footer.php"; ?>

<!-- Core -->
<script src="./vendor/jquery/dist/jquery.min.js"></script>
<script src="./vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="./vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./vendor/headroom.js/dist/headroom.min.js"></script>

<!-- Vendor JS -->
<script src="./vendor/onscreen/dist/on-screen.umd.min.js"></script>
<script src="./vendor/nouislider/distribute/nouislider.min.js"></script>
<script src="./vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="./vendor/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="./vendor/jarallax/dist/jarallax.min.js"></script>
<script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>
<script src="./vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
<script src="./vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script src="./vendor/prismjs/prism.js"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Neumorphism JS -->
<script src="./assets/js/neumorphism.js"></script>

<!-- ay -->
<script>
var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

    $(document).ready(function() {
  $('#myTable').on('click', '.toggle', function() {
    $(this).parents('tr').nextAll('tr.expander').toggle();
  });
});
</script>
