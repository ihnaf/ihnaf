
        <?php
        include("template/dbcon.php");
        require_once("template/header.php");


        ?>
            <h3>Expense Records</h3>
    <table class="table table-hover">
        <tr>
            <th>Expense ID</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>

            <?php
            $user=$_SESSION['Id'];

        // retrieve the income records from the database
        $query = "SELECT * FROM expense WHERE Expense_User_Id='$user'";
        $result = mysqli_query($connection, $query);

        // loop through the records and display them in a table
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Expense_Id'] . "</td>";
                echo "<td>" . $row['Expense_Amount'] . "</td>";
                echo "<td>" . $row['Expense_Description'] . "</td>";
                echo "<td>" . $row['Expense_Date'] ."</td>";
                echo "<td>";
                echo "<a href='updateexpense.php?id=" . $row['Expense_Id'] ."'>Update</a> ";
                echo "</td>";
                echo "<td>";
                echo "<a href='deleteexpense.php?id="  .$row['Expense_Id'].  "'>Delete</a>";
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
