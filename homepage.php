<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    
    header('location:error.html');
    exit;
}
?>
<?php
session_start();
?>


<html>
    <head>
        <link rel="stylesheet" href="hp.css" type ="text/css">
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       
        <title>
            HOMEPAGE
        </title>
    </head>
    <body>
       <div id ="hello_user">
        <h1 id ="h1">
     HELLO, Mr
   <?php 
     echo $_SESSION['user'];
     ?>
     
        </h1>
       </div>
       <img id ="em" src="AITLOGO.jpg">
      
       <br>
       <br>

       
       <br>
       <form method ="POST" action = "homepage.php">
       <a href ="posty.php"><button type = "button" name  = "post" id ="btn" style ="background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 30px;
    border: none;
    cursor: pointer;
    width: 8%;";>POST</button></a>


       <button type = "submit" name  = "logout" id ="btn" style ="background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 1300px;
    
    border: none;
    cursor: pointer;
    width: 8%;";>LOGOUT</button>
</form>
       <?php

       if(isset($_POST['logout']))
       {
           session_destroy();
           header("location:index.php");
       }
      
       
       ?>

    
       <table>
       

        <tr height="70">
            <th style ="width:80;background-color:#c299ff;">S No</th>

            <th id ="tab"><center>NOTICE</center></th>
            <th style ="width: 125;background-color:#c299ff;">Details</th>
            
            <th style="width: 200;background-color:#c299ff;">Date</th>
            <th style ="width: 130;background-color:#c299ff;">It's for</th>
            
            
        </tr>
        <tr>
        <?php
            $con = mysqli_connect("localhost","root","");

           
            if(!mysqli_select_db($con,"aionb"))
                {
                    echo('not connected to the db');
                }
            if(!$con)
            {
                echo "doesnt connect";
            }

            $sql ="SELECT * FROM notice";
           $res = $con->query($sql) or die($con->error);
   
           while($row = $res->fetch_assoc())
                 {
                    echo "<tr><td><center>".$row["sno"]."<center></td><td>" . $row["Notice"]. '</td><td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#'.strval($row["sno"]).'">Description</button></td><td>'. $row["date"]. "</td><td>" . $row["cons"]. '</td> </tr> <div class="modal fade" id="'.strval($row["sno"]).'" role="dialog"><div class="modal-dialog" style="width:1250px;"><div class="modal-content" style = "height:80%;"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h1 class="modal-title">'.$row["Notice"].'</h1></div><div class="modal-body"><h3>'.$row['desc'].'</h3></div></div></div></div>';
                 }

            
            ?>
        </tr>

       </table>
   




    </body>
</html>





