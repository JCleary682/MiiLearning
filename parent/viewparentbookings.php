<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{
    header("Location: ../index.php");
}

include ("../connection/conn.php");
include("../functions/functions.php");

//Date php
$date = date('FORMAT');
$current_date = date('y-m-d');

//Get user id
$useridquery = "SELECT id FROM miiLearning_Users WHERE username = '{$_SESSION['mii_40159215']}'";
$userresult = mysqli_query($conn, $useridquery) or die(mysqli_error($conn));
$userarray = mysqli_fetch_array($userresult);
//Querys
$id = $userarray[0];
$bookingsquery = "SELECT miiLearning_bookings.id, miiLearning_bookings.price ,miiLearning_bookings.date, miiLearning_bookings.time, miiLearning_level.level, miiLearning_subjects.subject, miiLearning_Users.name 
                  FROM `miiLearning_bookings` 
                  INNER JOIN miiLearning_level
                  ON miiLearning_bookings.level = miiLearning_level.level_id 
                  INNER JOIN miiLearning_subjects
                  ON miiLearning_bookings.subject = miiLearning_subjects.subject_id
                  INNER JOIN miiLearning_Users
                  ON miiLearning_Users.id = miiLearning_bookings.tutor_id
                  WHERE `student_id` = $id AND `date` >= $current_date";

$previousbookingsquery = "SELECT miiLearning_bookings.id, miiLearning_bookings.tutor_id, miiLearning_bookings.student_id, miiLearning_bookings.date, miiLearning_bookings.time, miiLearning_bookings.subject, miiLearning_bookings.price, miiLearning_level.level, miiLearning_subjects.subject, miiLearning_Users.name   
                  FROM miiLearning_bookings
                  INNER JOIN miiLearning_level
                  ON miiLearning_bookings.level = miiLearning_level.level_id 
                  INNER JOIN miiLearning_subjects
                  ON miiLearning_bookings.subject = miiLearning_subjects.subject_id
                  INNER JOIN miiLearning_Users
                  ON miiLearning_bookings.student_id = miiLearning_Users.id
                  WHERE student_id = '$id' AND date <= '$current_date'";
$bookingsresult = mysqli_query($conn, $bookingsquery) or die(mysqli_error($conn));
$previousbookingsresult = mysqli_query($conn, $previousbookingsquery) or die(mysqli_error($conn));

//Set value of upcoming bookings (ERROR)
$upcomingbookings = 0;

//Generating an error a line 44
if(mysqli_num_rows($bookingsresult) > 0){
    while($row = mysqli_fetch_assoc($bookingsresult)){
        $upcomingbookings++;
    }
} else{
    echo "No result";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Student Bookings</title>
        <!-- Required Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
    </head>
    <body>
        <!-- Top of navbar -->
        <div name="container">
          <?php
          $navbar = parentNav();
          ?>
        </div>
        <!-- End of navbar -->
        
        <!--Main Header -->
        <header id="main-header" class="py-2 bg-danger text-white">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h1><i class="fa fa-gear"></i> Parent Bookings </h1>
                </div>
              </div>
            </div>
        </header>
        <!-- End of header -->
        <section id='bookingstable' class='py-3'>
            <div class='container'>
                <div class='col-md-9'>
                    <div class='card'>
                        <div class='card-header'>
                            <h4>Upcoming bookings</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope='col'>Time</th>
                                <th scope="col">Subject</th>
                                <th scope='col'>Level</th>
                                <th scope='col'>Price</th>
                                <th scope='col'></th>
                                <th scope='col'></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              if(mysqli_num_rows($bookingsresult)>0){

                                  while($row = mysqli_fetch_assoc($bookingsresult)){
                                      $get_id = $row['id'];
                                      $get_name = $row['name'];
                                      $get_date = $row['date'];
                                      $get_time = $row['time'];
                                      $get_subject = $row['subject'];
                                      $get_level = $row['level'];
                                      $get_price = $row['price'];
                                      echo "<tr>
                                                <td scope='row'></td>
                                                <td>$get_name</td>
                                                <td>$get_date</td>
                                                <td>$get_time</td>
                                                <td>$get_subject</td>
                                                <td>$get_level</td>
                                                <td>£$get_price</td>
                                                <td><a class='btn btn-success'>Confirm</a></td>
                                                <td><a class='btn btn-danger'>Cancel</a></td>
                                            </tr>";
                                  }
                              }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Previous bookings table -->
         <section id='bookingstable' class='py-3'>
            <div class='container'>
                <div class='col-md-9'>
                    <div class='card'>
                        <div class='card-header'>
                            <h4>Previous bookings</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope='col'>Time</th>
                                <th scope="col">Subject</th>
                                <th scope='col'>Level</th>
                                <th scope='col'>Price</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              if(mysqli_num_rows($previousbookingsresult)>0){

                                  while($row = mysqli_fetch_assoc($previousbookingsresult)){
                                      $get_id = $row['id'];
                                      $get_name = $row['name'];
                                      $get_date = $row['date'];
                                      $get_time = $row['time'];
                                      $get_subject = $row['subject'];
                                      $get_level = $row['level'];
                                      $get_price = $row['price'];
                                      
                                      echo "<tr>
                                                <td scope='row'></td>
                                                <td>$get_name</td>
                                                <td>$get_date</td>
                                                <td>$get_time</td>
                                                <td>$get_subject</td>
                                                <td>$get_level</td>
                                                <td>£$get_price</td>
                                            </tr>";
                                  }
                              }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        
        
        
        
    </body>
</html>
