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

    <link rel="icon" href="img/icon/logo.jpg" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
     <link rel="stylesheet" href="style.css" /> 
    <link rel="stylesheet" href="media.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>FayShop | Home</title>

    <link rel="stylesheet" href="other/package/swiper-bundle.min.css" />
 

    <?php
    include("connection.php");
    session_start();
    $order = 'select * from tshirts ORDER BY id LIMIT 8' ;
    $st= $con->query($order);
    $tshirts = $st->fetchAll(PDO::FETCH_OBJ);
   
    $order2 = 'SELECT * FROM tshirts WHERE is_featured  ORDER BY id LIMIT 8';
   
    $st2= $con->query($order2);
    $tshirtsFeatured = $st2->fetchAll(PDO::FETCH_OBJ);

    ?>

<style>

  img{
    z-index: 1000;
  }

</style>
   
  </head>

  <body>

  
  <?php 
  include('headfoot/header.php');

  
  ?>
  
    <button id="totop" class="normal">
      <i class="fa fa-level-up" aria-hidden="true"></i>
    </button>
    <div id="body1">
      <div class="Home">
        <div class="swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->

            <div class="swiper-slide">
              <section class="hero" style="background: url(img/bg/background0.jpg); background-size: cover;">
                <div class="text-hero">
                  <h2>Wellcome</h2>
                </div>
              </section>
            </div>
            <div class="swiper-slide">
              <section class="hero1" style="background: url(img/bg/background1.jpg); background-size: cover;"> 
                <div class="text-hero">
                  <h4>trade-in-offer</h4>
                  <h2>Great discounts available</h2>
                  <h1>on all products</h1>
                  <p>Save more with coupons & up to70% off !</p>
                  <button style="width: 130px;" onclick="location.href='shop.php'">Shop Now</button>
                </div>
              </section>
            </div>
            <div class="swiper-slide">
              <section class="hero2" style="background: url(img/bg/background2.jpg); background-size: cover;">
                <div class="text-hero">
                  <h4>trade-in-offer</h4>
                  <h2>Acquire the clothes</h2>
                  <h1>of your choice</h1>
                  <p>Save more with coupons & up to70% off !</p>
                  <button style="width: 130px;" onclick="location.href='shop.php'">Shop Now</button>
                </div>
              </section>
            </div>
            <div class="swiper-slide">
              <section class="hero3"style="background: url(img/bg/background3.jpg); background-size: cover;">
                <div class="text-hero">
                  <h4>trade-in-offer</h4>
                  <h2>Purchase the clothes you fancy</h2>
                  <h1>on our website</h1>
                  <p>Save more with coupons & up to70% off !</p>
                  <button style="width: 130px;" onclick="location.href='shop.php'">Shop Now</button>
                </div>
              </section>
            </div>
          </div>
        </div>
        <!-- <button id="stop" class="stop" onclick="stop()">Stop</button> -->

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev" style="color: black"></div>
        <div class="swiper-button-next" style="color: black"></div>
      </div>
      <div  style="background:url('img/bg/whiteback.jpg');" id="frature" class="section-p1 animated">
        <div class="fe-box" onclick="location.href='cart.php'">
          <img src="img/features/f1.png" alt="" />
          <h6>Free Shipping</h6>
        </div>
        <div class="fe-box"onclick="location.href='cart.php'">
          <img src="img/features/f2.png" alt="" />
          <h6>Online Order</h6>
        </div>
        <div class="fe-box" onclick="location.href='shop.php'">
          <img src="img/features/f3.png" alt="" />
          <h6>Save Money</h6>
        </div>
        <div class="fe-box"onclick="location.href='shop.php'">
          <img src="img/features/f4.png" alt="" />
          <h6>Promotions</h6>
        </div>
        <div class="fe-box"onclick="location.href='cart.php'">
          <img src="img/features/f5.png" alt="" />
          <h6>Happy Sell</h6>
        </div>
        <div class="fe-box"onclick="location.href='contact.php'">
          <img src="img/features/f6.png" alt="" />
          <h6>F24/7 Support</h6>
        </div>
      </div>
      
      <form action="cart.php" method="get" >
        
  <section  style="background:url('img/bg/whiteback.jpg');" class="product1" id="product1" class="section-p1">
    
  <h2 class="animate-opacity ">Featured Products</h2>
  <p id="Summer">Summer Colllection New Modern Design</p>
        <div class="pro-conti" id="">
          
        <?php foreach($tshirts as $tshirt){

           ?>
         <div class="pro" id="<?=$tshirt->id?>"  >
            <img src=<?=$tshirt->photo?> alt=""  onclick="location.href='sproduct.php?id=<?=$tshirt->id?>'">
            <div class="des" onclick="location.href='sproduct.php?id=<?=$tshirt->id?>'" >
              <span><?=$tshirt->brand?></span>
              <h5> <?=$tshirt->name?> </h5>
              <div>

              <?php for ($i=0; $i< $tshirt->rate ; $i++) { ?>
                <i class="fa fa-star" aria-hidden="true"></i>
                  <?php } ?>
                  <?php for ($j=0; $j<5-$i ; $j++) { ?>
                  <i class="far fa-star"></i>
                  <?php } ?>
              </div>
              <h5><?=$tshirt->price?><span> MAD</span></h5>
            </div>
   
    </div>
          <?php } ?>

        </div>
      </section>
      
      <section id="banner" class="section-m1">
        <div id="fixedb"></div>
        <h4>Repair Services</h4>
        <h2>Up to <span>80% Off </span>- All t-Shirts & Accessories</h2>
        <button class="normal" onclick="location.href='shop.php'">
          Explore More
        </button>
      </section>

      <section style="background:url('img/bg/whiteback.jpg');" class="product1" id="product1"   class="section-p1">
        <h2 class="animate-opacity ">T-shirt Discounts</h2>
        <p id="Summer">Summer Colllection T-shirt Discounts</p>
        <div class="pro-conti" id="">
          

           <?php foreach($tshirtsFeatured as $tshirtf){
                    
            ?>
          <div class="pro" id="<?=$tshirtf->id?>"  >
             <img src=<?=$tshirtf->photo?> alt=""  onclick="location.href='sproduct.php?id=<?=$tshirtf->id?>'">
             <div class="des" onclick="location.href='sproduct.php?id=<?=$tshirtf->id?>'" >
               <span><?=$tshirtf->brand?></span>
               <h5> <?=$tshirtf->name?> </h5>
               <div>
 
               <?php for ($i=0; $i< $tshirtf->rate ; $i++) { ?>
                 <i class="fa fa-star" aria-hidden="true"></i>
                   <?php } ?>
                   <?php for ($j=0; $j<5-$i ; $j++) { ?>
                   <i class="far fa-star"></i>
                   <?php } ?>
               </div>
               <h5><?=$tshirtf->price?><span> MAD</span></h5>
             </div>

     
     </div>
 
          <?php } ?>

        </div>
      </section>
      </form>
      <section  style="background:url('img/bg/whiteback.jpg');" id="sm-banner" class="section-m1">
        <div class="banner-row1"  onclick="location.href='blog.php'">
          <div class="banner-box">
            <h4>insane bargains</h4>
            <h2>Purchase one, receive one complimentary</h2>
            <p>
              The top-notch traditional dress is available at Fayshop on sale
            </p>
            <button >Learn more</button>
          </div>
          <div class="banner-box box2">
            <h4>spring/summer</h4>
            <h2>upcomming season</h2>
            <p>
              The top-notch traditional dress is available at Fayshop on sale
            </p>
            <button  >Learn more</button>
          </div>
        </div>
        <div class="banner-row1"  onclick="location.href='blog.php'">
          <div class="banner-box r2 r2-box1">
            <h2>SEASONAL SALE</h2>
            <p>Winter Collection -50% OFF</p>
          </div>
          <div class="banner-box r2 r2-box2">
            <h2>SEASONAL SALE</h2>
            <p>Winter Collection -50% OFF</p>
          </div>
          <div class="banner-box r2 r2-box3">
            <h2>SEASONAL SALE</h2>
            <p>Winter Collection -50% OFF</p>
          </div>
        </div>
        <div class="banner-row2"></div>
      </section>
    </div>
    <?php 
    include('headfoot/footer.php')
    ?>
  

    <!-- swiper -->
    <script src="other/package/swiper-bundle.min.js"></script>
  
    <script>
      const swiper = new Swiper(".swiper", {
        loop: true,
        grabCursor: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          650: { slidesPerView: 1 },
          768: { slidesPerView: 1 },
          1024: { slidesPerView: 1 },
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        scrollbar: {
          el: ".swiper-scrollbar",
        },
      });
      let isRunning = true;
      let x = setInterval(() => {
        if (isRunning) {
          swiper.slideNext();
        }
      }, 4000);
    </script>
     <!-- / swiper -->
    <script src="script.js"></script>
    

  </body>
</html>
