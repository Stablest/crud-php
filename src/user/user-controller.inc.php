<?php
function get_all_users(PDO $pdo)
{
    $errors = [];
    if (!isset($_SESSION['permission']))
        return $errors['not found'] = 'Not found';
    if ($_SESSION['permission'] < 1)
        return $errors['forbidden'] = 'Action forbidden';
    $users = get_users($pdo);
    return $users;
}

function update_users(PDO $pdo, $id, $username, $email, $permission)
{
    $result = update_user($pdo, $id, $username, $email, $permission);
    return $result;
}
