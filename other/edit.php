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

    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../media.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>FayShop | Manager-Edite</title>
    <link rel="icon" href="img/logo.jpg" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="package/swiper-bundle.min.css" />
 

    <?php
include("../connection.php"); 
session_start();
$order = 'select * from categories';
$st= $con->query($order);
$categories = $st->fetchAll(PDO::FETCH_OBJ);

// Check if the form was submitted

if (isset($_GET["id"]) ) {
   
        
    
    $id =$_GET['id'];
    $ord = "SELECT t.id, t.photo, t.brand, t.name, t.rate, t.price,t.category_id, t.descr, t.stock, t.gender, t.size, t.is_featured,t.created_at, t.updated_at, c.name as category_name FROM tshirts t
    JOIN categories c ON t.category_id = c.id WHERE t.id=$id ";
    
    $st = $con->query($ord);
    $tshirt = $st->fetch(PDO::FETCH_OBJ);
    
}
try {
    $con->beginTransaction();

    // Préparation de la mise à jour dans la table `sizes`
    $ordIns0 = $con->prepare("UPDATE `sizes` 
                              SET `xs` = ?, `xsStock` = ?, `s` = ?, `sStock` = ?, `m` = ?, `mStock` = ?, `l` = ?, `lStock` = ?, `xl` = ?, `xlStock` = ?, `xxl` = ?, `xxlStock` = ?, `xxxl` = ?, `xxxlStock` = ? 
                              WHERE `id` = ?");
    $ordIns0->execute([$XS, $stockXS, $S, $stockS, $M, $stockM, $L, $stockL, $XL, $stockXL, $XXL, $stockXXL, $XXXL, $stockXXXL, $sizeid]);
    $st0 = $ordIns0->rowCount();
    echo "st0 : " . $st0;

    if ($st0) {
        // Préparation de la mise à jour dans la table `tshirts`
        $ordIns = $con->prepare("UPDATE `tshirts` 
                                 SET `photo` = ?, `brand` = ?, `name` = ?, `rate` = ?, `price` = ?, `category_id` = ?, `descr` = ?, `stock` = ?, `gender` = ?, `size` = ?, `is_featured` = ? 
                                 WHERE `id` = ?");
        $ordIns->execute([$photo, $brand, $name, $rate, $price, $category, $descr, $stock, $gender, $sizeid, $is_featured, $tshirt_id]);
        $st = $ordIns->rowCount();
        echo "st : " . $st;

        if ($st && $st0) {
            $con->commit();
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit;
        } else {
            $con->rollBack();
        }
    } else {
        $con->rollBack();
    }
} catch (PDOException $e) {
    $con->rollBack();
    echo "Erreur : " . $e->getMessage();
}


?>



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <style>
        
        section{
            padding-top: 10px;
            display: flex;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-size: contain;
        }
        .container {
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
        .form-group button:hover{
            background-color: #333;
            color: #ddd;
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
        
        #is_featured {
            display: flex;
            flex-direction: row;
            width: 280px;
        }
        label{
            font-weight: bold;
        }
        small{
            color: #474747;
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

    </style>
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
</style>

    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../media.css" />
  </head>

  <body>
  <?php include('header.php');
  ?>
   <section class="about-header" id="page-header cartM">
      <h1>#Edite t-shirts !</h1>
    </section>
    <button id="totop" class="normal">
      <i class="fa fa-level-up" aria-hidden="true"></i>
    </button>
    <section>

<div  id="toggle-sidebar-btn"><img src="../img/icon/angles-right.png" width="30px"></div>

    <div id="sidebar" class="sidebar">
       <ul type="square">
        <li><a href="../dashboard.php">Add tshirts</a></li>
        <li><a href="manager_dashboard.php">Manage tshirts</a></li>
       </ul>
    </div>
    <div class="container">

   <form action="" method="post"  enctype="multipart/form-data">
   <div class="form-group">
        <label for="name" >Name :</label>
        <input type="text"name="name" value="<?=$tshirt->name?>"  id="name" required>
        <label for="brand" >Brand :</label>
        <input type="text" name="brand"id="brand"value="<?=$tshirt->brand?>" required>
        <label for="price" >Price:</label>
        <input type="number" name="price" value="<?=$tshirt->price?>" id="price"required>
        <!-- <label for="stock" >Stock:</label>
        <input type="number" name="stock" value="<?=$tshirt->stock?>" id="stock"required> -->
        <label for="descr"  >discraption:</label>
        <textarea type="text"  name="descr"  id="descr"required><?=$tshirt->descr?></textarea> 
        <label for="rate" > Rating (<small>old rate=<?=$tshirt->rate?></small>):</label>
        <select value=""  name="rate" id="rate" >
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4" >4</option>
            <option value="5" selected>5</option>
        </select>
        <label for="gender" >Gender (<small>old gender=<?=$tshirt->gender?></small>):
        <select  name="gender" id="gender" >
            <option value="male">male</option>
            <option value="female">female</option>
            </select>
            <label for="size" >Size :</label>
        
        <div class="sizess">
        XS<input type="checkbox" onclick="addstock()" class="sizes"  name="sizes[]" id="XS" value="XS"> 
        S<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]"  id="S" value="S">
       M<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="M" value="M">
        L<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="L" value="L" selected>
        XL<input type="checkbox" onclick="addstock()"  class="sizes" name="sizes[]" id="XL" value="XL">
        XXL<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="XXL" value="XXL">
        XXXL<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="XXXL" value="XXXL">
        </div>
        <div id="stocks">

        </div>
        <label for="category" >Category(<small>old category=<?=$tshirt->category_name?></small>):</label>
        <select   name="category" id="category">
            
        <?php $count = 1 ;
        foreach($categories as $cate){?>
            <option value=<?=$count?>><?=$cate->name?></option>
      <?php $count += 1 ;}?>
        </select>
        <label for="is_featured" >is_Featured (<small>old respons=<?=$tshirt->is_featured==1?'yes':'no'?></small>)?:</label>
        <div id="is_featured">
        <label for="FALSE" >No</label>
        <input  type="radio" name="is_featured" id="FALSE" value=0 checked>
        <label for="TRUE" >Yes</label>
        <input  type="radio" name="is_featured" id="TRUE" value=1>
        </div>
</select>

            <label for="photo"  >Photo (<small>old path photo=<?=$tshirt->photo?></small>):</label>
            <input type="file"  accept="image/*" name="photo" id="photo"  value="<?=$tshirt->photo?>">
            <br><br>
        <button  name="ajouter" type="submit">Save</button>
    </div>
   </form>
</div>
</section>
    <?php include('footer.php')?>

    <script>
                sidebar.classList.toggle('hidden');
            document.getElementById('toggle-sidebar-btn').classList.toggle('btn0');
        document.getElementById('toggle-sidebar-btn').addEventListener("mouseover", function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
            document.getElementById('toggle-sidebar-btn').classList.toggle('btn0');
  });
  function addstock() {    
                
                let stocks = document.getElementById("stocks");
                stocks.innerHTML=""
       let checkboxs = document.getElementsByClassName('sizes');
       Array.from(checkboxs).forEach(el => {
          if (el.checked) {
            
             stocks.innerHTML += `<label for="stock${el.value}"> Stock ${el.value}  :</label> `;
             stocks.innerHTML += `<input type="number" name="stock${el.value}" required>`;
          }
       });
    }
    </script>
  </body>
</html>