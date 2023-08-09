<?php
function get_users(PDO $pdo)
{
    $query = 'SELECT id, username, email, permission FROM users;';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function update_user(PDO $pdo, $id, $username, $email, $permission)
{
    $query = 'UPDATE users SET username = :username, email = :email, permission = :permission WHERE id = :id;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':permission', $permission);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
