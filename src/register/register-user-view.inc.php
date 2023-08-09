<?php

declare(strict_types=1);

function check_signup_errors() {
    if (isset($_SESSION['errors_register'])) {
        $errors = $_SESSION['errors_register'];
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION['errors_register']);
    }
}