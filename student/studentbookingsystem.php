<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{
    header("Location: ../index.php");
}

include ("../connection/conn.php");
include("../functions/functions.php");
//ERROR IS HERE
$tutoritem = htmlentities($_GET["tutor_id"]);
//Store tutor item in a variable
$tutorid = $tutoritem;
//Query to show all subjects available from the tutor
//Query working ok, shows subjects and levels from table. Just not showing in dropdown
$subjectsavailable = "SELECT miiLearning_Tutors.subjects, miiLearning_Tutors.subject_level, miiLearning_subjects.subject, miiLearning_level.level
                      FROM miiLearning_Tutors
                      INNER JOIN miiLearning_subjects
                      ON miiLearning_Tutors.subjects = miiLearning_subjects.subject_id 
                      INNER JOIN miiLearning_level
                      ON miiLearning_Tutors.subject_level = miiLearning_level.level_id
                      WHERE tutor_id = '$tutorid' ";

$subjectlevelavailable = "SELECT miiLearning_Tutors.subjects, miiLearning_Tutors.subject_level, miiLearning_subjects.subject, miiLearning_level.level
                      FROM miiLearning_Tutors
                      INNER JOIN miiLearning_subjects
                      ON miiLearning_Tutors.subjects = miiLearning_subjects.subject_id 
                      INNER JOIN miiLearning_level
                      ON miiLearning_Tutors.subject_level = miiLearning_level.level_id
                      WHERE tutor_id = '$tutorid' ";

$daysavailquery = "SELECT Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday  FROM miiLearning_tutorAvail WHERE tutor_id = $tutorid";
//Get user details query
$useridquery = "SELECT id FROM miiLearning_Users WHERE username = '{$_SESSION['mii_40159215']}'";
//$tutoridquery = "SELECT id FROM miiLearning_Users WHERE id = '$tutoritem'";
$userresult = mysqli_query($conn, $useridquery) or die(mysqli_error($conn));
$subjectavailresult = mysqli_query($conn, $subjectsavailable) or die(mysqli_error($conn));
$subjectlevelresult = mysqli_query($conn, $subjectlevelavailable) or die(mysqli_error($conn));
$daysavailresult = mysqli_query($conn, $daysavailquery);
//$tutoridqueryresult = mysqli_query($conn, $tutoridquery) or die(mysqli_error($conn));

//Store details in arrays
$userarray = mysqli_fetch_array($userresult);
$subjectlevelarray = mysqli_fetch_array($subjectlevelresult);
$daysavailarray = mysqli_fetch_array($daysavailresult, MYSQLI_NUM);

//Convert days avail to json
$DaysAvailJSON = json_encode($daysavailarray);
echo $DaysAvailJSON;

//$tutorarray = mysqli_fetch_array($tutoridqueryresult);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home Area</title>
        <!-- Required Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!--Datepicker css -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.8.3.js"></script>
        <script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script>
            $( function() {
                var daysAvailArray = <?php echo json_encode($daysavailarray) ?>;
                $( "#datepicker" ).datepicker({
                dateFormat: "yy-mm-dd",
                beforeShowDay: function(date) {
                    var day = date.getDay();
                    //return (daysAvailArray[day-1] === '1') ? [true] : [false];   
                    if (day == 0 && daysAvailArray[0] == '1')
                        return [true];
                      if (day == 1 && daysAvailArray[1] == '1')
                        return [true];
                      if (day == 2 && daysAvailArray[2] == '1')
                        return [true];
                      if (day == 3 && daysAvailArray[3] == '1')
                        return [true];
                      if (day == 4 && daysAvailArray[4] == '1')
                        return [true];
                      if (day == 5 && daysAvailArray[5] == '1')
                        return [true];
                      if (day == 6 && daysAvailArray[6] == '1')
                        return [true];
                    return [false];
            }
        });
    } );
        </script>
        
        <script>
            $('.timepicker').wickedpicker();
        </script>
    </head>
    <body>
        <!-- Top of navbar -->
        <div name="container">
          <?php
          $navbar = studentNav();
          ?>
        </div>
        <!-- End of navbar -->
        
        <!--Main Header -->
        <header id="main-header" class="py-2 bg-primary text-white">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <h1><i class="fa fa-gear"></i> Students Dashboard <?php echo "$userarray[0]";?></h1>
                </div>
              </div>
            </div>
        </header>
        <!-- End of header -->
        
        <section id="info" class="py-3">
            <div class="container">
                <div class='row'>
                    <h1>Booking System</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mx-3 bg-light">
                            <div class="card-header">Booking System</div>
                            <div class="card-body">
                                <!--Booking System -->
                                <form enctype="multipart/form-data" action='studentbookingsystem.php?tutor_id=<?php echo"$tutoritem";?>' method="post" id="booking-form" name="booking" >
                                    <fieldset>
                                        <!--Tutor ID (Posted from previous page) -->
                                        <input type="hidden" name="tutorId" value='<?php echo"$tutorid";?>'>
                                        <!-- Student ID (posted from previous page) -->
                                        <input type="hidden" name="studentId" value='<?php echo"$userarray[0]" ?>'>
                                        <!-- Date -->
                                        <div class="form-group">
                                            <label for="datepicker">Pick a date</label>
                                            <input type="text" date-date-format="yy-mm-dd" name="datepicker" id="datepicker" class="form-control" required>
                                        </div>
                                        <!-- Time -->
                                        <div class="form-group">
                                            <label for="time">Time</label>
                                            <select name="time" type="text" id="time" class="form-control" required>
                                                <option value="09:00:00">9:00</option>
                                                <option value="10:00:00">10:00</option>
                                                <option value="11:00:00">11:00</option>
                                                <option value="12:00:00">12:00</option>
                                                <option value="13:00:00">13:00</option>
                                                <option value="14:00:00">14:00</option>
                                                <option value="15:00:00">15:00</option>
                                                <option value="16:00:00">16:00</option>
                                                <option value="17:00:00">17:00</option>
                                            </select>
                                            
                                        </div>
                                        <!-- Subject -->
                                        <div class="form-group">
                                            <label for="subjects">Subject</label>
                                            <select name="subjects" type="text" id="subjectselect" class="form-control" required>
                                                <?php
                                                if(mysqli_num_rows($subjectavailresult)>0){

                                                    while($row = mysqli_fetch_assoc($subjectavailresult)){
                                                        $get_subject = $row['subjects'];
                                                        $get_subjectname = $row['subject'];
                                                        
                                                        echo "<option value='$get_subject'>$get_subjectname</option>";
                                                    }
                                                }
                                                ?>   
                                            </select>
                                        </div>
                                        <!-- Level -->
                                        <div class="form-group">
                                            <label for="subjectlevel">Subject Level</label>
                                            <select name="subjectlevel" type="text" class="form-control" id="subjectlevelsub" required>
                                                <?php 
                                                if(mysqli_num_rows($subjectlevelresult) > 0){
                                                    while($row = mysqli_fetch_assoc($subjectlevelresult)){
                                                        $get_level = $row['subject_level'];
                                                        $get_namelevel = $row['level'];
                                                        echo "<option value='$get_level'>$get_namelevel</option>";
                                                        
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <!-- Try to display subject price here -->
                                            <label for="price">Subject price: </label>
                                        </div>
                                        <!-- <div id="options"></div> -->
                                        <button class="btn btn-primary" class="submit" type="submit" name="booking" id="bookingsform">Submit form</button>
                                    </fieldset>
                                </form>
                                <?php
                                if(isset($_POST['booking'])){
                                    include('../connection/conn.php');
                                    //Set Values
                                        $newtutor = mysqli_real_escape_string($conn, $_POST['tutorId']);
                                        $newstudent = mysqli_real_escape_string($conn, $_POST['studentId']);
                                        $newdate = mysqli_real_escape_string($conn, $_POST['datepicker']);
                                        $newtime = mysqli_real_escape_string($conn, $_POST['time']);
                                        $newsubject = mysqli_real_escape_string($conn, $_POST['subjects']);
                                        $newlevel = mysqli_real_escape_string($conn, $_POST['subjectlevel']);
                                        
                                        
                                        $pricequery = "SELECT price FROM miiLearning_Tutors WHERE tutor_id = $newtutor AND subject_level = $newlevel AND subjects = $newsubject";
                                        $priceresult = mysqli_query($conn, $pricequery) or die(mysqli_error($conn));
                                        //Arrays for price
                                        $pricearray = mysqli_fetch_array($priceresult);
                                        $price = $pricearray[0];
                                        //Prepare the insert statement
                                        $insertquery = "INSERT INTO miiLearning_bookings(tutor_id, student_id, date, time ,subject, 
                                                 level, price) VALUES (?,?,?,?,?,?,?)";

                                        //Initialise stmt
                                        $stmt = mysqli_stmt_init($conn);

                                        if(!mysqli_stmt_prepare($stmt, $insertquery)){
                                            echo "SQL ERROR!";
                                        } else{

                                            //bind variable to the prepared statement as parameters
                                            mysqli_stmt_bind_param($stmt, "iissiid", $newtutor, $newstudent, $newdate, 
                                                    $newtime, $newsubject, $newlevel, $price);
                                            mysqli_stmt_execute($stmt);
                                            echo"<p>Query Ran</p>";
                                            echo "<p>$price</p>";
                                        } 

                                }
                                ?>
                            </div> 
                        </div>
                    </div>
                    
                </row>
            </div>
        </section>
        
        
        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
