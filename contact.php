<!DOCTYPE html>
<html lang="es">
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilos.css" />
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
                <li><a href="index.html">Inicio</a></li>
                <li><a href="aboutus.html">Sobre Nosotros</a></li>
                <li><a href="javascript:desplegar('visible');">Contactenos</a></li>
            </ul>
        </nav>
        <div id="wrapper">
            <div id="bgventana">
                <div id="ventana">
                    <a href="javascript:desplegar('hidden');">Cerrar</a>
                    <form action="contact.php" method="post">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" /><br>
                        <label>Correo Electrónico:</label>
                        <input type="text" name="mail" /><br>
                        <label>Dirección</label>
                        <input type="text" name="dir" /><br>
                        <input type="submit" value="ENVIAR" />
                    </form>
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
                <h2><?php echo $_POST["nombre"];?></h2>
                <div class="space"></div>
                <p><?php echo $_POST["mail"];?>.</p> 
                <div class="space"></div>
                <p><?php echo $_POST["dir"];?>.</p>
            </div>
        </div>
    </body>
</html>
