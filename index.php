<?php
include("functions/functions.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ui.css">
    <title>Homepage</title>
  </head>
  <body>
      <div name="container">
          <?php
          $navbar = displayNonRegNav();
          ?>
          
      </div>
    <!-- End of navbar -->
    
    <!-- Top of page carousel for images -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouseExamplelIndicators" data-slide-to="1"></li>
          <li data-target="#carouseExamplelIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="img/blackboard.jpg" alt="First slide" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block">
              <h2>This is the first image</h2>
            </div>
          </div>
          <div class="carousel-item">
              <img src="img/blackboard2.jpg" alt="Second slide" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block">
              <h2>This is the second image</h2>
            </div>
          </div>
          <div class="carousel-item">
              <img src="img/scrabble.jpeg" alt="Third slide" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block">
              <h2>This is the third image</h2>
            </div>
          </div>
        </div>

        <a href="#carouselExampleIndicators" class="carousel-control-prev" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a href="#carouselExampleIndicators" class="carousel-control-next" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    
    <!--End of carousel -->
    
    <!-- First Section -->
    <section id="home-icons" class="py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-4 mb-4 text-center">
                <i class="fa fa-cog mb-2"></i>
                <h3>Value Tutoring</h3>
                <p>High quality utoring is available at value prices.</p>
              </div>
              <div class="col-md-4 mb-4 text-center">
                <i class="fa fa-cloud mb-2"></i>
                <h3>Topic Range</h3>
                <p>We have a range of topics from English to Maths up to and including phd level</p>

              </div>
              <div class="col-md-4 mb-4 text-center">
                <i class="fa fa-cart-plus mb-2"></i>
                <h3>Make Some Money</h3>
                <p>Register as a tutor and make some money for your knowledge</p>
              </div>
            </div>
          </div>
    </section>
    <!-- End of first section -->
    
    <!-- Start of second section -->
    <section id="home-heading" class="p-5 bg-success">
          <div class="dark-overlay">
            <div class="row">
              <div class="col">
                <div class="container pt-5">
                  <h1 class="text-center">Are you ready to get started?</h1>
                </div>
              </div>
            </div>
          </div>
    </section>
    <!-- end of second section -->
    <!-- Info Section -->
    <section id="info" class=py-3>
        <div class="container">
            <div class="row">
              <div class="col md-6 align-self-center">
                <h3>Register as a student or parent</h3>
                <p>To book a lesson with one of our expert tutors, you must first register as a parent or student. Parent accounts are necessary for any prospective students under the age of 16.</p>
                <a href="register.php" class="btn btn-outline-danger btn-lg">Learn More</a>
              </div>
              <div class="col md-6">
                <img src="img/tutor1.jpg" alt="" class="img-fluid">
              </div>
            </div>
        </div>
    </section>
    <!--End of info section -->
    <!-- Start of tutor section -->
    <section id="home-heading" class="p-5 bg-success">
          <div class="dark-overlay">
            <div class="row">
              <div class="col">
                <div class="container pt-5">
                  <h1 class="text-center">Earn some extra cash for your knowledge</h1>
                </div>
              </div>
            </div>
          </div>
    </section>
    <!-- end of tutor section -->
    <!-- Tutor info Section -->
    <section id="info" class=py-3>
        <div class="container">
            <div class="row">
              <div class="col md-6">
                <img src="img/tutor2.jpeg" alt="" class="img-fluid">
              </div>
              <div class="col md-6 align-self-center">
                <h3>Register as a tutor</h3>
                <p>To earn anything between £10-30 per hour for your knowledge, you can register as a tutor today. to find out more click the link below.</p>
                <a href="register.php" class="btn btn-outline-danger btn-lg">Learn More</a>
              </div>
            </div>
        </div>
    </section>
    <!--End of tutor info section -->
    <!--Page Footer -->
    <footer class="bg-success text-white mt-5 p-5" id="main-footer">
      <div class="container">
        <div class="row">
          <div class="col">
            <p class="lead text-center">Copyright &copy; 2018 miitutor</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
