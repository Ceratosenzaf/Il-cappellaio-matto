<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="icon" href="/Il-cappellaio-matto/resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/index.css">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/checkout.css">
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

                //setting up variables
                $_SESSION["product"]["number"] = $_POST["number"];
                $_SESSION["product"]["size"] = $_POST["size"];
              ?>
            </div>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Il-cappellaio-matto/pages/shopping-cart.php"><i class="fas fa-shopping-cart"></i> / 0€</a>
          </li>
        </ul>
      </div>
    </nav>

    <br><br><br><br>

    <form class="container" action="/Il-cappellaio-matto/pages/checkout-operations.php" method="POST">
        <div class="row">
            <div class="col-6">
                <h3 class="text-center">Orders details</h3>
                <hr><br>
                <div class="row order-div">
                    <div class="row">
                        <div class="col-1 order-quantity"><?php print($_POST["number"]); ?></div>
                        <div class="col-2">
                            <?php print('<img src= "/Il-cappellaio-matto/resources/images/products/'. $_SESSION["product"]["image_path"].'" class="order-image">'); ?>
                        </div>
                        <div class="col-9">
                            <h5 class="mb-0 text-uppercase"><?php print($_SESSION["product"]["name"]); ?></h5>
                            <p class="mb-0" name="size" value="">Size: <?php print($_POST["size"]); ?></p>
                            <p><?php print($_SESSION["product"]["price"]); ?> €</p>
                        </div>
                    </div>
                </div>

                <br><br>

                <h3 class="text-center">Payment and Shipping details</h3>
                <hr><br>
                    <?php 
                        if(isset($_SESSION["account"])){
                            // connecting to database
                            $database = "il-cappellaio-matto";
                            $connection = mysqli_connect("localhost","root","", $database);
    
                            $account_id = $_SESSION["account"];
    
                            // query to get profile
                            $query = "select * from account where account_id='$account_id'";
                            $result = mysqli_query($connection, $query);
                            $row = mysqli_fetch_array($result);

                            mysqli_close($connection);
                        }
                    ?>             
                
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
                <div class="row mb-2">
                    <div class="col-12">
                        <?php
                            print('<input type="email" class="form-control" name="email" title="email" placeholder="E-mail" value="'.$row["email"].'" required>');
                        ?>
                    </div>
                </div>
                <br>
                <div class="row mb-2">
                    <div class="col-10">
                        <?php
                            print('<input type="text" class="form-control" name="address" title="address" placeholder="Address" value="'.$row["address"].'" required>');
                        ?>
                    </div>
                    <div class="col-2">
                        <?php
                            print('<input type="text" class="form-control" name="house-number" title="house number" placeholder="No." value="'.$row["house_number"].'" required>');
                        ?>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-9">
                        <?php
                            print('<input type="text" class="form-control" name="city" title="city" placeholder="City" value="'.$row["city"].'" required>');
                        ?>
                    </div>
                    <div class="col-3">
                        <?php
                            print('<input type="text" class="form-control" name="postal-code" title="postal code" placeholder="Po code" value="'.$row["postal_code_number"].'" required>');
                        ?>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <?php
                            print('<input type="text" class="form-control" name="state" title="state" placeholder="State" value="'.$row["state"].'" required>');
                        ?>
                    </div>
                    <div class="col-6">
                        <?php
                            print('<input type="text" class="form-control" name="country" title="country" placeholder="Country" value="'.$row["country"].'" required>');
                        ?>
                    </div>
                </div>
                <br>
                <div class="row mb-2">
                    <div class="col-9">
                        <?php
                            print('<input type="text" class="form-control" name="card-number" title="card number" placeholder="You card number" value="'.$row["card_number"].'" required>');
                        ?>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" name="card-cvc" title="card CVC" placeholder="CVC" min="111" max="999" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <?php
                            print('<input type="text" class="form-control" name="card-owner-name" title="card owner" placeholder="Owner name" value="'.$row["card_owner_name"].'" required>');
                        ?>
                    </div>
                    <div class="col-3">
                        <?php
                            print('<input type="text" class="form-control" name="expiry-month" title="card expiry month" placeholder="Exp. Month" value="'.$row["card_expiry_month"].'" required>');
                        ?>
                    </div>
                    <div class="col-3">
                        <?php
                            print('<input type="text" class="form-control" name="expiry-year" title="card expiry year" placeholder="Exp. Year" value="'.$row["card_expiry_year"].'" required>');
                        ?>
                    </div>
                </div>
                <br>
                <?php 
                    if($_SESSION["account"]) { //only show this ckeckbox if the user is logged in
                        print('
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="update" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Update data to your profile
                                </label>
                            </div>
                        ');
                    }
                ?>
            </div>

            <div class="col-6">
                <h3 class="text-center">Order sum-up</h3>
                <hr><br>
                <div id="order-total">
                    <h6>
                        <span>Products:</span>
                        <span>
                            <?php
                                $price = $_SESSION["product"]["price"]; 
                                $cost = $price * $_POST["number"];
                                print($cost);
                            ?> 
                            €
                        </span>
                    </h6>
                    <h6>
                        <span>Shipping:</span>
                        <span>Free</span>
                    </h6>
                    <hr>
                    <h5>
                        <span>Order total:</span>
                        <span>
                            <?php 
                                print($cost);
                            ?> 
                            €
                        </span>
                    </h5>
                    <br>
                </div>
                <button id="buy-button" class="btn btn-dark">Confirm and buy now</button>
            </div>
        </div>
    </form>
  
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