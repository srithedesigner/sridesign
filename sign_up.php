<?php

require "config.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Login....
        </title>

        <link rel = "stylesheet" href="csss.css">
        
        <script src = "login.js" type="text/javascript"></script>

    </head>

    <body>

        <h1>
            AIT ONLINE NOTICE BOARD
        </h1>
       
         <div align ="right">

            <form action="sign_up.php" method="POST">
             
                <h2>Login Form</h2>
              <div class="container">
               <label for="uname"><b>Username</b></label>
            </br>
                <input type="text" placeholder="Enter Username" name="uname" required>
            </br></br>
            
                <label for="psw"><b>Password</b></label>
            </br>
                <input type="password" placeholder="Enter Password" name="psw" required>
            </br></br>   
            <label for="cpsw"><b>Confirm Password</b></label>
            </br>
                <input type="password" placeholder="Confirm Password" name="cpsw" required>

            </br></br>
            
                <br>

                <button type="submit" name ="submit_btn">SIGN UP</button>
               
                
                </br>
                </br>

               <a href ="index.php">
                <button  style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 70%;" type="button" >Already signed up ..Login</button>
</a>
              </div>
            
            
            </form>
            <?php
            if(isset($_POST['submit_btn']))
                {
                   // echo '<script type = "text/javascript"> alert("login page clicked");</script>';
                    $uname =$_POST['uname'];
                    $psw =$_POST['psw'];
                    $cpsw =$_POST['cpsw'];
                    $auth = "student";

                    

                    if ($psw == $cpsw)
                    {
                        $query ="SELECT * FROM accounts WHERE name='$uname";

                        $query_run = mysqli_query($con,$query);
                        if(!$query_run)
                        {
                            $query ="insert into login_details values('$uname','$psw','$auth')";
                            $query_run = mysqli_query($con,$query);

                            if($query_run)
                            {
                                echo '<script type = "text/javascript"> alert("user registered");</script>';
                            }
                            else
                            {
                                echo '<script type = "text/javascript"> alert("error !");</script>';
                            }
                           
                        }
                        else{
                             #already an user
                             echo '<script type = "text/javascript"> alert("Username already exists..Try another one");</script>';
                             echo "hi";
                            
                        }
                    }
                    else
                    {
                        echo '<script type ="text/javascript">alert("Both the passwords do not match");</script>';
                    }
                }
            ?>
        </div>  
            
    </body>
</html>

