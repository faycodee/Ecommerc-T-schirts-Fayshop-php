<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
 include("login/autolog.php"); 

 ?>
<style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  border-radius: 50%;
  width: 50px;
  height: 45px;
  border: solid 1px white;
  cursor: pointer;
  transform: translate(-36px);
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
  
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 100px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  transform: translate(-85px);
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

</style>
<style>
        .cart-container {
            position: relative;
            display: inline-block;
            font-size: 5px;
        }

        .cart-icon {
            font-size: 24px;
        }

        .cart-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: black;
            color: white;
            border-radius: 50%;
            padding: 2px 3px;
            font-size: 8px;
        }
   
    </style>
<header>
      <h3 onclick="location.href='index.php'">Fay<span>Shop</span></h3>
      <ul>
        <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == "index.php" ? 'active' : '' ?>" >Home</a></li>
        <li><a href="shop.php"class="<?= basename($_SERVER['PHP_SELF']) == "shop.php" ? 'active' : '' ?>"> Shop</a></li>
        <li><a href="blog.php"class="<?= basename($_SERVER['PHP_SELF']) == "blog.php" ? 'active' : '' ?>">Blog</a></li>
        <li><a href="about.php"class="<?= basename($_SERVER['PHP_SELF']) == "about.php" ? 'active' : '' ?>" >About</a></li>
        <li><a href="contact.php" class="<?= basename($_SERVER['PHP_SELF']) == "contact.php" ? 'active' : '' ?>">Contact</a></li>
        
        <li>
          
          <a href="cart.php" id="cart" class="<?= basename($_SERVER['PHP_SELF']) == "cart.php" ? 'active' : '' ?>">
          <div class="cart-container">
          <i class='fas fa-shopping-bag' style='font-size:24px'></i>
        <span class="cart-badge" id="cart-count" >0</span>
    </div>

        </a>
          <a href="#" id="close" onclick="baar()"
            ><i class="far fa-times"></i
          ></a>
        </li>

      </ul>

      <div id="login" >
      
        <a href="login/login.php" class="btn btn-outline-primary">login</a>
      <a  href="login/signup.php" class="btn btn-primary" >Sign up</a>
    
      </div>

        <div class="dropdown" id='profil' hidden >
        <img style="object-fit: cover;" class="dropbtn" src="<?=$_SESSION['photo']?>" id="dropbtn"  onmouseover="myFunction()"  width="100px" >
  <!-- <button class="dropbtn">Dropdown</button> -->
  <div class="dropdown-content" id="myDropdown" >
    
  <a href="profildeatail.php" style=" color:blue">Profil</a>
  <a href="dashboard.php" style=" color:blue" id="dashb" hidden >Dashboard</a>
  <a href="login/logout.php" style=" color:red">logout</a>
  <!-- <a href="#">Link 2</a>
  <a href="#">Link 3</a> -->
  </div>

      </div>
      <div class="mobile">
        <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
        <i id="bar" class="fas fa-outdent" onclick="baar()"></i>
      </div>

    </header>

