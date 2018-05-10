<!--Prepared statement to submit tutor login -->
                        <?php
                        if(isset($_POST['login'])){
                            session_start();
                            //Prepare the insert statement
                            $userquery = " SELECT * FROM miiLearning_Users(type_id, password, username) VALUES (?,?,?)";
                            $userresult = mysqli_query($conn, $userquery) or die(mysqli_error($conn));
                            if($stmt = mysqli_prepare($conn, $query)){
                                //bind variable to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "iss", $newtypeid, $newpassword, $newusername);
                                
                                //Set Values
                                $newtypeid = $_POST['usertype'];
                                $newpassword = $_POST['passfield'];
                                $newusername = $_POST['userfield'];
                                
                                
                                mysqli_stmt_execute($stmt);

                                echo"<p>Query Successful</p>";
                            } else{
                                echo "ERROR: User could not be found";
                            }
                            
                            if(mysqli_num_rows($userresult) > 0){
                                $_SESSION["mii_40159215"] = $newusername;
                                header("Location: ../tutor/tutorHome.php");
                            } else {
                                header("Location: ../../about.php");
                                echo"Code Breaks here";
                            }
                            
                        }
                        ?>