<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sign up form</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<center>
		<div class="container" style="padding-top:100px ;">
			<div class="jumbotron">
				<div class="row">
			<div class="col-md-12">


				<h2>Register to PIEMS</h2>

				<form method="POST" action="signup.php">
						


						<div class="form-group">
							<label for="name">User name</label>   
							<input type="text" name="name" required>				
						</div>

						<div class="form-group">
							<label for="email">E-mail</label>    
 							<input type="email" name="email" required>
 						</div>
					
 						<div class="form-group">
 							<label for="password">Password</label>    
 							 <input type="password" name="password" required>
 						</div>
 						<div class="form-group">
 							<label for="password2">Re-enter password</label>
 							<input type="password" name="passwordii" required>
 						</div>
 							

 						<div>
 							<button class="btn btn-primary" type="submit" name="submit">Create account</button>
						</div>




 </form><br>

 Already Have an Account <a href="index.php">Click Here</a> to login
				
			</div>
		</div>
		
	</div>
			</div>
		



<?php
include("dbcon.php");
if (isset($_POST['submit']))
{

	$name=$_POST['name'];
	$Email=$_POST['email'];
	$password=$_POST['password'];
	$repassword=$_POST['passwordii'];

	if ($password==$repassword) 
	{
		
		$result=mysqli_query($connection,"INSERT INTO user VALUES('', '$name','$Email','$password')");

		if ($result)
		{
			echo "Account created successfully ";
			header("location:index.php");
			exit();
		}

		else
		{
			echo "this e-mail or user name already taken  ";
		}

		}

	else 
	{
		echo "passwords unmatched please check again";
	}

}
?>
</center>

</body>
</html>