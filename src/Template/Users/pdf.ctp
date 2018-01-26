<?php
//importamos la libreria tcpdf
require_once  ROOT. DS.  'vendor'. DS. 'tcpdf_min'. DS. 'tcpdf.php';
 
//creamos una clase para nuestro pdf en el cual declaramos el header y footer que utilizar
class mipdf extends TCPDF{ 
  
  //Header personalizado
  public function Header() {
    $escudo = 'img/tcpdf_logo.png';
    $this->Image($escudo, 25, 5, 15, '', 'PNG', '', '', false, 300, '', false, false, 0, false, false, false);   
    
    $this->SetFont('helvetica', 'B', 20);
    $this->Cell(0, 0, 'Titulo de página', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    
  }
  
  //footer personalizado
  public function Footer() {
    // posicion
    $this->SetY(-15);
    // fuente
    $this->SetFont('helvetica', 'I', 8);
    // numero de pagina
    $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'T');   
    
  }
}//termina la clase mipdf
 
 
//creamos una instancia del pdf
$pdf  = new mipdf ('P', 'mm', 'Letter', TRUE, 'UTF-8', FALSE);
 
 
$pdf->SetCreator('Hugo - Kiuvox');
$pdf->SetAuthor('Hugo Lizama');
$pdf->SetTitle('Ejemplo de PDF');
$pdf->SetSubject('Ejemplo de PDF');
 
 
//establecer margenes
$pdf->SetMargins(15, 25, 15);
$pdf->SetHeaderMargin(5);
 
//Indicamos la creación de nuevas paginas automaticas al crecer el contenido
$pdf->SetAutoPageBreak(true, 15);
 
//agregamos la primera hoja al pdf
$pdf->AddPage ();
 
$pdf->SetFont ('helvetica', 'B', 10);
 
//agregamos un texto cualquiera para prueba
for($i=0; $i<100; $i++){
  $pdf->MultiCell(0, 0, 'TEXTO DE EJEMPLO EN BLOG.KIUVOX.COM', 0, 'L', false, 1, '', '', true, 0, false, true, 0, 'T', false);
}
 
//Cerramos el pdf
$pdf->lastPage ();
 
//indicamos el nombre del pdf y que queremos forzarlo a descargar en el navegador
$pdf->Output('reporte.pdf', 'D');