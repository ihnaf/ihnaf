 
<?php
include("template/dbcon.php");
require_once("template/header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>add income category</title>
</head>
<body>
	<center>
		<div class="container" style="padding-top:100px ;">
			<div class="jumbotron">
				<div class="row">
			<div class="col-md-12">

<h2>Fill the details</h2>

<form method="POST" action="addincomecat.php">
						<div class="form-group">  
							<input type="hidden" name="incomecatID">				
						</div>

						<div class="form-group">
							<label for="incomecatname">Enter Income Category name</label>    
 							<input type="text" name="incomecatname">
 						</div>
					
 						<div>
 							<button class="btn btn-primary" type="submit" name="submit">Add income category</button>
						</div>




 </form>



 <?php
if (isset($_POST['submit']))
{
	$ID=$_POST['incomecatID'];
	$name=$_POST['incomecatname'];
	$user=$_SESSION['Id'];

		
		$result=mysqli_query($connection,"INSERT INTO income_category(Income_Category_Id,Income_Category_User_Id,Income_Category_Name) VALUES('','$user', '$name')");

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






 