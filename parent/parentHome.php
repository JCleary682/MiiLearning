<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{
    header("Location: ../index.php");
}

include ("../connection/conn.php");
include("../functions/functions.php");
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
          $navbar = parentNav();
          ?>
        </div>
        <!-- End of navbar -->
        
        <!--Main Header -->
        <header id="main-header" class="py-2 bg-danger text-white">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h1><i class="fa fa-gear"></i> Parents Dashboard</h1>
                </div>
              </div>
            </div>
        </header>
        <!-- End of header -->
        
        <section id="info" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="">
                        <h1>Welcome to your dashboard</h1>
                        <h2>Currently you have </h2>
                    </div>
                    <div class="col-md-3">
                        <div class="card mx-3 bg-success">
                            <div class="card-header">Upcoming Classes</div>
                            <div class="card-body">
                                <!-- Show number of bookings -->
                            </div> 
                            <div class="card-footer">
                                <a href="bookings.php" class="btn btn-primary">View Bookings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mx-3 bg-warning">
                            <div class="card-header">Contact Requests</div>
                            <div class="card-body">
                                <!--Show number of contact requests -->
                            </div> 
                            <div class="card-footer">
                                <a href="contactrequests.php" class="btn btn-primary">View Requests</a>
                            </div>
                        </div>

                    </div>
                </row>
            </div>
        </section>
        
        
        
        
    </body>
</html>
