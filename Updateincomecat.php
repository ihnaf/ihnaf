	
	<?php
	include("template/header.php");
	?>
	<h3>Update Income category Records</h3>
	<?php
	// check if the form was submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include("dbcon.php");


        

    ?>
    
    <?php
		// retrieve the form data
		$id = $_POST["id"];
		$name = $_POST["name"];

		// update the record in the database
		$query = "UPDATE income_category SET Income_Category_Name='$name' WHERE Income_Category_Id='$id'";
		if (mysqli_query($connection, $query)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error while updating record: " . mysqli_error($connection);
		}

		// close the database connection
		mysqli_close($connection);
	} else {
		// database connection details
		require_once("dbcon.php");

		// check if the connection was successful
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// retrieve the record to be updated from the database
		$id = $_GET["id"];
		$sql = "SELECT * FROM income_category WHERE Income_Category_Id='$id'";
		$result = mysqli_query($connection, $sql);

		// check if the record exists
		if (mysqli_num_rows($result) == 1) 
		{
			$row = mysqli_fetch_assoc($result);
			$name = $row["Income_Category_Name"];
		} 
		else {
			echo "Record not found";
			exit();
		}

		// close the database connection
		mysqli_close($connection);
	}
	?>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<label for="name">Income Category Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>"><br>
		<input type="submit" value="Update">
	</form>
</body>
