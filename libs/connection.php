<?Php
$host_name = "localhost";
$username = "u226247330_rulr"; // Change your database nae
$password = ">M]2jpFi3";          // Your database user id 
$database = "u226247330_schedulr";          // Your password

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>

