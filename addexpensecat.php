 
<?php
include("template/dbcon.php");
require_once("template/header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add expense category</title>
</head>
<body>
	<center>
		<div class="container" style="padding-top:100px ;">
			<div class="jumbotron">
				<div class="row">
			<div class="col-md-12">

<h2>Fill the details</h2>

<form method="POST" action="addexpensecat.php">
						<div class="form-group">  
							<input type="hidden" name="expensecatID">				
						</div>

						<div class="form-group">
							<label for="expensecatname">Enter Expense Category name</label>    
 							<input type="text" name="expensecatname">
 						</div>
					
 						<div>
 							<button class="btn btn-primary" type="submit" name="submit">Add Expense category</button>
						</div>




 </form>



 <?php
if (isset($_POST['submit']))
{
	$ID=$_POST['expensecatID'];
	$name=$_POST['expensecatname'];
	$user=$_SESSION['Id'];

		
		$result=mysqli_query($connection,"INSERT INTO expense_category(Expense_Category_Id,Expense_Category_User_Id,Expense_Category_Name) VALUES('','$user', '$name')");

		if ($result)
		{
			echo "Category added successfully";
			
		}

		else
		{
			echo "Category added fail";
		}

		}





?>


 <?php
require_once('template/footer.php');
 ?>






 