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

    <link rel="icon" href="../img/logo.jpg" />
    <link rel="stylesheet" href="../css/style2.css">
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <!-- -------------------------------------------------------------CROP LINKS --------------------------------------------- --> 
  
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
  
  <!-- -------------------------------------------------------------CROP LINKS --------------------------------------------- --> 

    <title>FayShop | Sign-up</title>
    <?php

require_once('connexion.php');


$fname = '';
$lname = '';
$email = '';
$pass = '';
$cpass = '';
$msgErore = "";
$photo = "";
$succes = 0;

if (isset($_POST["env"])) {

    $location = false;

    $fname = trim($_POST['fname']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $cpass = trim($_POST['cpass']);
    $remember = isset($_POST['remember']);

    $msgErore = "<b>Il ya des Ereurs :</b> <br><br>";

    // Validate first name
    if (!preg_match("/^[A-Za-z\s]{2,}$/", $fname)) {
        $msgErore .= "--> Entrez un prénom valide <br>";
    }


    // Validate if email already exists
    $st = $db->query("SELECT * FROM `users` WHERE email ='$email'");
    $user = $st->fetch();
    if ($user) {
        $msgErore .= "--> Vous avez déjà un compte avec cet email.<br>";
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msgErore .= "--> Forme d'email incorrecte <br>";
    }

    // Validate password
    if (strlen($pass) < 8) {
        $msgErore .= "--> Le mot de passe doit contenir au moins 8 caractères <br>";
    }

    // Validate confirm password
    if ($pass !== $cpass) {
        $msgErore .= "--> Le mot de passe de confirmation ne correspond pas <br>";
    }

    // Validate file upload
    // if (isset($_FILES['profil']) && $_FILES['profil']['error'] == 0) {
    //     $nom = "../img/USERimage/".uniqid().$_FILES['profil']['name'];
    //     $type = strtolower($_FILES['profil']['type']);  
    //     echo $nom ;
    //     // Allowed file types
    //     $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    //     if (in_array($type,$allowedTypes)&& strlen($msgErore)<40) {
          
    //         $result = move_uploaded_file($_FILES['profil']['tmp_name'], $nom); 
    //         if (!$result) {
    //             $msgErore .= "--> Erreur de téléchargement : '".$_FILES["profil"]["error"]."' <br>";
    //         }
    //     } else if ( in_array($type, $allowedTypes)==false ){
           
    //     }
    // } else {
    //     $msgErore .= "--> Erreur de téléchargement de la photo <br>";
    // }
       // <!-- -------------------------------------------------------------CROP php --------------------------------------------- -->
  
   $photo = "../".$_POST["cropedimg"];
   // Check if the file exists
   if (file_exists($photo) ) {
    
    $target_dir = "../img/USERimage/"; // Directory where the file will be stored
    $fileName = basename($photo);
    $target_file = $target_dir . $fileName;

    // Copy the file to the specified directory
    if (copy( $photo, $target_file)) {
        $photo = substr($target_file,3);
    }else{
      $msgErore .= "-->  Erreur de téléchargement de la photo 2 <br>";
    }
}else{
  $msgErore .= "-->  Erreur de téléchargement de la photo <br>";
}

// <!-- -------------------------------------------------------------CROP php --------------------------------------------- -->

    // Display error messages
    if (strlen($msgErore) > 40) { // Check if there are any error messages appended
        echo  "<h5 class='alert1'>".$msgErore."</h5>";
    } else {
        $order = "INSERT INTO `users`( `email`, `username`, `password`, `photo`) VALUES ('$email','$fname','$pass','$photo')";
        $ST = $db->exec($order);

        // Validate if user is added in the database
        $st = $db->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");
        $user = $st->fetch();
        if ($remember && !isset($_COOKIE["user_id"])) {
   
          // Set cookies to remember user for 30 days
      $iduser =$user['id'];
      $emailuser=$user['email'];
      setCookie("user_id", $iduser, time() + (30 * 24 * 60 * 60),"/");
      setCookie("user_email",$emailuser, time() + (30 * 24 * 60 * 60),"/");
      }
      
        echo "<script type='text/javascript'>
            alert('Information has been sent to the server successfully.');
            window.location.href = '../index.php';
        </script>";
    }
}



    ?>
    <style>
      @font-face {
        font-family: "fun";
        src: url(Fonts/FFYaseer-Solid.otf);
      }
      @font-face {
        font-family: "classic";
        src: url(Fonts/29LT\ Kaff\ Medium.ttf);
      }

      html {
        font-family: "classic";
        height: 100%;
      }
      label {
        font-family: "classic";
        color: #09e7e7;
      }
      body {
        margin: 0;
        padding: 0;
        background: var(--bgcolor2);
      }
      button {
        border: transparent;
        background-color: transparent;
      }    

      a {
        font-size: 9px;
        color: #fbfbfb87;
        padding: 5px;
        text-decoration: none;
      }
      a:hover {
        font-size: px;
        color: #6edfdfe7;
        background-color: rgba(128, 128, 128, 0.47);
        padding: 5px;
        border-radius: 13px;
      }
      :root {
        --color1: #09e7e7;
        --color2: rgb(154, 239, 239);
        --color3: rgb(56, 126, 170);
        --bgcolor1: rgb(0, 0, 0);
        --bgcolor2:  #007bff;
        --padding: 8%;
      }

      * {
        margin: 0%;
        padding: 0%;
        box-sizing: border-box;
      }

      html {
        font-family: "classic";
        font-size: 12px;
        color: white;
      }

      ::-webkit-scrollbar {
        width: 15px;
        background-color: #000000;
      }
      ::-webkit-scrollbar-thumb {
        background: linear-gradient(transparent, #46f7e83d);
        border-radius: 8px;
        transition: 10s;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(transparent, hsl(175, 100%, 50%));
      }
      input:-webkit-autofill {
             background-color: black !important;
            }


      h1 {
        font-size: 5rem;
        margin: 1.7rem;
        font-family: "fun";
      }

      h4 {
        font-size: 1.25rem;
        margin: 1.7rem;
        letter-spacing: 0.12rem;
        margin: 33px;
      }

      h2 {
        letter-spacing: 0.12rem;
        cursor: grab;
        font-family: "fun";
        font-size: 5rem;
        margin: 1.7rem;
      }
      span {
        color: rgb(0, 172, 172);
      }
      p {
        line-height: 20px;
        word-spacing: 1.5px;
        letter-spacing: 0.5px;
        text-align: justify;
        font-family: "classic";
      }

      .signup-box {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.875);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
        border-radius: 50px;
      }

      .signup-box h2 {
        margin: 0 0 30px;
        padding: 0;
        color: #fff;
        text-align: center;
      }

      .signup-box .user-box {
        position: relative;
      }

      .signup-box .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
      }
      .signup-box .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 14px;
        color: #fff;
        pointer-events: none;
        transition: 0.5s;
        font-family: "classic";
      }

      .signup-box .user-box input:valid ~ label,
      .signup-box .user-box input:focus ~ label {
        top: -20px;
        left: 0;
        color: #03e9f4;
        font-size: 10px;
      }
      .signup-box .user-box input:valid ~ .Email,
      .signup-box .user-box input:invalid ~ .Email {
        top: -20px;
        left: 0;
        color: #03e9f4;
        font-size: 10px;
      }

      .signup-box form button {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #03e9f4;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: 0.5s;
        margin-top: 40px;
        letter-spacing: 4px;
      }

      .signup-box button:hover {
        background: #03e9f4;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4,
          0 0 100px #03e9f4;
      }

      .signup-box button span {
        position: absolute;
        display: block;
      }

      .signup-box button span:nth-child(1) {
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #03e9f4);
        animation: btn-anim1 1s linear infinite;
      }

      @keyframes btn-anim1 {
        0% {
          left: -100%;
        }
        50%,
        100% {
          left: 100%;
        }
      }

      .signup-box button span:nth-child(2) {
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #03e9f4);
        animation: btn-anim2 1s linear infinite;
        animation-delay: 0.25s;
      }

      @keyframes btn-anim2 {
        0% {
          top: -100%;
        }
        50%,
        100% {
          top: 100%;
        }
      }

      .signup-box button span:nth-child(3) {
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent, #03e9f4);
        animation: btn-anim3 1s linear infinite;
        animation-delay: 0.5s;
      }

      @keyframes btn-anim3 {
        0% {
          right: -100%;
        }
        50%,
        100% {
          right: 100%;
        }
      }

      .signup-box button span:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #03e9f4);
        animation: btn-anim4 1s linear infinite;
        animation-delay: 0.75s;
      }

      @keyframes btn-anim4 {
        0% {
          bottom: -100%;
        }
        50%,
        100% {
          bottom: 100%;
        }
      }
      input[type="file"] {
        margin-top: 40px;
  position: relative;
  width: 150px;
  padding: 8px;
  background-color: #3498db;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}


input[type="file"]::-webkit-file-upload-button {
  display: none;
}
.backbtn {
        border-radius: 5px;
        font-size: 30px;
        background-color: black;
        transition: all .4s;
        padding: 10px;
        position: absolute;
        left: 15px;
        border: #007bff 2px solid ;
        top: 15px;
      }
      .backbtn:hover{
        font-size: 30px;
        border-radius: 5px;
        color: #007bff;
        border: none;
        background-color: transparent;
      }
      body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: black;
  width: 100%;
  overflow: hidden;
}
.ring {
  position: relative;
  width: 700px;
  height: 700px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.ring i {
  position: absolute;
  inset: 0;
  border: 2px solid #fff;
  transition: 0.5s;
}
.ring i:nth-child(1) {
  border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
  animation: animate 6s linear infinite;
}
.ring i:nth-child(2) {
  border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
  animation: animate 4s linear infinite;
}
.ring i:nth-child(3) {
  border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
  animation: animate2 10s linear infinite;
}
.ring:hover i {
  border: 6px solid var(--clr);
  filter: drop-shadow(0 0 20px var(--clr));
}
@keyframes animate {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes animate2 {
  0% {
    transform: rotate(360deg);
  }
  100% {
    transform: rotate(0deg);
  }
}
      /* <!-- -------------------------------------------------------------CROP css --------------------------------------------- --> */
      #crop-container{
            width: 250px;
            height: 250px;
          transform: translate(240px);
          margin-bottom: 130px;
        }
        /* <!-- -------------------------------------------------------------CROP css --------------------------------------------- --> */

    </style>
  </head>
  <body vlink="#43877b71">
  <a class="backbtn" href="../index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
  <div class="ring">
  <i style="--clr:#3DF2F2;"></i>
  <i style="--clr:#2995D9;"></i>
  <i style="--clr:#074E8C;"></i>

    <div class="signup-box">
      <h1>Sign-in</h1>
      <form method="POST" action="signup.php" enctype="multipart/form-data">
    <div class="user-box">
        <input type="text" name="fname" required value="<?=$fname?$fname : "" ; ?>"  autofocus autocomplete="off"/>
        <label>user name</label>
    </div>
   
    <div class="user-box">
        <input type="text" name="email" required class="Email" value="<?= $email?$email : "" ; ?>" autocomplete="off"/>
        <label>Email</label>
    </div>
    <div class="user-box">
        <input type="password" name="pass" required  value="<?=$pass?$pass : "" ; ?>" autocomplete="off"/>
        <label>Password</label>
    </div>
    <div class="user-box">
        <input type="password" name="cpass" required value="<?=$cpass?$cpass : "" ; ?>" autocomplete="off"/>
        <label>Confirm Password</label>
    </div>
    <div class="user-box">
   <!-- -------------------------------------------------------------CROP html --------------------------------------------- -->
   
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
                    <input type="text"   name="cropedimg"  id="cropedimg">
    <!-- -------------------------------------------------------------CROP html --------------------------------------------- -->

        <label for="photo">Profil Photo:</label>
    </div>

    <small><a href="login.php">Already have an account?</a></small>
    <br><br>
    <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember me</label><br><br>
    <div class="special">
        <button type="Submit" name="env" >
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
        </button>

    </div>
</form>

    </div>
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
            $.ajax('../save-cropped-image.php', {
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
    </div>
  </body>

</html>
