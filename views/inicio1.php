<?php 
session_start();
if(isset($_SESSION['u']))
	echo "<br>Bienvenido!! ".$_SESSION['u'];
else
	echo "Bienvenido: ".$_GET['usuario']."<br>";
?>