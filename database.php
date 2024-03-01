<?php
$host = 'localhost';
$username = 'root';
$password = '1234';
$database = 'studentsystem';
$connection = mysqli_connect($host, $username, $password, $database);

if($connection->connect_error)
{
    echo $connection->connect_error;
    // die("Connection failed: " . $connection->connect_error);
}

// $sql = "SELECT * FROM student_list";
// $queryStudent_list = "SELECT * FROM student_list";
// $sqlStudent_list = mysqli_query($connection);

// $queryStudent_list = "SELECT * FROM student_list";
// $sqlStudent_list = mysqli_query($connection, $queryStudent_list);

// $results = mysqli_fetch_array($sqlStudent_list);
// $result = mysqli_fetch_assoc($sqlStudent_list);
// print_r($results); 
// print_r($result);