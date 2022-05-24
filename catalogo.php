<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link
    rel="icon"
    type="image/x-icon"
    href="../Immagini sito/trialbio finito.png"
  />
  <link rel="stylesheet" href="../home/nav.css" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
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

.header {
  background-color: #cccccc;
  color:#ddd;
  height: 520px;
  padding: 15px;
  background-image: url("Why-are-eco-friendly-houses-trending.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}


.logo{
padding-left: 1500px;
align-self: center;
position: static;
}


.footer {
  background-color: #0099cc;
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding-top: 50px;
  margin-top: 150px;
}


@media only screen and (min-width: 600px) {
  /* For tablets: */
  .header{width: 100%;}
  .logo{width: 50%;}
}
@media only screen and (min-width: 768px) {
  /* For desktop: */

  .logo{width: 100%;}
}

.menu { 
  overflow: hidden;
  background-color: #2a1bac;
}

.menu a{
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.menu a:hover {
  background-color: #ddd;
  color: black;
}

.menu a.active {
  background-color: #04AA6D;
  color: white;
}

/* Set height of the grid so .sidenav can be 100% (adjust if needed) */
.row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
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

</style>
</head>
<body>
 <nav
  class="navbar sticky-top navbar-expand-sm navbar-dark bg-success">
  <div class="container-fluid">
    <a href="../home/home.html" class="navbar-brand">
      <img
        class="d-inline-block align-text-top rounded"
        src="../Immagini sito/trialbio finito.png"
        alt=""
        width="80"
        height="80"
      />
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div
      class="collapse navbar-collapse justify-content-sm-end"
      id="navbarNav"
    >
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a
            class="nav-link active"
            href="../home/home.html"
          >
            Home
          </a>
        </li>
        <li class="nav-item active">
          <a
            class="nav-link"
            href="../catalogo.php"
          >
            Catalogo
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../dove siamo/doveSiamo.html">
            Dove Siamo
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../contattaci.html">
            Contattaci
          </a>
        </li>
        <li class="nav-item active">
          <a
            id="accedi/reg"
            class="nav-link"
            href="../login/accedi.html"
          >
            Accedi
          </a>
          <li class="nav-item active">
            <a
              id="accedi/reg"
              class="nav-link"
              href="../registrazione/index.html"
            >
              Registrati
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container-fluid">
      <div class="row content">
        <div class="col-sm-3 sidenav">
          <h4>Menu di Ricerca</h4>
          <ul class="nav nav-pills nav-stacked">
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
                           <div class='cvp'>
                            <h5 class='card-title font-weight-bold cont'>".$row['nome']."</h5>
                            <p class='card-text'>".$row['prezzo']."&euro;"."</p>
                            <a href='#' class='btn details px-auto'>view details</a><br>
                            <a href='#' class='btn cart px-auto'>ADD TO CART</a>
                           </div>
                        </div>
                      </div>
                    </div>     
                  </div>";
            if($count%4==3) echo "</div>";
            $count=$count+1;
            
             
          }?>
  </div>
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
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
    
           
        