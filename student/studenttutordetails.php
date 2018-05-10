<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{
    header("Location: ../index.php");
}

include("../connection/conn.php");
include("../functions/functions.php");

$tutoritem = htmlentities($_GET["tutor_id"]);
$tutoriddata = $tutoritem;

$queryread = "SELECT miiLearning_Users.id, miiLearning_Users.name, miiLearning_Users.username, miiLearning_Users.profile_pic, miiLearning_Users.tutor_descript
            FROM miiLearning_Users    
            WHERE miiLearning_Users.id = '$tutoritem'";

$querySubjects = "SELECT miiLearning_Tutors.subject_level, miiLearning_Tutors.subjects, miiLearning_Tutors.tutor_id, miiLearning_subjects.subject, miiLearning_level.level, miiLearning_Tutors.price
                  FROM miiLearning_Tutors
                  INNER JOIN miiLearning_subjects
                  ON miiLearning_Tutors.subjects =  miiLearning_subjects.subject_id
                  INNER JOIN miiLearning_level
                  ON miiLearning_Tutors.subject_level = miiLearning_level.level_id
                  WHERE miiLearning_Tutors.tutor_id = '$tutoritem'";
$queryAvail = "SELECT *
                FROM miiLearning_tutorAvail
                WHERE tutor_id = '$tutoritem'";

$result = mysqli_query($conn, $queryread) or die(mysqli_error($conn));
$subjectresult = mysqli_query($conn, $querySubjects) or die(mysqli_error($conn));
$availresult = mysqli_query($conn, $queryAvail) or die(mysqli_error($conn));
mysqli_close($conn);
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
        <title>Tutor Details</title>
    </head>
    <body>
        <div name="container">
            <?php
            $navbar = studentNav();
            ?>
        </div>

        <!-- Sample Section -->

        <!-- First Section -->
        <section id="home-icons" class="py-5">
            <div class="container-fluid">
                <div class="row">
                    <br>
                    <?php
                    //Store column value into local php variable
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $namedata = $row["name"];
                            $img_data = $row["profile_pic"];
                            $descript_data = $row["tutor_descript"];
                            $tutoriddata = $row["id"];

                            echo "<div class='container'>
                                    <div class='row'>
                                        <div class='col-8'>
                                            <h1>$namedata</h1>
                                        </div>
                                        <div class='col-4'>
                                            <a class='btn btn-primary' href='studentbookingsystem.php?tutor_id=$tutoritem'>Find Out More</a>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-8'>
                                            <p>$descript_data</p>
                                        </div>
                                        <div class='col-4'>
                                            <img src='../img/$img_data' class='img-fluid'>
                                        </div>
                                    </div>
                                    
                                </div>";
                        }
                    } else {
                        echo "Not Working";
                    }
                    ?>
                </div>        
            </div>
            
            <div class='container'>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='row'>
                            <p>Description of subjects offered and times available</p> 
                        </div>
                        <!-- Subject info php -->
                        <table class = 'table table-sm'>
                            <thead>
                                <tr>
                                    <th scope = 'col'>Subject</th>
                                    <th scope = 'col'>Level</th>
                                    <th scope = 'col'>Price</th>
                                </tr>
                            </thead>
                                    <tbody>
                                    <?php
                                    if (mysqli_num_rows($subjectresult) > 0) {
                                        while ($row = mysqli_fetch_assoc($subjectresult)) {
                                            $subject_data = $row["subject"];
                                            $subject_level_data = $row["level"];
                                            $subjectPrice = $row["price"];

                                            echo "

                                                    <tr>
                                                        <td>$subject_data</td>
                                                        <td>$subject_level_data</td>
                                                        <td>£$subjectPrice</td>
                                                    </tr>
                                                ";
                                        }
                                    } else{
                                        echo " <p>Unable to show subject data at this time </p>";
                                    }
                                    ?>
                                </tbody>
                        </table>
                        
                        <br>
                        <br>
                        <!-- Availability Info -->
                        <section id='subjects' class='py-3'>
                        <div class='container'>
                            <div class='col'>
                                <div class='card'>
                                    <div class='card-header col-lg-12'>
                                        <h4><?php echo"$namedata" ?> Availability</h4>
                                    </div>
                                    <table class="table table-striped">
                                        <thead class="thead-inverse">
                                          <tr>
                                            <th scope="col-sm-1">Monday</th>
                                            <th scope='col-sm-1'>Tuesday</th>
                                            <th scope='col-sm-1'>Wednesday</th>
                                            <th scope="col-sm-1">Thursday</th>
                                            <th scope='col-sm-1'>Friday</th>
                                            <th scope='col-sm-1'>Saturday</th>
                                            <th scope='col-sm-1'>Sunday</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          if(mysqli_num_rows($availresult)>0){

                                              while($row = mysqli_fetch_assoc($availresult)){
                                                  
                                                  $get_monday = $row['Monday'];
                                                  $get_tuesday = $row['Tuesday'];
                                                  $get_wednesday = $row['Wednesday'];
                                                  $get_thursday = $row['Thursday'];
                                                  $get_friday = $row['Friday'];
                                                  $get_saturday = $row['Saturday'];
                                                  $get_sunday = $row['Sunday'];
                                                  $img_mon;
                                                  $img_tue;
                                                  $img_wed;
                                                  $img_thur;
                                                  $img_fri;
                                                  $img_sat;
                                                  $img_sun;
                                                  
                                            
                                                  if($get_monday == 0){
                                                        $img_mon = "cross.png";
                                                  } else {
                                                        $img_mon = "tick.png";
                                                  }
                                            
                                                  if($get_tuesday == 0){
                                                    $img_tue = "cross.png";
                                                  } else {
                                                    $img_tue = "tick.png";
                                                  }
                                            
                                                  if($get_wednesday == 0){
                                                    $img_wed = "cross.png";
                                                  } else {
                                                    $img_wed = "tick.png";
                                                  }
                                                  if($get_thursday == 0){
                                                        $img_thur = "cross.png";
                                                  } else {
                                                        $img_thur = "tick.png";
                                                  }
                                            
                                                  if($get_friday == 0){
                                                    $img_fri = "cross.png";
                                                  } else {
                                                    $img_fri = "tick.png";
                                                  }
                                            
                                                  if($get_saturday == 0){
                                                    $img_sat = "cross.png";
                                                  } else {
                                                    $img_sat = "tick.png";
                                                  }
                                                  if($get_sunday == 0){
                                                    $img_sun = "cross.png";
                                                  } else {
                                                    $img_sun = "tick.png";
                                                  }
                                            
                                            echo "<tr>
                                                        <td><img src='../img/$img_mon' class='img-responsive' width='50px' height='50px'></td>
                                                        <td><img src='../img/$img_tue' class='img-responsive' width='50px' height='50px'></td>
                                                        <td><img src='../img/$img_wed' class='img-responsive' width='50px' height='50px'></td>
                                                        <td><img src='../img/$img_thur' class='img-responsive' width='50px' height='50px'></td>
                                                        <td><img src='../img/$img_fri' class='img-responsive' width='50px' height='50px'></td>
                                                        <td><img src='../img/$img_sat' class='img-responsive' width='50px' height='50px'></td>
                                                        <td><img src='../img/$img_sun' class='img-responsive' width='50px' height='50px'></td>
                                                    </tr>
                                                ";
                                              }
                                          }
                                          ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>    
                    </div>
                </div>
                
            </div>
        </section>
        <!-- End of first section -->

        <!--Page Footer -->
        <footer class="bg-dark text-white mt-5 p-5" id="main-footer">
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
