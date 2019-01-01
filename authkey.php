<?php
include "db.php";
include "stuffs.php";

$sql="SELECT * FROM authenticationkey";
$res=$db->query($sql);
if($res->num_rows>0)
 {
 while($row=$res->fetch_assoc())
 {
     $authkey=$row["authkey"];
}
}



?>
<div class="bgimg">
<div class="container ">
<div class="col-sm-4"></div>
<div class="col-sm-4 blur">
<form action="" method="POST">
<?php

if (isset($_GET["mes"])) {
    $mes=$_GET["mes"];
    echo "<p class='text-success'>$mes</p>";
}
?>


<input type="text" name="authkey"  class="form-control" value="<?php echo $authkey ?>" required="required" >
<input type="submit" name="submit" class="btn btn-primary">

</form>

</div>
<div class="col-sm-4"></div>
</div>

<?php
if(isset($_POST["submit"])){
    $authkey=$_POST["authkey"];
    $sql="UPDATE authenticationkey SET authkey = '$authkey' WHERE authenticationkey.keyid = 1;";
    if($db->query($sql))
        {
            
                             echo "<script>window.open('authkey.php?mes=keychanged', '_self')</script>";

        }
}
?>
</div>