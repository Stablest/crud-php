<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

    try {
        require_once '../dbconnection.inc.php';
        require_once './register-user-controller.inc.php';
        require_once './register-user-model.inc.php';
        $errors = check_valid_input($pdo, $username, $pwd, $email);
        require_once './../session.inc.php';
        if ($errors) {
            $_SESSION['errors_register'] = $errors;
            header("Location: ./../../index.php");
            die();
        }
        register_new_user($pdo, $username, $pwd, $email);
        header("Location: ./../../index.php?signup=sucess");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die('Something went wrong : ' . $e->getMessage());
    }
} else {
    header('Location: ./../../index.php');
    die();
}