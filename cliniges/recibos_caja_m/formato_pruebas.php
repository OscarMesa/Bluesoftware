<?php

require_once('../pdf/fpdf.php');
require_once("../conexion.php");
class PDF extends FPDF
{
    function Header()
    {
        $query='select * from huesped';
        $row=mysql_fetch_assoc($query); // data from database 
       
        $this->SetXY(50,60);
        $this->Cell(45,6,'Name  :',1,1,'R');
        $this->SetXY(95,60);
        $this->Cell(80,6,$row['pdf_name'],1,1);

        $this->SetXY(50,66);
        $this->Cell(45,6,'Email Address  :',1,1,'R');
        $this->SetXY(95,66);
        $this->Cell(80,6,$row['pdf_email'],1,1);

        $this->SetXY(50,72);
        $this->Cell(45,6,'Question Paper Selected  :',1,1,'R');
        $this->SetXY(95,72);
        $this->Cell(80,6,$row['subject_sel'],1,1);

        $this->SetXY(50,78);
        $this->Cell(45,6,'Total Correct Answers  :',1,1,'R');
        $this->SetXY(95,78);
        $this->Cell(80,6,$row['right_answered'],1,1);

        $this->SetXY(50,84);
        $this->Cell(45,6,'Percentage  :',1,1,'R');
        $this->SetXY(95,84);
        $this->Cell(80,6,$row['percentage']."%",1,1);

        $this->Ln(20);
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'abc according to you',0,0,'C');
    }
}
$pdf=new PDF('P','mm',array(297,210));
$pdf->Output($name.'.pdf','D');
?>