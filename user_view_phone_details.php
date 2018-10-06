<?php 	
include "db.php";
session_start();
	if(!isset($_POST["phoneno"]))
	{
		header('Location:index.php?mes=please provide a phoneno ');
    }
    else {
       $phoneno=$_POST["phoneno"];
    }
    ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("stuffs.php"); ?>

</head>

<body>

    <div class="bgimg4" ">
   
    <div class="container ">
        <div class="row fs">
            <div class="col-sm-1"></div>
            <div class="col-sm-10 ">
                <div class="blur-box">
                <div class="blur-box">
                <?php    



               $sql="SELECT * FROM phonedetails WHERE CONTACTNO like '%{$phoneno}%'";
$res=$db->query($sql);
if($res->num_rows>0)
{
while($row=$res->fetch_assoc())
{
switch ($row["STATUS"]) {
     case 'DELIVERED':
        echo "<div class='alert alert-success text-uppercase'>Your Product Successfully Delivered </div>";
        break;
    case 'COLLECTED & SERVICE ON PROCESS':
        echo "<div class='alert alert-info text-uppercase'>Your Product collected and the Services process going on </div>";
       break;
    case 'READY':
        echo "<div class='alert alert-primary text-uppercase'>Your Product is ready to collect </div>";
       break;
    case 'NOT READY & RETURNED':
        echo "<div class='alert alert-danger text-uppercase'>Your Product returned and the product is not ready</div>";
      
        break;
    
    default:
        # code...
        break;
}

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
   echo "<p class='text-uppercase'><b>status :</b>{$row["STATUS"]}</p>";
   echo "<p class='text-uppercase'><b>RECEIVER NAME :</b>{$row["RECEIVER_NAME"]}</p>";
   echo "<p class='text-uppercase'><b>WHO GAVE :</b>{$row["WHO_GAVE"]}</p>";
   echo "<p class='text-uppercase'><b>DELIVERY DATE :</b>{$row["WHEN_DELIVERY"]}</p>";
//    echo "<p class='text-uppercase'><b>aMOUNT COLLECTED :</b>{$row["AMOUNT_COLLECTED"]}</p>";
}

}
else{
    echo"<h3>No record found</h3>";
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

   <?php   include "footer.php";   ?>

</body>


</html>