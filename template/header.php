<?php
session_start();
if (isset($_SESSION['Id'])) 
{
require_once("navigationbar.php");
include("template/dbcon.php");

}
?>