 <?php

//Define your host here.
$hostname = "localhost";

//Define your database username here.
$username = "u226247330_rulr";

//Define your database password here.
$password = ">M]2jpFi3";

//Define your database name here.
$dbname = "u226247330_schedulr";

 $conn = new mysqli($hostname, $username, $password);

 if (!$conn)

 {

 die('Could not connect: ' . mysqli_error());

 }

 mysqli_select_db($conn, $dbname);


?>
