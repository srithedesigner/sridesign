<?php

session_start();

    $con = mysqli_connect("localhost","root","");

    if(!$con)
    {
        echo("not connected to server");
    }

    if(!mysqli_select_db($con,"aionb"))
    {
        echo('not connected to the db');
    }
    
    $notice = $_POST['notice'];
    $date = $_POST['date'];
    $desc = $_POST['des'];
    $n = count($_POST['cons']);

    if(!$n)
    {
        $cons ="none";
    }
    else
    {
        $cons  = "";
    
        for($i =0;$i<$n;$i++)
        {
            $cons = $cons.$_POST['cons'][$i];
        }
    }

    $sqll = "INSERT INTO `notice`(`Notice`, `desc`, `date`, `cons`) VALUES ('$notice','$desc','$date','$cons')";
    $msc = mysqli_query($con,$sqll);
    
    if(!$msc)
    {
        echo("cannot enter values");

    }


    header("refresh:2; url=homepage.php");

?>