<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uniqe ="";
    $tablA = explode(" ", "q w e r t y u l p r 8 a b A C i o p a s d f g j k l z x c v b n F m 1 2 3 4 5 6 7 8 9 Q W E R T Y U I O P A S D G H J K L Z X C V B N M");
    for ($i = 0; $i < 7; $i++) {
        $uniqe .= $tablA[rand(0, 60)];
    }
    if (isset($_FILES['croppedImage'])) {
        $file = $_FILES['croppedImage'];
        $uploadDir = 'img/cropedimg/';
        $uploadFile = $uploadDir.$uniqe."p.jpeg";
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo $uploadFile ;
        } else {
            echo 'Image upload failed';
        }
    }
}
?>
