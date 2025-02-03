<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Customer - Sign Up</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../assets/images/bg_1.jpg');  "></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Sign Up to <strong>LiveSpace</strong></h3>
            <p class="mb-4">Your trusted partner for reliable and secure hosting solutions tailored to your needs!.</p>
            <form action="loginClient" method="post">
              <div class="form-group first">
                <label for="username">Name</label>
                <input type="text" class="form-control" placeholder="your Name" id="username" name="nom">
              </div>
              <div class="form-group first">
                <label for="username">E-mail</label>
                <input type="text" class="form-control" placeholder="your E-mail@gmail.com" id="username" name="email">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password" name="pwd">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Phone number</label>
                <input type="tel" class="form-control" placeholder="Your Phone number" id="password" name="tel">
              </div>
              
              <input type="submit" value="Sign Up" class="btn btn-block btn-primary">
            </form>

            <!-- Lien retour vers la page de connexion -->
            <div class="d-flex mb-5 align-items-center mt-4">
              <span class="ml-auto"><a href="/loginClient" class="forgot-pass">Retour à la connexion</a></span> 
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
