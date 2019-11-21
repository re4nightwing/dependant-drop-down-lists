<?php
    $username='root';
    $password='';
    $servername='localhost';
    $dbname='test';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("couldn't connect to the database : ".mysqli_connect_error());
    }
?>