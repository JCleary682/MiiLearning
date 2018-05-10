<?php
session_start();

if(!isset($_SESSION["mii_40159215"]))
{    
    header("Location: login.php");
  }else{ 
    unset($_SESSION["mii_40159215"]);
    header("Location: login.php");
}
?>
