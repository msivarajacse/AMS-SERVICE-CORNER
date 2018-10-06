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
  <?php include("stuffs.php");
  
$sql="SELECT * FROM authenticationkey";
$res=$db->query($sql);
if($res->num_rows>0)
 {
 while($row=$res->fetch_assoc())
 {
     $authkey=$row["authkey"];
}
}

// $authkey='240994A9Nf11Y6kQ5bb5be3b';

  ?>

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
            <div class="col-sm-2 "></div>
            <div class="col-sm-8 ">
                <div class="blur-box">
<form action="" method="POST" autocomplete="off">
    <label>NAME:</label><input type="text" name="name" class="form-control" required><br>
    <label>CONTACTNO:</label><input type="text" name="contactno" class="form-control" required><br>
    <label>RECEIVER:</label><input type="text" name="who_received_company" class="form-control" required><br>
    <label>BRAND:</label><input type="text" name="brand" class="form-control" required><br>
    <label>MODEL:</label><input type="text" name="model" class="form-control" required><br>
    <label>IMEI:</label><input type="text" name="imei" class="form-control" ><br>
    <input type="hidden" name="date" id="date" >
    <label>PROBLEM:</label><select  name="problem" class="form-control" required >
    <option value="SPEAKER">SPEAKER</option>
    <option value="RINGER">RINGER</option>
    <option value="KEYPAD">KEYPAD</option>
    <option value="DISPLAY DAMAGE">DISPLAY DAMAGE</option>
    <option value="HEADPHONE PIN">HEADPHONE PIN</option>
    <option value="CHARGER PIN">CHARGER PIN</option>
    <option value="NO SERVICE">NO SERVICE</option>
    <option value="ON OFF COMPLAINT">ON OFF COMPLAINT</option>
    <option value="BATTERY COMPLAINT">BATTERY COMPLAINT</option>
    <option value="BOARD COMPLAINT">BOARD COMPLAINT</option>
    <option value="MEMORY CARD TRAY">MEMORY CARD TRAY</option>
    <option value="SIM TRAY">SIM TRAY</option>

    </select>
    <br>
    <label>PROBLEM DESC:</label><textarea type="text" name="problem_description" class="form-control" ></textarea><br>
    <!-- <label>APPROXIMATE PRICE:</label><input type="number" name="approximate_price" class="form-control" required><br> -->
    <label>APPROXIMATE DATE:</label><input type="date" name="delivery_date" class="form-control" required><br>
    <!-- <label>ADVANCE AMOUNT:</label><input type="number" name="advance_amount" class="form-control" required><br> -->
    <input type="submit" class="btn btn-primary" name="submit" value="submit">
</form>
 <?php
if (isset($_POST["submit"])) {
  $sql="INSERT INTO phonedetails ( NAME, ADMIN_NAME, WHO_RECEIVED_COMPANY, WHEN_RECEIVED,IMEI, BRAND, MODEL, PROBLEM, PROBLEM_DESCRIPTION,  DELIVERY_DATE, STATUS,CONTACTNO) VALUES ('{$_POST["name"]}','{$adminname}','{$_POST["who_received_company"]}','{$_POST["date"]}','{$_POST["imei"]}','{$_POST["brand"]}','{$_POST["model"]}','{$_POST["problem"]}','{$_POST["problem_description"]}','{$_POST["delivery_date"]}','COLLECTED & SERVICE ON PROCESS','{$_POST["contactno"]}');";
   if($db->query($sql))
        {
            // SMS START
            include "sms.php";
            $receiver=$_POST["contactno"];
            $key=$authkey;
            $givernamesms=$_POST["name"];
            $givermobilemodel=$_POST["model"];
            $giverbrandsms=$_POST["brand"];
            $givertime=$_POST["date"];
            $message='Hi,'.$givernamesms.'Your Mobile '. $giverbrandsms.' '.$givermobilemodel.'is successfully received  in AMS SERVICE CORNER @'.$givertime .'  Please visit : http://amsservicecorner.ml';
            sms($receiver,$key,$message);

				echo '<script>swal ( "Good Job !" ,  "Added Successfully" ,  "success" )</script>';
        }
        else
        {
				echo '<script>swal ( "Oops !" ,  "Some error occured" ,  "error" )</script>';
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