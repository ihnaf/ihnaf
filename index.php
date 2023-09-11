<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body style="padding: 100px;">
<?php
session_start();

include("template/dbcon.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 

   $myusername = $_POST['name'];
   $mypassword = $_POST['password']; 

   $query = "SELECT User_Id, User_Name, Password FROM user WHERE User_Name = '$myusername' and Password = '$mypassword'";
   $result = mysqli_query($connection,$query);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $count = mysqli_num_rows($result);

   // If result matched $myusername and $mypassword, table row must be 1 row
   if($count == 1) {
      $_SESSION['Id'] = $row['User_Id'];
      $_SESSION['name'] = $row['User_Name'];
      $_SESSION['password'] = $row['Password'];
      header("location:Homepage.php");
   }else {
      echo  "Your user Name or Password is invalid";
   }
}
?>




<center>
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <div class="col-md-12">
          <h1>Login to PIEMS</h1>

            <form method="post" action="index.php">
              <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" name="name"><br>
              </div>

              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password"><br>
              </div>
                <button class="btn btn-primary" type="submit" name="Login">Login</button>
            </form><br>

            <p>Don't Have account <a href="signup.php">click here</a> to register </p>
 </div>
      </div>
    </div>
  </div>



 </center> 

</body>
</html>