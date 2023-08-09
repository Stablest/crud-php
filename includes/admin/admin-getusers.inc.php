<?php
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