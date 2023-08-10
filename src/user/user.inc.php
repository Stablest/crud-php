<?php

require_once './../session.inc.php';

if (isset($_SESSION['admin']) && $_SESSION['admin']) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    }

    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        try {
            require_once './../dbconnection.inc.php';
            require_once './../user/user-controller.inc.php';
            require_once './../user/user-model.inc.php';
            require_once './../session.inc.php';

            $json = file_get_contents('php://input');
            $obj = json_decode($json);
            $id = $obj->{'id'};
            $username = $obj->{'username'};
            $email = $obj->{'email'};
            $permission = $obj->{'permission'};
            $query_result = update_users($pdo, $id, $username, $email, $permission);
            echo $query_result;
        } catch (PDOException $e) {
            die('Something went wrong : ' . $e->getMessage());
        }
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        try {
            require_once './../dbconnection.inc.php';
            require_once './../user/user-controller.inc.php';
            require_once './../user/user-model.inc.php';
            require_once './../session.inc.php';
            $users = get_all_users($pdo);
            echo json_encode($users);
            header('./../../dashboard.php');
            $pdo = null;
            $stmt = null;
            die();
        } catch (PDOException $e) {
            die('Something went wrong : ' . $e->getMessage());
        }
        exit();
    }
}
