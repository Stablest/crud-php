<?php
    if ($_SESSION) {
        $_SESSION['username'] = $is_correct['username'];
        $_SESSION['permission'] = $is_correct['permission'];
        if ($is_correct['permission'] > 0)
            $_SESSION['admin'] = true;
        else
            $_SESSION['admin'] = false;
    }
?>