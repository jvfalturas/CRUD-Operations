<?php
require('./read.php');
require('./delete.php');

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Home Page</title>

    <!-- JavaScript function -->
    <!-- <script>
        function confirmDelete() {
            return confirm('Do you really want to delete this student?\n (This action cannot be undone)');
        }
    </script> -->



</head>

<body>
    <!-- <form method="post"> -->
    <div class="container">
        <div class="card" style="center">
            <div class="card-body">
                <h2 class="card-title text-center">CRUD OPERATIONS</h2>
                <a href="./add_student.php" class="btn btn-primary card-subtitle mb-2 " style="float: right;">Add
                    Data</a>
                <table class="table">
                    <thead>
                        <tr>
                        <th><a href="?column=id&sort=<?php echo $sort ?>">ID</a></th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Added On</th>
                            <th scope="col">Gender</th>
                            <th class="text-center" scope="col ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($results = mysqli_fetch_assoc($sqlStudent_list)) { ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $results['id'] ?>
                                </th>
                                <td>
                                    <?php echo $results['fname'] ?>
                                </td>
                                <td>
                                    <?php echo $results['lname'] ?>
                                </td>
                                <td>
                                    <?php echo $results['bday'] ?>
                                </td>
                                <td>
                                    <?php echo $results['added_at'] ?>
                                </td>
                                <td>
                                    <?php echo $results['gender'] ?>
                                </td>
                                <td>
                                    <form action="/phpprac/edit_info.php" method="post" style="display: inline;">
                                        <input type="hidden" name="editId" value="<?php echo $results['id'] ?>">
                                        <input type="hidden" name="editfname" value="<?php echo $results['fname'] ?>">
                                        <input type="hidden" name="editlname" value="<?php echo $results['lname'] ?>">
                                        <input type="hidden" name="editbday" value="<?php echo $results['bday'] ?>">
                                        <input type="hidden" name="editadded_at" value="<?php echo $results['added_at'] ?>">
                                        <input type="hidden" name="editgender" value="<?php echo $results['gender'] ?>">
                                        
                                        <button type="submit" name="edit" class="btn btn-info">EDIT</button>
                                    </form>

                                    <form action="./delete.php" method="post" style="display: inline;">
                                        <input type="hidden" name="deleteId" value="<?php echo $results['id'] ?>">
                                        <button type="submit" name="delete" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    <!-- </form> -->
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>

</html>