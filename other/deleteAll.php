<?php
session_start();
include("../connection.php");
if ( isset($_POST['listdelete'])) {
    
    $listdelete = $_POST['listdelete'];
$user =$_SESSION['id'] ;
    if (!empty($listdelete)) {
        try {
            foreach ($listdelete as $id) {
           
                $sql = "DELETE FROM order_items WHERE product_id = $id and user_id =$user";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                if ($stmt) {
                    echo "success";
                }
                
            }

            header('Location: ../cart.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        header('Location: ../cart.php');
        exit();
    }
} else {
    header('Location: ../cart.php');
    exit();
}
?>
