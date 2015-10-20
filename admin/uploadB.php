<?php
//llamar nuestra constante URL
require '../util/constants.php';
//controlamos que se haya inciado sesion
require '../class/sessions.php';
$objSes = new Sessions();
$objSes->init();
$profile = $objSes->get('profi');

if((!isset($profile))&&($profile != 'Admin')){
    header('location: ' . URL);
}

if(isset($_FILES['file'])){
    //llamar la clase books
    require '../class/books.php';
    $objBook = new Books();
    //cambiamos o generamos el nombre del archivo csv a cargar.
    $file = $objBook->change_name();
    $path = 'files/';
    $real_file = $objBook->upload_file($file, $path);
    $objBook->upload_book($real_file);
    header('location: ' . URL .'admin/showBooks.php');
}else{
    header('location: ' . URL .'admin/showBooks.php');
}

