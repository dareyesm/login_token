<?php

class Matrix{
    
    public $min;
    public $max;
    public $rows;
    public $cols;


    public function __construct() {
        $this->min = 100; //minimo de 3 digitos
        $this->max = 999; //maximo de 3 digit0s
        $this->rows = 10; //diez filas
        $this->cols = 8; //ocho columnas
    }
    
    public function create_matrix(){
        $matrix = array();
        $position = '';
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(12,10,' ',1,0,'C');
        $pdf->Cell(12,10,'A',1,0,'C');
        $pdf->Cell(12,10,'B',1,0,'C');
        $pdf->Cell(12,10,'C',1,0,'C');
        $pdf->Cell(12,10,'D',1,0,'C');
        $pdf->Cell(12,10,'E',1,0,'C');
        $pdf->Cell(12,10,'F',1,0,'C');
        $pdf->Cell(12,10,'G',1,0,'C');
        $pdf->Cell(12,10,'H',1,0,'C');
        $pdf->Ln(10);
        for($i=1;$i<=$this->rows;$i++){
            $letra = 'A';
            $pdf->Cell(12,10,$i,1,0,'C');
            for($j=0;$j<$this->cols;$j++){
                $matrix[$i][$j] = rand($this->min, $this->max);
                $pdf->Cell(12,10,$matrix[$i][$j],1,0,'C');
                $position .= $letra.$i.'-'.$matrix[$i][$j].';';
                ++$letra;
            }
            $pdf->Ln(10);
        }
        $pdf->Output('accessMatrix.pdf','D');
        return $position;
    }
    
    public function insert_matri($matrix = FALSE){
        $objData = new DataBase();
        $sth = $objData->prepare('INSERT INTO matrix VALUES (:id, :values)');
        $id = '';
        $sth->execute(array(
            ':id' => $id,
            ':values' => $matrix
        ));
    }
    
    public function return_matrix(){
        $objData = new DataBase();
        $sth = $objData->prepare('SELECT * FROM matrix ORDER BY id_matrix DESC Limit 1');
        $sth->execute();
        return $result = $sth->fetchAll();
    }
    
    public function matrix_assign($id_user = false, $idMatrix = FALSE){
        
        echo $idMatrix;
        
        $objdata = new DataBase();
        $sth = $objdata->prepare('UPDATE users set id_matrix = :id_matrix WHERE idUser = :idUser');
        $sth->execute(array(
            ':id_matrix' => $idMatrix,
            ':idUser' => $id_user
        ));
        
    }
    
    public function search_matrix($idMatrix = FALSE){
        $objData = new DataBase();
        $sth = $objData->prepare('SELECT * FROM matrix M inner join users U '
                . 'on M.id_matrix = U.id_matrix WHERE M.id_matrix = :idMatrix');
        $sth->execute(array(
            ':idMatrix' => $idMatrix
        ));
        return $result = $sth->fetchAll();
    }
    
    public function search_coord($value = FALSE, $matrix = FALSE, $coord = FALSE){
        $buscar = $coord.'-'.$value;
        return $pos = strpos($matrix, $buscar);
    }
}

