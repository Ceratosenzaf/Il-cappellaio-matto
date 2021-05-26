<!DOCTYPE html>
<html>

<html>
  <head>
    <title>Il Cappellaio Matto</title>
    <link rel="icon" href="resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
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
                if(isset($_SESSION["account"])){
                  if($_SESSION["account"]){
                    print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/profile.php">My profile</a>');
                    print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/confirm.php?reason=sign-out">Sign out</a>');
                  } else {
                    print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/sign-in.php">Sign in</a>');
                    print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/sign-up.php">Sign up</a>');
                  }
                } else{
                  $_SESSION["account"] = "";
                  print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/sign-in.php">Sign in</a>');
                  print('<a class="dropdown-item" href="/Il-cappellaio-matto/pages/sign-up.php">Sign up</a>');
                }                
              ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div id="main-photo">
      <img id="main-photo-img" src="/Il-cappellaio-matto/resources/images/image1.jpg">
      <h1 id="main-photo-text">IL CAPPELLAIO MATTO</h1>
    </div>

    <br><br><br><br><br>

    <div class="row justify-content-center">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title"><i class="fas fa-truck"></i> FREE SHIPPING</h5>
          <p class="card-text">ON ALL ORDERS</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title"><i class="fab fa-redhat"></i> 100% COTTON</h5>
          <p class="card-text">TOP QUALITY</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title"><i class="fas fa-money-bill-wave"></i> EASY RETURNS</h5>
          <p class="card-text">SATISFACTION GUARANTEED</p>
        </div>
      </div>
    </div>

    <br><br><br><br><br>

    <div class="container text-center">
      <h2>Most popular</h2>
      <br>
      <?php 
        // connecting to database
        $database = "il-cappellaio-matto";
        $connection = mysqli_connect("localhost","root","", $database);
        if(!$connection) {
          print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
          exit();
        }
        $query = "SELECT f.product_id, s.TotalQuantity FROM orders AS f JOIN (SELECT product_id, SUM(number_of_products) AS TotalQuantity FROM orders GROUP BY product_id ) AS s ON f.product_id = s.product_id group by f.product_id order by f.number_of_products DESC limit 6";
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
            //printing the item i just fetched
            $id = $row["product_id"];
            $query_product = "select * from model where model_id = '$id'";
            $result_product = mysqli_query($connection, $query_product);
            if(!$result) {
              print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
              exit();
            }

            // query result
            $row_product = mysqli_fetch_array($result_product);
            $name = $row_product["name"];
            $price = $row_product["price"];
            $img = $row_product["image_path"];
        
            print('<div class="row justify-content-center">');
            print('
                <a class="item-list-link" href="/Il-cappellaio-matto/pages/product-page.php?id='.$id.'">
                  <img class="item-list-image" src="/Il-cappellaio-matto/resources/images/products/'.$img.'">
                  <h5 class="item-list-text">'.$name.'</h5>
                  <h5 class="item-list-text">'.$price.' €</h5>
                </a>
              ');

            //variable used to count number of items per row
            $i = 1;

            while($row = mysqli_fetch_array($result)){
              //variable to print divs
              $i = $i==3 ? 0 : $i;
              
              //setting up variables
              $id = $row["product_id"];

              //print divs every 3 items
              if($i == 0) print('<div class="row justify-content-center">');

              $query_product = "select * from model where model_id = '$id'";
              $result_product = mysqli_query($connection, $query_product);
              if(!$result) {
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                exit();
              }

              // query result
              $row_product = mysqli_fetch_array($result_product);
              $name = $row_product["name"];
              $price = $row_product["price"];
              $img = $row_product["image_path"];
          
              print('
                  <a class="item-list-link" href="/Il-cappellaio-matto/pages/product-page.php?id='.$id.'">
                    <img class="item-list-image" src="/Il-cappellaio-matto/resources/images/products/'.$img.'">
                    <h5 class="item-list-text">'.$name.'</h5>
                    <h5 class="item-list-text">'.$price.' €</h5>
                  </a>
              ');

              //decrease counter
              $i++;

              //close divs every 3 items
              if($i == 3) print('</div>');
            } 
            // close div if items are finished
            if(!$row) print("</div>");
          }
          
          mysqli_close($connection);
      ?>
    </div>

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
          <a class="text-white" href="https://github.com/MrC3drik/Il-cappellaio-matto">Il Cappellaio Matto</a>
        </div>
    </footer>

</body>

</html>
