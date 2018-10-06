<?php 	
include "db.php";
include "sms.php";
session_start();
	if(!isset($_SESSION["ADMINID"]))
	{
		header('Location:index.php?mes=please login ');
    }
    else {
        $adminid=$_SESSION["ADMINID"];
        $sid=$_GET["sid"];
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
            <div class="col-sm-1"></div>
            <div class="col-sm-10 ">
                <div class="blur-box">
                <div class="blur-box">
                <?php    


if(isset($_GET["sid"])){


               $sql="SELECT * FROM phonedetails WHERE SID=$sid";
$res=$db->query($sql);
if($res->num_rows>0)
{
while($row=$res->fetch_assoc())
{
    echo "<button class='pull-right btn btn-success' data-toggle='modal' data-target='#myModal'><span class='fa fa-check'></span></button>";
   echo "<p class='text-uppercase'><b>RefNo :</b>{$row["SID"]}</p>";
   echo "<p class='text-uppercase'><b>Name :</b>{$row["NAME"]}</p>";
   echo "<p class='text-uppercase'><b>Contact no :</b>{$row["CONTACTNO"]}</p>";
   echo "<p class='text-uppercase'><b>lOGIN :</b>{$row["ADMIN_NAME"]}</p>";
   echo "<p class='text-uppercase'><b>WHO COLLECTED  :</b>{$row["WHO_RECEIVED_COMPANY"]}</p>";
   echo "<p class='text-uppercase'><b>WHEN COLLECTED :</b>{$row["WHEN_RECEIVED"]}</p>";
   echo "<p class='text-uppercase'><b>IMEI :</b>{$row["IMEI"]}</p>";
   echo "<p class='text-uppercase'><b>BRAND :</b>{$row["BRAND"]}</p>";
   echo "<p class='text-uppercase'><b>MODEL :</b>{$row["MODEL"]}</p>";
   echo "<p class='text-uppercase'><b>PROBLEM :</b>{$row["PROBLEM"]}</p>";
   echo "<p class='text-uppercase'><b>PROBLEM DESC :</b>{$row["PROBLEM_DESCRIPTION"]}</p>";
  
   echo "<p class='text-uppercase'><b>appx. DELIVERY_DATE :</b>{$row["DELIVERY_DATE"]}</p>";
   echo "<p class='text-uppercase'><b>status :</b>{$row["STATUS"]} <button class=' btn btn-info' data-toggle='modal' data-target='#editModal'><span class='fa fa-edit'></span></button></p>";
   echo "<p class='text-uppercase'><b>RECEIVER NAME :</b>{$row["RECEIVER_NAME"]}</p>";
   echo "<p class='text-uppercase'><b>WHO GAVE :</b>{$row["WHO_GAVE"]}</p>";
   echo "<p class='text-uppercase'><b>DELIVERY DATE :</b>{$row["WHEN_DELIVERY"]}</p>";
   echo "<p class='text-uppercase'><b>aMOUNT COLLECTED :</b>{$row["AMOUNT_COLLECTED"]}</p>";
   // SMS START
            $receiver=$row["CONTACTNO"];
            $key=$authkey;
            $givernamesms=$row["NAME"];
            $givermobilemodel=$row["MODEL"];
            $giverbrandsms=$row["BRAND"];
}

}
else{
    echo "no record found";
}

}
else{
    header("Location:view.php");
}
   ?>
            </div>
            </div>
</div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>

    </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update </h4>
      </div>
      <div class="modal-body">
          <form action="" method="post" autocomplete="off">
       <label>Status Name:</label><select name="status">
           <option value="DELIVERED">DELIVERED</option>
           <option value="NOT READY & RETURNED">NOT READY RETURNED</option>
          
        </select>
     <br>
    <input type="hidden" name="date" id="date" >

    <label>RECEIVER NAME:</label><input type="text" name="receiver_name" class="form-control" required><br>
    <label>WORKER NAME:</label><input type="text" name="who_gave" class="form-control" required><br>
    <label>Amount collected:</label><input type="number" name="amount_collected" class="form-control" required><br>
<input type="submit" class="btn btn-primary" name="submit" value="submit">
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- // another model -->

<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update </h4>
      </div>
      <div class="modal-body">
          <form action="" method="post" autocomplete="off">
       <label>Status :</label><input type="text" name="statusedited" class="form-control" required><br>
  
<input type="submit" class="btn btn-primary" name="statussubmit" value="submit">
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<?php
if (isset($_POST["statussubmit"])) {
  $sql="UPDATE phonedetails SET  STATUS = '{$_POST["statusedited"]}' WHERE phonedetails.SID = $sid;";
   if($db->query($sql))
{
     
     $statussms=$_POST["statusedited"];      
            $message='Hi, '.$givernamesms.' Your Mobile '. $giverbrandsms.'  '.$givermobilemodel.' is '.$statussms .' please come and collect from AMS SERVICE CORNER   Please visit : http://amsservicecorner.ml';
            sms($receiver,$key,$message);
echo '<script>swal ( "Good Job !" ,  "Updated status successfully" ,  "success" );</script>';
}
else
{
echo '<script>swal ( "Oops" ,  "Something went wrong!" ,  "error" )</script>';

}
}

?>
<?php
if (isset($_POST["submit"])) {
  $sql="UPDATE phonedetails SET  RECEIVER_NAME = '{$_POST["receiver_name"]}', WHO_GAVE = '{$_POST["who_gave"]}', WHEN_DELIVERY = '{$_POST["date"]}', AMOUNT_COLLECTED = '{$_POST["amount_collected"]}', STATUS = '{$_POST["status"]}' WHERE phonedetails.SID = $sid;";
   if($db->query($sql))
{
    $deliverydate=$_POST["date"];
 $receivedsmsname=$_POST["receiver_name"];      
            $message='Hi, '.$givernamesms.' Your Mobile '. $giverbrandsms.'  '.$givermobilemodel.' is Delivered to '.$receivedsmsname.'  AMS SERVICE CORNER @'. $deliverydate .'   Please visit : http://amsservicecorner.ml';
        //    echo $message;
            sms($receiver,$key,$message);
echo '<script>swal ( "Good Job !" ,  "Updated successfully" ,  "success" );</script>';
}
else
{
echo '<script>swal ( "Oops" ,  "Something went wrong!" ,  "error" )</script>';

}
}

?>
 
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