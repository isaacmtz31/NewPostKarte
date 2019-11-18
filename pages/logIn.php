<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Login V3m</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="POSTALES DIGITALES">
<meta name="keywords" content="POSTALES DIGITALES">

<!-- FRAMEWORKS -->
<link href="./../fontawesome/css/all.min.css" rel="stylesheet">
<link href="./../materializeV1/css/materialize.min.css" rel="stylesheet">
<link href="./../js/validetta/dist/validetta.min.css" rel="stylesheet">
<link href="./../js/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
<!-- PERSONAL STYLES -->
<link href="./../css/misEstilos.css" rel="stylesheet">
<!-- FRAMEWORKS -->
<script src="./../jquery/jquery-3.4.1.min.js"></script>
<script src="./../materializeV1/js/materialize.min.js"></script>
<script src="./../js/validetta/dist/validetta.min.js"></script>
<script src="./../js/validetta/localization/validettaLang-es-ES.js"></script>
<script src="./../js/confirm/dist/jquery-confirm.min.js"></script>
<!-- PERSONAL SCRIPTS-->
<script src="./../js/logIn.js"></script>

</head>
<body>
    <header>
		<div><a href="postal.html"><img src="./../imgs/postKarteb.png"></a></div>
		<div id="menu">
			<a href="#">ACERA DE</a>
		</div>
    </header>
    <main class="valign-wrapper">
        <div class="container">
            <div class="row">
                <form id="formLoginV3m" autocomplete="off">
                <div class="col s12 m6 input-field">
                    <i class="fas fa-user prefix"></i>
                    <label for="email">Correo</label>
                    <input type="text" id="email" name="email" data-validetta="required,email, minlength[6]">
                </div>
                <div class="col s12 m6 input-field">
                    <i class="fas fa-key prefix"></i>
                    <label for="contra">Contrase&ntilde;a</label>
                    <input type="password" id="contra" name="contra" data-validetta="required,minlength[6],maxLength[16]">
                </div>
                <div class="col s12 input-field" align='center'>
                    <button type="submit" class="btn" style="width:50%;">Entrar</button>
                </div>
            </div>
            </form>
            <div class="row right">
                <a href="./crearCuenta.php" class="crear">Crear Cuenta</a>
            </div>
        </div>
    </main>
    <footer>
        <footer class="page-footer">
          <div class="footer-bajo">
            <div class="container">
              © 2019 Copyright POSTKARTE
            </div>
          </div>
    </footer>
</body>
</html>
