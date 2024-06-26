<?php
require_once '../fpdf186/fpdf.php';
require_once '../models/matricula.model.php';

$objMatricula = new Matricula;

if (isset($_POST['grado']) && isset($_POST['anio'])) {
    try {
        $grado = filter_input(INPUT_POST, 'grado', FILTER_SANITIZE_NUMBER_INT);
        $anio = filter_input(INPUT_POST, 'anio', FILTER_SANITIZE_NUMBER_INT);

        class PDF extends FPDF {
            private $watermarkPath;
        
            public function __construct($orientation='P', $unit='mm', $size='A4') {
                parent::__construct($orientation, $unit, $size);
                $this->watermarkPath = '../src/img/marca.png';
            }
            function Header()
            {        
                $this->Image($this->watermarkPath, 50, 30, 250, 250, false, 'T', 45, 45, 0, false, false, false, false);
                /* Imagenes */
                $this->Image('../src/img/logo-negro.png', 10, 8, 40);
                $this->Image('../src/img/logo-mined.png', 85, 8, 40);
                $this->Image('../src/img/logo-inatec.png', 165, 8, 30);
                $this->Image('../src/img/firmas.png', 45, 250, 130);
                $this->Image('../src/img/sello.png', 80, 240, 30);
                /* CABECERA */
                $this->Ln(20);
                $this->Cell(60);
                $this->SetTextColor(15, 23, 42); 
                $this->SetFont('Arial', 'B', 20);
                $this->Cell(70, 10, iconv('UTF-8', 'windows-1252', 'Colegio Publico'), 0, 1, 'C', 0);
                $this->Cell(60);
                $this->SetFont('Arial', 'B', 26);
                $this->Cell(70, 10, iconv('UTF-8', 'windows-1252', 'José de la Cruz Mena'), 0, 1, 'C', 0);
                $this->Cell(60);
                $this->SetTextColor(219, 161, 5);
                $this->SetFont('Arial', 'BI', 14);
                $this->Cell(70, 10, iconv('UTF-8', 'windows-1252', 'Dios, Patria y Hogar'), 0, 0, 'C', 0);
                /* Titulo DE LA TABLA */
                $this->Ln(20); 
                $this->Cell(60);
                $this->SetTextColor(15, 23, 42); 
                $this->SetFont('Arial', 'B', 14);
                $this->Cell(70, 10, iconv('UTF-8', 'windows-1252', 'Reporte de Matriculas 2024'), 0, 0, 'C', 0);        
                $this->Ln(15);         
                $this->SetFillColor(15, 23, 42);
                $this->SetTextColor(255, 255, 255); 
                $this->SetFont('Arial', 'B', 10);        
                /* CAMPOS DE LA TABLA */
                $this->SetX(8);            
                $this->Cell(15, 10, 'Codigo', 1, 0, 'C', 1);
                $this->Cell(60, 10, 'Nombre', 1, 0, 'C', 1);
                $this->Cell(20, 10, 'Telefono', 1, 0, 'C', 1);
                $this->Cell(15, 10, 'Grado', 1, 0, 'C', 1);
                $this->Cell(20, 10, 'Turno', 1, 0, 'C', 1);
                $this->Cell(55, 10, iconv('UTF-8', 'windows-1252', 'Dirección'), 1, 1, 'C', 1);        
            }
            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Página '). $this->PageNo(). '/{nb} | Fecha: '. date('d/m/Y'), 0, 0, 'C');
            }
        }

        $pdf = new PDF();
        $pdf->SetTitle(iconv('UTF-8', 'windows-1252', 'Reporte de Matrículas'));
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 9);

        $allMatriculas = $objMatricula->readGradoAnio($grado, $anio);
        $numRows = mysqli_num_rows($allMatriculas);
        
        for ($i = 0; $i < $numRows; $i++) { 
            $matricula = mysqli_fetch_assoc($allMatriculas);
            $pdf->SetX(8);
            $pdf->Cell(15, 10, iconv('UTF-8', 'windows-1252', $matricula['Cod_Matricula']), 1, 0, 'L', 0);
            $pdf->Cell(60, 10, iconv('UTF-8', 'windows-1252', $matricula['Pri_Nombre']. ' '. $matricula['Seg_Nombre']. ' '. $matricula['Pri_Apellido']. ' '. $matricula['Seg_Apellido']), 1, 0, 'L', 0);
            $pdf->Cell(20, 10, iconv('UTF-8', 'windows-1252', $matricula['Telefono']), 1, 0, 'L', 0);
            $pdf->Cell(15, 10, iconv('UTF-8', 'windows-1252', $matricula['Grado']. ' '. $matricula['Seccion']), 1, 0, 'L', 0);
            $pdf->Cell(20, 10, iconv('UTF-8', 'windows-1252', $matricula['Turno']), 1, 0, 'L', 0);
            $pdf->Cell(55, 10, iconv('UTF-8', 'windows-1252', $matricula['Direccion']), 1, 1, 'L', 0);
        }

        $pdf->Output('ReporteMatriculas.pdf', 'I');
    } catch (Exception $e) {
        error_log("Error al enviar los datos ". $e->getMessage());
        exit;
    }
}