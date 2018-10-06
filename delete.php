<?php
include "db.php";
session_start();
	if(isset($_SESSION["ADMINID"]))
	{
	$sql="DELETE from phonedetails where SID=".$_GET["sid"];
	if($db->query($sql))
	{
		echo "<script>window.open('view.php?mes=Details Deleted','_self')</script>";
	}
	else
	{
		echo "<script>window.open('view.php?mes=error occured','_self')</script>";
	}
	}
	else {
		header('Location:index.php?mes=please login ');
		
	}
	
	
	
?>
