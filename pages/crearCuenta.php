<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="./../fontawesome/css/all.min.css" rel="stylesheet">
<link href="./../materializeV1/css/materialize.min.css" rel="stylesheet">
<link href="./../js/validetta/dist/validetta.min.css" rel="stylesheet">
<link href="./../js/confirm/dist/jquery-confirm.min.css" rel="stylesheet">
<link href="./../css/misEstilos.css" rel="stylesheet">

<script src="./../jquery/jquery-3.4.1.min.js"></script>
<script  src="./../materializeV1/js/materialize.min.js"></script>
<script src="./../js/validetta/dist/validetta.min.js"></script>
<script src="./../js/validetta/localization/validettaLang-es-ES.js"></script>
<script src="./../js/confirm/dist/jquery-confirm.min.js"></script>
<script src="./../js/registro.js"></script>
</head>
<body>
    <header>
        <div><a href="postal.html"><img src="./../imgs/logo.png"></a></div>
        <div id="menu">
            <a href="#">ACERA DE</a>
        </div>
    </header>
    <main>
        <div class="container">
            <form id="formRegistro" autocomplete="off">
            <div class="row">
                <h4 class="center-align blue-text">Registo Usuario</h4>
                <div class="col s12 m6 input-field">
                    <i class="fas fa-user prefix blue-text"></i>
                    <label for="nombreUsuario">Nombre</label>
                    <input type="text" id="nombreUsuario" name="nombreUsuario"  data-validetta="required">
                </div>
                <div class="col s12 m6 input-field">
                    <i class="fas fa-user prefix blue-text"></i>
                    <label for="apellidoUsuario">Primer Apellido</label>
                    <input type="text" id="apellidoUsuario" name="apellidoUsuario"  data-validetta="required">
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <div class="col s12 m6 input-field">
                            <i class="fas fa-users prefix blue-text"></i>
                            <label for="genero">G&eacute;nero</label>
                        </div>
                        <div class="col s12 m6 input-field">
                                <label><input type="checkbox" name="genero" id="generoH" value = "Hombre"/> <span>Hombre</span></labe>
                        </div>
                    </div>
                    <div class="col s12 m6 input-field">
                        <div class="col s12 m6 l4 input-field">
                            <label><input type="checkbox" name="genero" id="generoM" value = "Mujer"/> <span>Mujer</span></label>
                        </div>
                        <div class="col s12 m6 l4 input-field">
                            <label><input type="checkbox" name="genero" id="generoO" value = "Otro"/> <span>Otro</span></label>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 input-field ">
                    <i class="fas fa-envelope prefix blue-text"></i>
                    <label for="email">Correo</label>
                    <input type="text" id="email" name="email"  data-validetta="required,email">
                </div>
                <div class="col s12 m6 input-field">
                    <i class="fas fa-key prefix blue-text"></i>
                    <label for="contrasena">Contrase&ntilde;a</label>
                    <input type="password" id="contra" name="contra"  data-validetta="required,minlength[6],maxLength[16]">
                </div>
                <div class="col s12 input-field">
                    <button type="submit" class="btn blue" style="width:100%;">Registrar</button>
                </div>
            </div>
            </form>
            <div class="row right">
                <a href="./../index.html" class="blue-text"> Regresar</a>
            </div>
        </div>
    </main>
    <footer class="page-footer blue">
        <div class="footer-copyright blue darken-1">
            <div class="container">
                &copy; POSTKARTE
            </div>
        </div>
    </footer>
    
</body>
</html>