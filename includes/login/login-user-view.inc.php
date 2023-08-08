<?php

declare(strict_types=1);

function check_signup_erros() {
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION['errors_login']);
    }
}