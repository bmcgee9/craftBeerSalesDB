<!DOCTYPE html>
<html>
<h2>Transactions Table</h2>
<!-- create button that takes user back to home page -->
<button onclick="window.location.href='index.html';">Back to Home Page </button>
</html>

<?php
//imports style sheet for outputted table
echo '<link rel="stylesheet" href="tableStyle.css">';
//creates variables for RDS login
$username="brett";
$password="12345";
$database="craftbeerdb";


//echo '<p> Getting to query</p>';

//create connection to RDS and execute the hard coded query
$mysqli=new mysqli("craftbeerrds3.c272vphjyl8a.us-east-1.rds.amazonaws.com",$username,$password,$database);
$query="SELECT p.Vendor_code, p.Name, p.Product_code, t.Date_and_time_of_unloading, t.Amount, t.Sale_Amount, t.Profit, t.Discount_percentage from products p JOIN transactions t ON p.Product_code = t.Product_code";

$result=$mysqli->query($query) or die($mysqli->error.__LINE__);
//echo '<p> Executed </p>';
//check to see if there are results
if ($result->num_rows > 0) {
//	echo 'Executed';
	//create structure for output table
	echo '<table>
	<tr>
		<th>Vendor</th>
		<th>Product Name</th>
		<th>Product Code</th>
		<th>Date and Time of Unloading</th>
		<th>Amount</th>
		<th>Profit</th>
		<th>Discount Percentage</th>
	</tr>';
	//goes through each of the rows from results and prints them into the table
	while($row=$result->fetch_assoc()) {
	//echo $row['name']."'s vendor is ".$row['Vendor_code']."</br>";
		echo '
		<tr>
			<td>'.$row['Vendor_code'].'</td>
			<td>'.$row['Name'].'</td>
                        <td>'.$row['Product_code'].'</td>
                        <td>'.$row['Date_and_time_of_unloading'].'</td>
                        <td>'.$row['Amount'].'</td>
                        <td>'.$row['Profit'].'</td>
                        <td>'.$row['Discount_percentage'].'</td>
		</tr>';
	}
	echo '
	</table>';
}
else {
	//if no results, print no results
	echo 'NO RESULTS';
}
?>
