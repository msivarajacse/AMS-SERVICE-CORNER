<?php session_start();?>
<?php include "../db.php";?>
<?php
if(!isset($_SESSION["ADMINID"]))
	{
		header('Location:home.php');
    }
    else {
        $adminid=$_SESSION["ADMINID"];
    }

    ?>

<!DOCTYPE html>
<html>

<head>
 
</head>

<body>
<?php
if (isset($_GET["id"])) {
   
    $id=$_GET["id"];
    $sql="DELETE FROM stock_category WHERE stock_category.ID=$id";
    if ($db->query($sql)) {
   echo "<script>
   window.open('vecat.php?mes=Deleted Successfully', '_self')
    </script>";  
    }
}
else{
    echo "<script> window.open('vecat.php?mes=Select One', '_self')</script>";
}

?>

</body>
<script>
$("document").ready(function(){
    $('.alert').alert()
});

</script>

</html>