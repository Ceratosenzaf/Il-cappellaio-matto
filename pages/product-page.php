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
                <a class="dropdown-item" href="/Il-cappellaio-matto/pages/profile.php">My profile</a>
                <a class="dropdown-item" href="/Il-cappellaio-matto/pages/sign-in.php">Sign in</a>
                <a class="dropdown-item" href="/Il-cappellaio-matto/pages/sign-up.php">Sign up</a>
                <a class="dropdown-item" href="/Il-cappellaio-matto/pages/confirm.php">Sign out</a>
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
            <div class="col-6">
                <img id="main-product-photo" src="/Il-cappellaio-matto/resources/images/cappelli/cap1.jpg">
            </div>
            <div class="col-6" id="main-product-specs">
                <h6 id="main-product-categories">
                    <a class="main-product-category" href="/Il-cappellaio-matto/pages/products-list.php">Home</a>
                    /
                    <a class="main-product-category" href="/Il-cappellaio-matto/pages/products-list.php">Polo Ralph Lauren</a>                    
                </h6>
                <h1 id="main-product-name">Polo cap</h1>
                <hr>
                <h3 id="main-product-price">€ 19</h3> 
                <form class="form-inline" action="/Il-cappellaio-matto/pages/shopping-cart.php">
                    <input id="number-of-products" type="number" name="number" value="1" min="1" max="37">
                    <select id="product-size" name="size">
                        <option value="S">S</option>
                        <option value="M" selected>M</option>
                        <option value="L">L</option>
                    </select>
                    <button class="btn btn-dark">Add to cart</button>
                </form>
                <div id="main-product-text">
                    <h5>DETAILS</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                        repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                        eum harum corrupti dicta, aliquam sequi voluptate quas.
                    </p>
                    <p>
                        Materials: 100% cotton <br> 
                        Caution: hand wash and dry clean if possible 
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
                    </p>
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
</body>
</html>