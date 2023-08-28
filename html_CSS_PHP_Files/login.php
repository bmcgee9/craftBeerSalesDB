<?php
session_start();
$username="brett";
$password="12345";
$database="auth";

$name=$_POST['username'];
$pw=$_POST['password'];

$mysqli=new mysqli("craftbeerrds3.c272vphjyl8a.us-east-1.rds.amazonaws.com",$username,$password,$database);
$query="SELECT * from userandpw where username=?";
$stmt=$mysqli->prepare($query);
$stmt->bind_param('s',$name);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
	echo '<p>Successfully executed</p>';
        while($row=$result->fetch_assoc()) {
                if($row['username'] == $name && $row['password'] == $pw) {
			echo "Logged In";
			$_SESSION["authenticated"] = true;
			header("Location: transactionsGive.php");
		}else {
			echo "failed to log in";
			header("Location: index.html");
		}
        }
}
else {
        echo 'Invalid username or password';
	header("Location: index.html");
}

?>
