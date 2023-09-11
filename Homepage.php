<?php
session_start();
if (isset($_SESSION['Id'])) 
{
  require_once('template/navigationbar.php');
?>

  <div class="container-content-center">
    <div class="jumbotron">
      <div class="row">
        <div class="col-md-12">
          <h1>Welcome to PIEMS, <?php echo $_SESSION['name']; ?></h1>
          <p>This is your dashboard</p>
        </div>
      </div>
    </div>
  </div>
  

</body>
</html>

<?php
}
?>

