<?php
session_start();
$dbn = "mysql:host=localhost;dbname=fayshop";
$user = "root";
$pass = "";
$con = new PDO($dbn, $user, $pass);

$order = "SELECT t.id, t.photo, t.brand, t.name , t.rate, t.price,
   t.category_id, t.descr, t.stock, t.gender, t.size, t.is_featured,
   t.created_at, t.updated_at, c.name as category_name
   FROM tshirts t
   JOIN categories c ON t.category_id = c.id";
// -------
if (isset($_GET['word']) && !empty($_GET['word'])) {
    $s = $_GET['word'];
    $order .= " WHERE t.name LIKE '%$s%' OR t.rate LIKE '%$s%' OR t.brand LIKE '%$s%' OR t.price LIKE '%$s%' OR t.descr LIKE '%$s%' OR t.gender LIKE '%$s%' OR t.size LIKE '%$s%'";
    $order .= " ORDER BY t.id";
}
$st = $con->query($order);
$tshirts = $st->fetchAll(PDO::FETCH_OBJ);
// ------
     foreach($tshirts as $t){ 
          
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
        
        } ?>

     <tr>
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

        <td><center> <i id="iedi" onclick="document.location.href='edit.php?id=<?= $t->id ?>'" class="fas fa-edit"></i><br>
        <i id="idel"  onclick="confirm('Are you sure you want to delete <?=$t->name?> ')?document.location.href='delete.php?id=<?= $t->id ?>':''" class="fa fa-trash" aria-hidden="true"></i></center></td>
      </tr>

<?php unset($count); } ?>
<!-- --------- -->






