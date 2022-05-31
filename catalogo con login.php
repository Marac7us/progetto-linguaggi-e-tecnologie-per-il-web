<?php
function console_log( $data ){   echo '<script>';   echo 'console.log('. json_encode( $data ) .')';   echo '</script>'; }
session_start();
include('db.php');
$status="";
if (isset($_POST['idprodotto']) && $_POST['idprodotto']!=""){
$idprodotto = $_POST['idprodotto'];
$result = mysqli_query($con,"SELECT * FROM `prodotto` WHERE `idprodotto`='$idprodotto'");
$row = mysqli_fetch_assoc($result);
$nome = $row['nome'];
$idprodotto = $row['idprodotto'];
$prezzo = $row['prezzo'];
$immagine = $row['immmagine'];

$cartArray = array(
	$idprodotto=>array(
	'nome'=>$nome,
	'idprodotto'=>$idprodotto,
	'prezzo'=>$prezzo,
	'quantita'=>1,
	'immagine'=>$immagine)
);
if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($idprodotto,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
	console_log($_SESSION);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<script src="js\jquery-3.6.0.min.js"></script>
<script src="js\bootstrap.min.js"></script>
<link
    rel="icon"
    type="image/x-icon"
    href="../Immagini sito/trialbio finito.png"
  />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
body{
    background:#E0E0E0;
}
.details {
            border: 1.5px solid grey;
            color: #212121;
            width: 100%;
            height: auto;
            box-shadow: 0px 0px 10px #212121;
        }

        .cart {
            background-color: #212121;
            color: white;
            margin-top: 10px;
            font-size: 12px;
            font-weight: 900;
            width: 100%;
            height: 39px;
            padding-top: 9px;
            box-shadow: 0px 5px 10px  #212121;
        }

        .card {
            width: fit-content;
        }

        .card-body {
            width: fit-content;
        }

        .btn {
            border-radius: 0;
        }

        .img-thumbnail {
            border: none;
        }

        .card {
            box-shadow: 0 20px 40px rgba(0, 0, 0, .2);
            border-radius: 5px;
            padding-bottom: 10px;
        }
        * {
  box-sizing: border-box;
}
.mySlides {display: none;}
.catimg {
  width: 250px !important; 
  height: 250px !important;
  object-fit: cover;
  vertical-align: middle;}


[class*="col-"] {/* elementi di classe col- inseriti da sinistra verso destra con padding 15 pixel*/
  float: left;
  padding: 15px;
}/*Se COMMENTO QUESTO CSS LA PAGINA FUNZIONA IN MODO STRANO*/

html {
  font-family: "Lucida Sans", sans-serif;
}

@media only screen and (min-width: 600px) {
  /* For tablets: */
}
@media only screen and (min-width: 768px) {
  /* For desktop: */

}



/* Set height of the grid so .sidenav can be 100% (adjust if needed) */
.row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .column{
        width:100%;
        height: 50%;
      }
    }
  .cvp{
    font-weight: bold;
  }
  h5{
    font-weight: bolder;
  }


  .column {
  float: left;
  width: 25.00%;
  padding: 15px;
  text-align: center;
}
.cont{
  height: 50px;
}
.filter{
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

.nav {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
  padding-top: 20px;
  }
  .navbar-brand {
  float: left;
  height: 100px;
  width: 100px;
  padding: 15px 15px;
  font-size: 18px;
  line-height: 20px;
}
.nav2 {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
  padding-top: 50px;
  }
  .iconac{
    padding-top: 10px;
  }

</style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgb(26, 114, 26)">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="../home/home con login.php">
          <img
            class="d-inline-block align-text-top rounded navbar-brand"
            src="../Immagini sito/trialbio finito.png"
            alt=""
            width="80"
            height="80"
          />
        </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../home/home con login.php">Home</a></li>
        <li><a href="../catalogo con login.php">Catalogo</a></li>
        <li><a href="../dove siamo/dovesiamo con login.php">Dove trovarci</a></li>
        <li><?php
          if(!empty($_SESSION["shopping_cart"])) {
          $cart_count = count(array_keys($_SESSION["shopping_cart"]));
          ?>
          <div class="cart_div">
          <a href="cart.php"><img class="iconac" src="cart-icon.png"> <span><?php echo $cart_count; ?></span></a>
          </div>
          <?php
          }?></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../home/home.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      </ul>
    </div>
  </div>
  </nav>

    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav">
          <h4>Menu di Ricerca</h4>
          <ul class="nav nav-pills nav-stacked nav2">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="filtri">
             <li class="active"><input type="submit" class ="filter" value="tutti" name="tuttibtn"></li>
             <li><input type="submit" class ="filter" value="cucina" name="cucinabtn"></li>
             <li><input type="submit" class ="filter" value="cura personale" name="curapersabtn"></li>
             <li><input type="submit" class ="filter" value="makeup" name="makeupbtn"></li>
            </form>
          </ul><br>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cerca prodotto...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
        </div>
    
      <div class="col-sm-9">
          <br><br>
          <br><br>
          <h2>Catalogo</h2>
          <hr>

          <?php
          
          $dbhost ="localhost:3306";
          $dbuser = "user";
          $dbpass= "admin";
          $db = "trialbio";
          
          
          $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
          
          $sql= 'SELECT * FROM prodotto';
          if(isset($_POST['cucinabtn'])) $sql .= " where tags='cucina'";
          if(isset($_POST['curapersabtn'])) $sql .= " where tags='cura personale'";
          if(isset($_POST['makeupbtn'])) $sql .= " where tags='makeup'";
          $retval = mysqli_query($conn, $sql);
          
          if(! $retval ) {
            die('Could not get data: ' . mysqli_error());
           }
          $count=0;

           while($row= mysqli_fetch_array($retval)){
            
            if($count%4==0) echo "<div class='row'>";
            echo "<div class='column col-sm'>";
             echo"  <div class='container-fluid'>
                      <div class='card mx-auto col-md-3 col-10 mt-5'>
                        <img class='mx-auto img-thumbnail catimg' src='data:image/jpg;base64,".base64_encode($row['immmagine'])."' width='auto' height='auto'/>
                        <div class='card-body text-center mx-auto'>
                           <div class='cvp'>";
                      echo "<form method='post'  action=''>
                            <input type='hidden' name='idprodotto' value=".$row['idprodotto']." />";
                      echo "<h5 class='card-title font-weight-bold cont'>".$row['nome']."</h5>
                            <p class='card-text'>".$row['prezzo']."&euro;"."</p>
                            <button href='#' type='submit' class='btn cart px-auto buy' value='buy'>ADD TO CART</button>
                            </form>
                           </div>
                        </div>
                      </div>
                    </div>     
                  </div>";
            if($count%4==3) echo "</div>";
            $count=$count+1;
            
             
          }?>
  </div>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
    
           
        