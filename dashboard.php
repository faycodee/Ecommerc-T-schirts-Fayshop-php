<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
        name="Description"
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="media.css" />
    
    <?php     session_start();?>
    <?php
include("connection.php");


$order = 'SELECT * FROM categories';
$st = $con->query($order);
$categories = $st->fetchAll(PDO::FETCH_OBJ);

// Check if the form was submitted
if (isset($_POST["ajouter"]) && count($_POST) >= 11) {
    
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
    echo "stock : $stock" ;
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
     $photo = $_POST["cropedimg"];
    
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
            } 
    }
    
    // <!-- -------------------------------------------------------------CROP php --------------------------------------------- -->
    try {
        $con->beginTransaction();

        $ordIns0 = $con->prepare("INSERT INTO `sizes`(`id`, `xs`, `xsStock`, `s`, `sStock`, `m`, `mStock`, `l`, `lStock`, `xl`, `xlStock`, `xxl`, `xxlStock`, `xxxl`, `xxxlStock`) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $ordIns0->execute([$sizeid, $XS, $stockXS, $S, $stockS, $M, $stockM, $L, $stockL, $XL, $stockXL, $XXL, $stockXXL, $XXXL, $stockXXXL]);
        $st0 = $ordIns0->rowCount();
        echo "st0 : " . $st0;

        if ($st0) {
            $ordIns = $con->prepare("INSERT INTO `tshirts`(`photo`, `brand`, `name`, `rate`, `price`, `category_id`, `descr`, `stock`, `gender`, `size`, `is_featured`) 
                                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $ordIns->execute([$photo, $brand, $name, $rate, $price, $category, $descr, $stock, $gender, $sizeid, $is_featured]);
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
}

?>

    <title>FayShop | Dashboard</title>
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
         appearance: none;
         border: none;
            cursor: pointer;
            position: fixed;
            z-index: 1;
            left: 190px;
            top: 135px;
            z-index: 100; 
            background-color:  white;
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
            background-color: black;
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
            text-decoration: none;

        
        }
        .sidebar ul a:hover{
           text-decoration: underline;

        
        }
        #toggle-sidebar-btn.btn0 {
            transform: translateX(-170px);
            background-color:  white;
            content: "";
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
      /* <!-- -------------------------------------------------------------CROP css --------------------------------------------- --> */
        #crop-container{
            width: 500px;
            height: 500px;
          transform: translate(330px);
          margin-bottom: 130px;
        }
        /* <!-- -------------------------------------------------------------CROP css --------------------------------------------- --> */

    </style>

</head>

<body>
    <?php include('headfoot/header.php'); ?>
    <button id="totop" class="normal">
        <i class="fa fa-level-up" aria-hidden="true"></i>
    </button>
    <section class="about-header" id="page-header cartM">
        <h1>#Add t-shirts !</h1>
    </section>
    <button id="totop" class="normal">
        <i class="fa fa-level-up" aria-hidden="true"></i>
    </button>
    <section>
        <div id="toggle-sidebar-btn">
            <img src="img/icon/angles-right.png" width="30px">
        </div>
        <div id="sidebar" class="sidebar">
            <ul type="square">
                <li><a href="dashboard.php">Add tshirts</a></li>
                <li><a href="dashboard/manager_dashboard.php">Manage tshirts</a></li>
            </ul>
        </div>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" name="name" id="name" required>
                    <label for="brand">Brand :</label>
                    <input type="text" name="brand" id="brand" required>
                    <label for="price">Price:</label>
                    <input type="number" name="price" id="price" required>
                    <label for="descr">Description:</label>
                    <textarea name="descr" id="descr" required></textarea>
                    <label for="rate">Rating :</label>
                    <select name="rate" id="rate">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5" selected>5</option>
                    </select>
                    <label for="gender">Gender :</label>
                    <select name="gender" id="gender">
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                    <label for="size">Size :</label>
                    <div class="sizess ">
                        XS<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="XS" value="XS">
                        S<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="S" value="S">
                        M<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="M" value="M"checked >
                        L<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="L" value="L" checked>
                        XL<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="XL" value="XL">
                        XXL<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="XXL" value="XXL">
                        XXXL<input type="checkbox" onclick="addstock()" class="sizes" name="sizes[]" id="XXXL" value="XXXL">
                    </div>
                    <label for="category">Category:</label>
                    <select name="category" id="category">
                        <?php
                        $count = 1;
                        foreach ($categories as $cate) {
                            echo "<option value='$count'>$cate->name</option>";
                            $count++;
                        }
                        ?>
                    </select>
                    <label for="is_featured">is_Featured ?:</label>
                    <div id="is_featured">
                        <label for="FALSE">No</label>
                        <input type="radio" name="is_featured" id="FALSE" value="0" checked>
                        <label for="TRUE">Yes</label>
                        <input type="radio" name="is_featured" id="TRUE" value="1">
                    </div>
<!-- -------------------------------------------------------------CROP html --------------------------------------------- -->
                    <label for="photo">Photo:</label>
                    <input type="file" accept="image/*" name="photo" id="image" required>

                    <!-- Section de recadrage d'image -->
                    <div id="crop-container">
                        <img id="crop-image" />
                        <div class="crop-buttons">
                            <button type="button" id="crop-button">Crop</button>
                            <button type="button" id="cancel-button">Cancel</button>
                        </div>
                    </div>

                    <br><br>
                    <input type="hidden"   name="cropedimg"  id="cropedimg">
    <!-- -------------------------------------------------------------CROP html --------------------------------------------- -->
                    <button name="ajouter" type="submit" onsubmit="validation()">Add T-Shirt</button>
                </div>
            </form>
        </div>
    </section>
    <?php include('headfoot/footer.php'); ?>
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
            $.ajax('save-cropped-image.php', {
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

 
    <script>
        function validation() {
            if (!XS.checked&&!S.checked&&!M.checked&&!L.checked&&!XL.checked&&!XXL.checked&&!XXXL.checked) {
                alert("check size ")
                return false 
            }
            return true
        }
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
         stocks.innerHTML += `<input type="number" name="stock${el.value}" required >`;
      }
   });
}

    </script>
</body>
</html>
