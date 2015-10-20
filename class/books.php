<?php

class Books{
    
    public $objdata;
    
    public function __construct() { 
        
        require 'database.php';
        $this->objdata = new Database();
        
    }
    
    public function show_books(){
        
        $sth = $this->objdata->prepare('SELECT * FROM books');
        
        $sth->execute();
        
        $data = $sth->fetchAll();
        
        return $data;
        
    }
    
    public function insert_book(){
        
        $this->objdata->exec('set names utf8');
        
        $sth = $this->objdata->prepare('INSERT INTO books VALUES(:id, :code, :title, :autor, :desc, '
                . ':edito, :fecha)');
        
        $id = '';        
        
        $sth->execute(array(
            ':id' => $id,
            ':code' => $_POST['nombre'],
            ':title' => $_POST['titulo'],
            ':autor' => $_POST['autor'],
            ':desc' => $_POST['desc'],
            ':edito' => $_POST['edito'],
            ':fecha' => $_POST['fecha']
        ));
        
        header('location: ' . URL . 'admin/showBooks.php');
        
        
    }
    
    public function search_bookE($id = FALSE){
        
        $sth = $this->objdata->prepare('SELECT * FROM books WHERE idBook = :id');
        
        $sth->execute(array(
            ':id' => $id
        ));
        
        $data = $sth->fetchAll();
        
        return $data;
        
    }

    public function edit_book(){
        
        $this->objdata->exec('set names utf8');
        
        $sth = $this->objdata->prepare('UPDATE books set codeBo = :code, titleB = :title, '
                . 'autorB = :auto, descrB = :desc, editoB = :edit, dateBo = :date '
                . 'WHERE idBook = :id');

        $sth->execute(array(
            ':id' => $_POST['id'],
            ':code' => $_POST['nombre'],
            ':title' => $_POST['titulo'],
            ':auto' => $_POST['autor'],
            ':desc' => $_POST['desc'],
            ':edit' => $_POST['edito'],
            ':date' => $_POST['fecha'] 
        ));
        
        header('location: ' . URL . 'admin/showBooks.php');
        
    }
    
    public function delete_book($id = FALSE){
        
        $sth = $this->objdata->prepare('DELETE FROM books WHERE idBook = :id');
        
        $sth->execute(array(
            ':id' => $id
        ));
        
        header('location: ' . URL . 'admin/showBooks.php');
        
    }
    
    public function change_name(){
        $string = "";
        $posible = "1234567890ABCDEFGHIJKLMNOPQRSTVWXYZabcdefghijklmnopqrstuvwxyz_";
        $i = 0;
        while($i < 18){
            $char = substr($posible, mt_rand(0, strlen($posible)-1),1);
            $string .= $char;
            $i++;
        }
        
        return $string;
    }
    
    public function upload_file($file = false, $path = false){
        //Verificar que si se haya recibido el archivo. 
        $upload = TRUE;
        if($_FILES['file']['error'] > 0){
            echo "Error al Cargar el Archivo: " . $_FILES['file']['name'];
            $upload = FALSE;
        }  else {
            //verificamos el formato del archivo
            if(!($_FILES['file']['type'] === "text/csv")){
                echo "Formato de archivo no permitido";
                $upload = FALSE;
            }
        }
        if($upload){
            $type = explode('.', $_FILES['file']['name']);
            $num = count($type);
            $extension = $type[$num-1];
            $real_file = $path.$file.'.'.$extension;
            if(file_exists($real_file)){
                move_uploaded_file($_FILES['file']['tmp_name'], $real_file);
                return $real_file;
            }else{
                move_uploaded_file($_FILES['file']['tmp_name'], $real_file);
                return $real_file;
            }   
        }   
    }  
    
    public function upload_book($pathFile = false) {
        
        ini_set('auto_detect_line_endings', TRUE);
        
        $nombre = fopen($pathFile, "r");
        
        while (($data = fgetcsv($nombre,1000,";","\n"))!==FALSE){
            $sth = $this->objdata->prepare('INSERT INTO books VALUES (:id, :code, :title, :autor, '
                    . ':desc, :edito, :fecha)');
            $sth->execute(array(
                ':id' => $data[0],
                ':code' => $data[1],
                ':title' => $data[2],
                ':autor' => $data[3],
                ':desc' => $data[4],
                ':edito' => $data[5],
                ':fecha' => $data[6]
            ));
        }
        
    }
}

