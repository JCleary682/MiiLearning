<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{
    header("Location: ../index.php");
}

include ("../connection/conn.php");
include("../functions/functions.php");

$subjectsquery = "SELECT * FROM miiLearning_subjects";
$levelquery = "SELECT * FROM miiLearning_level";
$useridquery = "SELECT * FROM miiLearning_Users WHERE username = '{$_SESSION['mii_40159215']}'";

//Query results
$subjectsresult = mysqli_query($conn, $subjectsquery) or die(mysqli_error($conn));
$levelresult = mysqli_query($conn, $levelquery) or die(mysqli_error($conn));
$userresult = mysqli_query($conn, $useridquery) or die(mysqli_error($conn));

//User array
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
                  <h1><i class="fa fa-gear"></i> Update Your Subjects</h1>
                </div>
              </div>
            </div>
        </header>
        <!-- End of header -->
        
        <section id="info" class="py-3">
            <div class="container">
                <div class='row'>
                    <h1>Update Subjects</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mx-3 bg-light">
                            <div class="card-header">Add Subjects <?php echo "$tutorid";?></div>
                            <div class="card-body">
                                <!--Booking System -->
                                <form enctype="multipart/form-data" action='updatesubjects.php' method="POST" id="update-subjects-form" name="newsubject" >
                                    
                                        <!--Tutor ID (Posted from previous page) -->
                                        <input type="hidden" name="tutorId" value='<?php echo "$tutorid";?>'>
                                        <!-- Subject -->
                                        <div class="form-group">
                                            <label for="subjects">Subject</label>
                                            <select name="subjects" class="form-control">
                                                <?php
                                                if(mysqli_num_rows($subjectsresult)>0){

                                                    while($row = mysqli_fetch_assoc($subjectsresult)){
                                                        $get_subjectid = $row['subject_id'];
                                                        $get_subjectname = $row['subject'];
                                                        
                                                        echo "<option value='$get_subjectid'>$get_subjectname</option>";
                                                    }
                                                }
                                                ?>   
                                            </select>
                                        </div>
                                        <!-- Level -->
                                        <div class="form-group">
                                            <label for="subjectlevel">Subject Level</label>
                                            <select name="subjectlevel" class="form-control">
                                                <?php 
                                                if(mysqli_num_rows($levelresult) > 0){
                                                    while($row = mysqli_fetch_assoc($levelresult)){
                                                        $get_levelid = $row['level_id'];
                                                        $get_namelevel = $row['level'];
                                                        echo "<option value='$get_levelid'>$get_namelevel</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="subjectlevel">Price</label>
                                            <input type='number' step='0.01' min='0' name='price'>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="newsubject" >Submit form</button>
                                    
                                </form>
                                <?php
                                if(isset($_POST['newsubject'])){
                                    include('../connection/conn.php');
                                    
                                    //Prepare values
                                    $newtutor = mysqli_real_escape_string($conn, $_POST['tutorId']);
                                    $newsubject = mysqli_real_escape_string($conn, $_POST['subjects']);
                                    $newlevel = mysqli_real_escape_string($conn, $_POST['subjectlevel']);
                                    $newprice = mysqli_real_escape_string($conn, $_POST['price']);

                                    //Prepare the insert statement
                                    $insertquery = "INSERT INTO miiLearning_Tutors(tutor_id, subject_level, price, subjects) VALUES (?,?,?,?)";
                                    
                                    $stmt = mysqli_stmt_init($conn);
                                    
                                    if(!mysqli_stmt_prepare($stmt, $insertquery)){
                                        echo "SQL ERROR!";
                                    } else{
                                        mysqli_stmt_bind_param($stmt, "iidi", $newtutor, $newlevel, $newprice, $newsubject);
                                        mysqli_stmt_execute($stmt);
                                        echo "Query Successful!";
                                    }
                                }
                                ?>
                            </div> 
                        </div>
                    </div>
                    
                
            </div>
        </section>
        
        
        
        
    </body>
</html>
