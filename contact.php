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
    <!-- AJAX Script -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
    <title>Homepage</title>
  </head>
  <body>
    <!-- Navbar -->
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
                <h2>Feel free to contact us!</h2>
                <p>If you would like to contact us, please feel free to use our contact form on this page</p>
              </div>
              <div class="col md-6">
                  <div class="card">
                    <div class="card-header">
                        Contact Form
                    </div>
                    <div class="card-body p-3">
                        <form action='contact.php' method='post' name='contact' id='contact-req'>
                            <div class="form-group">
                                <label for="contactName">Name </label>
                                <input type="text" name='cname' class="form-control" id="contactName" placeholder="Your name" required>   
                            </div>
                            <div class="form-group">
                                <label for="emailAddress">Email </label>
                                <input name='cemail' type="email" class="form-control" id="emailAddress" placeholder="Your email address" required>   
                            </div>
                            <div class="form-group">
                                <label for="contactMessage">Your Message </label>
                                <textarea name='cmessage' class="form-control" id="contactMessage" placeholder="Your message" rows="5" required></textarea>  
                            </div>
                            <button class="btn btn-primary" type="submit" name='contact'>Submit form</button>
                        </form>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </section>
    <!--Prepare SQL Statement -->
    <?php
        if(isset($_POST['contact'])){
            include('connection/conn.php');
            //Prepare the insert query
            $insertquery = "INSERT INTO miiLearning_ContactReq(name, message, email_address) VALUES (?,?,?)";
            
            if($stmt = mysqli_prepare($conn, $insertquery)){
                //Bind variable to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $newname, $newmessage, $newemail);
                
                //Set the values
                $newname = $_POST['cname'];
                $newemail = $_POST['cemail'];
                $newmessage = $_POST['cmessage'];
                
                mysqli_stmt_execute($stmt);
            } else {
                echo "Could not send request";
            }
        }
    ?>
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
    <!-- Validation scripts -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery.validate/1.13.0/additional-methods.min.js"></script>
    <script src="js/validation.js"></script>
  </body>
</html>
