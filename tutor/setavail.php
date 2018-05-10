<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{
    header("Location: ../index.php");
}

include ("../connection/conn.php");
include("../functions/functions.php");

//Get tutor id
$useridquery = "SELECT * FROM miiLearning_Users WHERE username = '{$_SESSION['mii_40159215']}'";
$userresult = mysqli_query($conn, $useridquery) or die(mysqli_error($conn));
//Arrays for user id
$userarray = mysqli_fetch_array($userresult);
$tutorid = $userarray[0];

mysqli_close($conn);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Admin Home Area</title>
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
          $navbar = tutorNav();
          ?>
        </div>
        <!-- End of navbar -->
        
        <!--Main Header -->
        <header id="main-header" class="py-2 bg-success text-white">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h1><i class="fa fa-gear"></i> Set Availability</h1>
                </div>
              </div>
            </div>
        </header>
        <!-- End of header -->
        
        <section id="info" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mx-3 bg-light">
                            <div class="card-header">Set Availability</div>
                            <div class="card-body">
                                <!--Booking System -->
                                <form enctype="multipart/form-data" action='setavail.php' method="POST" id="set-avail-form" name="set" >
                                        <!--Tutor ID (Posted from previous page) -->
                                        <input type="hidden" name="tutorId" value='<?php echo "$userarray[0]";?>'>
                                        <!-- Subject -->
                                        <div class="form-group">
                                            <label for="monday">Monday</label>
                                            <input type="checkbox" name="monday" value="1" id="monday0">
                                        </div>
                                        <!-- Level -->
                                        <div class="form-group">
                                            <label for="tuesday">Tuesday</label>
                                            <input type="checkbox" name="tuesday" value="1" id="tuesday0">
                                        </div>
                                        <div class="form-group">
                                            <label for="wednesday">Wednesday</label>
                                            <input type="checkbox" name="wednesday" value="1" id="wednesday0">
                                        </div>
                                        <div class="form-group">
                                            <label for="Thursday">Thursday</label>
                                            <input type="checkbox" name="Thursday" value="1" id="Thursday0">
                                        </div>
                                        <!-- Level -->
                                        <div class="form-group">
                                            <label for="Friday">Friday</label>
                                            <input type="checkbox" name="Friday" value="1" id="Friday0">
                                        </div>
                                        <div class="form-group">
                                            <label for="Saturday">Saturday</label>
                                            <input type="checkbox" name="Saturday" value="1" id="Saturday0">
                                        </div>
                                        <div class="form-group">
                                            <label for="Sunday">Sunday</label>
                                            <input type="checkbox" name="Sunday" value="1" id="Sunday0">
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="set" >Submit form</button>
                                    
                                </form>
                                <?php
                                if(isset($_POST['set'])){
                                    include('../connection/conn.php');
                                    
                                    $tutorid = $_POST['tutorId'];
                                    if (isset($_POST['monday'])) {
                                        $mondaydata = 1;
                                    } else {
                                        $mondaydata = 0;
                                    }
                                    
                                    if (isset($_POST['tuesday'])) {
                                        $tuesdaydata = 1;
                                    } else {
                                        $tuesdaydata = 0;
                                    }
                                    if (isset($_POST['wednesday'])) {
                                        $wednesdaydata = 1;
                                    } else {
                                        $wednesdaydata = 0;
                                    }
                                    if (isset($_POST['Thursday'])) {
                                        $thursdaydata = 1;
                                    } else {
                                        $mondaydatadata = 0;
                                    }
                                    
                                    if (isset($_POST['Friday'])) {
                                        $fridaydata = 1;
                                    } else {
                                        $fridaydata = 0;
                                    }
                                    if (isset($_POST['Saturday'])) {
                                        $saturdaydata = 1;
                                    } else {
                                        $saturdaydata = 0;
                                    }
                                    if (isset($_POST['Sunday'])) {
                                        $sundaydata = 1;
                                    } else {
                                        $sunddaydata = 0;
                                    }
                                    
                                    //Prepare the insert statement                  
                                    $insertquery = "INSERT INTO miiLearning_tutorAvail(tutor_id, monday, tuesday, wednesday, thursday, friday, saturday, sunday) VALUES (?,?,?,?,?,?,?)";
                                    
                                    
                                    if($stmt = mysqli_prepare($conn, $insertquery)){
                                        //bind variable to the prepared statement as parameters
                                        mysqli_stmt_bind_param($stmt, "iiiiiiii", $tutorid, $newbefore5, $new5to7, $newafter7);

                                        mysqli_stmt_execute($stmt);

                                        echo"<p>Tutor Availability Set</p>";
                                        //Check details
                                    } else{
                                        echo "ERROR: Could not prepare query: $query . " . mysqli_error($conn);
                                    }
                                }
                                ?>
                            </div> 
                        </div>
                    </div>
                </row>
            </div>
            </div>
        </section>  
    </body>
</html>
