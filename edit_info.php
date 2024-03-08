<?php
require('./read.php');
require('./delete.php');
require('./database.php');
require('./session.php');



// I-check kung mayroong POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // I-check kung mayroong value ang mga variables bago gamitin
    $editId = isset($_POST['editId']) ? $_POST['editId'] : '';
    $editfname = isset($_POST['editfname']) ? htmlspecialchars($_POST['editfname']) : '';
    $editlname = isset($_POST['editlname']) ? htmlspecialchars($_POST['editlname']) : '';
    $editbday = isset($_POST['editbday']) ? htmlspecialchars($_POST['editbday']) : '';
    $editgender = isset($_POST['editgender']) ? htmlspecialchars($_POST['editgender']) : '';
}

// I-check kung mayroong POST request para sa update
if (isset($_POST['update'])) {
    // I-check kung lahat ng mga field ay may value
    if (empty($_POST['updatefname']) || empty($_POST['updatelname']) || empty($_POST['updatebday']) || empty($_POST['updategender'])) {
        // Kapag may kulang na field, maglabas ng error message
        echo "Error: Please fill out all fields.";
        // echo "<script>Swal.fire('Error!', 'Please fill out all fields.', 'error');</script>";

    } else {
        // Kapag kompleto ang lahat ng mga field, iproseso ang update
        $updateId = $_POST['updateId'];
        $updatefname = htmlspecialchars($_POST['updatefname']);
        $updatelname = htmlspecialchars($_POST['updatelname']);
        $updatebday = htmlspecialchars($_POST['updatebday']);
        $updateadded_at = date("Y-m-d H:i:s");
        $updategender = htmlspecialchars($_POST['updategender']);

        // Prepare the SQL statement with a prepared statement
        $queryUpdate = "UPDATE student_list SET fname=?, lname=?, bday=?, added_at=?, gender=? WHERE id=?";
        $stmt = mysqli_prepare($connection, $queryUpdate);
        mysqli_stmt_bind_param($stmt, "sssssi", $updatefname, $updatelname, $updatebday, $updateadded_at, $updategender, $updateId);
        mysqli_stmt_execute($stmt);
        // echo"Updated successfully";
        // echo " <script>window.location.href = 'http://localhost/phpprac/home'; </script> ";
        echo "<script>
                    Swal.fire('Success!', 'Successfully updated.', 'success').then(function() {
                        window.location.href = 'http://localhost/phpprac/home';
                    });
                 </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


    <title>Add Student</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <H2 class="card-title text-center">Edit Information</H2>
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <a href="./home.php" class="btn btn-primary card-subtitle mb-2">Back</a>
                </div>
                <form method="post" action="./edit_info.php">
                    <div class="mb-3" style="display: flex; flex-direction: column;">
                        <input type="hidden" name="updateId" value="<?php echo $editId; ?>">
                        <input type="text" name="updatefname" placeholder="Enter Firstname"
                            style="height: 30px; margin-bottom: 5px;" value="<?php echo $editfname; ?>" required>
                        <input type="text" name="updatelname" placeholder="Enter Lastname"
                            style="height: 30px; margin-bottom: 5px;" value="<?php echo $editlname; ?>" required>
                        <input type="date" name="updatebday" placeholder="Enter Birthday"
                            style="height: 30px; margin-bottom: 5px;" value="<?php echo $editbday; ?>"required>
                        <input type="text" name="updateadded_at" placeholder="Added Date"
                            style="height: 30px; margin-bottom: 5px;" value="<?php echo date('Y-m-d H:i:s'); ?>"
                            disabled>
                        <select name="updategender" style="height: 30px; margin-bottom: 5px;">
                            <option value="Male" <?php echo ($editgender == 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($editgender == 'Female') ? 'selected' : ''; ?>>Female
                            </option>
                        </select>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary" style="float: right;">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>