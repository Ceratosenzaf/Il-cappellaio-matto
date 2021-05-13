<!DOCTYPE html>
<html>
<head>
    <title>My profile</title>
    <link rel="icon" href="/Il-cappellaio-matto/resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/index.css">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/profile.css">
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
        <h1 class="text-center text-capitalize">Hi, 
            <?php                 
                // connecting to database
                $database = "il-cappellaio-matto";
                $connection = mysqli_connect("localhost","root","", $database);

                $account_id = $_SESSION["account"];

                // query
                $query = "select * from account where account_id='$account_id'";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_array($result);
                print($row["name"]. "!");
                mysqli_close($connection);
            ?>
        </h1>
        <br>
        <div class="row">
            <div class="col-6">
                <form action="/Il-cappellaio-matto/pages/confirm.php?reason=update-profile" method="POST">
                    <h3 class="text-center">Profile details</h3>
                    <hr><br>
                    <div class="row mb-2">
                        <div class="col-6">
                            <?php 
                                print('<input type="text" class="form-control" name="name" title="name" placeholder="Name" value="'.$row["name"].'" required>');
                            ?>
                        </div>
                        <div class="col-6">
                            <?php 
                                print('<input type="text" class="form-control" name="surname" title="surname" placeholder="Surname" value="'.$row["surname"].'" required>');
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-2">
                        <div class="col-12">
                            <?php
                                print('<input type="email" class="form-control" name="email" title="email" placeholder="E-mail" value="'.$row["email"].'" required>');
                            ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <?php
                                print('<input type="text" class="form-control" name="password" title="password" placeholder="Password" value="'.$row["password"].'" required>');
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-2">
                        <div class="col-10">
                            <?php
                                print('<input type="text" class="form-control" name="address" title="address" placeholder="Address" value="'.$row["address"].'">');
                            ?>
                        </div>
                        <div class="col-2">
                            <?php
                                print('<input type="text" class="form-control" name="number" title="house number" placeholder="No." value="'.$row["house_number"].'">');
                            ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-9">
                            <?php
                                print('<input type="text" class="form-control" name="city" title="city" placeholder="City" value="'.$row["city"].'">');
                            ?>
                        </div>
                        <div class="col-3">
                            <?php
                                print('<input type="text" class="form-control" name="postal-code" title="postal code" placeholder="Po code" value="'.$row["postal_code_number"].'">');
                            ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <?php
                                print('<input type="text" class="form-control" name="state" title="state" placeholder="State" value="'.$row["state"].'">');
                            ?>
                        </div>
                        <div class="col-6">
                            <?php
                                print('<input type="text" class="form-control" name="country" title="country" placeholder="Country" value="'.$row["country"].'">');
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-2">
                        <div class="col-9">
                            <?php
                                print('<input type="text" class="form-control" name="card-number" title="card number" placeholder="You card number" value="'.$row["card_number"].'">');
                            ?>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="card-cvc" title="card CVC" placeholder="CVC">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <?php
                                print('<input type="text" class="form-control" name="card-owner-name" title="card owner" placeholder="Owner name" value="'.$row["card_owner_name"].'">');
                            ?>
                        </div>
                        <div class="col-3">
                            <?php
                                print('<input type="text" class="form-control" name="expiry-month" title="card expiry month" placeholder="Exp. Month" value="'.$row["card_expiry_month"].'">');
                            ?>
                        </div>
                        <div class="col-3">
                            <?php
                                print('<input type="text" class="form-control" name="expiry-year" title="card expiry year" placeholder="Exp. Year" value="'.$row["card_expiry_year"].'">');
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-2">
                        <div class="col-12">
                            <input type="submit" class="form-control" value="Update">
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-6">
                <h3 class="text-center">Latest orders</h3>
                <hr><br>
                <div id="orders">
                    <?php 
                        // connecting to database
                        $database = "il-cappellaio-matto";
                        $connection = mysqli_connect("localhost","root","", $database);

                        $account_id = $_SESSION["account"];

                        // query
                        $query = "select * from orders inner join model on orders.product_id = model.model_id where orders.account_id = '$account_id' order by orders.order_id desc limit 5";
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
                                            <div class="col-3">
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
                            while($row = mysqli_fetch_array($result)){
                                print('
                                <hr>
                                <div class="row order-div">
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-1 order-quantity">'.$row["number_of_products"].'</div>
                                            <div class="col-3">
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
                            }
                        }
                        mysqli_close($connection);
                    ?>
                    <a href="/Il-cappellaio-matto/pages/orders-history.php" class="form-control text-center">View all</a>
                </div>
            </div>
        </div>


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
            <a class="text-white" href="https://github.com/MrC3drik/Capp-L">Il Cappellaio Matto</a>
        </div>
    </footer>
</body>
</html>