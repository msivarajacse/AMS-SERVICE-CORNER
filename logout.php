<?php
	include "db.php";
	session_start();
	unset ($_SESSION["ADMINID"]);

	session_destroy();
	echo "<script>window.open('index.php','_self')</script>";
?>