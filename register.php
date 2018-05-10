<?php
include("functions/functions.php");
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/ui.css">

        <!--Multistep modal related scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!--Progress bar styling -->
        <style>
            .m-progress-bar{
                min-height: 1em;
                background: #c12d2d;
                width: 5%;
            }
        </style>
        <title>Homepage</title>
    </head>
    <body>
        <div name="container">
          <?php
          $navbar = displayNonRegNav();
          ?>
        </div>
        <section>
            <div class="text-center">
                <br>
                <h1>Please select what you would like to register as</h1><br>
            </div>
            <div class="card-group">
                <div class="card mr-3">
                    <img class="card-img-top" src="img/studentStockPhoto1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Student</h5>
                        <p class="card-text">Register as a student to gain access to the following features:</p>
                        <ul>
                            <li>Booking Tutors</li>
                            <li>Gain access to tutors resources</li>
                            <li>Must be 18 Years of age</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demo-modal-3">Register as student</button> -->
                        <button type="button" class="btn btn-primary"><a href="registrations/students.php" class="text-white">Register</a></button>
                    </div>
                </div>
                <div class="card mr-3">
                    <img class="card-img-top" src="img/parentStockImage1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Parent</h5>
                        <p class="card-text">Register as a parent to gain access to the following features:</p>
                        <ul>
                            <li>Booking Tutors</li>
                            <li>Gain access to tutors resources</li>
                            <li>Build a learning plan for your children</li>
                            <li>Gain control over your childs learning</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#parentModal">Register as a parent</button> -->
                        <button type="button" class="btn btn-primary"><a href="registrations/parents.php" class="text-white">Register</a></button>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="img/tutorStockPhoto1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tutor</h5>
                        <p class="card-text">Register as a tutor to gain access to the following features:</p>
                        <ul>
                            <li>Offer lessons</li>
                            <li>Post resources</li>
                            <li>Communicate with prospective students/parents</li>
                            <li>Advertise your services on miilearning</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        
                        <button type="button" class="btn btn-primary"><a href="registrations/tutors.php" class="text-white">Register</a></button>
                    </div>
                </div>
            </div>
        </section>
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

        <!-- Modals to register -->
        <!-- Student Modal -->
        <form class="modal multi-step" id="demo-modal-3">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title step-1" data-step="1">Step 1</h4>
                        <h4 class="modal-title step-2" data-step="2">Step 2</h4>
                        <h4 class="modal-title step-3" data-step="3">Final Step</h4>
                        <div class="m-progress">
                            <div class="m-progress-bar-wrapper">
                                <div class="m-progress-bar">
                                </div>
                            </div>
                            <div class="m-progress-stats">
                                <span class="m-progress-current">
                                </span>
                                /
                                <span class="m-progress-total">
                                </span>
                            </div>
                            <div class="m-progress-complete">
                                Completed
                            </div>
                        </div>
                    </div>
                    <div class="modal-body step-1" data-step="1">
                        <div class="form-group">
                            <label for="contactName">Name </label>
                            <input type="text" class="form-control" id="contactName" placeholder="Your name">   
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Email </label>
                            <input type="email" class="form-control" id="emailAddress" placeholder="Your email address">   
                        </div>
                    </div>
                    <div class="modal-body step-2" data-step="2">
                        <div class="form-group">
                            <label for="address1">Address line 1</label>
                            <input type="text" class="form-control" id="address1" placeholder="Address line 1">   
                        </div>
                        <div class="form-group">
                            <label for="address2">Address line 2</label>
                            <input type="text" class="form-control" id="address2" placeholder="Address line 2">   
                        </div>
                        <div class="form-group">
                            <label for="town">Town</label>
                            <input type="text" class="form-control" id="town" placeholder="Town">   
                        </div>
                        <div class="form-group">
                            <label for="county">County</label>
                            <input type="text" class="form-control" id="county" placeholder="County">   
                        </div>
                        <div class="form-group">
                            <label for="postcode">Postcode</label>
                            <input type="text" class="form-control" id="postcode" placeholder="Postcode">   
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" placeholder="Country">   
                        </div>
                    </div>
                    <div class="modal-body step-3" data-step="3">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" placeholder="Password">   
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="text" class="form-control" id="password" placeholder="Confirm Password">   
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 1)">Back</button>
                        <button type="button" class="btn btn-primary step step-1" data-step="1" onclick="sendEvent('#demo-modal-3', 2)">Continue</button>
                        <button type="button" class="btn btn-primary step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 2)">Back</button>
                        <button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 3)">Continue</button>
                        <button type="button" class="btn btn-success step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 2)">Submit</button>

                    </div>
                </div>
            </div>
        </form>
        <!-- end of student modal -->

        <!-- Parent Modal -->
        <div class="modal fade" id="parentModal" tabindex="-1" role="dialog" aria-labelledby="parentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="parentModalLabel">Parent Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of parent modal -->

        <!-- Tutor Modal -->
        <div class="modal fade" id="tutorModal" tabindex="-1" role="dialog" aria-labelledby="tutorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tutorModalLabel">Tutor Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of tutor modal -->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!--Multistep modal scripts -->
        
        <!--This part made all pages disappear -->
        <script src="multi-step-modal.js"></script>
        <script>
                            sendEvent = function (sel, step) {
                                $(sel).trigger('next.m.' + step);
                            }
        </script>
    </body>
</html>
