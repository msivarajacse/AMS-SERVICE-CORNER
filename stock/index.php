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
  <?php include("stuffs.php"); ?>

</head>

<body>

    <div class="bgimg">
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
        <div class="container">
        <br>
        <br>
        <br>
        <h3 class="text-center text-white text30 index-title">Stock Details</h3>
        <div class="row blur">
        <div class="col-sm-8 ">
        <h3 class="heading-text">
        Add New
        </h3>
         <?php
        if (isset($_GET["mes"])) {
            $mes=$_GET["mes"];
            echo "<i class='text-white'>$mes</i>";
        }
        ?>
        <hr>
        <form action="" method="post">
         <label>BRAND NAME:</label><input type="text" name="BRAND" class="form-control" required><br>
         <label>MODEL:</label><input type="text" name="MODEL" class="form-control" required><br>
         <label>MRP:</label><input type="text" name="MRP" class="form-control" required><br>
         <label>APPROXIMATE_DISCOUNT_PRICE:</label><input type="text" name="APPROXIMATE_DISCOUNT_PRICE" class="form-control" required><br>
        <label>CATEGORY:</label><select  name="CATEGORY" class="form-control" required >
    <?php

$sql="SELECT * FROM stock_category;";
$res=$db->query($sql);
if($res->num_rows>0)
 {
 while($row=$res->fetch_assoc())
 {
  $category=$row["CATEGORY"];
echo "<option value='$category'>$category</option>";
 }
}

?>
    


    </select>
    <br>
         <label>QUANTITY:</label><input type="number" name="QUANTITY" class="form-control" required><br>

    <input type="submit" class="btn btn-primary" name="submit" value="submit">
        </form>
        </h3>
        </div>
        <div class="col-sm-4">
        <h3 class="heading-text">
        Categories
        </h3>
        <hr>
        <ul class="list-group">

            <?php

$sql="SELECT * FROM stock_category;";
$res=$db->query($sql);
if($res->num_rows>0)
 {
 while($row=$res->fetch_assoc())
 {
  $category=$row["CATEGORY"];
echo "<li class='list-group-item'><a href='stock_view_by_category.php?category=$category' class='categorieslist'>$category</a></li>";
 }
}

?>
  <li class='list-group-item '><form action="" method="post"><input type="text" name="categorynew" id=""><input type="submit" value="Add Category" name="categoryadd"></form></li>
 
</ul>
<?php 
if (isset($_POST["categoryadd"])) {
  $newcat=$_POST["categorynew"];
  $sql="INSERT INTO stock_category (CATEGORY) VALUES ('$newcat');";
  if ($db->query($sql)) {
    echo "<i class='text-white'>success</i>";
    echo"<script>var a=window.location.href;
   window.open(a, '_self')
    </script>";
      
  }
  else{
         echo "<i class='text-white'>success</i>";

  }
}
?>



<?php
if (isset($_POST["submit"])) {
    $BRAND=$_POST["BRAND"];
    $MODEL=$_POST["MODEL"];
    $MRP=$_POST["MRP"];
    $APPROXIMATE_DISCOUNT_PRICE=$_POST["APPROXIMATE_DISCOUNT_PRICE"];
    $CATEGORY=$_POST["CATEGORY"];
    $QUANTITY=$_POST["QUANTITY"];

$sql="INSERT INTO stock_details (STOCK_ID, STOCK_BRAND, STOCK_MODEL, STOCK_MRP, STOCK_DISCOUNT, STOCK_CATEGORY, STOCK_QUANTITY, STOCK_LOG) VALUES (NULL, '$BRAND', '$MODEL', '$MRP', '$APPROXIMATE_DISCOUNT_PRICE', '$CATEGORY', '$QUANTITY', NOW());";

if ($db->query($sql)) {
    echo "<script> window.open('index.php?mes=Added Successfully', '_self')</script>";
}
else{
    echo "<script> window.open('index.php?mes=Some Error', '_self')</script>";
}

}
?>
        </div>
        </div>
        </div>

<br>
<br>
<br>
<br>
    </div>

</body>
<script>
$("document").ready(function(){
    $('.alert').alert()
});

</script>

</html>