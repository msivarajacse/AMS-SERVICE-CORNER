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
   $adminname=$row["NAME"];
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
            <div class="col-sm-1"></div>
            <div class='pull-right blur-box'><form method="post" action="" autocomplete="off"><input type="search" name="key" class="form-control"><input type="submit" name="submit" class="btn btn-group btn-primary"></form></div>
<br>
<br>
<br>
<br>
<br>
            <div class="col-sm-10 ">

                <div class="blur-box">
 <?php
                   if(isset($_GET["mes"])){
            $mes=$_GET["mes"];
            echo"<div class='alert alert-danger'><p >$mes</p></div>";
                    }
                    ?>
                <br>
                <?php
               if (isset($_POST["submit"])) {
            //   $key=$_POST["key"];
// echo $_POST["key"];
               $sql="SELECT * FROM phonedetails WHERE BRAND like '%{$_POST["key"]}%' or MODEL like '%{$_POST["key"]}%' or  CONTACTNO like '%{$_POST["key"]}%' or NAME like '%{$_POST["key"]}%'";
              $res=$db->query($sql);
if($res->num_rows>0)
{
    echo '<div class="table-responsive"><table class="table">
    <thead>
    <tr>
    <th>S.NO</th>
    <th>NAME</th>
    <th>CONTACTNO</th>
    <th>BRAND</th>
    <th>IMEI</th>
    <th>MODEL</th>
    <th>PROBLEM</th>
    <th>STATUS</th>
    <th>RECEIVERNAME</th>
    <th>VIEWDETAIL</th>
    <th>DELETE</th>
    </tr>
    </thead>
    <tbody>';
    
    $i=0;
while($row=$res->fetch_assoc())
{
    $sid=$row["SID"];
echo"<tr>
<td>$i</td>
<td>{$row['NAME']}</td>
<td>{$row['CONTACTNO']}</td>
<td>{$row['BRAND']}</td>
<td>{$row['IMEI']}</td>
<td>{$row['MODEL']}</td>
<td>{$row['PROBLEM']}</td>
<td>{$row['STATUS']}</td>
<td>{$row['RECEIVER_NAME']}</td>
<td><a href='view_phonedetails.php?sid=$sid' class='btn btn-info'><span class='fa fa-eye'></span></a></td>
<td><a href='delete.php?sid=$sid' class='btn btn-danger'><span class='fa fa-trash'></span></a></td>
</tr>";
$i++;
}
echo'</tbody>
    </table></div>';

}
else{
    echo "no record found";
}
               } 
               else{
$sql="SELECT * FROM phonedetails ORDER BY SID DESC";
$res=$db->query($sql);
if($res->num_rows>0)
{
    echo '<div class="table-responsive"><table class="table">
    <thead>
    <tr>
    <th>S.NO</th>
    <th>REFNO</th>
    <th>NAME</th>
    <th>CONTACTNO</th>
    <th>IMEI</th>
    <th>BRAND</th>
    <th>MODEL</th>
    <th>PROBLEM</th>
    <th>STATUS</th>
    <th>RECEIVERNAME</th>
    <th>VIEWDETAIL</th>
    <th>DELETE</th>
    </tr>
    </thead>
    <tbody>';
    
    $i=0;
while($row=$res->fetch_assoc())
{
    $sid=$row["SID"];
echo"<tr>
<td>$i</td>
<td>{$row['SID']}</td>
<td>{$row['NAME']}</td>
<td>{$row['CONTACTNO']}</td>
<td>{$row['IMEI']}</td>
<td>{$row['BRAND']}</td>
<td>{$row['MODEL']}</td>
<td>{$row['PROBLEM']}</td>
<td>{$row['STATUS']}</td>
<td>{$row['RECEIVER_NAME']}</td>
<td><a href='view_phonedetails.php?sid=$sid' class='btn btn-info'><span class='fa fa-eye'></span></a></td>
<td><a href='delete.php?sid=$sid' class='btn btn-danger'><span class='fa fa-trash'></span></a></td>

</tr>";
$i++;
}
echo'</tbody>
    </table></div>';

}
               }
             
   ?>
            </div>
</div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>

    </div>


   <?php   include "footer.php";   ?>

</body>


</html>