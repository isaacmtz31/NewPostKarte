<?php
  include("./configBD.php");
  $boleta = $_SESSION["email"];
  $sqlInfUser = "call datosUsuario('$boleta')";
  $resInfUser = mysqli_query($conexion, $sqlInfUser);
  $infUser = mysqli_fetch_row($resInfUser);


  /*
  if(file_exists("./../fotos/$boleta.jpg")){
      $foto = "./../fotos/$boleta.jpg";
  }else{
      $foto = "./../fotos/$boleta.png";
  }*/
 ?>
