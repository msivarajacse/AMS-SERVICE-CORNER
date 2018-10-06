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
            <div class="col-sm-2 "></div>
            <div class="col-sm-8 ">
                <div class="blur-box">

             <form action="" method="POST" >
                    <label>NAME:</label><input type="text" name="name" class="form-control" required><br>
                    <label>USERNAME:</label><input type="text" name="username" class="form-control" required><br>
    <input type="hidden" name="date" id="date" >

                    <label>PASSWORD:</label><input type="password" name="password" class="form-control" required><br>
                    <label>PHONENO:</label><input type="number" name="phoneno" class="form-control" required><br>
                    <label>ADDRESS:</label><textarea type="text" name="address" class="form-control" style="resize:none;"required></textarea><br>
<input type="submit" class="btn btn-primary" name="submit" value="submit">
             </form>
   <?php
if (isset($_POST["submit"])) {
    $password=md5($_POST["password"]);
    $password=md5($password);
    $password=md5($password);
    $username=$_POST["username"];
$sql="SELECT * FROM adminprofile WHERE USERNAME='$username';";
 $res=$db->query($sql);
	
			if($res->num_rows>0)
			 {
				echo '<script>swal("Oops !","Sorry! The username  '.$_POST["username"].'  already available","error");</script>';
				// echo '<script>swal ( "Oops" ,  "Something went wrong!" ,  "error" )</script>';
			 }
			else{
    
   $sql="INSERT INTO adminprofile ( NAME, USERNAME, PASSWORD, PHONENO, ADDRESS, CREATED, WHOCREATED) VALUES ('{$_POST["name"]}', '{$_POST["username"]}', '$password', '{$_POST["phoneno"]}', '{$_POST["address"]}', '{$_POST["date"]}', '$name');";
 if($db->query($sql))
				{
				echo '<script>swal ( "Good Job !" ,  "The Admin Added successfully" ,  "success" )</script>';
				}
				else
				{
				echo '<script>swal ( "Oops" ,  "Something went wrong!" ,  "error" )</script>';
				
				}

            }
}
   ?>
</div>

    </div>
            </div>
            <div class="col-sm-2 "></div>
        </div>
    </div>

    </div>


   <?php   include "footer.php";   ?>
<script> 
  
  // Using Date() function 
  var d = Date(); 
    
  // Converting the number value to string 
  a = d.toString()  
    
  // Printing the current date 
$("#date").val(a);
    
</script> 
</body>


</html>