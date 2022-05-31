<?php
function console_log( $data ){   echo '<script>';   echo 'console.log('. json_encode( $data ) .')';   echo '</script>'; }
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {

	foreach($_SESSION["shopping_cart"] as $key => $value) {

		if($_POST["idprodotto"] = $_SESSION["shopping_cart"][$key]){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		prodotti rimossi dal carrello!</div>";
		}
		if(empty($_SESSION["shopping_cart"])) unset($_SESSION["shopping_cart"]);
			}		
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
	
		foreach($_SESSION["shopping_cart"] as $key => $value) {
	
			if($_POST["idprodotto"] = $_SESSION["shopping_cart"][$key]){
			unset($_SESSION["shopping_cart"][$key]);
			$status = "<div class='box' style='color:green;'>
			acquisto completato!</div>";
			}
			if(empty($_SESSION["shopping_cart"])) unset($_SESSION["shopping_cart"]);
				}		
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

<div class="cart">
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
<td><?php echo "$".$prodotto["prezzo"]; ?></td>
<td><?php echo "$".$prodotto["prezzo"]*$prodotto["quantita"]; ?></td>
<td><?php echo "quantità rimanente:" .$prodotto["qt"];?></td>
</tr>
<?php
$total_prezzo += ($prodotto["prezzo"]*$prodotto["quantita"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_prezzo; ?></strong>
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

<div class="message_box" style="margin:10px 0px;">
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
<button type='submit' class='buy'>Completa acquisto</button>
</form>
<a href="catalogo con login.php"><button>Torna al Catalogo</button></a>
</div>
</div>
</body>
</html>