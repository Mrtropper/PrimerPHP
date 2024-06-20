<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "fabricio0990";
    $dbname = "db_students";

    $conn = new mysqli($servername,$username,$password,$dbname);
    
?>