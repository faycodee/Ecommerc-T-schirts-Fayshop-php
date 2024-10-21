<?php 
include("../connection.php");
if ($_GET['id']) {
  $id =$_GET['id'];
  $ord0 = "SELECT * FROM `tshirts` WHERE id=$id";
   $st0 =$con->query($ord0);
   $tshirt = $st0->fetch(PDO::FETCH_OBJ);
  $saveOldPhoto = "../".$tshirt->photo ;
   $ord = "DELETE FROM `tshirts` WHERE id=$id";
   $st =$con->exec($ord);
  if ($st) 
  {

  
$image_path = $saveOldPhoto;

// Check if the file exists
if (file_exists($image_path)) {
    // Attempt to delete the file
    unlink($image_path);
    
 
} else {

    echo "<script>alert('Image does not exist.')</script>";
}
  
    header("location:manager_dashboard.php?deletsuccess=1");
    # code...
  }
}

?>