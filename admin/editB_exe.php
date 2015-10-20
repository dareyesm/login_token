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

if(isset($_POST['nombre'])){
    require '../class/books.php';
    $objBook = new Books();
    $objBook->edit_book();
}else{
    header('location: ' . URL . 'admin/');
}


print_r($_POST);

