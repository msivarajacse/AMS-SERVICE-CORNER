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


     if (isset($_GET["page"])) {
    $page=$_GET["page"];
    $limit=($page*5)-5;
}
else{
    $page=1;
    $limit=0;
}

 $prev=$page-1;
$next=$page+1;
 if($prev<=0){
 $prev=1;
 }
 $nextpage=" <a href='view.php?page=$next' class='btn btn-success '>Next   <span class='fa fa-arrow-right'></span> </a>";
 if($page==1){
      $previous="";
 }
 else{
      $previous=" <a href='view.php?page=$prev' class='btn btn-primary '><span class='fa fa-arrow-left'></span>  Previous</a>";
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
        View all
        </h3>
        <a href='view.php'>View</a>
         <?php
        if (isset($_GET["mes"])) {
            $mes=$_GET["mes"];
            echo "<i class='text-white'>$mes</i>";
        }
        ?>
        <hr>
     <div class="table-responsive">          
  <table class="table text-white">
    <thead>
      <tr>
        <th>S.No</th>
        <th>BRAND</th>
        <th>MODEL</th>
        <th>MRP</th>
        <th>DISCOUNT</th>
        <th>CATEGORY</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
<?php
$sql="SELECT * FROM stock_details ORDER BY STOCK_ID DESC LIMIT 0,5;";
$res=$db->query($sql);
if($res->num_rows>0)
 {
     $i=1;
 while($row=$res->fetch_assoc())
 {
  $STOCK_ID=$row["STOCK_ID"];
  $STOCK_BRAND=$row["STOCK_BRAND"];
  $STOCK_MODEL=$row["STOCK_MODEL"];
  $STOCK_MRP=$row["STOCK_MRP"];
  $STOCK_DISCOUNT=$row["STOCK_DISCOUNT"];
  $STOCK_CATEGORY=$row["STOCK_CATEGORY"];
  $STOCK_QUANTITY=$row["STOCK_QUANTITY"];
  $balance=$STOCK_MRP-$STOCK_DISCOUNT;
  echo "
  <tr>
        <td>$i</td>
        <td>$STOCK_BRAND</td>
        <td>$STOCK_MODEL</td>
        <td>$STOCK_MRP</td>
        <td>$STOCK_DISCOUNT</td>
        <td>$STOCK_CATEGORY</td>
        <td><a href='delstock.php?id=$STOCK_ID' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
       
      </tr>";
$i++;
 }
    

}

?>
     
    </tbody>
  </table>
  </div>    


        </div>
        <div class="col-sm-4">
        <h3 class="heading-text">
        Categories
        </h3>
        <hr>
        <ul class="list-group">

            <?php

$sql="SELECT * FROM stock_category LIMIT $limit,5;";
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