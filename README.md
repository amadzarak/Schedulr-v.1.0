# Schedulr
Schedulr is a CRUD web-app that is based on PHP. The following documentation will explain the workings of version 1 of the program, as well as some of the underlying code. I have planned a future iteration of this program that will be based on Python and will incorporate End-to-End Encryption, and also have a session manager, and also keylogging.


## config.php
```php
<?php

/**
 * Configuration for database connection
 *
 */

$host       = "localhost";
$username   = "u226247330_rulr";
$password   = ">M]2jpFi3";
$dbname     = "u226247330_schedulr";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

```
## common.php
```php

<?php

//session_start();

if (empty($_SESSION['csrf'])) {
	if (function_exists('random_bytes')) {
		$_SESSION['csrf'] = bin2hex(random_bytes(32));
	} else if (function_exists('mcrypt_create_iv')) {
		$_SESSION['csrf'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	} else {
		$_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
	}
}

/**
 * Escapes HTML for output
 *
 */

function escape($html) {
    return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}





```



## Dashboard
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221154.png?raw=true)

When a user first logins into the system they are presented with the dashboard screen. On the dashboard screen the user can perform various actions relating to practice management.

In order to protect patient privacy, all screenshots will use names related to the NFL.

### Display Table Information
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329214153.png?raw=true)

```PHP
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

```


### Filters
The main purpose of the dashboard for for report generation. A user can filter their reports in three main ways:
1. Facility
2. Provider
3. Date

By default the dashboard reports all activities for the current date.
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329214245.png?raw=true)

All patients that are listed under 'New England Patriots' will appear. Simply by selecting the dropdown, a user can filter by the name of the facility.

The following is the code for the filter.
```php
<?php
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
?>

```

The dropdown boxes for the filter loops through the values in either the 'Facility' or 'Provider' tables. Thus we are able to select from values that actually exist within the database, and we also do not have to manually update the filters if we add more values.

```php
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

```


```PHP
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

```


Similarly, a user can use multiple filters at once, simply by selecting other criteria.

### Generating Reports
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329214903.png?raw=true)

By using the filters on the dashboard, a user can generate reports in the form of a pdf. This allows for easy sharing of information. For example, a provider can have easy access to their schedule, and where the patients they need to visit are, within the facility.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215030.png?raw=true)

Additionally, practice managers can gain information relating to all practice wide activities, and gain insight on provider productivity. 
## Reschedule
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221241.png?raw=true)

```php
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



```


One of the more powerful functions contained within the web application is the rescheduling page. On this page a user can batch select multiple patients and reschedule them. Additionally, a user can make updates to the schedule by changing the provider assigned or changing the date of the appointment.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215349.png?raw=true)

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215423.png?raw=true)

Above, two patients have been assigned the provider 'Zarak' and are scheduled to be seen on March 31.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215505.png?raw=true)

If 'Zarak' was not available for the date of the appoint, the patient can be assigned a different provider.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215615.png?raw=true)
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215659.png?raw=true)


```php

<?php

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
```

```php
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


```

## Add Patient
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221326.png?raw=true)

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220047.png?raw=true)

If we look at the results of our reschedule function, we can see that the values for the patients have been updated in our database. We can additionally add more patients to the practice on our 'Add Patient' page.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220302.png?raw=true)

We can add patient 'Chris Godwin' to be scheduled for 'March 31, 2022.' When we go on the dashboard page, we will see 'Chris Godwin' along with the other patients that have been scheduled for 'March 31, 2022.'

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220422.png?raw=true)

We can check the 'Patient' table, and see that 'Chris Godwin' has been added.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220522.png?raw=true)

## Add Facility
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221403.png?raw=true)

```PHP
<?php
require "config.php";
require "common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "name"  => $_POST['name'],
      "add1"     => $_POST['add1'],
      "add2"   => $_POST['add2'],
      "city"  => $_POST['city'],
      "state"     => $_POST['state'],
      "zip"   => $_POST['zip'],
      "phone"   => $_POST['phone']

    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "facility",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>

```


Another 'Create' function. A user can fill out the form and they will be able to add another facility to the facility database.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215818.png?raw=true)

In terms of the database structure, 'Miami Dolphins' are now added to the table 'facility'

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215944.png?raw=true)



## Add Provider

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221033.png?raw=true)

```php
<?php


require "config.php";
require "common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "firstname"  => $_POST['firstname'],
      "lastname"     => $_POST['lastname'],
      "phone"   => $_POST['phone']

    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "providers",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>

```


![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220743.png?raw=true)
We can update the table 'Providers' on the 'Add a Provider' page, and filling out the information.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220831.png?raw=true)

And we can see that the 'Providers' table has been updated to reflect the new information.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220851.png?raw=true)

## Edit Patient
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221444.png?raw=true)

The 'Edit Patient' page allows users to correct any mistakes that may have occurred when originally entering the patient information. For example, assume that a patient has been assigned to wrong facility. The edit page allows a user to fix that.

```php
<?php

/**
 * List all users with a link to edit
 */

require "config.php";
require "common.php";

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

<h2>Update patients</h2>

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

    <?php foreach ($result as $row) : ?>
     <tbody>
        <tr>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td class="mobicol"><?php echo escape($row["facility"]); ?></td>
            <td class="mobicol"><?php echo escape($row["rmnum"]); ?></td>
            <td class="mobicol"><?php echo escape($row["prac"]); ?></td>
            <td class="mobicol"><?php echo escape($row["chiefcomp"]); ?></td>
            <td class="mobicol"><?php echo escape($row["data"]); ?> </td>
            <td class="mobicol"><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
            <td class='expand'><div class="rectangle"><span class='toggle tiggle'></span></div></td>
         </tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Facility: </strong></h6></td><td><?php echo escape($row["facility"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Room: </strong></h6></td><td><?php echo escape($row["rmnum"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Complaint: </strong></h6></td><td><?php echo escape($row["chiefcomp"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Provider: </strong></h6></td><td><?php echo escape($row["prac"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><h6><strong>Next Visit: </strong></h6></td><td><?php echo escape($row["data"]); ?></td><td></td></tr>
            <tr style='background-color:#FFF' class='expander'><td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>" class="text-dark font-weight-bold mr-3">
                        <span class="mr-1"><span class="fas fa-edit"></span></span>Edit</a> </td><td></td><td></td></tr>
    </tbody>
    <?php endforeach; ?>
    
    
    

</table>


```


![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221605.png?raw=true)

We can see that 'Tom Brady' and 'Rob Gronkowski' have been assigned to the wrong facility. While they are originally located at 'New England Patriots' their facility now needs to be updated to 'Tampa Bay Buccaneers'.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221735.png?raw=true)
The 'Edit' page is structured very similarly to the 'Add Patient' page. After the required changes have been made we can submit. And the patient profile will be updated.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221902.png?raw=true)

Users can edit other aspects of the patient's profile on the edit page too. And the changes will be reflected on the 'Patient' table in the MySQL database.

```php
<?php


require "config.php";
require "common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $user =[
      "id"        => $_POST['id'],
      "firstname" => $_POST['firstname'],
      "lastname"  => $_POST['lastname'],
      "rmnum"       => $_POST['rmnum'],
      "facility"     => $_POST['facility'],
      "chiefcomp"  => $_POST['chiefcomp'],
      "prac"  => $_POST['prac']

    ];

    $sql = "UPDATE patient
            SET id = :id,
              firstname = :firstname,
              lastname = :lastname,
              rmnum = :rmnum,
              facility = :facility,
              chiefcomp = :chiefcomp,
              prac = :prac
            WHERE id = :id";

  $statement = $connection->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];

    $sql = "SELECT * FROM patient WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>

```


![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221955.png?raw=true)




## Delete Patient
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222053.png?raw=true)

As the final feature in a 'CRUD' program, the 'Delete Patient' page allows users to remove patients from the database.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222414.png?raw=true)

After hitting the 'Delete' button, the user will receive an alert asking to confirm their selection.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222555.png?raw=true)

Once confirmed we will see that the patient has been remove from the page, and the database has also been updated.

```php
<?php
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


```


![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222536.png?raw=true)

## User Accounts
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222654.png?raw=true)
The 'Users' table of the database is a listing of all the active users for the web-app. We can see that their passwords have been encrypted. In future iterations of the program, all other information will be encrypted.


### auth_session.php
```php
<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>


```
