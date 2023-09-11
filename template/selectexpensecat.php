
		<?php
		include("template/dbcon.php");
        require_once("template/header.php");


        ?>
        	<h3>Expense category Records</h3>
	<table class="table table-hover">
		<tr>
			<th>Expense category ID</th>
			<th>Expense category name</th>
			<th>action</th>
			

            <?php

		// retrieve the income records from the database
		$query = "SELECT * FROM expense_category";
		$result = mysqli_query($connection, $query);

		// loop through the records and display them in a table
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['Expense_Category_Id'] . "</td>";
				echo "<td>" . $row['Expense_Category_Name'] . "</td>";
				echo "<td>";
				echo "<a href='updateincomecat.php?id=" . $row['Expense_Category_Id'] ."'>Update</a> ";
				echo "</td>";
				echo "<td>";
				echo "<a href='deleteincomecat.php?id="  .$row['Expense_Category_Id'].  "'>Delete</a>";
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
