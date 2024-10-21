<?php
$db=new PDO("mysql:host=localhost;dbname=fayshop","root","") ;
function buildid(){
    $id="";
    $tablA=explode(" ","q w e r t y u l p r 8 a b A C i o p a s d f g j k l z x c v b n F m 1 2 3 4 5 6 7 8 9 Q W E R T Y U I O P A S D G H J K L Z X C V B N M");
    for ($i=0; $i < 4; $i++) { 
       $id.= $tablA[rand(0,60)];
    }
    return $id ;
}


?>
