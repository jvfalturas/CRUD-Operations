<?php


require('./database.php');

if (isset($_POST['delete'])) {
    $deleteId = htmlspecialchars($_POST['deleteId']); // I-parameterize ang user input upang maiwasan ang SQL injection.

    $queryDelete = "DELETE FROM student_list WHERE id = $deleteId"; // Siguraduhing isinama ang $delete sa loob ng single quotes.
    $sqlDelete = mysqli_query($connection, $queryDelete);

    // if ($sqlDelete) {
    //     echo "Record deleted successfully";
    // } else { 
    //     echo "Error deleting record: " . mysqli_error($connection);
    // }

    // Redirect sa tamang page o magbigay ng feedback sa user
    echo " <script>window.location.href = 'http://localhost/phpprac/home'; </script> ";
    
}
















