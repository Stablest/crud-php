<?php
require_once './../src/session.inc.php';
require_once './../src/login/login-user-view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body class="vh-100 bg-light">
    <main class="h-100">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="mx-2 bg-primary rounded rounded-3" style="width:24rem">
                <div class="p-2 py-4">
                    <h1 class="text-center text-light">Login</h1>
                    <form action="./../src/login/login-user.inc.php" method="post" class="d-flex flex-column p-2">
                        <input type="email" name="email" placeholder="E-mail" class="p-2 m-2 rounded border-0 bg-light">
                        <input type="password" name="pwd" placeholder="Senha" class="p-2 m-2 rounded border-0 bg-light">
                        <div class="mx-auto mt-1 text-light">
                            Não possui conta?
                            <a href="./register.php" class="text-dark text-decoration-none fw-semibold"> Registrar-se</a>
                        </div>
                        <input type="submit" value="Entrar" class="mx-auto mt-4 rounded border-0 text-light bg-dark fs-5 fw-bold rounded" style="height: 3rem; width: 8rem">
                    </form>
                    <div class="mt-4 text-warning fw-bold text-center">
                        <?php
                        check_signup_erros();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>