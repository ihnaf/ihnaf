 
<?php
include("template/dbcon.php");
require_once("template/header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sign up form</title>
</head>
<body>
	<center>
		<div class="container" style="padding-top:100px ;">
			<div class="jumbotron">
				<div class="row">
			<div class="col-md-12">

<h2>Fill the details</h2>

<form method="POST" action="add income.php">
						<div class="form-group">
							<label for="amount">Amount</label>   
							<input type="number" name="amount" required>				
						</div>

						<div class="form-group">
							<label for="description">Description</label>    
 							<input type="text" name="description">
 						</div>
 						
 						<?php
 						$query="SELECT Income_Category_Name FROM income_category";
 						$result=$connection->query($query);

 						if ($result->num_rows > 0) {
   							 echo '<select name="dropdown">';

   							   while ($row = $result->fetch_assoc()) {
        						$columnValue = $row['Income_Category_Name'];
     							   echo '<option value="' . $columnValue . '">' . $columnValue . '</option>';
   											 }

   								echo '</select>';

   								} else {
    								echo "No data found.";
										}
 						 ?>
					
 						<div class="form-group">
 							<label for="date">Date</label>    
 							 <input type="date" name="date">
 						</div>
 					
 						<div>
 							<button class="btn btn-primary" type="submit" name="submit">Add to income</button>
						</div>




 </form>



 <?php
if (isset($_POST['submit']))
{
	$amount=$_POST['amount'];
	$description=$_POST['description'];
	$date=$_POST['date'];

	$incomeuser=$_SESSION['Id'];
		
		$result=mysqli_query($connection,"INSERT INTO income(Income_Id,Income_User_Id,Income_amount,Income_Description,Income_Date) VALUES('','$incomeuser', '$amount','$description','$date')");

		if ($result)
		{
			echo "amount added successfully";
			
		}

		else
		{
			echo "amount added failed ";
		}

		}





?>


 <?php
require_once('template/footer.php');
 ?>






 