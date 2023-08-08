<?php

function get_username(PDO $pdo, string $username) {
    $query = 'SELECT username FROM users WHERE username = :username;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(PDO $pdo, string $email) {
    $query = 'SELECT email FROM users WHERE email = :email;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function insert_new_user(PDO $pdo, $username, $pwd, $email) {
    $options = [
        'cost' => 10
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $query = 'INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':pwd', $hashedPwd);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}