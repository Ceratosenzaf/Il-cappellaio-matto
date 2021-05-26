<!DOCTYPE html>
<html>
<head>
    <title>Order confirmation</title>
    <link rel="icon" href="/Il-cappellaio-matto/resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/index.css">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/checkout-operations.css">
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

  <br><br><br>
  
  <div class="container text-center">
    <?php
        //connecting to database
        $database = "il-cappellaio-matto";
        $connection = mysqli_connect("localhost","root","", $database);
        if(!$connection) {
        print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
        exit();
        }

        //1. pretend the payment went through

        //2. manage user

            //2.0 get data from post and session
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $house_number = $_POST["house-number"];
            $city = $_POST["city"];
            $postal_code = $_POST["postal-code"];
            $state = $_POST["state"];
            $country = $_POST["country"];
            $card_number = $_POST["card-number"];
            $card_owner_name = $_POST["card-owner-name"];
            $expiry_month = $_POST["expiry-month"];
            $expiry_year = $_POST["expiry-year"];
            $account = $_SESSION["account"];

            //2.1 if it is a guest, add it to the database
            if(!$_SESSION["account"]){
            //make sure the mail isn't used yet
            $query = "select * from account where email='$email'";
            $result = mysqli_query($connection, $query);
            if(!$result) {
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                exit();
            }
            $row = mysqli_fetch_array($result);
            if($row){
                print("<h5>The mail you added is already taken. You can <a href='/Il-cappellaio-matto/pages/sign-in.php'>login now</a></h5>");
                exit();
            }
            //query to insert into database
            $query = "insert into account(name,surname,email,address,house_number,city,postal_code_number,state,country,card_number,card_owner_name,card_expiry_month,card_expiry_year) values('$name', '$surname', '$email', '$address', '$house_number', '$city', '$postal_code', '$state', '$country', '$card_number', '$card_owner_name', '$expiry_month', '$expiry_year')";
            $result = mysqli_query($connection, $query);
            if(!$result) {
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                exit();
            }
            //query to get the account id
            $query = "select * from account where email='$email'";
            $result = mysqli_query($connection, $query);
            if(!$result) {
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                exit();
            }
            $row = mysqli_fetch_array($result);
            if(!$row){
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                exit();
            } 
            //set the id of the account just created
            $account = $row["account_id"];
            } 
            //2.2 if the user is logged in, save the details he gave
            else if($_SESSION["account"] && isset($_POST["update"])){ 
                $query = "update account set name = '$name', surname = '$surname', email = '$email', address = '$address', house_number = '$house_number', city = '$city', postal_code_number = '$postal_code', state = '$state', country = '$country', card_number = '$card_number', card_owner_name = '$card_owner_name', card_expiry_month = '$expiry_month', card_expiry_year = '$expiry_year' where account_id = '$account'";
                $result = mysqli_query($connection, $query);
                if(!$result) { // if query fails
                    print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                    exit();
                }
            }

        //3. add to user's orders
        $size = $_SESSION["product"]["size"];
        $number = $_SESSION["product"]["number"];
        $product = $_SESSION["product"]["model_id"];
        $date = date('y-m-d');
        //query
        $query = "insert into orders(account_id,product_id,number_of_products,size,date,address,house_number,city,postal_code_number,state,country,card_number,card_owner_name,card_expiry_month,card_expiry_year) values('$account', '$product', '$number', '$size', '$date', '$address', '$house_number', '$city', '$postal_code', '$state', '$country', '$card_number', '$card_owner_name', '$expiry_month', '$expiry_year')";
        $result = mysqli_query($connection, $query);
        if(!$result) { // if query fails
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
            exit();
        }

        //4. decrease availability in database
        //query
        $query = "select available_items from product where size = '$size' and model_id = '$product'";
        $result = mysqli_query($connection, $query);
        if(!$result) { // if query fails
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
            exit();
        } else{ //if everything is okay
            $number_before = mysqli_fetch_array($result);
            $number_before = $number_before["available_items"];
            $new_sizes = $number_before - $number;
            $query = "update product set available_items = '$new_sizes' where model_id = '$product' and size = '$size'";
            $result = mysqli_query($connection, $query);
            if(!$result) { // if query fails
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
                exit();
            }
        }

        //5. empty current item stored in session
        $_SESSION["product"] = null;

        //6. print a success template if everything went right
        print('
          <img src="/Il-cappellaio-matto/resources/images/order-confirm.png" id="confirm"> <br><br>
          <a href="/Il-cappellaio-matto/pages/products-list.php" class="btn btn-primary btn-lg">Search other items</a>
        
        ');

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