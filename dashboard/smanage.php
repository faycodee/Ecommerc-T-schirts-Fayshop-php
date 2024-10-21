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

    <link rel="icon" href="../img/icon/logo.jpg" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../media.css" />
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
      <!-- -------------------------------------------------------------CROP LINKS --------------------------------------------- --> 
  
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
  
  <!-- -------------------------------------------------------------CROP LINKS --------------------------------------------- --> 

<?php 
session_start();
?>
<style>
 .single-pro-img {
  width: 20%;
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
  width: 40%;
  transform: translateY(-100px);
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
 .single-pro-details input , .single-pro-details textarea {

  height: 47px;
  padding-left: 10px;
  font-size: 16px;
  margin-right: 10px;
  border: none;
}
 .single-pro-details input :focus {
  outline: none;
  border: none;
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
  width: 200px;
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
.btndel{
  padding: 10px;
  appearance: none;
  font-style: none;
  border-radius: 10px;
  
  font-size: 16px;
  color: red;
  border: 2px solid transparent;
  width: 20%;
  text-align: center;
  font-family: cursive;
text-decoration: none;
margin-right: 10px;
}
.btndel:hover{
  border: 2px solid red;
  padding: 6px;

}

</style>
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
.sizess input ,#is_featured input{
  width: 20px;
}
#is_featured{
  display: flex;
  align-items: center;
}
  input[type="file"]::-webkit-file-upload-button {
    visibility: hidden;
  }
  input[type="file"]::before {
    content: 'Choisir un fichier';
    display: inline-block;
    background: #007bff;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="file"]::-moz-placeholder {
    color: transparent;
  }
  input[type="file"] {  
    color: transparent;  
}
input[type="file"] {
position: absolute;
left: 15%;
top: 50%;
}

.single-pro-img:hover img{
  filter: grayscale(96%);  
}

#MainImg{
  width: 400px;
}
/* <!-- -------------------------------------------------------------CROP css --------------------------------------------- --> */
      #crop-container{
            width: 300px;
            height: 300px;
          transform: translate(30px);
          margin-top: 20px;
          
        }
        /* <!-- -------------------------------------------------------------CROP css --------------------------------------------- --> */

</style>

    </style>
<?php
        include("../connection.php");

        $order = 'select * from categories';
$st= $con->query($order);
$categories = $st->fetchAll(PDO::FETCH_OBJ);
    if (!isset($_GET['id'])) {
      header("location:../index.php");
    }
  else{
    $id_tshirt = $_GET['id'] ;
    $order = "SELECT * FROM tshirts  WHERE  id = $id_tshirt  ";
    $st= $con->query($order);
    $tshirt = $st->fetch(PDO::FETCH_OBJ);
    $ord3 = "SELECT t.* , c.id as cateid , c.name as catename FROM tshirts t,  categories c  WHERE t.id = $id_tshirt and  t.category_id = c.id ";
    $st3= $con->query($ord3);
    $tshirtcate = $st3->fetch(PDO::FETCH_OBJ);}

    $sizeid = $tshirt->size; // ضع معرف الحجم الصحيح هنا

    // استعلام لاستخراج القيم الحقيقية (True attributes) وقيم المخزون الخاصة بها
    $order = "SELECT * FROM sizes WHERE id = ?";
    $stmt = $con->prepare($order);
    $stmt->execute([$sizeid]);
    $sizes = $stmt->fetch(PDO::FETCH_OBJ);
    $saveOldphoto ="../".$tshirt->photo ;
    $validSizes = [];  

    if ($sizes->xs == '1') {  
        $validSizes['xs'] = $sizes->xsStock;  
    }  
    if ($sizes->s == '1') {  
        $validSizes['s'] = $sizes->sStock;  
    }  
    if ($sizes->m == '1') {  
        $validSizes['m'] = $sizes->mStock;  
    }  
    if ($sizes->l == '1') {  
        $validSizes['l'] = $sizes->lStock;  
    }  
    if ($sizes->xl == '1') {  
        $validSizes['xl'] = $sizes->xlStock;  
    }  
    if ($sizes->xxl == '1') {  
        $validSizes['xxl'] = $sizes->xxlStock;  
    }  
    if ($sizes->xxxl == '1') {  
        $validSizes['xxxl'] = $sizes->xxxlStock;  
    }
    
    if (isset($_POST["save"])) {
    // Check if the form was submitted

    
  $name = ucwords($_POST["name"]);
  $brand = ucfirst($_POST["brand"]);
  $price = $_POST["price"];
  $XS = isset($_POST["stockXS"]) ? '1' : '0';
  $S = isset($_POST["stockS"]) ? '1' : '0';
  $M = isset($_POST["stockM"]) ? '1' : '0';
  $L = isset($_POST["stockL"]) ? '1' : '0';
  $XL = isset($_POST["stockXL"]) ? '1' : '0';
  $XXL = isset($_POST["stockXXL"]) ? '1' : '0';
  $XXXL = isset($_POST["stockXXXL"]) ? '1' : '0';
  $stockXS = $_POST['stockXS'] ?? '';
  $stockS = $_POST['stockS'] ?? '';
  $stockM = $_POST['stockM'] ?? '';
  $stockL = $_POST['stockL'] ?? '';
  $stockXL = $_POST['stockXL'] ?? '';
  $stockXXL = $_POST['stockXXL'] ?? '';
  $stockXXXL = $_POST['stockXXXL'] ?? '';
  $stock = (int)$stockXS +(int) $stockS +(int)$stockM +(int)$stockL +(int)$stockXL +(int)$stockXXL +(int)$stockXXXL ;
  $sizeid = "";
  
  $tablA = explode(" ", "q w e r t y u l p r 8 a b A C i o p a s d f g j k l z x c v b n F m 1 2 3 4 5 6 7 8 9 Q W E R T Y U I O P A S D G H J K L Z X C V B N M");
  for ($i = 0; $i < 4; $i++) {
      $sizeid .= $tablA[rand(0, 60)];
  }

  $descr = $_POST["descr"];
  $rate = $_POST["rate"];
  $gender = $_POST["gender"];
  $category = $_POST["category"];
  $is_featured = $_POST["is_featured"];
  // <!-- -------------------------------------------------------------CROP php --------------------------------------------- -->
   $photo = $tshirt->photo;
  
      // Check if the file exists
      if (file_exists($photo)) {
          $target_dir = "img/products/man/"; // Directory where the file will be stored
          if ($gender == "female") {
             $target_dir = "img/products/femal/"; // Directory where the file will be stored
          }
          

          $fileName = basename($photo);
          $target_file = $target_dir . $fileName;
  
          // Copy the file to the specified directory
          if (copy($photo, $target_file)) {
              $photo = $target_file;
              $image_path = $saveOldphoto;

// Check if the file exists
if (file_exists($image_path)) {
    // Attempt to delete the file
    unlink($image_path);
    
 
} else {

    echo "<script>alert('Image does not exist.')</script>";
}

          } 
  }
  
  // <!-- -------------------------------------------------------------CROP php --------------------------------------------- -->
  try {
      $con->beginTransaction();
      $ordIns0 = $con->prepare("UPDATE `sizes` SET `xs`=?,
      `xsStock`=?,`s`=?,`sStock`=?,`m`=?,
      `mStock`=?,`l`=?,`lStock`=?,`xl`=?,
      `xlStock`=?,`xxl`=?,`xxlStock`=?,
      `xxxl`=?,`xxxlStock`=? WHERE id = ?");
      $ordIns0->execute([ $XS, $stockXS, $S, $stockS, $M, $stockM, $L, $stockL, $XL, $stockXL, $XXL, $stockXXL, $XXXL, $stockXXXL,$tshirt->size]);
      
      if ($ordIns0) {
      echo "WOOORK" ;
          $ordIns = $con->prepare("UPDATE `tshirts` SET `photo`=?,`brand`=?,
          `name`=?,`rate`=?,`size`=?,`price`=?,
          `category_id`=?,`descr`=?,`stock`=?,
          `gender`=?,`is_featured`=? WHERE id = ? ");      
          $ordIns->execute([$photo, $brand, $name, $rate, $price, $category, $descr, $stock, $gender, $sizeid, $is_featured ,$id_tshirt ]);
          $stOR = $ordIns->rowCount();
          if ($stOR) {
            echo "WOOORK 2" ;
          }

          if ($st && $stOR) {
              $con->commit();
              header("Location:manager_dashboard.php?success=1");
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
}

  
  $validSizesAll = $validSizes;
  $validSizes = array_keys($validSizes);
 

    ?>
  </head>

  <body>

      <?php include('header.php')?>
      <div style="background-image: url(../img/banner/b2.jpg);height: 25vh;"  class="shop">
        <h1># manage this product !</h1>
  </div>
<form action="" method="post">
    <section style="display: flex;"  class="section-p1">

      <div class="single-pro" >
        <div class="single-pro-img"  id="single-pro-img" >
        <img  src="../<?=$tshirt->photo?>" name="ophoto"  id="MainImg"  />
        <input type="file" accept="image/*" name="photo" id="image" hidden >
        </div>
       <!-- -------------------------------------------------------------CROP html --------------------------------------------- -->
     

     <!-- Section de recadrage d'image -->
     <div id="crop-container">
         <img id="crop-image" />
         <div class="crop-buttons">
             <button type="button" id="crop-button">Crop</button>
             <button type="button" id="cancel-button">Cancel</button>
         </div>
     </div>

     <br><br>
     <input type="hidden"  width="40px"  name="cropedimg"  id="cropedimg">

     <br><br><br><br>
<!-- -------------------------------------------------------------CROP html --------------------------------------------- --> 
        <div>                   
            <p><b>This tshirt created at :</b><br>
            <?=$tshirt->created_at?>.</p>
        </div>
        <div>      
            <p><b>This tshirt updated at :</b><br>
            <?=$tshirt->updated_at?>.</p>
        </div>
      </div>
      
      <div class="single-pro-details">
        <table>
          <tr>
            <td><h5 >id : </h5></td>
            <td><input readonly type="text" value="<?=$tshirt->id?>"></td>
          </tr>
          <tr>
            <td><h5 >Name : </h5></td>
            <td><input type="text" name="name" value="<?=$tshirt->name?>"></td>
          </tr>
          <tr>
            <td><h5 style="margin:35px 0;">Discraption: </h5>  </td>
            <td><textarea   type="text"  name="descr"  id="descr"required><?=$tshirt->descr?></textarea></td>
          </tr>
          <tr>
            <td> <h5>Brand :</h5></td>
            <td><input type="text" name="brand" value="<?=$tshirt->brand?>"></td>
          </tr>
          <tr>
            <td><h5>Price : </h5></td>
            <td><input type="number" name="price" value="<?=$tshirt->price?>"> <span style="font-size: 14px;" >DH</span ></td>
          </tr>
          <tr>
            <td> <h5>Gender :</h5></td>
            <td> 
              <select  class="professional-select"  name="gender" id="gender" >
                 <option value="male">male</option>
                 <option value="female">female</option>
               </select>
            </td>
          </tr>
          <tr>
            <td><h5>Category :</h5></td>
            <td> <select   class="professional-select"  name="category" id="category">
            <?php $count = 1 ;
            foreach($categories as $cate){?>
                <option value=<?=$count?>><?=$cate->name?></option>
          <?php $count += 1 ;}?>
            </select></td>
          </tr>
          <tr>
            <td> <h5>Rate :</h5></td>
            <td>
              <div class="rating" >
           <input type="hidden"  name="rate" class="rating-value"  onchange="alert(this.value)">
           <i class="fa fa-star" data-index="1"></i>
           <i class="fa fa-star" data-index="2"></i>
           <i class="fa fa-star" data-index="3"></i>
           <i class="fa fa-star" data-index="4"></i>
           <i class="fa fa-star" data-index="5"></i>
         </div></td>
          </tr>
          <tr id="trSizes">
            <td><h5>Sizes  :</h5></td>
            <td><div id="sizess" class="sizess " style="display: flex;align-items: center;">
                        XS<input type="checkbox" onclick="addstock()" class="sizes" alt="<?=isset($validSizesAll['xs'])?$validSizesAll['xs']:''?>" name="sizes[]" id="XS" value="xs">
                        S<input type="checkbox" onclick="addstock()" class="sizes" alt="<?=isset($validSizesAll['s'])?$validSizesAll['s']:''?>" name="sizes[]" id="S" value="s">
                        M<input type="checkbox" onclick="addstock()"  class="sizes" alt="<?=isset($validSizesAll['m'])?$validSizesAll['m']:''?>" name="sizes[]" id="M" value="m" >
                        L<input type="checkbox" onclick="addstock()" class="sizes" alt="<?=isset($validSizesAll['l'])?$validSizesAll['l']:''?>" name="sizes[]" id="L" value="l" >
                        XL<input type="checkbox" onclick="addstock()" class="sizes"  alt="<?=isset($validSizesAll['xl'])?$validSizesAll['xl']:''?>"name="sizes[]" id="XL" value="xl">
                        XXL<input type="checkbox" onclick="addstock()" class="sizes" alt="<?=isset($validSizesAll['xxl'])?$validSizesAll['xxl']:''?>" name="sizes[]" id="XXL" value="xxl">
                        XXXL<input type="checkbox" onclick="addstock()" class="sizes" alt="<?=isset($validSizesAll['xxxl'])?$validSizesAll['xxxl']:''?>" name="sizes[]" id="XXXL" value="xxxl">
                    </div></td>
          </tr>
         
          <tr>
            <td><h5>is_Featured?:</h5></td>
            <td><div id="is_featured">
                       
            No <input type="radio" name="is_featured" id="FALSE" value="0" <?=$tshirt->is_featured==0?"checked":""?>>
                       
            Yes <input type="radio" name="is_featured" id="TRUE" value="1" <?=$tshirt->is_featured==1?"checked":""?>>
                    </div></td>
          </tr>


        </table>   
       <div style="display: flex; align-items: center;" style="margin-top: 30px;" >
       <button class="btndel" style="background-color: red;" onclick="confirm('Are you sure you want to delete<?=$tshirt->name?> ')?document.location.href='delete.php?id=<?= $tshirt->id ?>':''">Delete</button>
       <button class="btnadd" name="save" onclick="" type="submit" >Save</button>
       </div>
   
      </div>
      
    </section>
    </form>
 
    <?php include('footer.php')?>
    <script src="script.js"></script>
   <script>
    document.getElementById("single-pro-img").addEventListener("mouseover" ,function(){
           document.getElementById("image").removeAttribute("hidden")
    } )
    document.getElementById("single-pro-img").addEventListener("mouseleave" ,function(){
           document.getElementById("image").setAttribute("hidden","")
    } )
      


   </script>
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
            width: 500,
            height: 500,
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
                    let preimg = document.getElementById("MainImg");
                    let image = document.getElementById("image");
                    cropedimg.setAttribute("value", response);
                    preimg.setAttribute("src", "../"+response);
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
    function func(id) {
    window.location.href = `sproduct.php?id=${id}`;
}

const stars = document.querySelectorAll('.fa-star');  
const ratingValue = document.querySelector('.rating-value');  

// Set default rating value to 4  
ratingValue.value = <?=$tshirt->rate?>;  

stars.forEach((star, index) => {  
  if (index < 4) {  
    star.classList.add('active');  
  }  

  star.addEventListener('click', () => {  
    const rating = parseInt(star.getAttribute('data-index'));  
    ratingValue.value = rating;  

    stars.forEach((s, i) => {  
      if (i <= index) {  
        s.classList.add('active');  
      } else {  
        s.classList.remove('active');  
      }  
    });  
  });  
});
function valueSelect(){
   let gender=document.getElementById("gender").children
   let category=document.getElementById("category").children
   let sizess=document.getElementById("sizess").children

for (let index = 0; index < gender.length; index++) {
  let option = gender[index];
  if (option.value=='<?=$tshirt->gender?>') {
    option.setAttribute("selected","")
   }
  
}
for (let index = 0; index < category.length; index++) {
  let option = category[index];

  if (option.value=='<?=$tshirt->category_id?>') {
    option.setAttribute("selected","")
   }
  
}
for (let index = 0; index <sizess.length; index++) {
  let cheackbox = sizess[index];
  if (cheackbox.value=='<?=isset($validSizes[0])?$validSizes[0]:""?>') {
    cheackbox.setAttribute("checked","")
   }
   
  else if (cheackbox.value=='<?=isset($validSizes[1])?$validSizes[1]:""?>') {
    cheackbox.setAttribute("checked","")
   }
   
  else if (cheackbox.value=='<?=isset($validSizes[2])?$validSizes[2]:""?>') {
    cheackbox.setAttribute("checked","")
   }
   
  else if (cheackbox.value=='<?=isset($validSizes[3])?$validSizes[3]:""?>') {
    cheackbox.setAttribute("checked","")
   }
   
  else if (cheackbox.value=='<?=isset($validSizes[4])?$validSizes[4]:""?>') {
    cheackbox.setAttribute("checked","")
   }
   
  else if (cheackbox.value=='<?=isset($validSizes[5])?$validSizes[5]:""?>') {
    cheackbox.setAttribute("checked","")
   }
   
  else if (cheackbox.value=='<?=isset($validSizes[6])?$validSizes[6]:""?>') {
    cheackbox.setAttribute("checked","")
   }
   
 
  

}


}
let selectedSizes = new Set();  

        function addstock() {  

            let trSizes = document.getElementById("trSizes");  
            let checkboxs = document.getElementsByClassName('sizes');  

            Array.from(checkboxs).forEach(el => {  
                if (el.checked && !selectedSizes.has(el.value)) {  
                    selectedSizes.add(el.value);  
                  
                    let tr = `<tr><td><h5> Stock ${el.value}:</h5></td><td><input type="number"  value="${el.alt}" name="stock${el.value.toUpperCase()}" required></td></tr>`;  
                    trSizes.insertAdjacentHTML('afterend', tr);  
                    trSizes = trSizes.nextElementSibling;  
                } else if (!el.checked && selectedSizes.has(el.value)) {  
                    while (trSizes && !trSizes.querySelector(`input[name=stock${el.value}]`)) {  
                        trSizes = trSizes.nextElementSibling;  
                    }  
                    if (trSizes) {  
                        trSizes.remove();  
                        selectedSizes.delete(el.value);  
                    }  
                }  
            });  
        }  
 
  window.onload = valueSelect()
  window.onload = addstock()
    </script>

  </body>
</html>
