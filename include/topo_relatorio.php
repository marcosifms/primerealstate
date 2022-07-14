<?php
class PDF extends FPDF
{

function Header()
{
    // Logo
    //$this->Image('images/logo_fe.jpg',10,8,30);
    // Fonte
    $this->SetFont('Arial','B',10);
    // Movimentação para direita
    $this->Cell(1);
    // Titulo do cabeçalho
    $this->Cell(30,5,'Sistema de Controle Interno - Vereador Chapinha do Sindicato',0,1,'L');
	$this->Cell(1);
	$this->Cell(30,5,utf8_decode('Rua Dr. Bastos n° 12 - Centro, Angra dos Reis - RJ'),0,1,'L');
	$this->Cell(1);
	$this->Cell(30,5,utf8_decode('Telefones: (24) 3365-4086 - E-mail: contato@chapinhadosindicato.com.br'),0,1,'L');
	$this->Cell(1);
	$this->Cell(30,5,utf8_decode('Espelho da Ficha de Solicitação'),0,1,'L');
	$this->SetFont('Arial','I',6);
	$this->Cell(194,4,utf8_decode('Página: ').$this->PageNo().' de {nb}',0,0,'R');
    // Line break
    $this->Ln(10);
}
// Rodapé
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',6);
    // Page number
    $this->Cell(0,10,utf8_decode('Desenvolvido por L2BSys - www.l2bsys.com.br'),0,0,'R');
}
}
?>