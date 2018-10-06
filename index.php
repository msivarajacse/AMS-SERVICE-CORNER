<?php session_start();?>
<?php include "db.php";?>
<?php
if(isset($_SESSION["ADMINID"]))
	{
		header('Location:home.php');
    }

    ?>

<!DOCTYPE html>
<html>

<head>
  <?php include("stuffs.php"); ?>

</head>

<body>

    <div class="bgimg">
        <div class="backgorundcenter">
            <div class="col-sm-3"></div>
            <div class=" col-sm-6">
              <br>
              <br>
              <br>
              <br>
              
                <div class="blur">
                <div class="blur text-center ">
                <h1 class="text30">SRI ARTHANARESWARAR</h1>
                <h3 class="text-white"> MOBILE SHOP SALES & SERVICE</h3>
                <p class="pull-right text-white"> Mohan : 9659159189</p>
                </div>
                    <form action="" method="post" autocomplete="off">
                        <h1 class="form-label text-white text-uppercase text-center">login</h1>
                    <?php
                   if(isset($_GET["mes"])){
            $mes=$_GET["mes"];
            echo"<div class='alert alert-danger'><p >$mes</p></div>";
                    }
                    ?>
                    
                        <div class="form-group ">
                            <label id="username" class="text-white">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label id="password" class="text-white">Password</label>
                            <input type="password" name="password" id="pwdbox" class="form-control" required>
                        </div>

                        <input type="submit" class="btn btn-block btn-primary" name="submit" value="LOGIN">
                    </form>
                </div>
<br>
                  <div class='blur text-white'>
                    <p>Search by Phone number</p>
                    <form  method="POST" action="user_view_phone_details.php"><div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="phoneno">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div></form>
                </div>


            </div>

            <div class='blur text-white'>
			<p>Developed by Praveenram Balachandran</p>
			</div>
            <div class="col-sm-3">
            </div>

        </div>

    </div>
    <?php
  if (isset($_POST["submit"])) {

    $username=$_POST["username"];
    $password=$_POST["password"];
    $password=md5($password);
    $password=md5($password);
    $password=md5($password);

            $sql="SELECT * FROM adminprofile WHERE USERNAME='$username' AND PASSWORD='$password'";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				$row=$res->fetch_assoc(); 
				$_SESSION["ADMINID"]=$row["ADMINID"];
				
                 echo "<script>window.open('home.php', '_self')</script>";
               //  header('Location:home.php');
			}
			else
			{
				echo '<script>alert("Invalid credentials ..!");</script>';
				
			}

        }
?>

</body>


</html>