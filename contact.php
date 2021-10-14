<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manos que Bailan</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    
    <header> <!--ENCABEZADO-->
        <div id="titulo">
            <h1 class="title">Manos que bailan</h1>
        </div>
        <nav>
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="....php">Curso</a></li>
                <li><a href="....php">Historia</a></li>
                <li><a href="....php">Sobre lenguaje de señas</a></li>
                <li><a href="....php">Diccionario</a></li>
                <li><a href="....php">Sobre mí</a></li>
                <li><a href="contact.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div> <!--CUERPO-->
        <h1>Contacto</h1>
       
        <form method="post" action="contact.php">
            <label for="nombre">Nombre:</label>
            <input id="nombre" name="nombre" placeholder="Nombre completo">
            <label for="email">Email:</label>
            <input id="email" name="email" type="email" placeholder="ejemplo@email.com">
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" placeholder="Danos tu mensaje"></textarea>
            <input id="submit" name="submit" type="submit" value="Enviar">
        </form>
    </div>
    <?
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];
        $para = 'tucorreo@email.com';
        $titulo = 'Hola - La Webera';
            
        $msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";
            
        if ($_POST['submit']) {
            if (mail ($para, $titulo, $msjCorreo)) {
            echo 'El mensaje se ha enviado';
            } else {
            echo 'Falló el envio';
            }
        }
    ?>
    <footer id="social"> <!--PIE-->
        <div class="red">
            <a href="http://www.instagram.com/ori.olaia_1704"><img src="" alt="">instagram</a>
            <a href="http://www.twitter.com/rabbit1704"><img src="" alt="">Twitter</a>
            <a href="http://twitch.tv/rabbit1704"><img src="" alt=""> Twitch</a>
            <a href="mailto:olaoriana@gmail.com"><img src="" alt=""> Correo</a>
        </div>
    </footer>
</body>
</html>