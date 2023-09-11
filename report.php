<?php
include('dbcon.php');
require_once('template/header.php');


// function to calculate the income and expense summary
function getSummary($connection, $startDate, $endDate) {
    // calculate the income summary
    $user=$_SESSION['Id'];
    $query = "SELECT SUM(Income_Amount) AS income FROM income WHERE Income_Date BETWEEN '$startDate' AND '$endDate' and Income_User_Id='$user'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $income = $row["income"];

    // calculate the expense summary
    $sql = "SELECT SUM(Expense_Amount) AS expense FROM expense WHERE Expense_Date BETWEEN '$startDate' AND '$endDate' and Expense_User_Id='$user'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $expense = $row["expense"];

    // calculate the difference between income and expense
    $difference = $income - $expense;

    // return the summary as an array
    return array(
        "income" => $income,
        "expense" => $expense,
        "difference" => $difference
    );
}

function displaySummar($summary) {
    echo "<table>";
    echo "<tr><th>Type</th><th>Amount</th></tr>";
    echo "<tr><td>Income</td><td>" . $summary["income"] . "</td></tr>";
    echo "<tr><td>Expense</td><td>" . $summary["expense"] . "</td></tr>";
    echo "<tr><td>Difference</td><td>" . $summary["difference"] . "</td></tr>";
    echo "</table>";
}

    // get the current date
    $date = date("Y-m-d");

    // calculate the daily summary
    $summary = getSummary($connection, $date, $date);
    echo "<h2>Daily Summary</h2>";
    displaySummary($summary);

    // calculate the monthly summary
    $month = date("Y-m");
    $startDate = $month . "-01";
    $endDate = date("Y-m-t", strtotime($startDate));
    $summary = getSummary($connection, $startDate, $endDate);
    echo "<h2>Monthly Summary</h2>";
    displaySummary($summary);

    // calculate the annual summary
    $year = date("Y");
    $startDate = $year . "-01-01";
    $endDate = $year . "-12-31";
    $summary = getSummary($connection, $startDate, $endDate);
    echo "<h2>Annual Summary</h2>";
    displaySummary($summary);

// function to display the summary in a table
function displaySummary($summary) {
    echo "<table>";
    echo "<tr><th>Type</th><th>Amount</th></tr>";
    echo "<tr><td>Income</td><td>" . $summary["income"] . "</td></tr>";
    echo "<tr><td>Expense</td><td>" . $summary["expense"] . "</td></tr>";
    echo "<tr><td>Difference</td><td>" . $summary["difference"] . "</td></tr>";
    echo "</table>";
}

// check if the form was submitted
if (isset($_POST["submit"])) {
    // get the form data
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];

    // calculate the summary for the specified time period
    $summary = getSummary($connection, $startDate, $endDate);
    echo "<h2>Summary for " . $startDate . " to " . $endDate . "</h2>";
    displaySummary($summary);
}
?>
    <h3>Advanced Search</h3>
<form method="post">
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date">
    <br>
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date">
    <br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
// close the database connection
mysqli_close($connection);
?>
