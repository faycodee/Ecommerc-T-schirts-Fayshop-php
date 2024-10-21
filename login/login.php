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
    <title>FayShop | Log-in</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <?php
require("connexion.php");
$email = '';
$pass = '';
$msgErore = "";

if (isset($_POST["env"])) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $remember = isset($_POST['remember']);

    $msgErore = "Il y a des erreurs : <br>";

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msgErore .= "--> Forme d'email incorrecte <br>";
    }

    // Validate if user exists and password is correct
    if (strlen($msgErore) <= 40) {
        $st = $db->prepare("SELECT * FROM users WHERE email = :email");
        $st->execute([':email' => $email]);
        $user = $st->fetch();

        if ($user && $pass== $user['password']) {
         if ($remember && !isset($_COOKIE["user_id"])) {
   
              // Set cookies to remember user for 30 days
          $iduser =$user['id'];
          $emailuser=$user['email'];
          setCookie("user_id", $iduser, time() + (30 * 24 * 60 * 60),"/");
          setCookie("user_email",$emailuser, time() + (30 * 24 * 60 * 60),"/");
          }
          echo "<script type='text/javascript'>
          alert('Login successfully');
          window.location.href = '../index.php';
      </script>";

         
        } else {
            $msgErore .= "--> Incorrect email or password!<br>";
        }
    }

    // Display error messages
    if (strlen($msgErore) > 40) {
        echo "<h5 class='alert1'>$msgErore</h5>";
    }
    
}
?>

    <style>
      .alert1{
        
        color: black;
        font-size: 15px;
        width: 20%;
        margin-top: 180px;
        margin-left: 40px;
        background-color: white;
        padding: 60px 20px;
        border-radius: 15px;
        animation: toright 10s ease 0s 2  alternate ;
        transform: translateX(-300px);
        transition: 2s;
        left: -100%;
      
      }
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
        color: #007bff;
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
        --color1: #007bff;
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

      .login-box {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: transparent;
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
        border-radius: 50px;
      }

      .login-box h2 {
        margin: 0 0 30px;
        padding: 0;
        color: #fff;
        text-align: center;
      }

      .login-box .user-box {
        position: relative;
      }

      .login-box .user-box input {
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
      .login-box .user-box label {
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

      .login-box .user-box input:valid ~ label,
      .login-box .user-box input:focus ~ label {
        top: -20px;
        left: 0;
        color: #03e9f4;
        font-size: 10px;
      }
      .login-box .user-box input:valid ~ .Email,
      .login-box .user-box input:invalid ~ .Email {
        top: -20px;
        left: 0;
        color: #03e9f4;
        font-size: 10px;
      }

      .login-box form button {
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

      .login-box button:hover {
        background: #03e9f4;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4,
          0 0 100px #03e9f4;
      }

      .login-box button span {
        position: absolute;
        display: block;
      }

      .login-box button span:nth-child(1) {
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

      .login-box button span:nth-child(2) {
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

      .login-box button span:nth-child(3) {
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

      .login-box button span:nth-child(4) {
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
      * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Quicksand", sans-serif;
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
  width: 500px;
  height: 500px;
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

    </style>
      

  </head>
  <body vlink="#43877b71">

  <a class="backbtn" href="../index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
  <div class="ring">
  <i style="--clr:#3DF2F2;"></i>
  <i style="--clr:#2995D9;"></i>
  <i style="--clr:#074E8C;"></i>

    <div class="login-box">
      <h1>Log-in</h1>
      <form method="POST">
        <div class="user-box">
          <input type="text" name="email" required class="Email" />
          <label>Email</label>
        </div>
        <div class="user-box">
          <input type="password" name="pass" required />
          <label>Password</label>
        </div>
        <small><a href="#">forget password ?</a></small>
        &nbsp;
        <small><a href="signup.php">are you didn't have account ?</a></small>
        <br>
        <br>
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember me</label><br><br>
        <div class="spicial">
          <button type="Submit"  name="env"  >
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
  </body>
</html>
