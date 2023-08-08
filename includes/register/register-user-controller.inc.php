<?php

declare(strict_types=1);

function check_valid_input($pdo, $username, $pwd, $email) {
    if (empty($username) || empty($pwd) || empty($email))
        $errors["invalid_input"] = 'Invalid input';
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors["invalid_email"] = 'Invalid email';
    $compared_username = get_username($pdo, $username);
    if ($compared_username)
        $errors["username already exists"] = 'Username already exists';
    $compared_email = get_email($pdo, $email);
    if ($compared_email)
        $errors["email already registered"] = 'Email already registered';
    return $errors;
}

function register_new_user($pdo, $username, $pwd, $email) {
    insert_new_user($pdo, $username, $pwd, $email);
}