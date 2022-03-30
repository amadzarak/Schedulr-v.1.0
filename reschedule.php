<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
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

/**
 * Delete a user
 */

require "config.php";
require "common.php";

$success = null;
$check = null;


if (isset($_POST["submit"])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();


      if(!empty($_POST['check'])) {
          foreach($_POST['check'] as $check){
              $data = $_POST['data'];
              $prac = $_POST['prac'];
              
              $connection = new PDO($dsn, $username, $password, $options);
              
              if($data != '') {
              $sql = "UPDATE patient SET data='$data' WHERE id='$check'";
              $statement = $connection->prepare($sql);
              $statement->execute();
              $success = true;
              }
              
              if($prac != '') {
              $sql = "UPDATE patient SET prac='$prac' WHERE id='$check'";
              $statement = $connection->prepare($sql);
              $statement->execute();
              $success = true;
              }
          }
      }




}

try {
  $connection = new PDO($dsn, $username, $password, $options);
  $sql = "SELECT * FROM patient ORDER BY facility ASC";


  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/navbar.php"; ?>
<?php require "templates/header.php"; ?>



<?php if ($success){
   foreach($_POST['check'] as $check) {?>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
  <div class="alert alert-success alert-dismissible shadow-soft fade show" role="alert">
      <span class="alert-inner--icon"><span class="far fa-thumbs-up"></span></span>
      <span class="alert-inner--text"><strong><?php $pieces = explode(":", $check); echo $pieces[1]; // firstname; ?></strong> successfully rescheduled.</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div></div></div>
  
<?php }}
 ?>


<style>
        .expander { display: none; }
        
        .tiggle { cursor: pointer; color: #adadad; font-family: FontAwesome; position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%); }
        .tiggle:hover { color: #777777; }
        .tiggle.toggle:after { content: '\f055'; }
        .rectangle {
    position: relative;
}

.hope {position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%); }
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
<form method="post" autocomplete="off">

  <div class="row row-cols-2">
      <div class="col">
          <h2>Reschedule Patients</h2>
      </div>
<div class="col-md-auto">
<form method="get" class="form-inline">
              
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
    <label for="prov">Assign Provider</label>
</div>

          <!-- mb-4 mb-lg-5 Form.  -lg-4 col-sm-6 --> <!---sm4-->
          <div class="col-md-auto">
              
              
          <!-- <div class="form-group mb-4">-->
  <div class="input-group">
      <div class="input-group-prepend">
         <span class="input-group-text"> 
         <span class="far fa-calendar-alt"></span>
         </span>
          </div>
       
          <input type="text" class="form-control datepicker" value="" name="data" id="data" autocomplete="off">
          
     </div>
     <label for="prov">Assign Date</label>
   
     </div>
     <div class="col-auto">
          <input class="btn btn-primary" type="submit" name="submit" value="Submit">
      
      </div>
 </div>
 </br>
  <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
  <table class="table shadow-soft rounded" id="myTable">
    <thead>
      <tr>
        <th class="border-0" style="position: sticky;">(select)</th>
        <th class="border-0" style="position: sticky;">First Name</th>
        <th class="border-0" style="position: sticky;">Last Name</th>
        <th class="border-0 mobicol" style="position: sticky;">Facility</th>
        <th class="border-0 mobicol" style="position: sticky;">Room Number</th>
        <th class="border-0 mobicol" style="position: sticky;">Chief Complaint</th>
        <th class="border-0 mobicol" style="position: sticky;">Practitioner</th>
        <th class="border-0 mobicol" style="position: sticky;">Date</th>
        <th class="border-0 expand" style="position: sticky;"></th>
        <!---->
      </tr>
    </thead>
    
    <?php foreach ($result as $row) : ?>
    <tbody>
      <tr>
        <td style="text-align: center;"><div class="rectangle"><input class="form-check-input hope" type="checkbox" value="<?php echo escape($row["id"]);?>:<?php echo escape($row["firstname"]); ?>" name="check[]"></div></td>
        <td><?php echo escape($row["firstname"]); ?></td>
        <td><?php echo escape($row["lastname"]); ?></td>
        <td class="mobicol"><?php echo escape($row["facility"]); ?></td>
        <td class="mobicol"><?php echo escape($row["rmnum"]); ?></td>
        <td class="mobicol"><?php echo escape($row["chiefcomp"]); ?></td>
        <td class="mobicol"><?php echo escape($row["prac"]); ?></td>
        <td class="mobicol"><?php echo escape($row["data"]); ?> </td>
        <td class='expand'><div class="rectangle"><span class='toggle tiggle'></span></div></td>
      </tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Facility: </strong></h6></td><td><?php echo escape($row["facility"]); ?></td><td></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Room: </strong></h6></td><td><?php echo escape($row["rmnum"]); ?></td><td></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Complaint: </strong></h6></td><td><?php echo escape($row["chiefcomp"]); ?></td><td></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Provider: </strong></h6></td><td><?php echo escape($row["prac"]); ?></td><td></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Next Visit: </strong></h6></td><td><?php echo escape($row["data"]); ?></td><td></td><td></td></tr>
        </tbody>
    <?php endforeach; ?>
    
  </table>
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
