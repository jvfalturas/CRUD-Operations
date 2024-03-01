<?php 
require('./database.php');

$sort = 'ASC';
  $column = 'id';

  if (isset($_GET['column']) && isset($_GET['sort'])) {
    $column = $_GET['column'];
    $sort = $_GET['sort'];

    // Opposite
    $sort == 'ASC' ? $sort = 'DESC' : $sort = 'ASC'; 
  }

$queryStudent_list = "SELECT * FROM student_list ORDER BY $column $sort";
$sqlStudent_list = mysqli_query($connection, $queryStudent_list);

// $results = mysqli_fetch_array($sqlStudent_list);    ORDER BY added_at ASC = orig
// $result = mysqli_fetch_assoc($sqlStudent_list);  ORDER BY $column $sort

