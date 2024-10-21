<?php 
 function deleteDirectory($dir) {
    if (!file_exists($dir) || !is_dir($dir)) {
        return false;
    }

    if ($files = glob($dir . '/*')) {
        foreach ($files as $file) {
            is_dir($file) ? deleteDirectory($file) : unlink($file);
        }
    }

    return rmdir($dir);
}

// Specify the path to the folder
$folder_path = 'img/cropedimg';

// Delete the folder and its contents
deleteDirectory($folder_path);



// Create a new folder with the same name
$new_folder_path =  'img/cropedimg';
mkdir($new_folder_path, 0755);