<?php
//importing style sheet for table output
echo '<link rel="stylesheet" href="tableStyle.css">';
//creates variables to use in remote RDS login
$username="brett";
$password="12345";
$database="craftbeerdb";

//collecting the information from the POST request
$name=$_POST['Country_of_Origin'];
//$name2 = "%" . $name . "%";

//creates connection with RDS and executes query
$mysqli=new mysqli("craftbeerrds3.c272vphjyl8a.us-east-1.rds.amazonaws.com",$username,$password,$database);
$query="SELECT * from vendors where Country_of_Origin=?";
$stmt=$mysqli->prepare($query);
$stmt->bind_param('s',$name);
$stmt->execute();
$result = $stmt->get_result();

//$result=$mysqli->query($query) or die($mysqli->error.__LINE__);
//checks to see if the query returned anything
if ($result->num_rows > 0) {
	//creates the structure of the html table
	echo '<table>
	<tr>
		<th>Vendor</th>
		<th>Country of Origin</th>
	</tr>';
	//goes through each row of results and outputs it into the table
	while($row=$result->fetch_assoc()) {
	//echo $row['name']."'s vendor is ".$row['Vendor_code']."</br>";
		echo '
		<tr>
			<td>'.$row['Vendor_code'].'</td>
			<td>'.$row['Country_of_Origin'].'</td>
		</tr>';
	}
	echo '
	</table>';
}
else {
	//prints no results if there are none
	echo 'NO RESULTS';
}
?>
