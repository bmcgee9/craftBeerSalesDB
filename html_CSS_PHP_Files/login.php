<?php
session_start();
//create variables to use in RDS login
$username="brett";
$password="12345";
$database="auth";

//collecting information from the POST request
$name=$_POST['username'];
$pw=$_POST['password'];

//creates connection with RDS and executes query to get password of username
$mysqli=new mysqli("craftbeerrds3.c272vphjyl8a.us-east-1.rds.amazonaws.com",$username,$password,$database);
$query="SELECT * from userandpw where username=?";
$stmt=$mysqli->prepare($query);
$stmt->bind_param('s',$name);
$stmt->execute();
$result = $stmt->get_result();
//checks to see if there are results - no results means the username didn't exist in the DB
if ($result->num_rows > 0) {
	echo '<p>Successfully executed</p>';
        while($row=$result->fetch_assoc()) {
		//checks to see if the inputted credentials are valid
                if($row['username'] == $name && $row['password'] == $pw) {
			echo "Logged In";
			//if so, set session authentication and redirect them to correct page
			$_SESSION["authenticated"] = true;
			header("Location: transactionsGive.php");
		}else {
			//if not, redirect the user back to the home page
			echo "failed to log in";
			header("Location: index.html");
		}
        }
}
else {
	//if no results, send user back to home page
        echo 'Invalid username or password';
	header("Location: index.html");
}

?>
