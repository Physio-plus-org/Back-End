</form>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "physiop";
	$tabname = "r1";
  	$psfusers = "psfusers";

    session_start();

	// Create a connection to the database
	$conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get username and password inputs
    	$username = $_POST['username'];
    	$passwd = md5($_POST['passwd']);

    // Check if username and password are in database
    	$sql = "SELECT CASE WHEN EXISTS (
        	SELECT * FROM psfusers WHERE username = '" . $username . "' AND passwd = '" . $passwd . "'
    		) THEN 'OK' ELSE '' END";
    	$result = mysqli_query($conn, $sql);

    // Display result message
    	if (mysqli_num_rows($result) > 0 && mysqli_fetch_row($result)[0] == 'OK') {
        	$message = "OK";
    	} else {
        	$message = "Username or password incorrect";
    	}
}

?>

<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="passwd">Password:</label>
    <input type="password" name="passwd" id="passwd">
    <br>
    <input type="submit" value="Submit">
</form>

<?php if (isset($message)) { echo $message; } ?>
