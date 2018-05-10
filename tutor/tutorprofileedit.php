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
//Query for details taken from multiple tables
//$tutoriddata = mysqli_real_escape_string($conn, $_GET['sendid']);
$generaldetailsquery = "SELECT name, address, 
          email_address, phone_number, password, 
          username, profile_pic, tutor_descript
          FROM miiLearning_Users
          WHERE id = '$tutorid'";

$subjectsquery = "SELECT miiLearning_Tutors.id, miiLearning_Tutors.subject_level, miiLearning_Tutors.subjects, miiLearning_Tutors.price, miiLearning_level.level , miiLearning_subjects.subject
                  FROM miiLearning_Tutors
                  INNER JOIN miiLearning_subjects
                  ON miiLearning_Tutors.subjects = miiLearning_subjects.subject_id
                  INNER JOIN miiLearning_level
                  ON miiLearning_Tutors.subject_level = miiLearning_level.level_id
                  WHERE tutor_id = '$tutorid'";
$availabilityquery = "SELECT * FROM miiLearning_tutorAvail WHERE tutor_id = '$tutorid'";
//Query Results
$generalqueryresult = mysqli_query($conn, $generaldetailsquery) or die(mysqli_error($conn));
$subjectsqueryresult = mysqli_query($conn, $subjectsquery) or die(mysqli_error($conn));
$availqueryresult = mysqli_query($conn, $availabilityquery) or die (mysqli_error($conn));

if(mysqli_num_rows($generalqueryresult) > 0){
    while($row = mysqli_fetch_assoc($generalqueryresult)){
        $namedata = stripslashes($row["name"]);
        $addrdata = stripslashes($row["address"]);
        $emaildata = stripslashes($row["email_address"]);
        $numdata = stripslashes($row["phone_number"]);
        $passdata = stripslashes($row["password"]);
        $unamedata = stripslashes($row["username"]);
        $propicdata = stripslashes($row["profile_pic"]);
        $descrdata = stripslashes($row["tutor_descript"]);
    }
}

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
        <title>Admin Home Area <?php echo"$tutorid"; ?></title>
        <!-- Required Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
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
                  <h1><i class="fa fa-gear"></i> <?php echo "$userarray[0]"; ?> Profile Details</h1>
                </div>
              </div>
            </div>
        </header>
        <!-- End of header -->
        
        <section id="info" class="py-3">
            <div class="container">
                <div class='row'>
                    <div class='col-md-6'>
                        <img class='img-thumbnail' src='<?php echo "../img/$propicdata"; ?>'>
                    </div>
                    <div class='col-md-6'>
                        <form enctype="multipart/form-data" action="tutorprofileedit.php" method="POST" name="updatetutor" id='tutor-edit-form' >
                                <div class="form-group">
                                    <label for="contactName">Name </label>
                                    <input type="text" class="form-control" id="tutorName" placeholder="Your name" name="newfullname" value='<?php echo $namedata ?>' required>   
                                </div>
                                <div class="form-group">
                                    <label for="emailAddress">Email </label>
                                    <input type="email" class="form-control" id="tutorEmail" placeholder="Your email address" name="newemail" value='<?php echo $emaildata ?>' required>   
                                </div>
                                <div class="form-group">
                                    <label for="username">Your Username </label>
                                    <input type="text" class="form-control" id="TUsername" placeholder="Your username" name="newusername" value='<?php echo $unamedata ?>' required >  
                                </div>
                            <div class="form-group">
                                    <label for="username">Your Address </label>
                                    <input type="text" class="form-control" id="newaddress" placeholder="Your username" name="newaddress" value='<?php echo $addrdata ?>' required >  
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Your Number </label>
                                    <input name='newnumber' type="tel" class="form-control" id="tutorNumber" placeholder="Your contact number" value='<?php echo $numdata ?>' required >  
                                </div>
                                <div class="form-group">
                                    <!--Only one not showing -->
                                    <label for="description">Your Description </label>
                                    <input name='newdescript' type="text" class="form-control" id="tutordescript" placeholder="Your description" name="newdescription" value='<?php echo $descrdata ?>' required >  
                                </div>
                                <div class="form-group">
                                    <label for="file">Image Upload</label>
                                    <input name="propic" type="file" class="form-control-file">
                                    <small class="form-text text-muted">Max Size 3mb</small>
                                </div>
                                <div class="form-group">
                                    <label for="password5">Your new password </label>
                                    <input type="password" class="form-control" id="password5" placeholder="Your Password" name="newpassword1" required >  
                                </div>
                                <div class="form-group">
                                    <label for="password6">Confirm new password </label>
                                    <input type="password" class="form-control" id="password6" placeholder="Confirm Password" name="password2" required >  
                                </div>
                                <input type="hidden" name="usertype" value="1">
                                <input type="hidden" name="userid" value='<?php echo"$tutorid" ?>'>
                                <button class="btn btn-primary" type="submit" id='t-edit-form' name="updatetutor">Update Details</button>
                        </form>
                        <?php
                                if(isset($_POST['updatetutor'])){
                                    include('../connection/conn.php');
                                    
                                    //Prepare values
                                    $newtutorname = mysqli_real_escape_string($conn, $_POST['newfullname']);
                                    $newtutoremail = mysqli_real_escape_string($conn, $_POST['newemail']);
                                    $newtutoraddress = mysqli_real_escape_string($conn, $_POST['newaddress']);
                                    $newtutorusername = mysqli_real_escape_string($conn, $_POST['newusername']);
                                    $newtutornumber = mysqli_real_escape_string($conn, $_POST['newnumber']);
                                    $newprofilepicname = $_FILES['propic']['name'];
                                    $newprofilepictemp = $_FILES['propic']['tmp_name'];
                                    $newtutordescript = mysqli_real_escape_string($conn, $_POST['newdescript']);
                                    $newtutorpassword = mysqli_real_escape_string($conn, $_POST['newpassword1']);
                                    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
                                    //$newtutorprofilename = mysqli_real_escape_string($conn, $_POST['propic_name']);
                                    $tutorid = mysqli_real_escape_string($conn, $_POST['userid']);
                                    //Prepare the insert statement
                                    $updatequery = "UPDATE miiLearning_Users SET type_id=?, name=?, address=?, email_address=?, phone_number=?, password=?, username=?, profile_pic=?, tutor_descript=? WHERE id=?";
                                    
                                    
                                    $stmt = mysqli_stmt_init($conn);
                                    
                                    if(!mysqli_stmt_prepare($stmt, $updatequery)){
                                        echo "SQL ERROR!";
                                    } else{
                                        if(!empty($newprofilepicname)){
                                        move_uploaded_file($newprofilepictemp, "../img/$newprofilepicname");
                                        } else{
                                        echo "<p>No file selected</p>";
                                        die();
                                        }
                                        //Bind params
                                        mysqli_stmt_bind_param($stmt, "issssssssi", $usertype, $newtutorname, $newtutoraddress, $newtutoremail, $newtutornumber, $newtutorpassword, $newtutorusername, $newprofilepicname, $newtutordescript, $tutorid);
                                        mysqli_stmt_execute($stmt);
                                        echo "Query Successful!";
                                    }
                                }
                                ?>
                    </div>
                </div>
                
                <div class='row'>
                    <!--Table with add and remove functions -->
                    <section id='subjects' class='py-3'>
                        <div class='container'>
                            <div class='col-md-12'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <h4>Your Subjects</h4>
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
                                                            <td><a href='delsubject.php?sendid=$get_id' class='btn btn-danger delete'>delete</a></td>
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
                
                <div class='row'>
                    <!--Ability to add and remove availability -->
                    <section id='subjects' class='py-3'>
                        <div class='container'>
                            <div class='col-md-12'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <h4>Your Availability</h4>
                                        <a class='btn btn-primary' href='updateavail.php'>Update Availability</a>
                                    </div>
                                    <table class="table table-striped">
                                        <thead class="thead-inverse">
                                          <tr>
                                            <th scope="col">Monday</th>
                                            <th scope='col'>Tuesday</th>
                                            <th scope='col'>Wednesday</th>
                                            <th scope="col">Thursday</th>
                                            <th scope='col'>Friday</th>
                                            <th scope='col'>Saturday</th>
                                            <th scope='col'>Sunday</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          if(mysqli_num_rows($availqueryresult)>0){

                                              while($row = mysqli_fetch_assoc($availqueryresult)){
                                                  
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
                                                        <td><img src='../img/$img_mon' class='img-responsive' width='100px' height='100px'></td>
                                                        <td><img src='../img/$img_tue' class='img-responsive' width='100px' height='100px'></td>
                                                        <td><img src='../img/$img_wed' class='img-responsive' width='100px' height='100px'></td>
                                                        <td><img src='../img/$img_thur' class='img-responsive' width='100px' height='100px'></td>
                                                        <td><img src='../img/$img_fri' class='img-responsive' width='100px' height='100px'></td>
                                                        <td><img src='../img/$img_sat' class='img-responsive' width='100px' height='100px'></td>
                                                        <td><img src='../img/$img_sun' class='img-responsive' width='100px' height='100px'></td>
                                                    </tr>
                                                ";
                                              }
                                          } else{
                                               echo "<tr>
                                                        <td><p>No availability set yet</p></td>
                                                        <td><a href='setavail.php?sendid=$tutorid' class='btn btn-success'>Set Avail</a></d>
                                                    </tr>
                                                ";
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
        </section>
        
        
        <!-- Confirm delete script -->
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm('Are you sure you would like to delete this?')){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
        </script>
        
        !-- Validation scripts -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery.validate/1.13.0/additional-methods.min.js"></script>
    <script src="../js/validation.js"></script>
        
    </body>
</html>
