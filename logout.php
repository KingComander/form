<?php include("nav_component.php");?>

<?php 
session_start();
unset($_SESSION['user']);
session_destroy();

header("location:use_session.php");

?>