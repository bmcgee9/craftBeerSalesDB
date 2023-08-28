<?php
echo '<link rel="stylesheet" href="tableStyle.css">';
//setting variable values to be able to login to my RDS remotely
$username="brett";
$password="12345";
$database="craftbeerdb";

//collecting the information from the POST request
$name=$_POST['name'];
$name2 = "%" . $name . "%";

//creating the connection to RDS and executing query with a prepared statement
$mysqli=new mysqli("craftbeerrds3.c272vphjyl8a.us-east-1.rds.amazonaws.com",$username,$password,$database);
$query="SELECT * from products where name LIKE ?";
$stmt=$mysqli->prepare($query);
$stmt->bind_param('s',$name2);
$stmt->execute();
$result = $stmt->get_result();

//$result=$mysqli->query($query) or die($mysqli->error.__LINE__);
//outputting the results as long as they exist
if ($result->num_rows > 0) {
	//creates the html structure of a table
	echo '<table>
	<tr>
		<th>Name</th>
		<th>Vendor</th>
		<th>ABV</th>
		<th>Price</th>
	</tr>';
	//go through each result and add its information to the table
	while($row=$result->fetch_assoc()) {
	//echo $row['name']."'s vendor is ".$row['Vendor_code']."</br>";
		echo '
		<tr>
			<td>'.$row['Name'].'</td>
			<td>'.$row['Vendor_code'].'</td>
			<td>'.$row['ABV'].'</td>
			<td>'.$row['Retail_price'].'</td>
		</tr>';
	}
	echo '
	</table>';
}
else {
	//print no results if there are none
	echo 'NO RESULTS';
}
?>
