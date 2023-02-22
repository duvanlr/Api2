<meta charset="UTF-8">
<?php

session_start();
session_destroy();
header("Location:inicio_sesion.php");
error_reporting(0);
?>