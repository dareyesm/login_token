<!DOCTYPE html>
<html lang="es">
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilos.css" />
        <link rel="stylesheet" href="css/forms.css" />
    </head>
    <body>
        <header><h1>@dareyesm</h1></header>
        <nav>
           
        </nav>
        <div id="wrapper">
            <div id="left">
                <h2>Token de Seguridad</h2>
                <div class="space"></div>
                <p>Por favor ingrese el token de seguridad según las coordenadas de su Matrix Generada.</p> 
                <div class="space"></div>
            </div>
            <div id="right"><?php
                $limitInitLe = 'A';
                $limitFinLe = 'H';
                $limitInitN = 1;
                $limitFinN = 10;
                $letraAleatoria = chr(rand(ord($limitInitLe), ord($limitFinLe)));
                $numeroAleatorio = rand($limitInitN, $limitFinN); ?>
                <h2>Token de Seguridad</h2>
                <div class="space"></div>
                <p>Por favor ingrese los giditos de la coordenada:</p>
                <form name="matrix" action="verify_matrix.php" method="POST">
                    <label><?php echo $letraAleatoria.$numeroAleatorio;?></label>
                    <input name="val" id="val" />
                    <input type="hidden" name="idMatrix" value="<?php echo $_GET['m'];?>"  />
                    <input type="hidden" name="coord" value="<?php echo $letraAleatoria.$numeroAleatorio;?>" />
                    <input type="hidden" name="userId" value="<?php echo $_GET['u'];?>" />
                    <input type="submit" name="send" id="send" value="Enviar" />
                </form>
                <div class="space"></div>
                
            </div>
        </div>
    </body>
</html>
