<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>navigation</title>

	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;

		}

		.dropdown{
			display: flex;
			justify-content: center;
			margin-top:100px ;
			list-style-type:none ;
		}

		a{
			display:block;
			width: 200px;
			background-color: black;
			color: white;
			padding: 10px 0;
			font-size: 1.2rem;
			text-decoration: none;
			text-align: center;

		}
		a:hover{
			background-color: green;

		}

		.income{
			list-style-type: none;
			display: none;
		}

		.dropdown li:nth-child(2):hover .income{
			display: block;
		}


		.expense{
			list-style-type: none;
			display: none;
		}

		.dropdown li:nth-child(3):hover .expense{
			display: block;
		}
	</style>
</head>
<body>
	<div class="container">
		<ul class="dropdown">
			<li><a href="Homepage.php">Home</a></li>
			<li><a href="#">Income</a>
				<ul class="income">
					<li><a href="income.php">Income Operations</a></li>
					<li><a href="income cat.php">Income category</a></li>

				</ul>
			</li>
			<li><a href="#">Expense</a>
				<ul class="expense">
					<li><a href="#">Expense details</a></li>
					<li><a href="#">expense category</a></li>
				</ul>
			</li>
			<li><a href="#">Summary</a></li>

		</ul>
	</div>
</body>
</html>