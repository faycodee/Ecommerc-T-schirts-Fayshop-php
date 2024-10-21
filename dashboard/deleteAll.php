<?php
include("../connection.php");
if ( isset($_POST['listdelete'])) {
    
    $listdelete = $_POST['listdelete'];

    if (!empty($listdelete)) {
        try {
            foreach ($listdelete as $id) {

           $ord0 = "SELECT * FROM `tshirts` WHERE id=$id";
          $st0 =$con->query($ord0);
           $tshirt = $st0->fetch(PDO::FETCH_OBJ);
             $saveOldPhoto = "../".$tshirt->photo ;

                $sql = "DELETE FROM tshirts WHERE id = $id";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                if ($stmt) {
                    $image_path = $saveOldPhoto;
                  
                    // Check if the file exists
                    if (file_exists($image_path)) {
                        // Attempt to delete the file
                        unlink($image_path);
                        
                     
                    } else {
                    
                        echo "<script>alert('Image does not exist.')</script>";
                    }
                    echo "success";
                }
                
            }

            header('Location: manager_dashboard.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        header('Location: manager_dashboard.php');
        exit();
    }
} else {
    header('Location: manager_dashboard.php');
    exit();
}
?>
