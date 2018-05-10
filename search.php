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
    <section id="content" class=py-3>
        <div class="container">
            <div class='row'><h1>Search</h1></div>
            <div class="row">
                <form method='POST' id='searchform'>
                    <p>Search For Tutor: <input type='text' name='searchdata'/></p>
                    <p><input type='submit' value='search tutors' name='search'/></p>
                </form>
            </div>
            <div class='row'>
                <?php
                if(isset($_POST['search'])){
                    include("connection/conn.php");
                    $mysearchdata = $_POST['searchdata'];
                    
                    
                    $searchquery = "SELECT miiLearning_Users.id, miiLearning_Users.name, miiLearning_Users.profile_pic, miiLearning_subjects.subject, miiLearning_level.level\n"
                        . "FROM miiLearning_Users\n"
                        . "INNER JOIN miiLearning_Tutors \n"
                        . "ON miiLearning_Tutors.tutor_id = miiLearning_Users.id\n"
                        . "INNER JOIN miiLearning_subjects \n"
                        . "ON miiLearning_Tutors.subjects = miiLearning_subjects.subject_id\n"
                        . "INNER JOIN miiLearning_level\n"
                        . "ON miiLearning_level.level_id = miiLearning_Tutors.subject_level\n"
                        . "WHERE name LIKE '%$mysearchdata%'"
                        . "OR subject LIKE '%$mysearchdata%'"
                        . "OR level LIKE '%$mysearchdata%'"
                        . "LIMIT 0 , 30"
                        . "";
                        
                    $searchresult = mysqli_query($conn, $searchquery) or die(mysqli_error($conn));
                    
                    
                    //Display the results of the search
                    if(mysqli_num_rows($searchresult) > 0){
                        echo "<p>We have the following results</p>";
                        
                        while($row = mysqli_fetch_assoc($searchresult)){
                            $tutorname = $row["name"];
                            $tutorid = $row["id"];
                            $tutorpropic = $row["profile_pic"];
                            $tutorsubject = $row["subject"];
                            $tutorlevel = $row["level"];
                            $tutorid= $row["id"];
                            
                            echo " 
                                        <div class='col-md-3'>
                                            <div class='card mx-3 h-100'>
                                                <img src='img/$tutorpropic' alt='' class='card-img-top img-fluid'>
                                                <div class='card-body'>
                                                    <h4 class='card-title'>$tutorname</h4>
                                                    <hr>
                                                    <p class='card-text'>$tutorsubject</p>
                                                    <p class='card-text'>$tutorlevel</p>
                                                    

                                                </div>
                                                <div class='card-footer'>
                                                    <a class='btn btn-primary' href='tutordetails.php?tutor_id=$tutorid'>Find Out More</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    ";   
                            
                        }
                        
                    } else{
                        echo "<p>Sorry we have no tutors with that name</p>";
                    }
                }
                ?>
            </div>
            </div>
        </div>
    </section>
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
