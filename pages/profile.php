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
    <link rel="stylesheet" href="/Il-cappellaio-matto/css/profile.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top justify-content-between">
        <div class="container">
          <a class="navbar-brand" href="/Capp'L/Il-cappellaio-matto/index.php">
            <img class="navbar-logo" src="/Il-cappellaio-matto/resources/logo-white.png">
          </a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" id="pages">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/Il-cappellaio-matto/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products-list.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about-us.php">About us</a>
              </li>
            </ul>
          </div>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php">My profile</a>
                <a class="dropdown-item" href="sign-in.php">Sign in</a>
                <a class="dropdown-item" href="sign-up.php">Sign up</a>
                <a class="dropdown-item" href="confirm.php">Sign out</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shopping-cart.php"><i class="fas fa-shopping-cart"></i> / 0$</a>
            </li>
          </ul>
        </div>
    </nav>

    <br><br><br><br>

    <div class="container">
        <h1 class="text-center">Hi, Davide!</h1>
        <br>
        <div class="row">
            <div class="col-6">
                <form action="">
                    <h3 class="text-center">Profile details</h3>
                    <hr><br>
                    <div class="row mb-2">
                        <div class="col-6">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="surname" placeholder="Surname" required>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-2">
                        <div class="col-12">
                            <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <input type="text" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-2">
                        <div class="col-10">
                            <input type="text" class="form-control" name="address" placeholder="Address" required>
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" name="number" placeholder="No." required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-9">
                            <input type="text" class="form-control" name="city" placeholder="City" required>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="postal-code" placeholder="Po code" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <input type="text" class="form-control" name="state" placeholder="State" required>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="country" placeholder="Country" required>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-2">
                        <div class="col-9">
                            <input type="text" class="form-control" name="card-number" placeholder="You card number" required>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="card-cvc" placeholder="CVC" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <input type="text" class="form-control" name="card-owner-name" placeholder="Owner name" required>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="expiry-month" placeholder="Exp. Month" required>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="expiry-year" placeholder="Exp. Year" required>
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
                <h3 class="text-center">Orders history</h3>
                <hr><br>
                <div id="orders">
                    <a href="your-order.php">
                        <div class="row order-div">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-1 order-quantity">1</div>
                                    <div class="col-3">
                                        <img src="/Il-cappellaio-matto/resources/images/cappelli/cap1.jpg" class="order-image">
                                    </div>
                                    <div class="col-8">
                                        <h5 class="mb-0">Polo Ralph Loren Green Cap</h5>
                                        <p class="mb-0">Size: L</p>
                                        <p>19 $</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 mt-auto mb-auto">
                                <h5>19 $</h5>
                            </div>
                        </div>
                    </a>
                    <a href="your-order.php">
                        <div class="row order-div">
                            <div class="col-10">
                                <div class="row mb-3">
                                    <div class="col-1 order-quantity">1</div>
                                    <div class="col-3">
                                        <img src="/Il-cappellaio-matto/resources/images/cappelli/cap1.jpg" class="order-image">
                                    </div>
                                    <div class="col-8">
                                        <h5 class="mb-0">Polo Ralph Loren Green Cap</h5>
                                        <p class="mb-0">Size: L</p>
                                        <p>19 $</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-1 order-quantity">1</div>
                                    <div class="col-3">
                                        <img src="/Il-cappellaio-matto/resources/images/cappelli/cap1.jpg" class="order-image">
                                    </div>
                                    <div class="col-8">
                                        <h5 class="mb-0">Polo Ralph Loren Green Cap</h5>
                                        <p class="mb-0">Size: L</p>
                                        <p>19 $</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 order-quantity">1</div>
                                    <div class="col-3">
                                        <img src="/Il-cappellaio-matto/resources/images/cappelli/cap1.jpg" class="order-image">
                                    </div>
                                    <div class="col-8">
                                        <h5 class="mb-0">Polo Ralph Loren Green Cap</h5>
                                        <p class="mb-0">Size: L</p>
                                        <p>19 $</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 mt-auto mb-auto">
                                <h5>57 $</h5>
                            </div>
                        </div>
                    </a>

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