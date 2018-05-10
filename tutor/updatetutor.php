<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{
    header("Location: ../index.php");
}

include ("../connection/conn.php");
include("../functions/functions.php");

//Query for details taken from multiple tables
//$tutoriddata = mysqli_real_escape_string($conn, $_GET['sendid']);
$newname = mysqli_real_escape_string($conn, $_POST['newfullname']);
//$newaddress = mysqli_real_escape_string($conn, $_POST['']);
$newemail = mysqli_real_escape_string($conn, $_POST['newemail']);
$newnumdata = mysqli_real_escape_string($conn, $_POST['newnumber']);
$newpassworddata = mysqli_real_escape_string($conn, $_POST['newpassword1']);
$newuname = mysqli_real_escape_string($conn, $_POST['newusername']);
//$newpropicdata = mysqli_real_escape_string($conn, $_POST['']);
$newdescript = mysqli_real_escape_string($conn, $_POST['newdescript']);
//SQL Update Query (NOT WORKING ATM)
$id=19;
$query="UPDATE miiLearning_Users
        SET name='$newname', 
        email_address='$newemail', phone_number='$newnumdata', 
        password='$newpassworddata', username='$newuname', tutor_descript='$newdescript'
        WHERE id='$id'";
$updateresult = mysqli_query($conn, $query) or die(mysqli_error($conn));
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
                  <h1><i class="fa fa-gear"></i> <?php echo $newname ?> Profile Details</h1>
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
                        <?php
                        if(mysqli_query($conn, $query)){
                            echo "<p>Event has been updated</p>";
                            mysqli_close($conn);
                        } else {
                            echo "<p>Sorry something went wrong new :(</p>";
                            mysqli_close($conn);
                        }
                        ?>
                    </div>
                </div>
                <div class='row'>
                    <p>Subjects are displayed here in a table</p>
                    <!--Table with add and remove functions -->
                </div>
                <div class='row'>
                    <p>Availability is displayed here in a table</p>
                    <!--Ability to add and remove availability -->
                </div>
            </div>
        </section>
        
        
        
        
    </body>
</html>
