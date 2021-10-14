<?php
    include('config.php');
    session_start();

    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['PASSWORD'])) {
                $_SESSION['user_id'] = $result['ID'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/inicioregistro.css">
    <title>Manos que Bailan</title>
</head>
<body>
    <form method="post" action="" name="signin-form">
        <div class="form-element">
            <label>Usuario</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Contraseña</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="login" value="login">Iniciar Sesion</button>
    </form>
</body>
</html>
