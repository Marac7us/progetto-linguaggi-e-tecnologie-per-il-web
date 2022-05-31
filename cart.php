<?php
function console_log( $data ){   echo '<script>';   echo 'console.log('. json_encode( $data ) .')';   echo '</script>'; }
session_start();
include('db.php');
$status="";
$x=-1;
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {

	foreach($_SESSION["shopping_cart"] as $key => $value) {
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		prodotti rimossi dal carrello!</div>";
		}
		if(empty($_SESSION["shopping_cart"])) unset($_SESSION["shopping_cart"]);
			}		
		}


if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['idprodotto'] == $_POST["idprodotto"]){
        $value['quantita'] = $_POST["quantita"];
        break; 
    }
}
  	
}

if (isset($_POST['action']) && $_POST['action']=="buy"){
	if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $product){
			console_log($product['qt']-$product['quantita']);
			$id=$product['idprodotto'];
			$y=$product['qt']-$product['quantita'];
			$sql="UPDATE prodotto SET quantita='$y' WHERE idprodotto='$id'";
			$retval = mysqli_query($con, $sql);
		}
	
		foreach($_SESSION["shopping_cart"] as $key => $value) {
			unset($_SESSION["shopping_cart"][$key]);
			$status = "<div class='box' style='color:green;'>
			acquisto completato!</div>";
			}
			if(empty($_SESSION["shopping_cart"])) unset($_SESSION["shopping_cart"]);
				}		
			}
	
	
	if (isset($_POST['action']) && $_POST['action']=="change"){
	  foreach($_SESSION["shopping_cart"] as $product){
		if($product['idprodotto'] == $_POST["idprodotto"]){
			$product['quantita'] = $_POST["quantita"];
			break; 
		}
	}
		  
	}
?>
<html>
<head>
<title>Carrello</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	body{
		background-image: url("Abstract Floral Green Background Vector Illustration.png");
	}
	.container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    background-color: rgba(255, 255, 255,0.8);
}
</style>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Carrello</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}

?>

<div class="cart container-fluid">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_prezzo = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>quantita</td>
<td>UNIT prezzo</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $prodotto){
?>
<tr>
<?php
echo "<td><img src=' data:image/jpg;base64,".base64_encode($prodotto['immagine'])."' width='50' height='40' /></td>"
?>
<td><?php echo $prodotto["nome"]; ?><br />

</td>
<td>
<form method='post' action=''>
<input type='hidden' name='idprodotto' value="<?php echo $prodotto["idprodotto"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantita' class='quantita' onchange="this.form.submit()">
<option <?php if($prodotto["quantita"]==1) echo "selected";?> value="1">1</option>
<option <?php if($prodotto["quantita"]==2) echo "selected";?> value="2">2</option>
<option <?php if($prodotto["quantita"]==3) echo "selected";?> value="3">3</option>
<option <?php if($prodotto["quantita"]==4) echo "selected";?> value="4">4</option>
<option <?php if($prodotto["quantita"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "€".$prodotto["prezzo"]; ?></td>
<td><?php echo "€".$prodotto["prezzo"]*$prodotto["quantita"]; ?></td>
<td><?php echo "quantità disponibile:" .$prodotto["qt"];?></td>
<td><?php echo "quantità rimanente:" .$prodotto['qt']-$prodotto['quantita'];
$x=$prodotto['qt']-$prodotto['quantita'];

if($x<0)$status = "<div class='box' style='color:red;'>
non ci sono abbastanza prodotti!</div>";?></td>
</tr>
<?php
$total_prezzo += ($prodotto["prezzo"]*$prodotto["quantita"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "€".$total_prezzo; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Il tuo carrello è vuoto!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px; background-color: rgba(255, 255, 255,0.8);">
<?php echo $status; ?>
</div>


<br /><br />
<div class="col-sm">
<form method='post' action=''>
<input type='hidden' name='idprodotto' value="<?php echo $prodotto["idprodotto"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Rimuovi prodotti</button>
</form>
</div>
<div class="col-sm">
<form method='post' action=''>
<input type='hidden' name='idprodotto' value="<?php echo $prodotto["idprodotto"]; ?>" />
<input type='hidden' name='action' value="buy" />
<button type='submit' class='buy' name='qfin' <?php if ($x < 0){ ?> disabled <?php   } ?>>Completa acquisto</button>
</form>
<a href="catalogo con login.php"><button>Torna al Catalogo</button></a>
</div>
</div>

<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>

<footer
class="bg-success text-white text-center"
style="position: relative; bottom: 0; right: 0; left: 0; margin-top: 40px;"
>
<div
  class="container p-4"
  style="position: relative; bottom: 0; right: 0; left: 0"
>
  <div class="row">
    <div class="col">
      <div class="Informazioni_label text-uppercase">
        <strong>Informazioni</strong>
      </div>
      <div>
        Viale dello Scalo di San Lorenzo, 82, 00159 ROMA (RM)
      </div>
      <div>P.IVA 33333333333
        <span>Cap. Sociale 10000,00$</span>
      </div>
      <div>06 33333333</div>
      <div> Emanuele Napoli 1852442  Luca Gennarelli 1919725</div>
    </div>          
</footer>
</body>
</html>