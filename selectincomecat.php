
		<?php
		include("template/dbcon.php");
        require_once("template/header.php");


        ?>
        	<h3>Income category Records</h3>
	<table class="table table-hover">
		<tr>
			<th>Income category ID</th>
			<th>Income category name</th>
			<th>action</th>
			

            <?php
            $user=$_SESSION['Id'];

		// retrieve the income records from the database
		$query = "SELECT * FROM income_category WHERE Income_Category_User_Id='$user'";
		$result = mysqli_query($connection, $query);

		// loop through the records and display them in a table
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['Income_Category_Id'] . "</td>";
				echo "<td>" . $row['Income_Category_Name'] . "</td>";
				echo "<td>";
				echo "<a href='updateincomecat.php?id=" . $row['Income_Category_Id'] ."'>Update</a> ";
				echo "</td>";
				echo "<td>";
				echo "<a href='deleteincomecat.php?id="  .$row['Income_Category_Id'].  "'>Delete</a>";
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
