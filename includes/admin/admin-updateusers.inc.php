<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        require_once './../dbconnection.inc.php';
        require_once './../user/user-controller.inc.php';
        require_once './../user/user-model.inc.php';
        require_once './../session.inc.php';

        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        // echo $obj->{'names'}->{'email'};
        $id = $obj->{'id'};
        $username = $obj->{'username'};
        $email = $obj->{'email'};
        $permission = $obj->{'permission'};
        $query_result = update_users($pdo, $id, $username, $email, $permission);
        echo $query_result;
    } catch (PDOException $e) {
        die('Something went wrong : ' . $e->getMessage());
    }
} else {
    header('Location: ./../../index.php');
    die();
}
