<?php

include('config.php');
session_start();

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error">¡Esta cuenta ya está registrada!</p>';
    }

    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(USERNAME,PASSWORD,EMAIL) VALUES (:username,:password_hash,:email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();

        if ($result) {
            echo '<p class="success">¡Tu registro fue exitoso!</p>';
        } else {
            echo '<p class="error">¡Algo salió mal!</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/inicioregistro.css">
        <title>Document</title>
    </head>
    <body>
        <form method="post" action="" name="signup-form">
                    <div class="form-element">
                        <label>Usuario</label>
                        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                    </div>
                    <div class="form-element">
                        <label>Correo</label>
                        <input type="email" name="email" required />
                    </div>
                    <div class="form-element">
                        <label>Contraseña</label>
                        <input type="password" name="password" required />
                    </div>
                    <button type="submit" name="register" value="register">Register</button>
                </form>
    </body>
</html>

