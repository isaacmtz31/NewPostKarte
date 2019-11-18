<?php
    session_start();
    include("./../BD/configBD.php");
    include("./../BD/getPosts.php");

    $respAX = array();
    //$contra = md5($contra);
    //$sqlLoginV3m = "call logIn('$email','$contra')";
    $sqlLoginV3m = "call logIn('$email','$contra')";
    $resLoginV3m = mysqli_query($conexion, $sqlLoginV3m);
    $numFilasLoginV3m = mysqli_num_rows($resLoginV3m);

    if($numFilasLoginV3m == 1)
    {
      $infAlumno = mysqli_fetch_row($resLoginV3m);
      if($infAlumno[0] == "USUARIO NO ENCONTRADO"){
        $respAX["val"] = 0;
        $respAX["msj"] = "<h5 class='center-align'>USUARIO NO ENCONTRADO</h5>";
      }else{
        $respAX["val"] = 1;
        $respAX["msj"] = "<h5 class='center-align'>Hola $infAlumno[1] $infAlumno[2]. Bienvenido :)</h5>";
        $_SESSION["email"] = $infAlumno[5];
        }
    }else{
        $respAX["val"] = 1;
        $respAX["msj"] = "<h5 class='center-align'>Error. Favor de intentarlo nuevamente</h5>";
    }
    echo json_encode($respAX);
?>
