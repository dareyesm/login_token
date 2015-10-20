<?php

require 'util/constants.php';
require 'class/database.php';
$objData = new DataBase();

require 'class/matrix.php';
$objMatr = new Matrix();

require 'class/users.php';
$objUser = new Users();

$matrix = $objMatr->search_matrix($_POST['idMatrix']);

$pos = $objMatr->search_coord($_POST['val'], $matrix[0]['valores'],$_POST['coord']);

if($pos){
    $objUser->login_in2($_POST['userId']);
}  else {
    header('location: ' . URL . 'index.php?iderr=1');
}

