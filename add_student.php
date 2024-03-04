<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


    <title>Add Student</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <H2 class="card-title text-center">Add Data</H2>
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <a href="./home.php" class="btn btn-primary card-subtitle mb-2">Back</a>
                </div>
                <form method="post">
                    <div class="mb-3" style="display: flex; flex-direction: column;">
                        <input type="text" name="fname" placeholder="Enter Firstname"
                            style="height: 30px; margin-bottom: 5px;">
                        <input type="text" name="lname" placeholder="Enter Lastname"
                            style="height: 30px; margin-bottom: 5px;">
                        <input type="date" name="bday" placeholder="Enter Birthday"
                            style="height: 30px; margin-bottom: 5px;">
                        <input type="text" name="added_at" placeholder="Added Date"
                            style="height: 30px; margin-bottom: 5px;" disabled>
                        <select name="gender" style="height: 30px; margin-bottom: 5px;">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" style="float: right;">Add</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    

</body>

</html>



<?php

require('./database.php');

if (isset($_POST['submit'])) {

    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $bday = htmlspecialchars($_POST['bday']);
    $gender = htmlspecialchars($_POST['gender']);

    if (empty($fname) || empty($lname) || empty($bday) || empty($gender)) {
        // echo "Error: Please fill out all fields.";

        echo "<script>Swal.fire('Error!', 'Please fill out all fields.', 'error');</script>";
    } else {

        // Surin kung mayroon nang eksaktong parehong entry
        $queryCheck = "SELECT * FROM student_list WHERE fname='$fname' AND lname='$lname' AND bday='$bday' AND gender='$gender' ORDER BY added_at ASC ";
        $resultCheck = mysqli_query($connection, $queryCheck);

        if (mysqli_num_rows($resultCheck) > 0) {
            // May eksaktong parehong entry na, hindi na idadagdag
            // echo "Error: The entry already exists.";
            echo "<script>Swal.fire('Error!', 'The entry already exists.', 'error');</script>";
        } else {
            // Walang eksaktong parehong entry, idadagdag na
            $queryAdd = "INSERT INTO student_list (fname, lname, bday, added_at, gender) 
                            VALUES ('$fname', '$lname', '$bday', NOW(), '$gender')";

            $sqlAdd = mysqli_query($connection, $queryAdd);


            echo "<script>
                    Swal.fire('Success!', 'Entry successfully added.', 'success').then(function() {
                        window.location.href = 'http://localhost/phpprac/home';
                    });
                 </script>";
            
        

            // echo "<script>window.location.href = 'http://localhost/phpprac/home'; </script>";
        }
    }
}


?>

