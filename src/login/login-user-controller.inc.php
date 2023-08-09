<?php

function check_valid_input(string $email, string $pwd){
    $errors = [];
    if(empty($email) || empty($pwd))
        $errors['invalid input'] = 'Por favor preencha todos os campos';
    return $errors;
}

function is_login_correct(PDO $pdo, string $pwd, string $email){
    $is_password_correct = compare_password($pdo, $pwd, $email);
    if (!$is_password_correct)
        return false;
    return $is_password_correct;
}