<!DOCTYPE html>
<html>
	<head>
	<title>R1: Δημιουργία Φυσιοθεραπευτηρίου (Όνομα, Διεύθυνση, ΑΦΜ)</title>
  <style>
  .error {color: #FF0000;}
  </style>
</head>
<body>

<h1>R1: Δημιουργία Φυσιοθεραπευτηρίου (Όνομα, Διεύθυνση, ΑΦΜ)</h1>
		<br>
		
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

   Name: <input type="text" name="namePhysio" value="<?php echo $namePhysio;?>">
   <span class="error">* <?php echo $namePhysioErr;?></span>
   <br><br>
   Address: <input type="text" name="addressPhysio" value="<?php echo $addressPhysio;?>">
   <span class="error">* <?php echo $addressPhysioErr;?></span>
   <br><br>
   AFM: <input type="text" name="afmPhysio" value="<?php echo $afmPhysio;?>">
   <span class="error">* <?php echo $afmPhysioErr;?></span>
   <br><br>

   Username: <input type="text" name="username" value="<?php echo $username;?>">
   <span class="error">* <?php echo $usernameErr;?></span>
   <br><br>

   Password: <input type="password" name="passwd" value="<?php echo $passwd;?>">
   <span class="error">* <?php echo $passwdErr;?></span>
   <br><br>
   
   Verify Password: <input type="password" name="vpasswd" value="<?php echo $vpasswd;?>">
   <span class="error">* <?php echo $vpasswdErr;?></span>
   <br><br>

   <input type="submit" name="submit" value="Submit">
</form>

<a href="./view.php"> Εμφάνιση </a><br>

<?php
// Replace with your own MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "physiop";
$tabname = "r1";

session_start();
include_once "database.php";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// define variables and set to empty values
$namePhysioErr = $addressPhysioErr = $afmPhysioErr = $username = $passwd = $vpasswd ="";
$namePhysio = $addressPhysio = $afmPhysio = $usernameErr = $passwdErr = $vpasswdErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  
   if (empty($_POST["namePhysio"])) {
     $namePhysioErr = "Name is required";
   } else {
     $namePhysio = test_input($_POST["namePhysio"]);
     if (!preg_match("/^[a-zA-Z ]*$/",$namePhysio)) {
      $namePhysioErr = "Only letters and white space allowed";
      }
    }

  if (empty($_POST["addressPhysio"])) {
	  $addressPhysioErr = "Address is required";
  } else {
	  $addressPhysio = test_input($_POST["addressPhysio"]);
  }

  if (empty($_POST["afmPhysio"])) {
	  $afmPhysioErr = "AFM is required";
  } else {
	  $afmPhysio = test_input($_POST["afmPhysio"]);
    // if (!preg_match ("/[^0-9]/", $afmPhysio)) {
    //   $afmPhysioErr = "Only numbers allowed";
    //   }
  }

  if (empty($_POST["username"])) {
	  $usernameErr = "Usermame is required";
  } else {
	  $username = stripslashes($_POST["username"]);
    $username = mysqli_real_escape_string($conn, $username);
  }

    if (empty($_POST["passwd"])) {
      $passwdErr = "Password is required";
    } else {
      $passwd = stripslashes($_POST["passwd"]);
      $passwd = mysqli_real_escape_string($conn, $passwd);  
    }

    if (empty($_POST["passwd"])) {
      $passwdErr = "Password is required";
    } else {
      if($_POST["passwd"] != $_POST["vpasswd"]){
        $vpasswdErr = "Passwords do not match";
      }
      else{
        $passwd = stripslashes($_POST["passwd"]);
        $passwd = mysqli_real_escape_string($conn, $passwd);
      }
      }
  }
  
    
  if(!empty($namePhysio) && empty($namePhysioErr) &&!empty($addressPhysio) && empty($addressPhysioErr) && !empty($afmPhysio) && empty($afmPhysioErr)){
   // Insert the data into the database
//   $sql = "INSERT INTO $tabname (namePhysio, addressPhysio, afmPhysio, username, passwd) VALUES ('$namePhysio', '$addressPhysio', $afmPhysio', $username','" . md5($passwd) . "')";
  $sql = "INSERT INTO $tabname (namePhysio, addressPhysio, afmPhysio, username, passwd) VALUES ('$namePhysio', '$addressPhysio', '$afmPhysio', '$username','" . md5($passwd) . "')";
  if (mysqli_query($conn, $sql)) {
         echo "Data saved successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
}


// Close the database connection
mysqli_close($conn);


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>


</body>
</html>