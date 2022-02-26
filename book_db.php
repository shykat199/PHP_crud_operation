<?php
function Createdb(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";


    #create connection
    $con = mysqli_connect($servername, $username, $password);

    #check connection
    if (!$con) {
        # code...
        die("Connectin Faild:" . mysqli_connect_error());
    }

    //create database using php
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if (mysqli_query($con, $sql)) {
        # code...
        $con = mysqli_connect($servername, $username, $password, $dbname);
        return $con;
        
    } else {
        echo "Error while creating database" . mysqli_error($con);
    }
}
