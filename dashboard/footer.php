

<section id="newsletter" class="section-p1 section-m1">
      <div class="newstext">
        <h4>Sign Up For Newsletter</h4>
        <p>
          Get E-MAIL updates about our latsest shop and
          <span>special offers.</span>
        </p>
      </div>
      <div class="form">
        <input type="text" placeholder="Your email address" />
        <button>Sign Up</button>
      </div>
    </section>
    <footer class="section-p1">
      <div class="col">
        <h2>Fay<span>Shop</span></h2>
        <h4>Contact</h4>
        <p><strong>Address:</strong>morocco fes city wahran street 27</p>
        <p><strong>Phone:</strong>+212 61 34 87 81 4</p>
        <p><strong>Hours:</strong>10:00-18:00 Mon-Sat</p>
        <div class="follow">
          <h4>Follow Us</h4>
          <div class="icon">
            <i  onclick="location.href='#'" class="fab fa-facebook-f"></i>
            <i  onclick="location.href='#'" class="fab fa-twitter"></i>
            <i  onclick="location.href='#'" class="fab fa-instagram"></i>
            <i  onclick="location.href='#'" class="fab fa-pinterest-p"></i>
            <i  onclick="location.href='#'" class="fab fa-youtube"></i>
          </div>
        </div>
      </div>
      <div class="col">
        <h4>About</h4>
        <a href="about.php">About Us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="contact.php">Contact Us</a>
      </div>
      <div class="col">
        <h4>My Account</h4>
        <a href="contact.php">Sign In</a>
        <a href="cart.php">View Cart</a>
        <a href="cart.php">My Wishlist</a>
        <a href="cart.php">Track My Order</a>
        <a href="contact.php">Help</a>
      </div>
      <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
          <img src="img/pay/app.jpg" alt="" />
          <img src="img/pay/play.jpg" alt="" />
        </div>
        <p>Secured Payment Gateways</p>
        <img src="img/pay/pay.png" alt="" />
      </div>

      <div class="copyright">
        <p>© 2024,Faysal oumzil - HTML CSS Ecommerce website</p>
      </div>
    </footer>
     <!-- display profil  -->

<?php

    if (isset($_SESSION['id'])) {

      echo "<script>document.getElementById('profil').removeAttribute('hidden');</script>";
    }else {
      echo "<script>document.getElementById('profil').setAttribute('hidden','');</script>";
    }
    
    ?>

<script>
  
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
document.getElementById('profil').addEventListener('mouseleave',
function () {
  document.getElementById("myDropdown").classList.remove("show");
}
)

// Close the dropdown if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }
</script>
<?php

if (isset($_SESSION["id"])) {
    echo "<script>";
    echo "let divprofil = document.getElementById('profil');";
    echo "let divlogin = document.getElementById('login');";
    echo "divprofil.hidden='';";
    echo "divlogin.setAttribute('hidden','');";
    echo "</script>";
}
if (isset($_SESSION["id"]) && $_SESSION["role"]=="manager") {
  echo "<script>";
  echo "let dashb = document.getElementById('dashb');";
  echo "dashb.removeAttribute('hidden');";
  echo "</script>";
}
?>


 <!-- Code to display the dashboard -->
     <?php


if (isset($_COOKIE['role']) && $_COOKIE['role'] == 'manager') {
    ?>
    <script>

        document.getElementById("dash").removeAttribute('hidden');</script>
    <?php 
}else {?>
    <script>
    document.getElementById("dash").setAttribute('hidden','');

</script>
</script>
<script> document.getElementById('cart-count').textContent = cartCount;</script>




    
  <?php 
}   
?>
