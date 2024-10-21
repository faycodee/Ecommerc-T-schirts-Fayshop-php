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
    <title>FayShop | Manager-Dashboard</title>
    <link rel="icon" href="img/logo.jpg" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
  
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />

  </head>

  <body>

  <?php
   include('../connection.php'); 
   session_start();
   $ord = "SELECT t.id, t.photo, t.brand, t.name, t.rate, t.price,
   t.category_id, t.descr, t.stock, t.gender, t.size, t.is_featured,
   t.created_at, t.updated_at, c.name as category_name
   FROM tshirts t
   JOIN categories c ON t.category_id = c.id";

  $st = $con->query($ord);
  $tshirts = $st->fetchAll(PDO::FETCH_OBJ);

   ?>
  <?php include('header.php')?>

<style>
   #cartM {
  overflow-x: auto;
}

#cartM table {
  
  border-collapse: collapse;
  table-layout: fixed;
  white-space: nowarp;
}
#cartM table img {
  width: 70px;
}
#cartM table td:nth-child(1) {
  width: 100px;
  text-align: center;
}
#cartM table td:nth-child(2) {
  width: 150px;
  text-align: center;
}
#cartM table td:nth-child(3) {
  width: 250px;
  text-align: center;
}
#cartM table td:nth-child(4),
#cartM table td:nth-child(5),
#cartM table td:nth-child(6),
#cartM table td:nth-child(7),
#cartM table td:nth-child(8),
#cartM table td:nth-child(9),
#cartM table td:nth-child(10),
#cartM table td:nth-child(12),
#cartM table td:nth-child(13),
#cartM table td:nth-child(11) {
  width: 170px;
  text-align: center;
  margin: 0 20px;
}

#cartM table td:nth-child(5) input {
  width: 70px;
  padding: 10px 5px 10px 15px;
}
#cartM table thead {
  border: 1px solid #e2e9e1;
  border-left: none;
  border-right: none;
}
#cartM table thead td {
  font-weight: 700;
  text-transform: uppercase;
  font-size: 11px;
  padding: 18px 5px;
}
#cartM table tbody td {
  padding-top: 15px;
}
#cartM table tbody td {
  font-size: 13px;
}
#cartM-add {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
#idel:hover{
    color: red;
 }
#iedi:hover{
    color: blue;
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
        .search-box input {
  height: 3.1rem;
  padding: 0 1.25em;
  font-size: 14px;
  min-width: 100%;
  width: 450px;
  border: 1px solid transparent;
  border-radius: 4px;
  outline: none;
  border-top-right-radius: 0;
  color: #000;
  border-bottom-right-radius: 0;
}

.search-box input:valid {
  color: black;
  font-weight: bold;
}
.search-box {
  transform: translate(0,40px);
  width: 50%;
}

.search-box button,
.search-box select {
  outline: none;
  background-color: var(--darkColor);
  color: #fff;
  border-radius: 4px;
  border: none;

  white-space: nowrap;
  padding: 10px 20px;
}

</style>
    <button id="totop" class="normal">
      <i class="fa fa-level-up" aria-hidden="true"></i>
    </button>
    <div id="toggle-sidebar-btn">
            <img src="../img/icon/angles-right.png" width="30px">
        </div>
        <div id="sidebar" class="sidebar">
            <ul type="square">
                <li><a href="../dashboard.php">Add tshirts</a></li>
                <li><a href="manager_dashboard.php">Manage tshirts</a></li>
            </ul>
        </div>
    <section class="about-header" id="page-header cartM">
      <h1>#Manage t-shirts !</h1>

      <div style="display: flex; padding-top: 0px" class="search-box">
            <input
              id="searchBox"
              name="search"
              type="text"
              oninput="searche()"
              placeholder="find  t-shirts ... "
            />
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
    </section>
   <form action="deleteAll.php" method="post">
   <section id="cartM" class="section-p1">
      <table id="tableM">
        <thead>
          <tr>
            <td></td>
            <td>photo</td>
            <td>id</td>
            <td>Name</td>
            <td>Brand</td>
            <td>Price</td>
            <td>Stock</td>
            <td>Discraption</td>
            <td>Rating</td>
            <td>gender</td>
            <td>size</td>
            <td>category</td>
            <td>is_featured</td>

            <td> Action</td>
          </tr>
        </thead>
        <tbody id="tbody">
         <?php foreach($tshirts as $t){ 
          
                $order = "SELECT * FROM sizes WHERE id = ?";
                $stmt = $con->prepare($order);
                $stmt->execute([$t->size]);
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

            <tr  >
            <td>
             <input type="checkbox" name="listdelete[]" value="<?=$t->id?>">
            </td>
            <td  onclick="location.href='smanage.php?id=<?=$t->id?>'"><img src="../<?=$t->photo?>" width="30px"></td>
            <td  onclick="location.href='smanage.php?id=<?=$t->id?>'"><?=$t->id?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"><?=$t->name?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"><?=$t->brand?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"><?=$t->price?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"><?=$t->stock?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"><?= strlen($t->descr)>18?substr($t->descr,0,10)."...":$t->descr?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"><?=$t->rate?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"><?=$t->gender?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"> 
              <?php foreach($validSizes as $size =>$stock ) {
                if (!isset($count)) {?>
                  <?=strtoupper($size)?> 
                 <?php $count =1; } 
                 else if (isset($count)) {?>
                 <span style="color: blue;"><b>,</b></span> <?= strtoupper($size)?> 
                 <?php } ?>
          <?php }?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"><?=$t->category_name?></td>
            <td onclick="location.href='smanage.php?id=<?=$t->id?>'"><?=$t->is_featured==1?"yes":"no"?></td>
 
            <td><center> <i id="iedi" onclick="location.href='smanage.php?id=<?=$t->id?>'" class="fas fa-edit"></i><br>
            <i id="idel"  onclick="confirm('Are you sure you want to delete <?=$t->name?> ')?document.location.href='delete.php?id=<?= $t->id ?>':''" class="fa fa-trash" aria-hidden="true"></i></center></td>
          </tr>
         <?php unset($count); }?>

        </tbody>
      </table>
      <section>
      <button type="submit" class="normal" style="transform: translate(0,25px);" onclick="return confirm('Are you sure you want to delete the selected ?')">Remove Selected</button>
    </section>
  
   </form>
    </section>
   

    <?php include('footer.php')?>
    <script src="script.js"></script>
    <script>
      function searche() {
    let word = document.getElementById('searchBox').value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", `findtshirt.php?word=${word}`, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
             let tshirts = this.responseText;
             document.getElementById("tbody").innerHTML=this.responseText

            } else {
                console.log(`Error: ${this.statusText}`);
            }
        }
    };
}
       sidebar.classList.toggle('hidden');
         document.getElementById('toggle-sidebar-btn').classList.toggle('btn0');
        document.getElementById('toggle-sidebar-btn').addEventListener("mouseover", function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
            document.getElementById('toggle-sidebar-btn').classList.toggle('btn0');
        });
    </script>

  </body>
</html>
