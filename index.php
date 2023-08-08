<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body class="vh-100 bg-light">
    <main class="h-100">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="mx-2 bg-primary rounded rounded-3" style="width:24rem">
                <div class="p-2 py-4">
                    <h1 class="m-8 text-center text-light">Cadastro</h1>
                    <form action="./includes/register/register-user.inc.php" method="post" class="d-flex flex-column mw-100">
                        <input type="text" name="username" placeholder="Usuário" class="p-2 m-2 rounded border-0 bg-light">
                        <input type="password" name="pwd" placeholder="Senha" class="p-2 m-2 rounded border-0 bg-light">    
                        <input type="text" name="email" placeholder="E-mail" class="p-2 m-2 rounded border-0 bg-light"> 
                        <input type="submit" value="Registrar" class="mx-auto mt-4 rounded border-0 text-light bg-dark fs-5 fw-bold rounded" style="height: 4rem; width: 10rem">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous" async></script>
</body>
</html>