<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="icon" href="/Il-cappellaio-matto/resources/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/index.css">
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/products-list.css">
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

    <div class="container text-center">
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
          $page = str_replace("page=","",parse_url($url, PHP_URL_QUERY));

          if(!$page){
            $page = 1;
            $from = 0;
            $to = 13;
          } else{
            $page = (int)$page;
            $from = 12 * ($page - 1);
            $to = (12 * $page) + 1;
          }

          $_SESSION["page"] = $page;

          //query
          $query = "select * from model where model_id > '$from' and model_id < '$to'";
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
            print('<h2>All products</h2>');
            print('<br>');
        
            //printing the item i just fetched
            $id = $row["model_id"];
            $name = $row["name"];
            $price = $row["price"];
            $img = $row["image_path"];
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
              $id = $row["model_id"];
              $name = $row["name"];
              $price = $row["price"];
              $img = $row["image_path"];

              //print divs every 3 items
              if($i == 0) print('<div class="row justify-content-center">');

              //image tags
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

    <br>

    <nav id="pagination-ui">
      <ul class="pagination justify-content-center">
        <?php 
          // connecting to database
          $database = "il-cappellaio-matto";
          $connection = mysqli_connect("localhost","root","", $database);
          if(!$connection) {
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
            exit();
          } 

          //query
          $query = "select count(model_id) as item_count from model"; 
          $result = mysqli_query($connection, $query);
          if(!$result) {
            print("<h5>We are experiencing internal errors, <a href='/Il-cappellaio-matto/index.php'>go back to the home page</a></h5>");
            exit();
          }
          //get the pages we need to have
          $row = mysqli_fetch_assoc($result);
          $item_count = (int)($row["item_count"]);
          $necessary_pages = ceil($item_count / 12);
          $current_page = $_SESSION["page"];

          //left page arrow
          if($current_page == 1){
            //disable button if it's the first page
            print('<li class="page-item disabled">');
            print( '<a class="page-link" href="/Il-cappellaio-matto/pages/products-list.php?page=1" aria-label="Previous"> ');
          } else{
            print('<li class="page-item">');
            print( '<a class="page-link" href="/Il-cappellaio-matto/pages/products-list.php?page='.($current_page-1).'" aria-label="Previous"> ');
          } 
          //close tags of left arrow
          print( '<span aria-hidden="true">&laquo;</span> ');
          print( '<span class="sr-only">Previous</span> ');
          print( '</a> ');
          print( '</li> ');

          //the page buttons
          for($i = 1; $i <= $necessary_pages; $i++) {
            if($current_page == $i){
              print('<li class="page-item active"><a class="page-link" href="/Il-cappellaio-matto/pages/products-list.php?page='.$i.'">'.$i.'</a></li>');
            } else {
              print('<li class="page-item"><a class="page-link" href="/Il-cappellaio-matto/pages/products-list.php?page='.$i.'">'.$i.'</a></li>');
            }
          }

          //right page arrow
          if($current_page == $necessary_pages){
            //disable button if it's the last page
            print('<li class="page-item disabled">');
            print( '<a class="page-link" href="/Il-cappellaio-matto/pages/products-list.php?page='.$necessary_pages.'" aria-label="Next"> ');
          } else{
            print('<li class="page-item">');
            print( '<a class="page-link" href="/Il-cappellaio-matto/pages/products-list.php?page='.($current_page+1).'" aria-label="Next"> ');
          } 
          //close tags of right arrow
          print( '<span aria-hidden="true">&raquo;</span> ');
          print( '<span class="sr-only">Next</span> ');
          print( '</a> ');
          print( '</li> ');
          
          mysqli_close($connection);
        ?>
      </ul>
    </nav>

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