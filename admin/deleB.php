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

if(isset($_GET['id'])){
    require '../class/books.php';
    $objBook = new Books();
    $objBook->delete_book($_GET['id']);
}else{
    header('location: ' . URL . 'admin/');
}