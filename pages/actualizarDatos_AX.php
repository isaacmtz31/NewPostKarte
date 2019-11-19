<?php
    session_start();
    include("./../BD/configBD.php");
    include("./../BD/getPosts.php");
    $emailS = $_SESSION["email"];
    $respAX = array();
    //$contra = md5($contra);
    //$sqlLoginV3m = "call logIn('$email','$contra')";
    //call actualizarDatos('Isaac','Martinez Sanchez','Masculino', 'isi_mrt@hotmail.com','', 21, 'isaac.jpg');

    $sqlLoginV3m = "call actualizarDatos('$nombreU','$apellidosU','$genero','$emailS','$nombreCorreo','$edad','$nombreFotoPerfil')";
    $resLoginV3m = mysqli_query($conexion, $sqlLoginV3m);
    $numFilasLoginV3m = mysqli_num_rows($resLoginV3m);

    if($numFilasLoginV3m == 1)
    {
      $infAlumno = mysqli_fetch_row($resLoginV3m);
      if($infAlumno[0] != '¡Datos del usuario modificados correctamente!'){
        $respAX["val"] = 0;
        $respAX["msj"] = "Hubo un error. $infAlumno[0]";
      }else{
        $respAX["val"] = 1;
        $respAX["msj"] = "$infAlumno[0]";

        $dirFoto = "./../imgs/users/";
        $archFoto = $dirFoto . basename($_FILES["fotoPerfil"]["name"]);
        $extFoto = pathinfo($archFoto,PATHINFO_EXTENSION);
        //$destFoto = $dirFoto.$_POST["nombreCorreo"].".".$extFoto;
        if(move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $archFoto)){
            $respAX["msj"] .= "La foto se guardó; correctamente";
        }else{
            $respAX["msj"] .= "No se pudo guardar la foto";
        }
      }
    }else{
        $respAX["val"] = 0;
        $respAX["msj"] = "<h5 class='center-align'>Error. Favor de intentarlo nuevamente</h5>";
    }
    echo json_encode($respAX);

?>
