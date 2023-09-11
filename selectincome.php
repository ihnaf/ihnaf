
		<?php
		include("template/dbcon.php");
        require_once("template/header.php");


        ?>
        	<h3>Income Records</h3>
	<table class="table table-hover">
		<tr>
			<th>Income ID</th>
			<th>Amount</th>
			<th>Description</th>
			<th>Date</th>
			<th>Action</th>

            <?php

            $id=$_SESSION['Id'];

		// retrieve the income records from the database
		$query = "SELECT * FROM income WHERE Income_User_Id='$id'";
		$result = mysqli_query($connection, $query);

		// loop through the records and display them in a table
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['Income_Id'] . "</td>";
				echo "<td>" . $row['Income_Amount'] . "</td>";
				echo "<td>" . $row['Income_Description'] . "</td>";
				echo "<td>" . $row['Income_Date'] ."</td>";
				echo "<td>";
				echo "<a href='updateincome.php?id=" . $row['Income_Id'] ."'>Update</a> ";
				echo "</td>";
				echo "<td>";
				echo "<a href='deleteincome.php?id="  .$row['Income_Id'].  "'>Delete</a>";
				echo "</td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='5'>No records found</td></tr>";
		}

		// close the database connection
		mysqli_close($connection);
		?>
	</table>
</body>
</html>
