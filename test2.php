

<?php

// Specify the path to the image file to be deleted
$image_path = 'img\cropedimg\TTy98E5p.jpeg';


// Check if the file exists
if (file_exists($image_path)) {
    // Attempt to delete the file
    if (unlink($image_path)) {
        echo 'Image deleted successfully.';
    } else {
        echo 'Unable to delete image.';
    }
} else {
    echo 'Image does not exist.';
}

?>

