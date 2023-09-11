
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Homepage</title>
  <link rel="stylesheet" href="template/css/bootstrap.css">
  <script type="text/javascript">
    function logout(){
      window.location.href="logout.php"
    }
  </script>
</head>
<body>
 <!DOCTYPE html>
<html>
<head>
  <title>Homepage</title>
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    nav {
      background-color: #333;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
    }
    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }
    nav li {
      margin: 0 10px;
    }
    nav a {
      color: #fff;
      text-decoration: none;
      padding: 10px;
      display: block;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    nav a:hover {
      background-color: #555;
      text-decoration: none;
    }

    .income,.expense{
      display: none;

    }

    .dropdown li:nth-child(2):hover .income{
      display: block;
    }

    .dropdown li:nth-child(3):hover .expense{
      display: block;
    }

    .operationi,.operatione,.incomecat,.expensecat {
      transform: translate(0px);
      display: none;

    }

    .income li:nth-child(1):hover .operationi{
      display: block;
    }

    .income li:nth-child(2):hover .incomecat{
      display: block;
    }

    .expense li:nth-child(1):hover .operatione{
      display: block;
    }

     .expense li:nth-child(2):hover .expensecat{
      display: block;
    }

  </style>
</head>
<body>
  <nav>
    <ul class="dropdown">
      <li><a href="Homepage.php">Home</a></li>
      <li>
        <a href="#">Income</a>
        <ul class="income">
          <li><a href="#">Income</a>
            <ul class="operationi">
              <li><a href="add income.php">Add Income</a></li>
              <li><a href="selectincome.php">Manage Income details</a></li>
            </ul>
          </li>
          <li><a href="#">Income Category</a>
            <ul class="incomecat">
              <li><a href="addincomecat.php">Add Income Category</a></li>
              <li><a href="selectincomecat.php">manage Income Categories</a></li>

            </ul></li>
        </ul>
      </li>
      <li>
        <a href="#">Expense</a>
        <ul class="expense">
          <li><a href="#">Expense</a>
            <ul class="operatione">
              <li><a href="add expense.php">Add expense</a></li>
              <li><a href="selectexpense.php">view expense details</a></li>

            </ul>
          </li>
          <li><a href="#">Expense Category</a>
            <ul class="expensecat">
              <li><a href="addexpensecat.php">Add Expense Category</a></li>
              <li><a href="selectexpensecat.php">manage Expense Categories</a></li>

            </ul>
          </li>
        </ul>
      </li>
      <li><a href="report.php">Report</a></li>
    </ul>
 


    <button class="btn btn-danger ml-auto" onclick="logout()">Log out</button>
 </nav>
</body>
</html>
