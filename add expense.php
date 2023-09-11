 
<?php
include("template/dbcon.php");
require_once("template/header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add expense</title>
</head>
<body>
	<center>
		<div class="container" style="padding-top:100px ;">
			<div class="jumbotron">
				<div class="row">
			<div class="col-md-12">

<h2>Fill the details</h2>

<form method="POST" action="add expense.php">
						<div class="form-group">
							<label for="amount">Amount</label>   
							<input type="number" name="amount" required>				
						</div>

						<div class="form-group">
							<label for="description">Description</label>    
 							<input type="text" name="description">
 						</div>
					
 						<div class="form-group">
 							<label for="date">Date</label>    
 							 <input type="date" name="date">
 						</div>
 						<div>
 							<button class="btn btn-primary" type="submit" name="submit">Add to Expense</button>
						</div>




 </form>



 <?php
if (isset($_POST['submit']))
{
	$amount=$_POST['amount'];
	$description=$_POST['description'];
	$date=$_POST['date'];
	$user=$_SESSION['Id'];
		
		$result=mysqli_query($connection,"INSERT INTO expense(Expense_Id,Expense_User_Id,Expense_amount,Expense_Description,Expense_Date) VALUES('','$user', '$amount','$description','$date')");

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






 