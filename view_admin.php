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
<?php
$sql="SELECT * FROM adminprofile";
      $res=$db->query($sql);
if($res->num_rows>0)
{
    echo '<div class="table-responsive"> <table class="table"> <thead><tr>  <th>ID</th> <th>Name</th><th>Username</th><th>Phoneno</th><th>Address</th><th>Time</th><th>Who created</th></tr></thead><tbody>';
while($row=$res->fetch_assoc())
{
$adminuserid=$row["ADMINID"];
$adminname=$row["NAME"];
$adminusername=$row["USERNAME"];
$phoneno=$row["PHONENO"];
$address=$row["ADDRESS"];
$created=$row["CREATED"];
$whocreated=$row["WHOCREATED"];
echo "<tr>
<td>$adminid</td>
<td>$adminname</td>
<td>$adminusername</td>
<td>$phoneno</td>
<td>$address</td>
<td>$created</td>
<td>$whocreated</td>

</tr>";

}
echo'</tbody></table> </div> ';
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