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
        View Edit
        
        </h3>
        <?php
        if (isset($_GET["mes"])) {
            $mes=$_GET["mes"];
            echo "<i class='text-white'>$mes</i>";
        }
        ?>
        <hr>
        
    <?php

$sql="SELECT * FROM stock_category;";
$res=$db->query($sql);
if($res->num_rows>0)
 {
     echo "<ul class='list-group'>";
 while($row=$res->fetch_assoc())
 {
  $category=$row["CATEGORY"];
  $id=$row["ID"];
echo "<li class='list-group-item text-white'>$category <a href='delcat.php?id=$id' class='btn btn-danger pull-right'><i class='fa fa-trash'></i></a></li>";
 }
     echo "</ul>";

}

?>
    
       
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
    var b=a+'?mes=Added Successfully';
   window.open(b, '_self')
    </script>";
      
  }
  else{
         echo "<i class='text-white'>success</i>";

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