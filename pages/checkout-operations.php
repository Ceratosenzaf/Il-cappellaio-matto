<!DOCTYPE html>
<html>
<head>
    <title>Order sum-up</title>
    <link rel="icon" href="/Il-cappellaio-matto/resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
  <?php
    session_start();
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
    //query
    $query = "insert into account(name,surname,email,address,house_number,city,postal_code_number,state,country,card_number,card_owner_name,card_expiry_month,card_expiry_year) values('$name', '$surname', '$email', '$address', '$house_number', '$city', '$postal_code', '$state', '$country', '$card_number', '$card_owner_name', '$expiry_month', '$expiry_year')";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home pagge</a></h5>");
        exit();
    }
    } else if($_SESSION["account"] && isset($_POST["update"])){ //2.2 if the user is logged in, save the details he gave
    $query = "update account set name = '$name', surname = '$surname', email = '$email', address = '$address', house_number = '$house_number', city = '$city', postal_code_number = '$postal_code', state = '$state', country = '$country', card_number = '$card_number', card_owner_name = '$card_owner_name', card_expiry_month = '$expiry_month', card_expiry_year = '$expiry_year' where account_id = '$account'";
    $result = mysqli_query($connection, $query);
    if(!$result) { // if query fails
        print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home pagge</a></h5>");
        exit();
    }
    }

    //3. add to orders
    $size = $_SESSION["product"]["size"];
    $number = $_SESSION["product"]["number"];
    $product = $_SESSION["product"]["model_id"];
    //query
    $query = "insert into orders(account_id,product_id,number_of_products,size,address,house_number,city,postal_code_number,state,country,card_number,card_owner_name,card_expiry_month,card_expiry_year) values('$account', '$product', '$number', '$size', '$address', '$house_number', '$city', '$postal_code', '$state', '$country', '$card_number', '$card_owner_name', '$expiry_month', '$expiry_year')";
    $result = mysqli_query($connection, $query);
    if(!$result) { // if query fails
    print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home pagge</a></h5>");
    exit();
    }

    //4. decrease availability in database
    //query
    $query = "select available_items from product where size = '$size' and model_id = '$product'";
    $result = mysqli_query($connection, $query);
    if(!$result) { // if query fails
    print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home pagge</a></h5>");
    exit();
    } else{ //if everything is okay
    $number_before = mysqli_fetch_array($result);
    $number_before = $number_before["available_items"];
    $new_sizes = $number_before - $number;
    $query = "update product set available_items = '$new_sizes' where model_id = '$product' and size = '$size'";
    $result = mysqli_query($connection, $query);
    if(!$result) { // if query fails
        print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home pagge</a></h5>");
        exit();
    }
    }

    //5. empty current item stored in session
    $_SESSION["product"] = null;

    //6. redirect to order recup page
    header("Location: /Il-cappellaio-matto/pages/your-order.php");

    mysqli_close($connection);
  ?>
</body>
</html>