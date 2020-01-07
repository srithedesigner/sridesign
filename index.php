<?php
session_start();
require "config.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Login....
        </title>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <link rel = "stylesheet" href="csss.css">
        
        <script src = "login.js" type="text/javascript"></script>

    </head>

    <body>

        <h1>
            AIT ONLINE NOTICE BOARD
        </h1>
       
         <div align ="right">

            <form action="index.php" method="POST">
          
                <h2>Login Form</h2>
              <div class="container">
               <label for="uname"><b>Username</b></label>
            </br>
                <input type="text" placeholder="Enter Username" name="uname" required>
            </br></br>
            
                <label for="psw"><b>Password</b></label>
            </br>
                <input type="password" placeholder="Enter Password" name="psw" required>
                </br>
                <label for="auth"><b>Authority</b></label>
            </br>
            <br>
                <input type="radio" name="auth" value ="student" checked >Student
                <br>

                </br>
                <input type="radio" name="auth" value ="staff">Staff
                <br>
</br>


                <div class="g-recaptcha" data-sitekey="6LdoncQUAAAAAJXl-4Q6N7sJozp4aA-1r4c3pvTr" required></div>
             
            </br>    
                <button type="submit" name ="submit_btn">Login</button>
               
                
                </br>
              
               <a href ="sign_up.php">
                <button  style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 70%;" type="button" >New user..Sign Up ?</button>
</a>
              </div>
            
            
            </form>

            <?php

                if(isset($_POST['submit_btn']))
                {
                   
                   
                    $uname =$_POST['uname'];
                    $psw =$_POST['psw'];
                    $auth =$_POST['auth'];
                    $_SESSION['user']=$uname;
                    


                    $query = "SELECT * FROM login_details WHERE uname = '$uname' and psw ='$psw'";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run)>0)
                    {
                        $_SESSION['uname']=$uname;
                        if($auth == "student")
                        {
                            $q ="SELECT * FROM login_details WHERE uname ='$uname' and auth = '$auth'";
                            $qr = mysqli_query($con,$q);
                            if(mysqli_num_rows($qr)>0)
                            {
                                header("location:hp.php");
                            }
                            else
                            {
                                echo '<script type = "text/javascript"> alert("Please login using student ID");</script>'; 
                            }

                        
                        }
                        else
                        {
                            $q ="SELECT * FROM login_details WHERE uname ='$uname' and auth = '$auth'";
                            $qr = mysqli_query($con,$q);
                            if(mysqli_num_rows($qr)>0)
                            {
                                header("location:homepage.php");
                            }
                            else
                            {
                                echo '<script type = "text/javascript"> alert("Please login using staff ID");</script>'; 
                            }
                        }
                    }
                    else
                    {
                       echo '<script type = "text/javascript"> alert("INVALID CREDENTIALS..!");</script>';  
                    }
                }

             
                
            ?>
        </div>  
            
    </body>
</html>

