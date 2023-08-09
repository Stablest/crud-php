<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    try{
        require_once './../dbconnection.inc.php';
        require_once './login-user-controller.inc.php';
        require_once './login-user-model.inc.php';

        $errors = check_valid_input($email, $pwd);

        require_once './../session.inc.php';
        if($errors) {
            $_SESSION['errors_login'] = $errors;
            header('Location: ./../../index.php');
            die();
        }

        $is_correct = is_login_correct($pdo, $pwd, $email);

        if(!$is_correct) {
            $errors['invalid credentials'] = 'E-mail ou senha errados';
            $_SESSION['errors_login'] = $errors;
            header('Location: ./../../index.php');
            die();
        }

        require_once './../session-auth-sucess.inc.php';
        
        header('Location: ./../../dashboard.php');
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die('Something went wrong : '.$e->getMessage());
    }
} else {
    header('Location: ./../../index.php');
    die();
}