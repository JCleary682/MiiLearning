<?php
include('connection/conn.php');

$contactRequest = mysqli_real_escape_string($conn, $_POST["contactReq"]);

?>