<?php
      $dbhost ="localhost:3306";
      $dbuser = "user";
      $dbpass= "admin";
      $db = "trialbio";
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
      
      $status="";
      if (isset($_POST['idprodotto'])){
      $code = $_POST['idprodotto'];    
      $sql= 'SELECT * FROM prodotto';
      $retval = mysqli_query($conn, $sql);
          
       if(! $retval ) {
            die('Could not get data: ' . mysqli_error());
           }

       $row = mysqli_fetch_assoc($retval);
       $nome = $row['name'];
       $idprodotto = $row['idprodotto'];
       $prezzo = $row['prezzo'];
       $immagine = $row['immmagine'];

       $cartArray = array(
       $idprodotto=>array(
        'nome'=>$nome,
        'code'=>$idprodotto,
        'prezzo'=>$prezzo,
        'quantity'=>1,
        'immainge'=>$immagine)
        );


        if(empty($_SESSION["shopping_cart"])) {
            $_SESSION["shopping_cart"] = $cartArray;
            $status = "<div class='box'>Product is added to your cart!</div>";
        }else{
            $array_keys = array_keys($_SESSION["shopping_cart"]);
            if(in_array($code,$array_keys)) {
            $status = "<div class='box' style='color:red;'>
            Product is already added to your cart!</div>";	
            } else {
            $_SESSION["shopping_cart"] = array_merge(
            $_SESSION["shopping_cart"],
            $cartArray
            );
            $status = "<div class='box'>Product is added to your cart!</div>";
            }
        
            }
        }
        ?>
        <body>
        <?php
           $result = mysqli_query($con,"SELECT * FROM `products`");
            while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['code']." />
    <div class='image'><img src='".$row['image']."' /></div>
    <div class='name'>".$row['name']."</div>
    <div class='price'>$".$row['price']."</div>
    <button type='submit' class='buy'>Buy Now</button>
    </form>
    </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
          
