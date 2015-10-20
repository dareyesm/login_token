<?php
class Users{
    public function __construct() { }
    
    public function log_in(){
        $objdata = new Database();
        $sth = $objdata->prepare('SELECT * FROM users WHERE logUser = :login AND pasUser = :pass');
        $sth->execute(array(
            ':login' => $_POST['Usern'],
            ':pass' => $_POST['passU']
        ));
        
        $data = $sth->fetch();
        
        $count = $sth->rowCount();
        
        if($count > 0){
            
            if($data['id_matrix'] == 0){
                
                $objMatrix = new Matrix();
                $matrix = $objMatrix->create_matrix();
                $objMatrix->insert_matri($matrix);
                $datos = $objMatrix->return_matrix();
                $objMatrix->matrix_assign($data['idUser'], $datos[0]['id_matrix']);
                
            }else{
                header('location: ' . URL . 'matrix.php?m=' . $data['id_matrix'] . '&u=' . $data['idUser']);
            }
            
        }else{
            header('location: ' . URL . 'index.php?iderr=1');
        }
        
    }
    
    public function login_in2($datos = FALSE){
        $objdata = new Database();
        $sth = $objdata->prepare('SELECT * FROM users U inner join profiles P '
                . 'ON U.idProf = P.idProfile '
                . 'WHERE U.idUser = :id');
        $sth->execute(array(
            ':id' => $datos
        ));
        
        $data = $sth->fetch();
        
        $count = $sth->rowCount();
        
        if($count > 0){
            require 'sessions.php';
            $objSess = new Sessions();
            $objSess->init();
            $objSess->set('login', $data['logUser']);
            $objSess->set('idpro', $data['idProf']);
            $objSess->set('profi', $data['profName']);
            
            switch ($data['profName']){
                case 'Admin':
                    header('location: ' . URL . 'admin/');
                    break;
                case 'Standard':
                    header('location: ' . URL . 'dashboard/');
                    break;
            }
        }
    }
    
}

