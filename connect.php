<?php
    $conn=mysqli_connect("localhost","root","","reg");
    if ($conn) {
        echo "Connected successfully";
    }
    else{
        echo "Failed";
    }
?>