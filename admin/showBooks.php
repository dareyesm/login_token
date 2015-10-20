<?php
//llamamos la constante URL
require '../util/constants.php';
//controlamos que se haya iniciado session.
require '../class/sessions.php';
$objSes = new Sessions();
$objSes->init();

$profile = $objSes->get('profi');

if((!isset($profile))&&($profile != 'Admin')){
    header('location: ' . URL);
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
    </head>
    <body>
        <header><h1>@dareyesm</h1></header>
        <nav>
            <ul>
                <li><a href="<?php echo URL;?>admin/index.php">Inicio</a></li>
                <li><a href="<?php echo URL;?>admin/showBooks.php">Ver Libros</a></li>
            </ul>
        </nav>
        <div id="wrapper">
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
                
                <?php
                
                require '../class/books.php';
                $objBook = new Books();
                $result = $objBook->show_books();
                
                ?>
                
                <h2>Listado de Libros</h2>
                <div class="space"></div>
                <a class="opcion" href="<?php echo URL;?>admin/newB.php">Insertar Nuevo Libro</a>
                <div class="space"></div>
                <form name="upload" action="<?php echo URL;?>admin/uploadB.php" method="POST" enctype="multipart/form-data">
                    <label>Cargar Libros:</label>
                    <div class="fileinputs">
                        <input type="file" name="file" id="file" class="file" />
                    </div>
                    <div class="space"></div>
                    <input type="submit" name="submit" id="submit" value="ENVIAR"/>
                </form>
                <div class="space"></div>
                <table border="0">
                    <tr>
                        <th>CÓDIGO</th>
                        <th>TITULO</th>
                        <th>AUTOR</th>
                        <th>EDITORIAL</th>
                        <th>DESCRIPCION</th>
                        <th colspan="2">Acciones</th>
                    </tr><?php
                    if($result){
                        foreach ($result as $key => $value) {?>
                    <tr>
                        <td><?php echo $value['codeBo'];?></td>
                        <td><?php echo $value['titleB'];?></td>
                        <td><?php echo $value['autorB'];?></td>
                        <td><?php echo $value['editoB'];?></td>
                        <td><?php echo $value['descrB'];?></td>
                        <td><a class="opcion" href="<?php echo URL;?>admin/editB.php?id=<?php echo $value['idBook'];?>">Editar</a></td>
                        <td><a class="opcion" href="<?php echo URL;?>admin/deleB.php?id=<?php echo $value['idBook'];?>">Eliminar</a></td>
                    </tr><?php }
                    }else{?>
                    <tr>
                        <td colspan="7" align="center">No hay Libros registrados</td>
                    </tr><?php } ?>
                </table>
            </div>
        </div>
    </body>
</html>
