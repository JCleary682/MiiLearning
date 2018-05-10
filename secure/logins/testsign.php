<?php
session_start();

include("../../connection/conn.php");

$uname = $_POST["userfield"];
$newtypeid = $_POST['usertype'];
$pass = $_POST["passfield"];

$checkuser="SELECT * FROM miiLearning_Users WHERE username='$uname' AND password = '$pass' AND type_id = '$newtypeid' ";

$userresult = mysqli_query($conn, $checkuser) or die(mysqli_error($conn));

mysqli_close($conn);

if(mysqli_num_rows($userresult) > 0){ 
    $_SESSION["mii_40159215"] = $uname;
    if($newtypeid = 1){
        header("Location: ../../tutor/tutorHome.php");
        } else if($newtypeid = 2){
        header("Location: ../../student/studentHome.php");
        } else if($newtypeid = 3){
        header("Location: ../../parent/parentHome.php");
        }
    }else{
    header("Location: ../../index.php");
}

?>

