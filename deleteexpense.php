	
	<?php
	// check if the form was submitted
	include("template/header.php");
	?>
	<h1>Delete Income Record</h1>
	<?php
	// check if the form was submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include("dbcon.php");

		// retrieve the form data
		$id = $_POST["id"];

		// delete the record from the database
		$query = "DELETE FROM expense WHERE Expense_Id='$id'";
		if (mysqli_query($connection, $query)) {
		    echo "Record deleted successfully";
		} else {
		    echo "Error while deleting record: " . mysqli_error($connection);
		}

		// close the database connection
		mysqli_close($connection);
	} else {
		require_once("dbcon.php");

		// check if the connection was successful
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// retrieve the record to be deleted from the database
		$id = $_GET["id"];
		$sql = "SELECT * FROM expense WHERE Expense_Id='$id'";
		$result = mysqli_query($connection, $sql);

		// check if the record exists
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			$amount = $row["Expense_Amount"];
			$description = $row["Expense_Description"];
			$date = $row["Expense_Date"];
		} else {
			echo "Record not found";
			exit();
		}

		// close the database connection
		mysqli_close($connection);
	}
	?>
	<p>Are you sure you want to delete this record?</p>
	<table>
		<tr>
			<th>Amount</th>
			<th>Description</th>
			<th>Date</th>
		</tr>

		<tr>
			<td><?php echo $amount; ?></td>
			<td><?php echo $description; ?></td>
			<td><?php echo $date; ?></td>
		</tr>
		
	</table>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="submit" value="Delete">
	</form>
</body>
</html>
