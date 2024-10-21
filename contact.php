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
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="media.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <title> FayShop | Contact </title>
    <link rel="icon" href="img/logo.jpg" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="package/swiper-bundle.min.css" />
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="media.css" />
    <style>
      .rating {
  display: flex;
  transform: translate(10px,-10px);
  margin: 10px 0;
}

.fa-star {
  color: #ccc;
  font-size: 24px;
  cursor: pointer;
}

.fa-star.active {
  color: #ffd700;
}
  
    </style>
<?php
include "connection.php";
session_start();

if (isset($_POST['subject'], $_POST['submit']) && !empty($_POST['subject'])) {
    $id = $_SESSION["id"];
    $subject = $_POST["subject"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];

    // Préparer la requête pour vérifier si l'avis existe déjà
    $st0 = $con->prepare("SELECT `user_id` FROM `reviews` WHERE `user_id` = :id");
    $st0->execute([':id' => $id]);
    $review = $st0->fetch(PDO::FETCH_OBJ);

    if (!$review) {
        // Insérer un nouvel avis
        $st = $con->prepare("INSERT INTO `reviews` (`user_id`, `subject`, `rating`, `comment`) VALUES (:id, :subject, :rating, :comment)");
        $st->execute([
            ':id' => $id,
            ':subject' => $subject,
            ':rating' => $rating,
            ':comment' => $comment
        ]);
        echo "<script>alert('Add success')</script>";
    } else {
        // Mettre à jour l'avis existant
        $st = $con->prepare("UPDATE `reviews` SET `subject` = :subject, `rating` = :rating, `comment` = :comment WHERE `user_id` = :id");
        $st->execute([
            ':subject' => $subject,
            ':rating' => $rating,
            ':comment' => $comment,
            ':id' => $id
        ]);
        echo "<script>alert('Modify success')</script>";
    }

    // Nettoyer les variables POST pour éviter des soumissions multiples
    unset($_POST);
}
?>

  </head>

  <body>

  <?php include('headfoot/header.php')?>
    <button id="totop" class="normal">
      <i class="fa fa-level-up" aria-hidden="true"></i>
    </button>

    <section class="about-header" id="page-header">
      <h1>#let 's talk</h1>
      <p>LEAVE A MESSAGE ,We love to hear from you!</p>
    </section>

    <section id="contact-details" class="section-p1">
      <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Visit one of our agency locations or contact us today</h2>
        <h3>Head Office</h3>
        <div>
          <li>
            <i class="fal fa-map"></i>
            <p >Morocco Fes city wahran street 27</p>
          </li>
          <li>
            <i class="fal fa-envelope"></i>
            <p>faysalomzil5@gmail.com</p>
          </li>
          <li>
            <i class="fal fa-phone-alt"></i>
            <p>faysalomzil5@gmail.com</p>
          </li>
          <li>
            <i class="fal fa-clock"></i>
            <p>Monday to Saturday : 9.00am to 16.pm</p>
          </li>
        </div>
      </div>
      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105816.68568466134!2d-5.084142504405751!3d34.02407765204143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes%2C%20Morocco!5e0!3m2!1sen!2sdk!4v1712977825015!5m2!1sen!2sdk"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </section>
    <section id="form-details">
      <form  method="post" >
        <span>Leave a Message</span>
        <h2>We love to hear from you!</h2>
        <input type="text" readonly placeholder="E-mail" value="<?=$_SESSION['email']??''?>"/>
        
        <input type="text" placeholder="Subject" name="subject" />
        <div class="rating">

  <input type="hidden" name="rating" class="rating-value" value="1" onchange="alert(this.value)">
  <i class="fa fa-star" data-index="1"></i>
  <i class="fa fa-star" data-index="2"></i>
  <i class="fa fa-star" data-index="3"></i>
  <i class="fa fa-star" data-index="4"></i>
  <i class="fa fa-star" data-index="5"></i>
</div>
        <textarea
          cols="30"
          rows="10"
          name="comment"
          placeholder="Your Message"
        ></textarea>
        
        <button class="normal" name="submit" type="submit" >Submit</button>
      </form>
      <div class="people">
        <div>
          <img src="img/people/1.jpg" alt="" />
          <p>
            <span>Faycal oumzil</span>Senior Marketing Manager <br />Phone: +
            212 65 45 25 85 6 <br />E-mail: contact@example.com
          </p>
        </div>
        <div>
          <img src="img/people/2.jpg" alt="" />
          <p>
            <span>ahmed </span>Senior Marketing Manager <br />Phone: + 212 65 45
            25 85 6 <br />E-mail: contact@example.com
          </p>
        </div>
        <div>
          <img src="img/people/3.jpg" alt="" />
          <p>
            <span>youssef </span>Senior Marketing Manager <br />Phone: + 212 65
            45 25 85 6 <br />E-mail: contact@example.com
          </p>
        </div>
      </div>
    </section>
    <?php include('headfoot/footer.php')?>
    <script src="script.js"></script>
    <script>
      const stars = document.querySelectorAll('.fa-star');
const ratingValue = document.querySelector('.rating-value');

stars.forEach(star => {
  star.addEventListener('click', () => {
    const rating = parseInt(star.getAttribute('data-index'));
    ratingValue.value = rating;

    stars.forEach(s => {
      if (parseInt(s.getAttribute('data-index')) <= rating) {
        s.classList.add('active');
      } else {
        s.classList.remove('active');
      }
    });
  });
});
    </script>
  </body>
</html>
