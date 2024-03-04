<?php
require('./session.php');
session_start();

$_SESSION['status'] = 'invalid';

unset($_SESSION['username']);

echo "<script>window.location.href = 'http://localhost/phpprac/login.php'; </script>";

