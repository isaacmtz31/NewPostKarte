<?php
    include("./configBD.php");
    include("./getPosts.php");

    $respAX = array();
    $nombreUsuario = $_POST["nombreUsuario"];
    $apellidoUsuario = $_POST["apellidoUsuario"];
    $genero = $_POST["genero"];
    $email = $_POST["email"];
    $contra = md5($_POST["contra"]);
    $sqlRegistro = "INSERT INTO `usuario` (nombreUsuario, apellidoUsuario, genero, email, contra)
    VALUES('$nombreUsuario','$apellidoUsuario','$genero','$email','$contra')";
        $resRegistro = mysqli_query($conexion,$sqlRegistro);
        $filasAfectadasRegistro = mysqli_affected_rows($conexion);
        if($filasAfectadasRegistro == 1){
            $respAX["val"] = 1;
            $respAX["msj"] = "<h5 class='center-align'>Se registraron correctamente sus datos. Gracias :)</h5>";
        }else{
            $respAX["val"] = 0;
            $respAX["msj"] = "<h5 class='center-align'>Se present&oacute; un error. Favor de intentarlo nuevamente.</h5>";
        }

    echo json_encode($respAX);

?>