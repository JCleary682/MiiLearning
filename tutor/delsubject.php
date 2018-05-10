<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{
    header("Location: ../index.php");
}

include ("../connection/conn.php");
include("../functions/functions.php");

//Get tutor id
//Get tutor id
$useridquery = "SELECT * FROM miiLearning_Users WHERE username = '{$_SESSION['mii_40159215']}'";
$userresult = mysqli_query($conn, $useridquery) or die(mysqli_error($conn));
//Arrays for user id
$userarray = mysqli_fetch_array($userresult);
$tutorid = $userarray[0];

//
$subjectdata = mysqli_real_escape_string($conn, $_GET['sendid']);
$sql = "DELETE FROM miiLearning_Tutors WHERE id='$subjectdata'";
$result= mysqli_query($conn, $sql);

//Get subjects
$subjectsquery = "SELECT miiLearning_Tutors.id, miiLearning_Tutors.subject_level, miiLearning_Tutors.subjects, miiLearning_Tutors.price, miiLearning_level.level , miiLearning_subjects.subject
                  FROM miiLearning_Tutors
                  INNER JOIN miiLearning_subjects
                  ON miiLearning_Tutors.subjects = miiLearning_subjects.subject_id
                  INNER JOIN miiLearning_level
                  ON miiLearning_Tutors.subject_level = miiLearning_level.level_id
                  WHERE tutor_id = '$tutorid'";
$subjectsqueryresult = mysqli_query($conn, $subjectsquery) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Admin Home Area <?php echo"$tutorid"; ?></title>
        <!-- Required Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div name="container">
          <?php
          $navbar = tutorNav();
          ?>
        </div>
        
        <!--Main Header -->
        <header id="main-header" class="py-2 bg-success text-white">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h1><i class="fa fa-gear"></i> Profile Details</h1>
                </div>
              </div>
            </div>
        </header>
        <!-- End of header -->
        
        <section id="info" class="py-3">
            <div class="container">
                <div class='row'>
                    <!--Table with add and remove functions -->
                    <section id='subjects' class='py-3'>
                        <div class='container'>
                            <div class='col-md-12'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <h4>Your Current Subjects</h4>
                                        <a class='btn btn-primary' href='updatesubjects.php'>Add new subject</a>
                                    </div>
                                    <table class="table table-striped">
                                        <thead class="thead-inverse">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Subject</th>
                                            <th scope='col'>Level</th>
                                            <th scope='col'>Price</th>
                                            <th scope='col'></th>
                                            <th scope='col'></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          if(mysqli_num_rows($subjectsqueryresult)>0){

                                              while($row = mysqli_fetch_assoc($subjectsqueryresult)){
                                                  $get_id = $row['id'];
                                                  $get_subject = $row['subject'];
                                                  $get_level = $row['level'];
                                                  $get_price = $row['price'];
                                                  echo "<tr>
                                                            <td scope='row'></td>
                                                            <td>$get_subject</td>
                                                            <td>$get_level</td>
                                                            <td>£$get_price</td>
                                                            <td><a href='delsubject.php?sendid=$get_id' class='btn btn-danger delete'>delete</a></div></li> </td>
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
                </div>
                
    </body>
</html>
