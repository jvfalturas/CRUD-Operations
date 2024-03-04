<?php
session_start();

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    $_SESSION['status'] = 'invalid';

    unset($_SESSION['username']);

    echo "<script>window.location.href = 'http://localhost/phpprac/login.php'; </script>";
}
?>
