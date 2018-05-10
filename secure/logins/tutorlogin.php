<?php
    include('../../connection/conn.php');
?>
<html>
    <head>
        <title>Admin Area Login</title>
        <!-- Required Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--Navbar -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
            <div class="container">
              <a href="../../index.php" class="navbar-brand">home</a>
              <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
        </nav>
        
        <!-- Main Header-->
        <header id="main-header" class="py-2 bg-danger text-white">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h1><i class="fa fa-user"></i> Miilearning Tutor Login</h1>
              </div>
            </div>
          </div>
        </header>

        <!-- Login -->
        <section id="login">
          <div class="container">
            <div class="row">
              <div class="col-md-6 mx-auto">
                <div class="card">
                  <div class="card-header">
                    <h4>Tutor Login</h4>
                    <div class="card-body">
                        <form action="testsign.php" method="post">
                        <div class="form-group">
                          <label for="email">Username</label>
                          <input name="userfield" type="text" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input name="passfield" type="password" class="form-control" required="required">
                        </div>
                        <input type="hidden" name="usertype" value="1">
                        <input type="submit" class="btn btn-primary btn-block" value="login">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- -->
        </section>
        
        <!-- Footer -->
        <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
            <div class="container">
              <div class="row">
                <div class="col">
                  <p class="lead text-center">Copyright &copy; 2017 Miilearning </p>
                </div>
              </div>
            </div>
        </footer>
        
        <!-- Scripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
        <script>
			    CKEDITOR.replace( 'editor1' );
        </script>
    </body>
</html>
