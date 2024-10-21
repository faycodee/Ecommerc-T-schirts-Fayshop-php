<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["filePath"])) {
    $filePath = $_POST["filePath"];

    // Check if the file exists
    if (file_exists($filePath)) {
        $target_dir = "img/products/man/"; // Directory where the file will be stored
        $fileName = basename($filePath);
        $target_file = $target_dir . $fileName;

        // Copy the file to the specified directory
        if (copy($filePath, $target_file)) {
            echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error: File does not exist.";
    }
} else {
    echo "Error: No file path provided.";
}
?>
<form action="" method="post">
    <input type="text" name="filePath" id="filePath" value="img/cropedimg/4HmGqg5p.jpeg">
    <input type="submit" value="Upload">
</form>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="Discription"
      content="T-Shirts from Spreadshirt ✓ Easy 90 day return policy ✓  
     Large assortment for Men & Women ✓ Unique designs on V-necks & more  
     featuring unique designs by the global Threadless artist community ...
     Shop T-Shirts now!"
    />
    <meta
    name="keywords"
    content="FayShop, php, Ecommerce Website, T-shirts for men, T-shirts for women, T-shirts for kids, Unisex T-shirts, Cotton T-shirts, Graphic T-shirts, Custom T-shirts, Trendy T-shirts, Printed T-shirts, Short sleeve T-shirts, Long sleeve T-shirts, Sports T-shirts, Casual T-shirts, All season T-shirts, Organic T-shirts, Quality T-shirts, Fashion T-shirts, Stylish T-shirts, Unique T-shirts, Online T-shirts, Online T-shirt shopping, T-shirt sale, Cheap T-shirts, Discounted T-shirts, New T-shirts, T-shirt collection, Patterned T-shirts, Crew neck T-shirts, V-neck T-shirts, Customizable T-shirts"
/>

    <link rel="icon" href="img/logo.jpg" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="media.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Ajoutez les autres balises de votre section head ici -->

  <!-- Lien vers le CSS de Select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

  <!-- Lien vers le JavaScript de Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <!-- -------------------------------------------------------------CROP LINKS --------------------------------------------- --> 
  
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
  
  <!-- -------------------------------------------------------------CROP LINKS --------------------------------------------- --> 

    <title>FayShop | Profil</title>

    <style>
        h4{
          font-weight: 100;
          font-size: 30px;
        }
      .P{
        
        display: flex;
        justify-content: center;
      }
      #Pphoto{
        width: 200px;
        height: 200px;
        border-radius: 60%;
        transition: 1s;
        position: absolute;
        top: 200px;
      }
      #Pphoto:hover{
        width: 250px;
        height: 250px;
        top: 160px;



      }
        
        section{
            padding-top: 10px;
            display: flex;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-size: contain;
            
            
           
        }
        .container {
          padding-top: 60px;
            width: 80%;
            margin: 2em 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2em;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 1em;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        .form-group {
            margin-bottom: 1em;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5em;
        }
        .form-group input, 
         .form-group textarea ,
         .form-group select ,
         .form-group button {
            padding: 0.5em;
            width: 100%;
            transition: .4s;
        }
        .form-group button{
            background-color: #333;
            color: #ddd;
        }
        .form-group button:hover{
            background-color:initial ;
            color: initial;
        }
        .actions button {
            margin-right: 0.5em;
            
        }

        /* nav side  */

        
        #toggle-sidebar-btn {
         background-color: none;
         appearance: none;
         border: none;
            cursor: pointer;
            position: fixed;
            z-index: 1;
            left: 190px;
            top: 135px;
            z-index: 100; 
            transform: rotate(180deg);
            transition: transform 0.3s ease;
            
        }
/*         
        #toggle-sidebar-btn::before{
            content: "Action " ;
        } */

        .sidebar {
            width: 250px;
            height: 80vh;
            position: fixed;
            z-index: 99;
            left: 0px;
            bottom: 90px;
            background-color: #007bff;
            color: white;
            padding: 15px;
            box-sizing: border-box;
            transition: transform 0.3s ease;
            border: black .5px solid;
            border-radius: 7px;
            margin-right: 20px;
        }

        .sidebar.hidden {
            transform: translateX(-180%);
        }
        .sidebar ul{
            transform: translateY(120px);
        
        }
        .sidebar ul li{
          margin-top: 20px;
            
        
        }
        .sidebar ul a{
            color: white;

        
        }
        #toggle-sidebar-btn.btn0 {
            transform: translateX(-170px);
            content: "";
        }
        
      #sizes ,  #is_featured {
            display: flex;
            flex-direction: row;
            width: 280px;
        }
        .sizess{
            display: flex;
            width: 45%;
        }
        label{
            font-weight: bold;
        }
   
        .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
      /* <!-- -------------------------------------------------------------CROP css --------------------------------------------- --> */
      #crop-container{
            width: 500px;
            height: 500px;
          transform: translate(330px);
          margin-bottom: 130px;
        }
        /* <!-- -------------------------------------------------------------CROP css --------------------------------------------- --> */
  
    </style>
</head>
<?php

include "connection.php";
$st = $con->query("select * from region order by region asc  ");
$allstate =$st->fetchAll(PDO::FETCH_OBJ);
$st2 = $con->query("select * from ville order by ville asc ");
$allcity =$st2->fetchAll(PDO::FETCH_OBJ);


?> 
<body>
<?php
 include('headfoot/header.php')

 ?>
<?php 
$saveOldPhoto =$_SESSION["photo"];
$userid=$_SESSION["id"];
$st3 = $con->query("select a.* from addresses a , users u where u.id = $userid and u.id =a.user_id");
$addresses =$st3->fetch(PDO::FETCH_OBJ);
if (isset($_POST["Save"])) {

  $username =$_POST["username"];
  $first_name =$_POST["first_name"];
  $last_name =$_POST["last_name"];
  $photo =$_SESSION["photo"];
   // <!-- -------------------------------------------------------------CROP php --------------------------------------------- -->
  
    
   // Check if the file exists
   if (file_exists($_POST["cropedimg"]) ) {
       $photo = $_POST["cropedimg"];
       $target_dir = "img/USERimage/"; // Directory where the file will be stored
      
       

       $fileName = basename($photo);
       $target_file = $target_dir . $fileName;

       // Copy the file to the specified directory
       if (copy($photo, $target_file)) {
           $photo = $target_file;
       } 
}

// <!-- -------------------------------------------------------------CROP php --------------------------------------------- -->

  $email =$_POST["email"];
  $password =$_POST["password"];
  $phone =$_POST["phone"];
  $address_line1 =$_POST["address_line1"];
  $address_line2 =$_POST["address_line2"];
  $state =$_POST["state"];
  $city =$_POST["city"];
  $postal_code =$_POST["postal_code"];
  
 
  $st4 =$con ->exec("UPDATE `users` SET `email`='$email',`username`='$username',
  `password`='$password',`photo`='$photo',`first_name`='$first_name',
  `last_name`='$last_name',`phone`='$phone' WHERE id= $userid ");
  if ($st4) {
     // Specify the path to the image file to be deleted
$image_path = $saveOldPhoto;

// Check if the file exists
if (file_exists($image_path)) {
    // Attempt to delete the file
    unlink($image_path);
    
 
} else {

    echo "<script>alert('Image does not exist.')</script>";
}
  }
 
  $st5 =$con ->query("SELECT * FROM `addresses` WHERE user_id=$userid ");
  $addresse=$st5->fetch(PDO::FETCH_OBJ);
  
if ($addresse) {

    $st6 =$con ->exec("UPDATE `addresses` SET `address_line1`='$address_line1',
    `address_line2`='$address_line2',`city`='$city',`state`='$state',`postal_code`='$postal_code' WHERE user_id=$userid  ");

}else{
    $st6 =$con ->exec("INSERT INTO `addresses`(`user_id`, `address_line1`, `address_line2`, `city`, `state`, `postal_code`)
     VALUES ($userid,'$address_line1','$address_line2','$city','$state','$postal_code')");


}

if ($st6 && $st4 ) {
  
  echo "<script>alert('Profil UPDATE success')</script>";

 }


  }

 

?>

<div style="background-image: url(img/banner/b1.jpg);height: 35vh;background-size: cover;"  class="shop">

</div>
<section>
<form action="" method="post"  enctype="multipart/form-data">
<div class="P">
<img src="<?=$_SESSION["photo"]?>" name="" id="Pphoto">
</div>
<div class="container">
    <div class="form-group">
      <h3 ><b>Personal Info :</b></h3><br>
         <label for="username" >Userame <span style="color: red;" >*</span>:</label>
         <input type="text"name="username" value="<?=$_SESSION["username"]?>"  id="username" required>
         <label for="first_name" >First Name :</label>
         <input type="text"name="first_name"  id="first_name" value="<?=$_SESSION["first_name"]??""?>" >
         <label for="last_name" >Last Name :</label>
         <input type="text"name="last_name"  id="last_name" value="<?=$_SESSION["last_name"]??""?>">
         <!-- -------------------------------------------------------------CROP html --------------------------------------------- -->
         <label for="photo">Profil Photo:</label>
                    <input type="file" accept="image/*" name="photo" id="image" required >

                    <!-- Section de recadrage d'image -->
                    <div id="crop-container">
                        <img id="crop-image" />
                        <div class="crop-buttons">
                            <button type="button" id="crop-button">Crop</button>
                            <button type="button" id="cancel-button">Cancel</button>
                        </div>
                    </div>

                    <br><br>
                    <input type="hidden"   name="cropedimg"  id="cropedimg">
    <!-- -------------------------------------------------------------CROP html --------------------------------------------- -->
         <br><br><br><h3 ><b>Account Info :</b></h3><br><br>
         <label for="email" >Email <span style="color: red;" >*</span> : </label>
         <input type="email"name="email"  id="email"  required readonly value="<?=$_SESSION["email"]??""?>">
         <label for="password" value="" id="myInput2" >Password <span style="color: red;" >*</span> : </label>
         <input id="password-field" type="password"  name="password" required value="<?=$_SESSION["password"]??""?>">
         <span style="transform: translate(-17px,38px);" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

         <label for="phone" >Phone  : </label>
         <input type="tel"name="phone"  id="phone" value="<?=$_SESSION["phone"]??""?>"  >
         <br><br><br><h3 ><b>Address Info :</b></h3><br><br>
         <label for="address_line1" >Address_line1 <span style="color: red;" >*</span> :</label>
         <input type="text" name="address_line1"  id="address_line1" value="<?=$addresses->address_line1??""?>" required>
         <label for="address_line2" >Address_line2:</label>
         <input type="text"name="address_line2"  id="address_line2" value="<?=$addresses->address_line2??""?>">
         <label for="state">State <span style="color: red;">*</span> :</label>
      <select name="state" id="state" class="select2"  required>
      <?php foreach($allstate as $state){?>
        <option  value="<?=$state->id?>"><?=$state->region?></option>
        <?php }?>
      </select>
      
      <label for="city">City <span style="color: red;">*</span> :</label>
      <select name="city" id="city" class="select2"  required>
      <?php foreach($allcity as $city){?>
        <option value="<?=$city->id?>"><?=$city->ville?></option>
        <?php }?>
      </select>
        <label for="postal_code" >Postal_code : <span style="color: red;" >*</span> :</label>
        <input type="text" name="postal_code"  id="postal_code" pattern="[0-9]{1,}" value="<?=$addresses->postal_code??""?>" required>
        

        <br>
        <br>
        <br>
        <button  name="Save" type="submit">Save</button>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="P">
<p><b>This Account created at :</b></p></div>
<div class="P"><p><?=$_SESSION["created_at"]?>.</p></div>
        <br>
       
    
 
     </div>
   
  
 </div>
 </form>
</section>
    <!-- -------------------------------------------------------------CROP SCRIPT --------------------------------------------- -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
    let cropper;
    let image = document.getElementById('image');
    let cropContainer = document.getElementById('crop-container');
    let cropImage = document.getElementById('crop-image');
    let cropButton = document.getElementById('crop-button');
    let cancelButton = document.getElementById('cancel-button');

    image.addEventListener('change', (event) => {
        let files = event.target.files;
        if (files && files.length > 0) {
            let file = files[0];
            let reader = new FileReader();

            // إذا كان هناك صورة موجودة في المربع، قم بإزالتها
            if (cropper) {
                cropper.destroy();
                cropImage.src = '';
            }

            reader.onload = (e) => {
                cropImage.src = e.target.result;
                cropContainer.style.display = 'block';
                cropper = new Cropper(cropImage, {
                    aspectRatio: 1,
                    viewMode: 1,
                });
            };
            reader.readAsDataURL(file);
        }
    });

    cropButton.addEventListener('click', () => {
        let canvas = cropper.getCroppedCanvas({
            width: 200,
            height: 200,
        });
        canvas.toBlob((blob) => {
            let formData = new FormData();
            formData.append('croppedImage', blob);
            $.ajax('save-cropped-image.php', {
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: (response) => {
                    alert('Crop successful');
                    cropContainer.style.display = 'none';
                    let cropedimg = document.getElementById("cropedimg");
                    let image = document.getElementById("image");
                    cropedimg.setAttribute("value", response);
                    cropImage.value = "";
                },
                error: () => {
                    alert('Crop failed');
                },
            });
        });
    });

    cancelButton.addEventListener('click', () => {
        cropper.destroy();
        cropContainer.style.display = 'none';
        cropImage.src = ''; // إزالة الصورة عند الإلغاء
    });

    cropContainer.style.display = 'none';
</script>

<script src="other/JS/jquery.imgareaselect.js"></script>
    <!-- -------------------------------------------------------------CROP SCRIPT --------------------------------------------- -->
<script>
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});

  $(document).ready(function() {
    $('.select2').select2();
  });
function valueSelect(){
   let state=document.getElementById("state").children
   let city=document.getElementById("city").children

for (let index = 0; index < state.length; index++) {
  let option = state[index];
  if (option.value==<?=$addresses->state?>) {
    option.setAttribute("selected","")
   }
  
}
for (let index = 0; index < city.length; index++) {
  let option = city[index];
  if (option.value==<?=$addresses->city?>) {
    option.setAttribute("selected","")
   }
  
}

}
  window.onload =valueSelect()
</script>

<?php include('headfoot/footer.php');?>
</body>
</html>