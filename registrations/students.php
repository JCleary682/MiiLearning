<?php
include("../functions/functions.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ui.css">
    <title>Homepage</title>
  </head>
  <body>
    <!-- Start of navbar -->
    <div name="container">
          <?php
          $navbar = RegFormNav();
          ?>      
    </div>
    <!-- End of navbar -->
    
    <!-- Info Section -->
    <section id="info" class=py-3>
        <div class="container">
            <div class="row">
              <div class="col md-6 align-self-center">
                <h2>Register as a Student</h2>
                <p>If you would like to register as a student, please fill out the following form</p>
              </div>
              <div class="col md-6">
                  <div class="card">
                    <div class="card-header">
                        Student Registration
                    </div>
                    <div class="card-body p-3">
                        <form enctype="multipart/form-data" action="" method="post" name="students-reg" id="students-reg">
                            <div class="form-group">
                                <label for="contactName">Name </label>
                                <input type="text" class="form-control" id="contactName" placeholder="Your name" name="fullname" required>   
                            </div>
                            <div class="form-group">
                                <label for="emailAddress">Email </label>
                                <input type="email" class="form-control" id="emailAddress" placeholder="Your email address" name="email" required>   
                            </div>
                            <div class="form-group">
                                <label for="contactNumber">Your Number </label>
                                <input type="tel" class="form-control" id="contactNumber" placeholder="Your contact number" name='contactNumber' required >  
                            </div>
                            <div class="form-group">
                                <label for="username">Your Username </label>
                                <input type="text" class="form-control" id="username" placeholder="Your username" name="username" required >  
                            </div>
                            <div class="form-group">
                                <label for="username">Location </label>
                                <input name="address" id="stuaddress" type="text" class="form-control" required> 
                            </div>
                            <div class="form-group">
                                    <label for="file">Profile Image</label>
                                    <input name="propic" type="file" class="form-control-file">
                                    <small class="form-text text-muted">Max Size 3mb</small>
                                </div>
                            <!--Issues with password validation -->
                            <div class="form-group">
                                <label for="password3">Your password </label>
                                <input type="password" class="form-control" id="password3" placeholder="Your Password" name="password3" required >  
                            </div>
                            <div class="form-group">
                                <label for="password4">Confirm Password </label>
                                <input type="password" class="form-control" id="password4" placeholder="Confirm Password" name="password4" required >  
                            </div>
                            <input type="hidden" name="usertype" value="2">
                            <button class="btn btn-primary" type="submit" name='students' id='students'>Submit form</button>
                        </form>
                        <!--Prepared statement to submit parental details -->
                        <?php
                        if(isset($_POST['students'])){
                            include('../connection/conn.php');
                            
                            //Prepare the insert statement
                            $query = "INSERT INTO miiLearning_Users(type_id, name, address, email_address, phone_number, 
                                     password, username, profile_pic) VALUES (?,?,?,?,?,?,?,?)";
                            
                            if($stmt = mysqli_prepare($conn, $query)){
                                //bind variable to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "isssssss", $newtypeid, $newname, $newaddress, 
                                        $newemail, $newnumber, $newpassword, $newusername, $newprofilepicname);
                                
                                //Set Values
                                $newtypeid = $_POST['usertype'];
                                $newpassword = $_POST['password3'];
                                $newprofilepicname = $_FILES['propic']['name'];
                                $newprofilepictemp = $_FILES['propic']['tmp_name'];
                                $newusername = $_POST['username'];
                                $newemail = $_POST['email'];
                                $newname = $_POST['fullname'];
                                $newaddress = $_POST['address'];
                                $newnumber = $_POST['contactNumber'];
                                
                                
                                if(!empty($newprofilepicname)){
                                    move_uploaded_file($newprofilepictemp, "../img/$newprofilepicname");
                                } else{
                                  echo "<p>No file selected</p>";
                                    die();
                                }
                                
                                mysqli_stmt_execute($stmt);

                                echo"<p>Registration successful</p>";
                            } else{
                                echo "ERROR: Could not prepare query: $query . " . mysqli_error($conn);
                            }
                            
                        }
                        ?>
                    </div>
                  </div>
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
    <!-- Validation scripts -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery.validate/1.13.0/additional-methods.min.js"></script>
    <script src="../js/validation.js"></script>
  </body>
</html>
