
<?php
session_start();

include("../connection/conn.php");

$uname = mysqli_real_escape_string($conn, $_POST['userfield']);

$pass = mysqli_real_escape_string($conn, $_POST['passfield']);

$checkuser="SELECT username, password, type_id FROM miiLearning_Users WHERE username='$uname' AND password ='$pass'";

$userresult = mysqli_query($conn, $checkuser) or die(mysqli_error($conn));

mysqli_close($conn);

while($row = mysqli_fetch_assoc($userresult)){
    if($row['type_id']==1){
        $_SESSION["mii_40159215"] = $uname;
        header("location:../tutor/tutorHome.php");
        
    } else if($row['type_id']==2){
        $_SESSION["mii_40159215"] = $uname;
        header("location:../student/studentHome.php");
        
    }else if($row['type_id']==3){
        $_SESSION["mii_40159215"] = $uname;
        header("location:../parent/parentHome.php");
        
    } else{
        header("Location: login.php");
        echo "unsuccessful login";
    }
}
