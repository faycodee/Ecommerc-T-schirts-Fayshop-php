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

    <title>FayShop - Product</title>
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="package/swiper-bundle.min.css" />
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />
<?php 
session_start();
?>
    <style>
 .single-pro-img {
  width: 40%;
  margin-right: 50px;
}
.small-img-group {
  display: flex;
  justify-content: space-between;
}
.small-img-col {
  flex-basis: 24%;
  cursor: pointer;
}

 .single-pro-details {
  display: flex;
  flex-direction: column;
  width: 70%;
  transform: translateY(-100px);

}
 .single-pro-details h4 {
  padding: 0 0 20px 0;
  color: #000; margin-top: 150px;
}
 .single-pro-details h2 {
  font-size: 26px;
  color: var(--darkColor);
}
 .single-pro-details select {
  margin: 20px 0 10px 0;
  display: block;
  padding: 5px 10px;
}
 .single-pro-details input {
  width: 50px;
  height: 47px;
  padding-left: 10px;
  font-size: 16px;
  margin-right: 10px;
}
 .single-pro-details input :focus {
  outline: none;
}
 .single-pro-details button {
  background-color: var(--darkColor);
  color: #fff;
}
 .single-pro-details span {
  line-height: 25px;

}
#body2 #back {
  position: fixed;
  top: 100px;
  left: 20px;
  padding: 4px 14px;
}
    </style>
    <style>
  .inp{
    text-align: center;
    border-radius: 10%;
    width: 60px;
    height: 60px;
    padding: 10px;
    border: #000 solid 2px;
    margin-left: 5px;
  
  }
  img{
    z-index: 1000;
  }



  .btn\+ ,.btn\-{
    border: #000 solid 1px;
   padding: 7px;
   text-decoration: none;
   appearance: none;
   color: #000;
   font-size: 20px;
   font-weight: bold;
   cursor: pointer;
   transition: .2s;
  }
  .btn\+:active{
  color: #2995D9;
  padding: 6px;
  margin: 1px;
  }
  .btn\-:active{
  color: red;
  padding: 6px;
  margin: 1px;
  }
  .Product-Details{
    margin: 0 0 80px 70px;
    transform: translate(0,-60px);
    width: 80%;
  }

  .Product-Details h4{
   font-weight: bold;
  }
  .professional-select {
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 10px;
  background-color: #f9f9f9;
  font-size: 16px;
  color: #333;
  transform: translate(0,-10px);
  width: 100px;
  outline: none;
}

.professional-select:hover {
  border-color: #2995D9;

}

.professional-select:focus {
  border-color: #074E8C;
}

.professional-select option {
  
  background-color: transparent;
  color: #333;
}

.professional-select option:hover {
  background-color: #e5e5e5;
}
.btnadd{
  padding: 10px;
  appearance: none;
  font-style: none;
  border-radius: 10px;
  background-color: #2995D9;
  font-size: 16px;
  color: white;
  border: 2px solid transparent;
  width: 90%;
  text-align: center;
  font-family: cursive;
text-decoration: none;
}
.btnadd:hover{
  border: 2px solid #2995D9;
  background-color: transparent;
  color: #333;

}
</style>
<?php
        include("connection.php");
    if (!isset($_GET['id'])) {
      header("location:index.php");
    }
  else{
    $id_tshirt = $_GET['id'] ;
    $order = "SELECT * FROM tshirts  WHERE  id = $id_tshirt  ";
    $st= $con->query($order);
    $tshirt = $st->fetch(PDO::FETCH_OBJ);
// if( $tshirt ){
//   print_r( $tshirt );

// }else {
//   echo "false";
// }
    $order2 = "SELECT DISTINCT t.* ,c.name as catename ,t.id as tid FROM tshirts t, categories c  WHERE t.category_id  = $tshirt->category_id and t.id != $id_tshirt and t.category_id = c.id  ";
    $st2= $con->query($order2);

    $tshirtReco = $st2->fetchAll(PDO::FETCH_OBJ);
    
    $ord3 = "SELECT t.* , c.id as cateid , c.name as catename FROM tshirts t,  categories c  WHERE t.id = $id_tshirt and  t.category_id = c.id ";
    $st3= $con->query($ord3);
    $tshirtcate = $st3->fetch(PDO::FETCH_OBJ);}

    $sizeid = $tshirt->size; // ضع معرف الحجم الصحيح هنا

    // استعلام لاستخراج القيم الحقيقية (True attributes) وقيم المخزون الخاصة بها
    $order = "SELECT * FROM sizes WHERE id = ?";
    $stmt = $con->prepare($order);
    $stmt->execute([$sizeid]);
    $sizes = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($sizes) {
    
        $validSizes = [];
    
        if ($sizes['xs'] == '1') {
            $validSizes['xs'] = $sizes['xsStock'];
        }
        if ($sizes['s'] == '1') {
            $validSizes['s'] = $sizes['sStock'];
        }
        if ($sizes['m'] == '1') {
            $validSizes['m'] = $sizes['mStock'];
        }
        if ($sizes['l'] == '1') {
            $validSizes['l'] = $sizes['lStock'];
        }
        if ($sizes['xl'] == '1') {
            $validSizes['xl'] = $sizes['xlStock'];
        }
        if ($sizes['xxl'] == '1') {
            $validSizes['xxl'] = $sizes['xxlStock'];
        }
        if ($sizes['xxxl'] == '1') {
            $validSizes['xxxl'] = $sizes['xxxlStock'];
        }
    
    } 
    ?>
  </head>

  <body>

      <?php include('headfoot/header.php')?>
      <div style="background-image: url(img/banner/b2.jpg);height: 25vh;"  class="shop">
        <h1># Shop now!</h1>
  </div>

    <section style="display: flex;"  class="section-p1">

      <div  class="single-pro-img">
        <img  src=<?=$tshirt->photo?>  width="100%" id="MainImg" />
        <div class="small-img-group">

        <?php for ($index=0; $index<4; $index++) {
          if (isset($tshirtReco[$index]->photo)) { ?>
          <div  class="small-img-col">
            <img
              src=<?=$tshirtReco[$index]->photo?>
              width="100%"
              class="small-img"
              onclick="func(<?=$tshirtReco[$index]->tid?>)"
            />
          </div>
          
          <?php   }} ?>
        </div>
      </div>
      <div class="single-pro-details">
        <h4><?=$tshirt->name?> </h4>
        <h2><?=$tshirt->price?>DH</h2>
        <h5>Brand :<?=$tshirt->brand?></h5>
        <h5>Gender :<?=$tshirt->gender?></h5>
        <h5>Rate : <?php for ($i=0; $i< $tshirt->rate ; $i++) { ?>
                <i class="fa fa-star" aria-hidden="true"></i>
                  <?php } ?>
                  <?php for ($j=0; $j<5-$i ; $j++) { ?>
                  <i class="far fa-star"></i>
                  <?php } ?></h5>
          <h5>Category :<?=$tshirtcate->catename?></h5>
         <div style="display: flex; align-items: center;"> <h5>Sizes Available :</h5>
          <select class="professional-select" id="sizes<?=$id_tshirt?>">
          <?php foreach($validSizes as $size => $stock) { ?>
          <option value="<?=($size)?>"><?=strtoupper($size)?></option>
          <?php }?>
        </select></div>


        <div style="display: flex;justify-content: center;height: 50px;width: 200px;margin-bottom: 20px;align-items: center;">  <a class="btn-"  onmousedown="n9s('inp<?=$id_tshirt?>')"  onmouseup="mousedown()">-</a>
     <input readonly onclick="btn0('inp<?=$id_tshirt?>')" type="text" pattern="^[1-9]{1,}$" class="inp" id="inp<?=$id_tshirt?>" value="0"/>
     <a class="btn+" onmousedown="zid('inp<?=$id_tshirt?>',<?=$id_tshirt?>)"  onmouseup="mousedown()">+</a></div>
     <a class="btnadd"  onclick="addToCart(<?=$id_tshirt?>,document.getElementById('inp<?=$id_tshirt?>').value)" >Add to Cart <i class="fal fa-shopping-cart"></i></a>
   
      </div>
      
    </section>
    <div class="Product-Details">
       <h4>Product Details :</h4>
        <span>
        <?=$tshirt->descr?> 
        </span>
    </div>
    
 
    <?php include('headfoot/footer.php')?>
    <script src="script.js"></script>
   
    <script>
    function func(id) {
    window.location.href = `sproduct.php?id=${id}`;
}
      function zid(inp,id) {

        let size =  document.getElementById(`sizes${id}`).value ;

var xhttp = new XMLHttpRequest();
xhttp.open("GET",`other/stocksize.php?id=${id}&&size=${size}`,true);
xhttp.send();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
        if (this.status == 200) {
            let stock = parseInt(this.responseText);
            let input = document.getElementById(inp)
            if (input.value == null ) {
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
    
      function n9s(inp) {
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
var xhttp = new XMLHttpRequest();
     xhttp.open("GET", `other/getcartcount.php?id=${id}&quantity=${qte}`, true);
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
<script> document.getElementById('cart-count').textContent = cartCount;</script>
 


  </body>
</html>
