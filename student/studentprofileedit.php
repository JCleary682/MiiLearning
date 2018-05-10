<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{
    header("Location: ../index.php");
}

include ("../connection/conn.php");
include("../functions/functions.php");

//Get id
$useridquery = "SELECT * FROM miiLearning_Users WHERE username = '{$_SESSION['mii_40159215']}'";
$userresult = mysqli_query($conn, $useridquery) or die(mysqli_error($conn));
//User array
$userarray = mysqli_fetch_array($userresult);
$userid = $userarray[0];
//Query for details taken from multiple tables

$generaldetailsquery = "SELECT name, address, 
          email_address, phone_number, password, 
          username, profile_pic, tutor_descript
          FROM miiLearning_Users
          WHERE id = $userid";

//Query Results
$generalqueryresult = mysqli_query($conn, $generaldetailsquery) or die(mysqli_error($conn));

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
<html>
    <head>
        <title>Admin Home Area</title>
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
          $navbar = studentNav();
          ?>
        </div>
        
        <!--Main Header -->
        <header id="main-header" class="py-2 bg-primary text-white">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h1><i class="fa fa-gear"></i>Profile Details</h1>
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
                        <form enctype="multipart/form-data" action="studentprofileedit.php" method="POST" name="updatestudent" id='student-edit-form' >
                                <div class="form-group">
                                    <label for="contactName">Name </label>
                                    <input type="text" name="newfullname" class="form-control" id="studentName" placeholder="Your name"  value='<?php echo $namedata ?>' required>   
                                </div>
                                <div class="form-group">
                                    <label for="emailAddress">Email </label>
                                    <input type="email" name="newemail" class="form-control" id="studentEmail" placeholder="Your email address" value='<?php echo $emaildata ?>' required>   
                                </div>
                                <div class="form-group">
                                    <label for="username">Your Username </label>
                                    <input type="text" name="newusername" class="form-control" id="SUsername" placeholder="Your username" value='<?php echo $unamedata ?>' required >  
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Your Address </label>
                                    <input name='newaddress' type="text" class="form-control" id="stuaddress" placeholder="Your address" value='<?php echo $addrdata ?>' required >  
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Your Number </label>
                                    <input name='newnumber' type="tel" class="form-control" id="stuNumber" placeholder="Your contact number" value='<?php echo $numdata ?>' required>  
                                </div>
                                <div class="form-group">
                                    <!--Only one not showing -->
                                    <label for="description">Your Description </label>
                                    <input name='newdescript' type="text" class="form-control" id="studescript" placeholder="Your description" name="newdescription" value='<?php echo $descrdata ?>' required >  
                                </div>
                                <div class="form-group">
                                    <label for="file">Profile Image</label>
                                    <input name="newpropic" type="file" class="form-control-file">
                                    <small class="form-text text-muted">Max Size 3mb</small>
                                </div>
                                <div class="form-group">
                                    <label for="password5">Your new password </label>
                                    <input type="password" name="newpassword1" class="form-control" id="password5" placeholder="Your Password" required >  
                                </div>
                                <div class="form-group">
                                    <label for="password6">Confirm new password </label>
                                    <input type="password" class="form-control" id="password6" placeholder="Confirm Password" name="password2" required >  
                                </div>
                                <input type="hidden" name="usertype" value="2">
                                <input type="hidden" name="userid" value='<?php echo"$userid" ?>'>
                                <button class="btn btn-primary" type="submit" id='tutor-reg' name="updatestudent">Update Details</button>
                        </form>
                        <?php 
                        if(isset($_POST['updatestudent'])){
                            include("../connection/conn.php");
                            
                            //Prepare values
                            $newstudentname = mysqli_real_escape_string($conn, $_POST['newfullname']);
                            $newstudentemail = mysqli_real_escape_string($conn, $_POST['newemail']);
                            $newstudentaddress = mysqli_real_escape_string($conn, $_POST['newaddress']);
                            $newstudentusername = mysqli_real_escape_string($conn, $_POST['newusername']);
                            $newstudentnumber = mysqli_real_escape_string($conn, $_POST['newnumber']);
                            $newstudentdesc = mysqli_real_escape_string($conn, $_POST['newdescript']);
                            $newstudentprofilepicname = $_FILES['newpropic']['name'];
                            $newstudentprofilepictemp = $_FILES['newpropic']['tmp_name'];
                            $newstudentpassword = mysqli_real_escape_string($conn, $_POST['newpassword1']);
                            $studentusertype = mysqli_real_escape_string($conn, $_POST['usertype']);
                            $studentid = mysqli_real_escape_string($conn, $_POST['userid']);
                            
                            //Prepare Query
                            $updatestudentquery = "UPDATE miiLearning_Users SET type_id=?, name=?, address=?, email_address=?, phone_number=?, password=?, username=?, profile_pic=?, tutor_descript=? WHERE id=?";
                            
                            //Initialist statement
                            $stmt = mysqli_stmt_init($conn);
                            //Run statement
                            if(!mysqli_stmt_prepare($stmt, $updatestudentquery)){
                                echo "SQL ERROR!";
                            } else{
                                //Upload image
                                if(!empty($newstudentprofilepicname)){
                                        move_uploaded_file($newstudentprofilepictemp, "../img/$newstudentprofilepicname");
                                    } else{
                                        echo "<p>No file selected</p>";
                                        die();
                                    }
                                //Bind params
                                mysqli_stmt_bind_param($stmt, "issssssssi", $studentusertype, $newstudentname, $newstudentaddress, $newstudentemail ,$newstudentnumber, $newstudentpassword, $newstudentusername, $newstudentprofilepicname, $newstudentdesc, $userid );
                                mysqli_stmt_execute($stmt);
                                echo "Query Successful: Reload page to see results";
                                
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        
        
        <!-- Validation scripts -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery.validate/1.13.0/additional-methods.min.js"></script>
    <script src="../js/validation.js"></script>
    </body>
</html>
