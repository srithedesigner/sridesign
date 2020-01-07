<?php

session_start();
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:error.html');
    exit;
}
?>


<html>
    <head>
        <title>posting.....</title>
        <link rel="stylesheet" href="post.css ">
    </head>

    <body>
<div id="h">
        
            Post a Notice <?php
            echo $_SESSION['user'];
            ?>
       
        </div>
        <form action="post.php" method="POST">
            <div id ="notice">
                
                Notice :&nbsp;&nbsp; <input name="notice" type="text" placeholder="Enter the notice" required>
            <br><br>
                Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="date" name="date" required>
                <br><br>
                Description :
                <br><br> 
                <textarea id ="ta" rows="4" cols="50" name="des"  placeholder="Enter the description" required></textarea>
                <br><br>
                Concernity :<div id ="c">
                <button type="button" name="all" id="all" onclick="check()">All</button><br><br>
                    <input type="checkbox" class="cons" name = "cons[]" value="A">A<br>
                    <input type="checkbox" class="cons" name = "cons[]" value="B">B<br>
                    <input type="checkbox" class="cons" name = "cons[]" value="C">C<br>
                    <input type="checkbox" class="cons" name = "cons[]" value="D">D<br>
                    <input type="checkbox" class="cons" name = "cons[]" value="E">E<br>
                </div>
                <br>
                <button class ="su" type="submit">Submit</button>
                <button class ="su" type="reset">Reset</button>

            </div>
        </form>
        <script src="post.js"></script>
    </body>
</html>