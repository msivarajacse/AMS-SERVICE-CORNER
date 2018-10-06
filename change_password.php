<?php 	
include "db.php";
session_start();
	if(!isset($_SESSION["ADMINID"]))
	{
		header('Location:index.php?mes=please login ');
    }
    else {
        $adminid=$_SESSION["ADMINID"];
    }
    ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("stuffs.php"); ?>

</head>

<body>

    <div class="bgimg4" ">
        <nav class="navbar navbar-default navbar-fixed-top ">
            <div class="container-fluid ">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                <span class="sr-only ">Toggle navigation</span>
                <span class="icon-bar "></span>
                <span class="icon-bar "></span>
                <span class="icon-bar "></span>
            </button>
                    <a class="navbar-brand " href="# ">
                       AMS SERVICE CORNER
                    </a>
                </div>


                <div class="collapse navbar-collapse " id="navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right text-uppercase ">
<?php

$sql="SELECT * FROM adminprofile WHERE ADMINID=$adminid;";
$res=$db->query($sql);
if($res->num_rows>0)
 {
 while($row=$res->fetch_assoc())
 {
   $name=$row["NAME"];
   $username=$row["USERNAME"];
   $phoneno=$row["PHONENO"];
   $address=$row["ADDRESS"];
   $created=$row["CREATED"];
     
 }
}
include("nav.php");
?>
          

                    </ul>


                </div>
            </div>

        </nav>
    <div class="container ">
        <div class="row fs">
            <div class="col-sm-1 "></div>
            <div class="col-sm-10 ">
                <div class="blur-box">
<form action="" method="post" autocomplete="off">
<label>OLD PASSWORD:</label><input type="text" name="oldpassword" class="form-control" required><br>
<label class='text-uppercase'>New Password:</label><input type="text" name="newpassword" class="form-control" required><br>
<input type="submit" class="btn btn-primary" name="submit" value="submit">


</form>
<?php
if (isset($_POST["submit"])) {

$oldpassword=$_POST["oldpassword"];
$oldpassword=md5($oldpassword);
$oldpassword=md5($oldpassword);
$oldpassword=md5($oldpassword);
// echo $oldpassword;
$newpassword=$_POST["newpassword"];
$newpassword=md5($newpassword);
$newpassword=md5($newpassword);
$newpassword=md5($newpassword);
$sql="SELECT * FROM adminprofile WHERE ADMINID=$adminid & PASSWORD='$oldpassword'";
// echo $sql;
$res=$db->query($sql);
// print_r($res);
if($res->num_rows>0)
{
    echo "is available";
    echo '<script>swal("Oops !","Sorry! Invalid credentials","error");</script>';
    $sql="UPDATE adminprofile SET PASSWORD = '$newpassword' WHERE adminprofile.ADMINID = $adminid;";
    if($db->query($sql))
    {
    echo '<script>swal("Good Job !","Updated Successful","success");</script>';
    }
    else
    {
    echo '<script>swal("Oops !","Some error occured","error");</script>';
    
    }
}
else{
    echo '<script>swal("Oops !","Invalid Credentials","warning");</script>';

}


}

?>
</div>

    </div>
            </div>
            <div class="col-sm-1 "></div>
        </div>
    </div>

    </div>


   <?php   include "footer.php";   ?>

</body>


</html>