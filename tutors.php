<?php
include("connection/conn.php");
include("functions/functions.php");


$subjectquery="SELECT * FROM miiLearning_subjects";
$levelquery = "SELECT * FROM miiLearning_level";
$locationquery = "SELECT id, address FROM miiLearning_Users WHERE type_id=1 GROUP BY address";

//Results
//$result = mysqli_query($conn, $query);
$subjectresult = mysqli_query($conn, $subjectquery);
$levelresult = mysqli_query($conn, $levelquery);
$locationresult = mysqli_query($conn, $locationquery) or die(mysqli_error($conn));
mysqli_close($conn);

//Filtering
if(isset($_POST['filter'])){
    $valuetosearch = $_POST['level'].''.$_POST['subject'].''.$_POST['location'];
    //Check if posting is working
    echo "$valuetosearch";
    $query = "SELECT miiLearning_Users.id, miiLearning_Users.name ,miiLearning_Users.profile_pic , miiLearning_subjects.subject, miiLearning_level.level, miiLearning_Users.address
            FROM `miiLearning_Users`
            INNER JOIN miiLearning_Tutors
            ON miiLearning_Tutors.Tutor_id = miiLearning_Users.id
            INNER JOIN miiLearning_subjects
            ON miiLearning_Tutors.subjects = miiLearning_subjects.subject_id
            INNER JOIN miiLearning_level
            ON miiLearning_level.level_id = miiLearning_Tutors.subject_level
            WHERE CONCAT(miiLearning_level.level, miiLearning_subjects.subject, miiLearning_Users.address) LIKE '%$valuetosearch%' AND miiLearning_Users.type_id=1";
    $searchresult = filtertutors($query);
    
}else{
    $query="SELECT miiLearning_Users.id, miiLearning_Users.name ,miiLearning_Users.profile_pic , miiLearning_subjects.subject, miiLearning_level.level, miiLearning_Users.address
            FROM `miiLearning_Tutors`
            INNER JOIN miiLearning_Users
            ON miiLearning_Users.id = miiLearning_Tutors.Tutor_id
            INNER JOIN miiLearning_subjects
            ON miiLearning_Tutors.subjects = miiLearning_subjects.subject_id
            INNER JOIN miiLearning_level
            ON miiLearning_level.level_id = miiLearning_Tutors.subject_level
            WHERE miiLearning_Users.type_id=1
            GROUP BY miiLearning_Users.id";
    $searchresult = filtertutors($query);
}

//Filter function
function filtertutors($query)
{
    include("connection/conn.php");
    $filterresult = mysqli_query($conn, $query);
    return $filterresult;
}
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
    <title>Tutors</title>
  </head>
  <body>
    <div class="container">
          <?php
          $navbar = displayNonRegNav();
          ?>
    </div>

    <section>
        <div class='container'>
            <form class="form-inline" method="post" name="filter" action='tutors.php'>
                <div class="row">
                    <h3>Filter By:</h3>
                    <div class="col-md-3">
                        <label class="my-1 mr-2" for="inlineLevel">Select Level</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineLevel" name='level' >
                            <option value="" name='' selected>Level</option>
                            <?php
                            if(mysqli_num_rows($levelresult) > 0){
                                while($row = mysqli_fetch_assoc($levelresult)){
                                    $levelid = $row["level_id"];
                                    $levelname = $row["level"];

                                    //Drop down list for sorting

                                    echo" <option value='$levelname' name='level'>$levelname</option>";
                                }

                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label class="my-1 mr-2" for="inlineSubject">Select Subject</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineSubject" name='subject'>
                            <option value="" selected>Level</option>
                            <?php
                            if(mysqli_num_rows($subjectresult) > 0){
                                while($row = mysqli_fetch_assoc($subjectresult)){
                                    $subjectid = $row["subject_id"];
                                    $subjectname = $row["subject"];
                                    echo" <option value='$subjectname' name='subject'>$subjectname</option>";
                                }

                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label class="my-1 mr-2" for="inlineLocation">Select Location</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineLocation" name="location">
                            <option value="" selected>Level</option>
                            <?php
                            if(mysqli_num_rows($locationresult) > 0){
                                while($row = mysqli_fetch_assoc($locationresult)){
                                    $tutorlocid = $row["id"];
                                    $location = $row["address"];
                                    echo" <option value='$location' name='location'>$location</option>";
                                }

                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" class="submit" type="submit" name="filter" id="filterform">Submit form</button>
                    </div>
                </div>
            </form>    
        </div>
      </section>
      
    
    
    <!-- First Section -->
    <section id="home-icons" class="py-5">
          <div class="container">
            <div class="row">
              <?php       
                            if( mysqli_num_rows($searchresult) > 0){      
                                while($row = mysqli_fetch_assoc($searchresult)){
                                $tutoriddata = $row["id"];
                                $get_name =$row["name"];
                                $locate_data=$row["address"];
                                $img_data = $row["profile_pic"];
                                $subjectname = $row["subject"];
                                $subjectlevel = $row["level"];
                                
                                echo "
                                        <div class='col-sm-3'>
                                            <div class='card w-100 m-3 h-80'>
                                            <div class='card-head w-100 h-100'>
                                                <img src='img/$img_data' alt='' width='100px' height='100px' class='card-img-top img-fluid'>
                                            </div>  
                                                <div class='card-body'>
                                                    <h4 class='card-title'>$get_name</h4>
                                                    <hr>
                                                    <p class='card-text'>$locate_data</p>
                                                    <p class='card-text'>$subjectname</p>
                                                    <p class='card-text'>$subjectlevel</p>

                                                </div>
                                                <div class='card-footer'>
                                                    <a class='btn btn-primary' href='tutordetails.php?tutor_id=$tutoriddata'>Find Out More</a>
                                                </div>
                                            </div>
                                        </div>
                                    ";            
                                }
                            } else {
                                echo "<h2>Sorry no tutors are available in your specified range</h2>";
                            }
                        ?>
            </div>
          </div>
    </section>
    <!-- End of first section -->
    
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
