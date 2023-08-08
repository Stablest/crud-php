<?php

declare(strict_types=1);

function check_valid_input($pdo, $username, $pwd, $email) {
    $errors = [];
    if (empty($username) || empty($pwd) || empty($email))
        $errors["invalid_input"] = 'Por favor preencha todos os campos';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors["invalid_email"] = 'E-mail inválido';
    $compared_username = get_username($pdo, $username);
    if ($compared_username)
        $errors["username already exists"] = 'Usuário já existe';
    $compared_email = get_email($pdo, $email);
    if ($compared_email)
        $errors["email already registered"] = 'E-mail já registrado';
    return $errors;
}

function register_new_user($pdo, $username, $pwd, $email) {
    insert_new_user($pdo, $username, $pwd, $email);
}