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

<?php

/**
 * Delete a user
 */

require "config.php";
require "common.php";

$success = null;

if (isset($_POST["submit"])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $id = $_POST["submit"];

    $sql = "DELETE FROM patient WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "Patient successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM patient ORDER BY firstname";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/navbar.php"; ?>
<?php require "templates/header.php"; ?>

<h2>Delete patients</h2>

<?php if ($success) echo $success; ?>

<div class="mb-5">
<form method="post">
  <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
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
        <!--<th class="border-0"><span class="badge badge-danger text-uppercase">Delete</span></th>-->
      </tr>
    </thead>
    
    <?php foreach ($result as $row) : ?>
    <tbody>
      <tr>
        <td><?php echo escape($row["firstname"]); ?></td>
        <td><?php echo escape($row["lastname"]); ?></td>
        <td class="mobicol"><?php echo escape($row["facility"]); ?></td>
        <td class="mobicol"><?php echo escape($row["rmnum"]); ?></td>
        <td class="mobicol"><?php echo escape($row["chiefcomp"]); ?></td>
        <td class="mobicol"><?php echo escape($row["prac"]); ?></td>
        <td class="mobicol"><?php echo escape($row["data"]); ?> </td>
        <td class="mobicol"><button class="btn btn-sm btn-primary text-danger" onclick="return confirm('Are you sure you want to delete?')" type="submit" name="submit" value="<?php echo escape($row["id"]); ?>">Delete</button></td>
        <td class='expand'><div class="rectangle"><span class='toggle tiggle'></span></div></td>
      </tr>
      
      <tr style='background-color:#FFF' class='expander'><td><h6><strong>Facility: </strong></h6></td><td><?php echo escape($row["facility"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Room: </strong></h6></td><td><?php echo escape($row["rmnum"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Complaint: </strong></h6></td><td><?php echo escape($row["chiefcomp"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Provider: </strong></h6></td><td><?php echo escape($row["prac"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Next Visit: </strong></h6></td><td><?php echo escape($row["data"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><button class="btn btn-sm btn-primary text-danger" type="submit" name="submit" onclick="return confirm('Are you sure you want to delete?')"  value="<?php echo escape($row["id"]); ?>">Delete</button></td><td></td><td></td></tr>
      </tbody>
    <?php endforeach; ?>
    
  </table>
</form>
</div>



<?php require "templates/footer.php"; ?>
<!-- Core value="<?php echo escape($row["id"]); ?>" -->
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


function delCom() {
  confirm("Confirm Delete Patient");
}
</script>

