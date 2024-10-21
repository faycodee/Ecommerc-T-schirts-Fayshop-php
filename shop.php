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
    <title>FayShop | Shop</title>
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

  </head>
  <?php
include("connection.php");


$productsPerPage = 12; // Number of products per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Default to page 1 if not set
$offset = ($current_page - 1) * $productsPerPage; // Offset calculation for pagination

$order = "SELECT * FROM tshirts ";



$order .= " ORDER BY id LIMIT $offset, $productsPerPage";

$st = $con->query($order);
$tshirts = $st->fetchAll(PDO::FETCH_OBJ);

// Total number of products for pagination calculation
$totalProductsQuery = 'SELECT COUNT(*) AS total FROM tshirts';
$totalProductsResult = $con->query($totalProductsQuery);
$totalProducts = $totalProductsResult->fetchColumn();
$totalPages = ceil($totalProducts / $productsPerPage);



?>
    <style>
  .inp{
    text-align: center;
    border-radius: 30px;
    width: 60px;
    margin-bottom: 25px;
  }
  img{
    z-index: 1000;
  }
  .btn\+ ,.btn\-{
    
    border: 1px solid black;
    padding: 9px;
    border-radius: 50%;
    background-color: lightslategrey;
    color: white;
    text-decoration: none;

  }
  .btn0{
    color: black;
    border: 1px solid black;
    padding: 3px;
    font-size: 10px;
    border-radius: 7px;
    background-color: transparent;
    color: black;
    text-decoration: none;
  }
  .btn\-{
    color: black;
    background-color: transparent;
  }
  .activee{
    background-color: red;
    color: red;
    padding: 100px;
  }
</style>
  <body>
  <?php include('headfoot/header.php')?>
    <button id="totop" class="normal">
      <i class="fa fa-level-up" aria-hidden="true"></i>
    </button>
    <div id="body1">
      <form action="" method="get">
      <section style="background-image: url(img/banner/b2.jpg);" class="shop">
        <h1># Elevate your style. Shop now!</h1>
        <p>Save more with coupons & up to70% off !</p>
        <div class="form" >
          <!-- <div class="filter">
            <select name="" id="Sfilter" onchange="filter()">
              <option>All</option>
              <optgroup label="Category">
                <option>Children and babies</option>
                <option>man</option>
                <option>women</option>
              </optgroup>
              <optgroup label="Prix">
                <option>0-100$</option>
                <option>200$-400$</option>
                <option>+400$</option>
              </optgroup>
              <optgroup label="Manufacturer">
                <option>Nike</option>
                <option>Adidas</option>
                <option>Puma</option>
              </optgroup>
              <optgroup label="Ratings">
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </optgroup>
            </select> 
            <button>
              <i class="fa fa-filter" aria-hidden="true"></i>
            </button>
          </div> -->
          <div style="display: flex; padding-top: 0px" class="earch-box">
            <input
              id="searchBox"
              name="search"
              type="text"
              oninput="searche()"
              placeholder="search  t-shirts ... "
            />
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>
        </form>
      </section>


      <section class="product1" id="product1" class="section-p1">
        
        <div class="pro-conti" id="pro-conti">
           <?php foreach($tshirts as $tshirt){?>
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

      
      <section id="pagination" class="section-p1">
        <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
            <a   href="?page=<?=$page?>" <?=$page == $current_page ? 'class="activee"' : ''?>><?=$page?></a>
        <?php } ?>
    </section>
    </div>
  
    <?php include('headfoot/footer.php')?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="script.js"></script>
    <script>
function searche() {
    let word = document.getElementById('searchBox').value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", `other/search.php?word=${word}`, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
             let tshirts = this.responseText;
             document.getElementById("pro-conti").innerHTML=this.responseText

            } else {
                console.log(`Error: ${this.statusText}`);
            }
        }
    };
}


</script>
    <script>
      

      
      function zid(inp,id) {
      
        size = document.getElementById(`sizes${id}`).value ;
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", `other/stocksize.php?id=${id}&&size=${size}`, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                 
                    let stock = parseInt(this.responseText);
                    let input = document.getElementById(inp)
                    if (input.value == null   ) {
                           input.value = 0;
                                }
                      if (input.value > stock  ) {
                input.value = stock;
              }
                   if (isNaN(input.value)||input.value<0) {
                        input.value=0
                        }
          incrementInterval = setInterval(function() {
            if (input.value <parseInt(stock)) {
            input.value = 1 + parseInt(input.value);
          }
    }, 100)
     
                } else {
                    console.log(`Error: ${this.statusText}`);
                }
            }
        };
        
       
        }
      function n9s(inp,id) {
        let input = document.getElementById(inp)
        if (isNaN(input.value)||input.value<0) {
          input.value=0
        }
        decrementInterval = setInterval(function() {
            if (input.value >0) {
              input.value = parseInt(input.value) - 1;
          }
        
        } , 100)
      }
      function mousedown() {
        
        clearInterval(incrementInterval);
    clearInterval(decrementInterval);


      }
      function btn0(inp) {

        let input = document.getElementById(inp)
        input.value =0
        
      }

      
    </script>
<script> document.getElementById('cart-count').textContent = cartCount;</script>

<script>
function addToCart(id,qte) {
  if (qte<=0) {
    alert("Quantity must be > 0 (not empty)")
    return false
  }

  size = document.getElementById(`sizes${id}`).value ;
    if (!<?=isset($_SESSION['id']) ? 'true' : 'false'?>) {
        if (confirm("You must be logged in!")) {

            window.location.href = "login/login.php";
        } else {
            return false;
        }
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", `other/addtocart.php?id=${id}&quantity=${qte}&size=${size}`, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                 
                    alert(`${this.responseText}`);
                    CartCount(id,qte)

                 
                } else {
                    console.log(`Error: ${this.statusText}`);
                }
            }
        };
    }
}
function CartCount(id,qte) {

  size = document.getElementById(`sizes${id}`).value ;
       var xhttp = new XMLHttpRequest();
            xhttp.open("GET", `other/getcartcount.php?id=${id}&quantity=${qte}&size=${size}`, true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var totalProducts = parseInt(this.responseText );
                       if (totalProducts) {
                        document.getElementById('cart-count').textContent = totalProducts;
                      } else {
                         document.getElementById('cart-count').textContent = 0;
                        
                       }
                        return totalProducts
                    
                    } else {
                        console.log(`Error: ${this.statusText}`);
                    }
                }
            };

 let url  ="other/getcartcount.php"
}

window.onload =CartCount()

</script>

  </body>
</html>
