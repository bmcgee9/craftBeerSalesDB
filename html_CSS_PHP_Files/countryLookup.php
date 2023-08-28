<?php
echo '<link rel="stylesheet" href="tableStyle.css">';
$username="brett";
$password="12345";
$database="craftbeerdb";

$name=$_POST['Country_of_Origin'];
//$name2 = "%" . $name . "%";


$mysqli=new mysqli("craftbeerrds3.c272vphjyl8a.us-east-1.rds.amazonaws.com",$username,$password,$database);
$query="SELECT * from vendors where Country_of_Origin=?";
$stmt=$mysqli->prepare($query);
$stmt->bind_param('s',$name);
$stmt->execute();
$result = $stmt->get_result();

//$result=$mysqli->query($query) or die($mysqli->error.__LINE__);

if ($result->num_rows > 0) {
	echo '<table>
	<tr>
		<th>Vendor</th>
		<th>Country of Origin</th>
	</tr>';
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
	echo 'NO RESULTS';
}
?>
