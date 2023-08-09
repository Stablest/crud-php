<?php

function compare_password(PDO $pdo, string $pwd, string $email) {
    $query = 'SELECT username, pwd, permission FROM users WHERE email = :email;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $hashedPwd = $result['pwd'];
    if (!$hashedPwd)
        return false;
    $isEqual = password_verify($pwd,$hashedPwd);
    
    if (!$isEqual)
        return false;
    return $result;
}