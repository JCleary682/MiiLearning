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
    
    <!-- Info Section -->
    <section id="info" class=py-3>
        <div class="container">
            <div class="row">
              <div class="col md-6 align-self-center">
                <h2>Join the online learning revolution!</h2>
                <br>
                <p>Welcome to Miitutor, the next step in online learning environments. Through this website, you are given access to a variety of different tutors with experience from GCSE to PHD in a variety of different subjects.</p><br>
                <p>Miitutor is a personal project motivated to connect eager students with the people and resources which can enhance their learning and boost their grades.</p><br>
                <p>Miitutor offers parents, students and tutors a platform to exchange ideas and learn together. Why not view our tutors to see what we have on offer?</p><br>
                  <a href="tutors.php" class="btn btn-outline-danger btn-lg">View Our Tutors</a>
              </div>
              <div class="col md-6">
                  <img src="img/tutor1.jpg" alt="" class="img-fluid">
              </div>
            </div>
        </div>
    </section>
    <!--End of info section -->
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
