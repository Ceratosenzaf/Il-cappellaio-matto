<!DOCTYPE html>
<html>
<head>
    <title>There was a problem</title>
    <link rel="icon" href="/Il-cappellaio-matto/resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/index.css">
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
      session_start();
      
      // connecting to database
      $database = "il-cappellaio-matto";
      $connection = mysqli_connect("localhost","root","", $database);
      if(!$connection) {
        print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/pages/sign-in.php'>try again later</a></h5>");
        exit();
      }

      // get metatags from site url
      $url = $_SERVER['REQUEST_URI'];
      $reason = str_replace("reason=","",parse_url($url, PHP_URL_QUERY));

      switch($reason){
        case "sign-in":
          // get data from form
          $email = $_POST["email"];
          $password = $_POST["password"];

          // query
          $query = "select * from account where email='$email'";
          $result = mysqli_query($connection, $query);
          if(!$result) {
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/pages/sign-in.php'>try again later</a></h5>");
            exit();
          }

          // query result
          $row = mysqli_fetch_array($result);
          if(!$row){ // if the query returned an empty array 
            print("<h5>User not found. You can <a href='/Il-cappellaio-matto/pages/sign-up.php'>create an account</a> or <a href='/Il-cappellaio-matto/pages/sign-in.php'>try again</a></h5>");
            exit();
          } else{
            if($row["password"] != $password) { // if the password was wrong 
              print("<h5>Incorrect password, <a href='/Il-cappellaio-matto/pages/sign-in.php'>go back and fix it</a></h5>");
              exit();
            } else{ // if everything is correct
              $_SESSION["account"] = $row["account_id"];
              $account = $_SESSION["account"];
              
              // redirect automatically to home page
              header("Location: /Il-cappellaio-matto/index.php");
          }
          }
          break;

        case "sign-up":
          // get data from form
          $name = $_POST["name"];
          $email = $_POST["email"];
          $password = $_POST["password"];

          // query
          $query = "select * from account where email='$email' limit 1";
          $result = mysqli_query($connection, $query);
          $user = mysqli_fetch_assoc($result);

          if($user) { // if email is already being used in another account
            print("<h5>Email already linked to another account. You can <a href='/Il-cappellaio-matto/pages/sign-in.php'>log in</a> or <a href='/Il-cappellaio-matto/pages/sign-up.php'>use another mail</a></h5>");
            exit();
          } else{
            print("ok");
            $query = "insert into account (name, email, password) values ('$name', '$email', '$password')";
            $result = mysqli_query($connection, $query);
            if(!$result) { // if query fails
              print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/pages/sign-in.php'>try again later</a></h5>");
              exit();
            } else{ // if it's all fine set active user
              $query = "select * from account where email='$email'";
              $result = mysqli_query($connection, $query);
              if(!$result) {
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/pages/sign-in.php'>try again later</a></h5>");
                exit();
              }    
              // query result
              $row = mysqli_fetch_array($result);
              if(!$row){ // if the query returned an empty array 
                print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/pages/sign-in.php'>try again later</a></h5>");
                exit();
              } else{
                // if everything is correct
                $_SESSION["account"] = $row["account_id"];
                  
                // redirect automatically to home page
                header("Location: /Il-cappellaio-matto/index.php");
              }
            }
          }
          break;

        case "sign-out":
          // sign out the user
          $_SESSION["account"] = "";

          // redirect automatically to home page
          header("Location: /Il-cappellaio-matto/index.php");
          break;

        case "update-profile":
          // get data from post and session
          $name = $_POST["name"];
          $surname = $_POST["surname"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $address = $_POST["address"];
          $number = $_POST["number"];
          $city = $_POST["city"];
          $postal_code = $_POST["postal-code"];
          $state = $_POST["state"];
          $country = $_POST["country"];
          $card_number = $_POST["card-number"];
          $card_owner_name = $_POST["card-owner-name"];
          $expiry_month = $_POST["expiry-month"];
          $expiry_year = $_POST["expiry-year"];
          $account = $_SESSION["account"];

          // query
          $query = "update account set name = '$name', surname = '$surname', email = '$email', password = '$password', address = '$address', house_number = '$number', city = '$city', postal_code_number = '$postal_code', state = '$state', country = '$country', card_number = '$card_number', card_owner_name = '$card_owner_name', card_expiry_month = '$expiry_month', card_expiry_year = '$expiry_year' where account_id = '$account'";
          $result = mysqli_query($connection, $query);
          if(!$result) { // if query fails
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/pages/sign-in.php'>try again later</a></h5>");
            exit();
          } else{ // if it's all fine
              // redirect automatically to profile page
              header("Location: /Il-cappellaio-matto/pages/profile.php");
          }
          break;

        default:
          print("<a href='/Il-cappellaio-matto/index.php'>Error, go back to the homepage and try again</a>");
          break;
      }
      mysqli_close($connection);
    ?>
  </div>

  
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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