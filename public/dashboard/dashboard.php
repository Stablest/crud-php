<?php
require_once './../../src/session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body class="bg-light">
    <?php
    require_once './../header.php';
    ?>
    <main>
        <?php
        if (isset($_SESSION['admin'])) {
            if ($_SESSION['admin'])
                require_once './admin-panel.php';
            else
                require_once './common-user.php';
        } else {
            include_once './../helpers/forbidden.html';
        }
        ?>
    </main>
</body>

</html>