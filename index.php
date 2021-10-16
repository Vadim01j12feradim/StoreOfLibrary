<html>
<LINK REL=StyleSheet HREF="styles2.css" TYPE="text/css" MEDIA=screen>

<head>
    <style>
    </style>
</head>

<body>

    <fieldset>
        <form action="" method="post">
            <a href="registerUser.html">
            Registrarme
            </a>
            <br>
            <?php
            if (isset($_POST["usuario"])) {
                include("conection.php");
                $pasword = $_POST["pasword"];
                $usuario = $_POST["usuario"];
                $i = 0;
                $datost = $base->query("SELECT *FROM Cliente where username = '$usuario' and passwordd='$pasword'")->fetchAll(PDO::FETCH_OBJ);
                foreach ($datost as $p) {

                    echo $p->nomemple;
                    $i = 1;
                }
                if ($i == 0)
                    echo "Verifica tu usuario o tu contraseña";
                else {
                    session_start();
                    $_SESSION['sesion_user'] = $usuario;
                    header("LOCATION:libros.php");
                }
            }
            ?>
            <br>
            <div>
                <img src="logologin.png" class="iconop">
                <p>Usuario</p>
                <p>
                    <input class="texte" type="text" name="usuario" id="usuario"
                        placeholder="Ingresa tu nombre de usuario" required>

                </p>  
                <p>Contraseña</p>
                <input class="texte" type="password" name="pasword" id="pasword"
                    placeholder="Escribe aqui tu contraseña">
                <br>
                <input class="sent" type="submit" name="register" id="register" value="Enviar">
                </br>
            </div>
        </form>


</body>
</fieldset>
<div class="info">
    <p>Sobre el desarrollador <strong>Izmael Guzman Murguia</strong></p>
    <br><a href="https://es-la.facebook.com/">
        <img class="contact" src="facebook.png"></a>Facebook</br>
    <br><img class="contact" src="whatsapp.png">whatssapp</br>
    <br><img class="contact" src="gorjeo.png">Twitter</br>
    <br><img class="contact" src="instagram.png">
    Instagram</br>
    <br><img class="contact" src="youtube.png">
    Youtube</br>
    <br><img class="contact" src="telegrama.png">
    Telegram</br>
    <br><img class="contact" src="discord.png">
    Discord</br>
    <br><img class="contact" src="twitch.png">
    Twitch</br>
</div>

</html>
