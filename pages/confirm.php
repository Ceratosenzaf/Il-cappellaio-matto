<!DOCTYPE html>
<html>
<head>
    <title>About us</title>
    <link rel="icon" href="/Il-cappellaio-matto/resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
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
        $card_cvc = $_POST["card-cvc"];
        $card_owner_name = $_POST["card-owner-name"];
        $expiry_month = $_POST["expiry-month"];
        $expiry_year = $_POST["expiry-year"];
        $account = $_SESSION["account"];

        // query
        $query = "update account set name = '$name', surname = '$surname', email = '$email', password = '$password', address = '$address', house_number = '$number', city = '$city', postal_code_number = '$postal_code', state = '$state', country = '$country', card_number = '$card_number', card_cvc = '$card_cvc', card_owner_name = '$card_owner_name', card_expiry_month = '$expiry_month', card_expiry_year = '$expiry_year' where account_id = '$account'";
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
</body>
</html>