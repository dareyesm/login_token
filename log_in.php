<?php
//llamamos las constantes que necesitemos
require 'util/constants.php';

//realizamos la conexión a la BD
require 'class/database.php';

//llamar la clase matrix
require 'class/matrix.php';

//llamar la clase del PDF
require 'fpdf17/fpdf.php';

//llamamos la clase usuarios
require 'class/users.php';
$objUser = new Users();

$objUser->log_in();

