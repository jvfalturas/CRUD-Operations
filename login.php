
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

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="card">
        <H2 class="card-title text-center">Login</H2>           
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label >Username</label>
                        <input type="text" class="form-control" name="username" 
                            placeholder="Please enter your username" required/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password"
                            placeholder="Please enter your password" required/>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary mt-2" style="display: block; margin: 0 auto;">Login</button>
                </form>


                <!-- Optional JavaScript; choose one of the two! -->

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
            </div>
        </div>

    </div>

</body>

</html>

<?php
require('./database.php');
session_start();

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    /* Set Default Invalid */
    $_SESSION['status'] = 'invalid';
  }

  if ($_SESSION['status'] == 'valid') {
    echo "<script>window.location.href = 'http://localhost/phpprac/home'; </script>";
}


if(isset($_POST['login'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($username) || empty($password)) {
        // echo "Error: Please fill out all fields.";
        echo "<script>Swal.fire('Error!', 'Please fill out all fields.', 'error');</script>";
        // echo "Please fill out all fields.";
    }else{
        $queryvalidate = "SELECT * FROM usertype WHERE username ='$username' AND password='$password'";
        $sqlvalidate = mysqli_query($connection,$queryvalidate);

        if (mysqli_num_rows($sqlvalidate) > 0) {
            $_SESSION['status'] = 'valid';
        echo "<script>window.location.href = 'http://localhost/phpprac/home'; </script>";

        }else{
            $_SESSION['status'] = 'invalid';
            echo "<script>Swal.fire('Error!', 'Wrong username or password', 'error');</script>";
 
        }
    }
}

?>