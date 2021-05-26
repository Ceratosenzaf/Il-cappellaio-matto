<!DOCTYPE html>
<html>
<head>
    <title>Orders history</title>
    <link rel="icon" href="/Il-cappellaio-matto/resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/index.css">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/order-history.css">
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
        </ul>
      </div>
    </nav>

    <br><br><br><br>
    
    <div class="container">
      <br>
      <h1 class="text-center">All Orders</h1>
      <br><br>
      <hr>
      <?php 
        // connecting to database
        $database = "il-cappellaio-matto";
        $connection = mysqli_connect("localhost","root","", $database);

        $account_id = $_SESSION["account"];

        // query
        $query = "select * from orders inner join model on orders.product_id = model.model_id where orders.account_id = '$account_id' order by orders.order_id desc";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            exit();
        }
        $row = mysqli_fetch_array($result);
        if(!$row){ // if the query returned an empty array 
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home pagge</a></h5>");
            exit();
        } else{
            print('
              <div class="row order-div">
                <div class="col-10">
                  <div class="row">
                    <div class="col-1 order-quantity">'.$row["number_of_products"].'</div>
                    <div class="col-2">
                        <img src="/Il-cappellaio-matto/resources/images/products/'.$row["image_path"].'" class="order-image">
                    </div>
                    <div class="col-8">
                        <h5 class="mb-0 text-capitalize">'.$row["name"].'</h5>
                        <p class="mb-0">'.$row["date"].'</p>
                        <p class="mb-0">Size: '.$row["size"].'</p>
                        <p class="mb-0">'.$row["price"].' €</p>
                    </div>
                  </div>
                </div>
                <div class="col-2 mt-auto mb-auto">
                    <h5>'.($row["price"] * $row["number_of_products"]).' €</h5>
                </div>
              </div>
            ');
            print('<hr>');
            while($row = mysqli_fetch_array($result)){
                print('
                  <div class="row order-div">
                    <div class="col-10">
                      <div class="row">
                        <div class="col-1 order-quantity">'.$row["number_of_products"].'</div>
                        <div class="col-2">
                            <img src="/Il-cappellaio-matto/resources/images/products/'.$row["image_path"].'" class="order-image">
                        </div>
                        <div class="col-8">
                            <h5 class="mb-0 text-capitalize">'.$row["name"].'</h5>
                            <p class="mb-0">'.$row["date"].'</p>
                            <p class="mb-0">Size: '.$row["size"].'</p>
                            <p class="mb-0">'.$row["price"].' €</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-2 mt-auto mb-auto">
                        <h5>'.($row["price"] * $row["number_of_products"]).' €</h5>
                    </div>
                  </div>
            ');
            print('<hr>');

            }

        }
        mysqli_close($connection);
      
      
      ?>
    </div>

    <br><br><br><br><br>

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