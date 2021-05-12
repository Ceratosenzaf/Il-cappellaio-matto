<!DOCTYPE html>
<html>
<head>
    <title>Product page</title>
    <link rel="icon" href="/Il-cappellaio-matto/resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/index.css">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/product-page.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top justify-content-between">
      <div class="container">
        <a class="navbar-brand" href="/Il-cappellaio-matto/index.php">
          <img class="navbar-logo" src="/Il-cappellaio-matto/resources/logo-white.png">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav" id="pages">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/Il-cappellaio-matto/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Il-cappellaio-matto/pages/products-list.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Il-cappellaio-matto/pages/about-us.php">About us</a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php 
                session_start();
                if($_SESSION["account"]){
                  print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/profile.php">My profile</a>');
                  print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/confirm.php?reason=sign-out">Sign out</a>');
                } else {
                  print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/sign-in.php">Sign in</a>');
                  print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/sign-up.php">Sign up</a>');
                }
              ?>
            </div>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Il-cappellaio-matto/pages/shopping-cart.php"><i class="fas fa-shopping-cart"></i> / 0€</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container" id="product-page-main-container">
      <div class="row">
      <?php 
          // connecting to database
          $database = "il-cappellaio-matto";
          $connection = mysqli_connect("localhost","root","", $database);
          if(!$connection) {
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
            exit();
          } 

          // get metatags from site url
          $url = $_SERVER['REQUEST_URI'];
          $id = (int)(str_replace("id=","",parse_url($url, PHP_URL_QUERY)));

          //query
          $query = "select * from model where model_id = '$id'";
          $result = mysqli_query($connection, $query);
          if(!$result) {
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
            exit();
          }

          // query result
          $row = mysqli_fetch_array($result);
          if(!$row){ // if the query returned an empty array 
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
            exit();
          } else{
            //saving result for later
            $_SESSION["product"] = $row;
          }
          mysqli_close($connection);
      ?>
        <div class="col-6">
        <?php
          print('<img id="main-product-photo" src="/Il-cappellaio-matto/resources/images/products/'.$_SESSION["product"]["image_path"].'">');
        ?>
        </div>
        <div class="col-6" id="main-product-specs">
          <h6 id="main-product-categories">
            <a class="main-product-category" href="/Il-cappellaio-matto/pages/products-list.php">Home</a>
            /
            <?php
              print('<a class="main-product-category" href="/Il-cappellaio-matto/pages/products-list.php">'.$_SESSION["product"]["brand"].'</a>');
            ?>
          </h6>
          <?php
            print('<h1 id="main-product-name">'.$_SESSION["product"]["name"].'</h1>');
          ?>
          <hr>
          <?php
            print('<h3 id="main-product-price">€ '.$_SESSION["product"]["price"].'</h3> ');
          ?>
          <form class="form-inline" action="/Il-cappellaio-matto/pages/checkout.php" method="POST">
            <?php
              // connecting to database
              $database = "il-cappellaio-matto";
              $connection = mysqli_connect("localhost","root","", $database);
              if(!$connection) {
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                exit();
              } 

              //query
              $query_s = "select available_items from product where size = 's' and model_id = ".$_SESSION["product"]["model_id"];
              $query_m = "select available_items from product where size = 'm' and model_id = ".$_SESSION["product"]["model_id"];
              $query_l = "select available_items from product where size = 'l' and model_id = ".$_SESSION["product"]["model_id"];
              $result_s = mysqli_query($connection, $query_s);
              $result_m = mysqli_query($connection, $query_m);
              $result_l = mysqli_query($connection, $query_l);
              if(!$result_s || !$result_m || !$result_l) {
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                exit();
              }

              // query result
              $size_s = mysqli_fetch_array($result_s);
              $size_m = mysqli_fetch_array($result_m);
              $size_l = mysqli_fetch_array($result_l);

              if(!$size_s || !$size_m || !$size_l){ // if the query returned an empty array 
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                exit();
              } else{
                print('<input type="text" name="product_id" value="'.$_SESSION["product"]["model_id"].'" hidden>'); //used to pass the product id through the form 
                print('<a name="available_sizes" hidden>'.$size_s["available_items"].'"</a>'); //used to pass the size s to the form 
                print('<a name="available_sizes" hidden>'.$size_m["available_items"].'"</a>'); //used to pass the size m to the form 
                print('<a name="available_sizes" hidden>'.$size_l["available_items"].'"</a>'); //used to pass the size l to the form 
                print('<input id="number-of-products" type="number" name="number" value="1" min="1" max="'.$size_m["available_items"].'">');
                print('<select id="product-size" name="size">');
                    if($size_s["available_items"] < 1 || !$size_s["available_items"]) {
                      print('<option value="S" disabled>S</option>');
                    } else {
                      print('<option value="S">S</option>');
                    }
                    if($size_m["available_items"] < 1 || !$size_m["available_items"]) {
                      print('<option value="M" disabled>M</option>');
                    } else {
                      print('<option value="M" selected>M</option>');
                    }
                    if($size_l["available_items"] < 1 || !$size_l["available_items"]) {
                      print('<option value="L" disabled>L</option>');
                    } else {
                      print('<option value="L">L</option>');
                    }
                print('</select>');
              }
              mysqli_close($connection);
            ?>
            <button class="btn btn-dark">Buy now</button>
          </form>
          <div id="main-product-text">
            <h5>DETAILS</h5>
            <p>
            <?php
              print($_SESSION["product"]["description"]);
            ?>
              
            </p>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Sizes</th>
                  <th scope="col">Metrics</th>
                  <th scope="col">Inches</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">S</th>
                  <td>51-54 cm</td>
                  <td>≃ 21 ″</td>
                </tr>
                <tr>
                  <th scope="row">M</th>
                  <td>55-57 cm</td>
                  <td>≃ 22 ″</td>
                </tr>
                <tr>
                  <th scope="row">L</th>
                  <td>58-61 cm</td>
                  <td>≃ 23 ″</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <br><br>

    <div class="container"><hr></div>
        
    <div class="container" id="related-products">
        <h3>Related products</h3><br>
        <div class="row justify-content-center text-center">
          <a class="related-item-list-link" href="/Il-cappellaio-matto/pages/product-page.php?id=1">
            <img class="item-list-image" src="/Il-cappellaio-matto/resources/images/cappelli/cap1.jpg">
            <h6 class="item-list-text">polo cap</h6>
            <h6 class="item-list-text">19 €</h6>
          </a>
          <a class="related-item-list-link" href="/Il-cappellaio-matto/pages/product-page.php?id=1">
            <img class="item-list-image" src="/Il-cappellaio-matto/resources/images/cappelli/cap5.jpg">
            <h6 class="item-list-text">pink cap</h6>
            <h6 class="item-list-text">19 €</h6>
          </a>
          <a class="related-item-list-link" href="/Il-cappellaio-matto/pages/product-page.php?id=1">
            <img class="item-list-image" src="/Il-cappellaio-matto/resources/images/cappelli/cap3.jpg">
            <h6 class="item-list-text">jordan cap</h6>
            <h6 class="item-list-text">19 €</h6>
          </a>
          <a class="related-item-list-link" href="/Il-cappellaio-matto/pages/product-page.php?id=1">
            <img class="item-list-image" src="/Il-cappellaio-matto/resources/images/cappelli/cap8.jpg">
            <h6 class="item-list-text">jordan cap</h6>
            <h6 class="item-list-text">19 €</h6>
          </a>
          <a class="related-item-list-link" href="/Il-cappellaio-matto/pages/product-page.php?id=1">
            <img class="item-list-image" src="/Il-cappellaio-matto/resources/images/cappelli/cap7.jpg">
            <h6 class="item-list-text">jordan cap</h6>
            <h6 class="item-list-text">19 €</h6>
          </a>
          <a class="related-item-list-link" href="/Il-cappellaio-matto/pages/product-page.php?id=1">
            <img class="item-list-image" src="/Il-cappellaio-matto/resources/images/cappelli/cap9.jpg">
            <h6 class="item-list-text">jordan cap</h6>
            <h6 class="item-list-text">19 €</h6>
          </a>
        </div>
    </div>


    <div class="container"><hr></div>


    <br><br><br>

    <footer class="bg-dark text-center text-white">
        <div class="container p-4">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                eum harum corrupti dicta, aliquam sequi voluptate quas.
            </p>
            <div class="container">
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-google"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-github"></i></a>
            </div>
        </div>
        <div id="footer-bottom-line" class="text-center p-3">
            © 2021 Copyright:
            <a class="text-white" href="https://github.com/MrC3drik/Capp-L">Il Cappellaio Matto</a>
        </div>
    </footer>

    
    <script> 
      //getting data from page
      var sizes = document.getElementsByName("available_sizes");
      var number_input = document.getElementById("number-of-products");
      var select_size = document.getElementById("product-size");

      //change max on load
      if(select_size.value == "S"){
        number_input.max = parseInt(sizes[0].innerHTML);
      }else if(select_size.value == "M"){
        number_input.max = parseInt(sizes[1].innerHTML);
      }else if(select_size.value == "L"){
        number_input.max = parseInt(sizes[2].innerHTML);
      }
      number_input.value = 1;

      //change max every time user updates the selected size
      select_size.onchange = () => {
        if(select_size.value == "S"){
          number_input.max = parseInt(sizes[0].innerHTML);
        }else if(select_size.value == "M"){
          number_input.max = parseInt(sizes[1].innerHTML);
        }else if(select_size.value == "L"){
          number_input.max = parseInt(sizes[2].innerHTML);
        }
        number_input.value = 1;
      };
    </script>
</body>
</html>