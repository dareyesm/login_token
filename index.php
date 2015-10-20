<?php

if(isset($_GET['iderr'])){
    $error = $_GET['iderr'];
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilos.css" />
        <link rel="stylesheet" href="css/forms.css" />
        
        <script src="js/jquery-1.11.2.min.js"></script>
        <script>
            $(document).on('ready', function(){
                $('#submit').click(function(){
                    var nombre = $('#nombre').val();
                    var mail = $('#mail').val();
                    var mensaje = $('#mensaje').val();
                    var expresa = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
                    
                    if(nombre == ''){
                        $('#errorN').fadeIn();
                        return false;
                    }else{
                        if(mail == '' || !expresa.test(mail)){
                            $('#errorN').fadeOut();
                            $('#errorC').fadeIn();
                            return false;
                        }else{
                            $('#errorC').fadeOut();
                            if(!$('input[name="gender"]').is(':checked')){
                                $('#errorG').fadeIn();
                                return false;
                            }else{
                                if(mensaje == ''){
                                    $('#errorG').fadeOut();
                                    $('#errorM').fadeIn();
                                    return false;
                                }else{
                                    $('#errorM').fadeOut();
                                }
                            }
                        }
                    }    
                });
                
                //mostrar y esconder formulario de log in
                $('.open').click(function (){
                    $('#bgLogin').fadeIn();
                });
                $('.cerrar').click(function (){
                    $('#bgLogin').fadeOut();
                });
                
                //validando formulario de log in
                $('#LogSubm').click(function (){
                    
                    var usuario = $('#Usern').val();
                    var clave = $('#passU').val();
                    
                    //validamos el nombre de usuario
                    if(usuario === ''){
                        $('#errorU').fadeIn();
                        return false;
                    }else{
                        if(clave === ''){
                            $('#errorU').fadeOut();
                            $('#errorP').fadeIn();
                            return false;
                        }else{
                            $('#errorP').fadeOut();
                        }
                    }
                });
            });
        </script>
        
        <script type="text/javascript">
            function desplegar(_valor){
                document.getElementById("bgventana").style.visibility=_valor;
            }
        </script>
    </head>
    <body>
        <header><h1>@dareyesm</h1></header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="aboutus.php">Sobre Nosotros</a></li>
                <li><a href="javascript:desplegar('visible');">Contactenos</a></li>
                <li><a class="open" href="#">Ingresar</a></li>
            </ul>
        </nav>
        <div id="wrapper">
            <div id="bgLogin">
                <div id="logWind">
                    <div id="log_close">
                        <a class="cerrar" href="#">Cerrar</a>
                    </div>
                    <div id="log_form">
                        <form name="login" action="log_in.php" method="post">
                            <div id="errorU" class="error">Error</div>
                            <?php if(isset($_GET['iderr']) == 1){?>
                                <h1>Datos Incorrectos...</h1>
                            <?php } ?>
                            <label>Nombre de Usuario:</label>
                            <input type="text" name="Usern" id="Usern" />
                            <div id="errorP" class="error">Error</div>
                            <label>Clave de Acceso:</label>
                            <input type="password" name="passU" id="passU" />
                            <div class="space"></div>
                            <input type="submit" id="LogSubm" value="INGRESAR" />
                        </form>
                    </div>
                </div>
            </div>
            <div id="bgventana">
                <div id="ventana">
                    <div id="Mod_close">
                        <a href="javascript:desplegar('hidden');">Cerrar</a>
                    </div>
                    <div id="wrapper-form">
                        <form action="contact.php" method="post">
                            <div id="errorN" class="error">Error</div>
                            <label>Nombre:</label>
                            <input type="text" id="nombre" name="nombre" /><br>
                            <div id="errorC" class="error">Error</div>
                            <label>Correo Electrónico:</label>
                            <input type="text" id="mail" name="mail" /><br>
                            <label>Género:</label>
                            <div id="errorG" class="error">Error</div>
                            <input type="radio" id="male" name="gender" value="male"><div class="title">Hombre</div>
                            <input type="radio" id="female" name="gender" value="female"><div class="title">Mujer</div>
                            <div id="errorM" class="error">Error</div>
                            <label>Escribe tu mensaje:</label>
                            <textarea name="mensaje" id="mensaje"></textarea>
                            <div class="space"></div>
                            <input id="submit" type="submit" value="ENVIAR" />
                        </form>
                    </div>
                </div>
            </div>
            <div id="left">
                <h2>Últimas Noticias!</h2>
                <div class="space"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> 
                <div class="space"></div>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit 
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur 
                    sint occaecat cupidatat non proident, sunt in culpa qui 
                    officia deserunt mollit anim id est laborum</p>
            </div>
            <div id="right">
                <h2>Temas de Interés</h2>
                <div class="space"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> 
                <div class="space"></div>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit 
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur 
                    sint occaecat cupidatat non proident, sunt in culpa qui 
                    officia deserunt mollit anim id est laborum</p>
            </div>
        </div>
    </body>
</html>
