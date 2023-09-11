	
	<?php
	include("template/header.php");
	?>
	<h1>Update Income Record</h1>
	<?php
	// check if the form was submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include("dbcon.php");     

    ?>
    
    <?php
		// retrieve the form data
		$id = $_POST["id"];
		$amount = $_POST["amount"];
		$description = $_POST["description"];
		$date = $_POST["date"];

		// update the record in the database
		$query = "UPDATE income SET Income_Amount='$amount', Income_Description='$description', Income_Date='$date' WHERE Income_Id='$id'";
		if (mysqli_query($connection, $query)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . mysqli_error($connection);
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
		$sql = "SELECT * FROM income WHERE Income_Id='$id'";
		$result = mysqli_query($connection, $sql);

		// check if the record exists
		if (mysqli_num_rows($result) == 1) 
		{
			$row = mysqli_fetch_assoc($result);
			$amount = $row["Income_Amount"];
			$description = $row["Income_Description"];
			$date = $row["Income_Date"];
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
		<label for="amount">Amount:</label>
		<input type="number" name="amount" value="<?php echo $amount; ?>"><br>
		<label for="description">Description:</label>
		<input type="text" name="description" value="<?php echo $description; ?>"><br>
		<label for="date">Date:</label>
		<input type="date" name="date" value="<?php echo $date; ?>"><br>
		<input type="submit" value="Update">
	</form>
</body>
