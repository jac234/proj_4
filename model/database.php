<?php
$username = 'jac234';
$password = 'Frisky96!!';
$dsn = "mysql:host=sql1.njit.edu;dbname=$username";
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}
?>