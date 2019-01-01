<?php
// print_r($_POST);
include("../db.php");

    $id=$_POST["id"];
    $quantity=$_POST["quantity"];
    $sql="SELECT * FROM stock_details WHERE STOCK_ID=$id";
    $res=$db->query($sql);
if($res->num_rows>0)
 {
 while($row=$res->fetch_assoc())
 {
     $STOCK_QUANTITY=$row["STOCK_QUANTITY"];
     $NEW_QUANTITY=$STOCK_QUANTITY+$quantity;
     $sql="UPDATE stock_details SET STOCK_QUANTITY = '$NEW_QUANTITY' WHERE stock_details.STOCK_ID = $id;";
    // echo $sql;
     if ($db->query($sql)) {
        echo "<script> window.open('view.php?mes=Updated Successfully', '_self')</script>";
    }
    else{
        echo "<script> window.open('view.php?mes=Some Error', '_self')</script>";
    }
    }
}
    

?>