<?php namespace Models;

$id = $_GET['id'];
//$id = 'EE001';

include '../../../Config/Conexion.php';

$con = new Conexion;

$sql = "SELECT re.remitente_nombre AS rNombre, re.remitente_pais AS rPais, re.remitente_email AS rEmail, re.remitente_dir1 AS rDir1, re.remitente_dir2 AS rDir2, re.remitente_telefono AS rTel, re.remitente_web AS rWeb, re.remitente_tax AS rTAX, cl.cliente_nombre AS cNombre, cl.cliente_apellido AS cApellido, cl.cliente_pais AS cPais, cl.cliente_email AS cEmail, cl.cliente_dir1 AS cDir1, cl.cliente_dir2 AS cDir2, cl.cliente_telefono AS cTel, cl.cliente_comp AS cComp, cl.cliente_tax AS cTax, fa.factura_fecha AS fecha, fa.factura_plazo AS plazo, fa.factura_terminos AS terminos, mo.data AS moneda, fa.factura_subtotal AS subtotal , fa.factura_tax AS ttax, fa.factura_total AS total FROM clientes AS cl, facturas AS fa, remitentes AS re , moneda AS mo, historial AS hi where cl.id = fa.cliente_id AND mo.id = fa.pais_moneda_id AND re.id = fa.remitente_id AND fa.factura_numero = '$id' limit 1";

function formatMoneyUSD($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
} 

function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}

function conversion($vermoneda,$conversion)
{
	if($vermoneda=='USD')
	{
		$conversion = formatMoneyUSD($conversion);
		$conversion = $vermoneda.' '.$conversion;
		return $conversion;
	}else
	{
		$conversion = str_replace('.', ',', $conversion);
		$conversion = formatMoney($conversion);
		$conversion = $vermoneda.' '.$conversion;
		return $conversion;
	}

}

$result = $con->consultaRetorno($sql);

$resultado = $result->fetch();

$remitente = '';
$remitente_nombre = $resultado['rNombre'];
$remitente_pais = $resultado['rPais'];
$remitente_email = $resultado['rEmail'];
$remitente_dir1 = $resultado['rDir1'];
$remitente_dir2 = $resultado['rDir2'];
$remitente_telefono = $resultado['rTel'];
$remitente_web = $resultado['rWeb'];
$remitente_tax = $resultado['rTAX'];

$cliente = 'Cliente';
$cliente_nombre = $resultado['cNombre'];
$cliente_apellido  = $resultado['cApellido'];
$cliente_pais = $resultado['cPais'];
$cliente_email = $resultado['cEmail'];
$cliente_dir1 = $resultado['cDir1'];
$cliente_dir2 = $resultado['cDir2'];
$cliente_telefono = $resultado['cTel'];
$cliente_comp = $resultado['cComp'];
$cliente_tax = $resultado['cTax'];

$vermoneda = $resultado['moneda'];

$terminos = $resultado['terminos'];
$fecha = $resultado['fecha'];
$plazo = $resultado['plazo'];
$subtotalt = $resultado['subtotal'];
$ttax = $resultado['ttax'];
$totalt = $resultado['total'];

$fecha = date("d-m-Y", strtotime($fecha));
$plazo = date("d-m-Y", strtotime($plazo));

$fechaplazo = "Plazo: ".$plazo;

if($plazo == "01-01-1970"){
	$fechaplazo = "";
};

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Gabriel Medina');
$pdf->SetTitle('Efiempresa');
$pdf->SetSubject('Facturas Efiempresa');

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);


// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// Multicell test

$nombre_fichero = '../../../uploads/logo.jpg';

if(file_exists($nombre_fichero)) {
	$pdf->setJPEGQuality(100);
	$pdf->Image('../../../uploads/logo.jpg',15,15,70,20);
};


$pdf->SetFont('times', 'B', 10);
$pdf->SetTextColor(150, 150, 150);
$pdf->MultiCell(75, 5, $remitente, 0, 'L', 0, 0, 14, 40, true);
$pdf->MultiCell(75, 5, $cliente, 0, 'L', 0, 1, '' ,'', true);

$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('times', 'B', 10);
$pdf->MultiCell(75, 30, $remitente_nombre, 0, 'L', 0, 0, 14, 45, true);
$pdf->MultiCell(75, 30,$cliente_nombre." ".$cliente_apellido, 0, 'L', 0, 1, '' ,'', true);

$pdf->SetTextColor(150, 150, 150);	

$pdf->SetFont('times', '', 10);
$pdf->MultiCell(75, 30,$remitente_dir1."\n".$remitente_dir2."\n".$remitente_email."\n".$remitente_telefono."\n".$remitente_web, 0, 'L', 0, 0, 14, 50, true);
$pdf->MultiCell(75, 30,$cliente_comp."\n".$cliente_dir1."\n".$cliente_dir2."\n".$cliente_email, 0, 'L', 0, 1, '' ,'', true);

$pdf->SetTextColor(150, 150, 150);

$pdf->SetFont('times', 'B', 10);
$pdf->MultiCell(75, 5, "Factura #: ".$id, 0, 'L', 0, 0, 14, 75, true);
$pdf->MultiCell(75, 5, $fechaplazo, 0, 'L', 0, 1, 91 ,82, true);
$pdf->MultiCell(75, 5, "Fecha: ".$fecha, 0, 'L', 0, 0, 14, 82, true);

$pdf->SetFont('times', 'B', 10);
$pdf->SetFillColor(103, 111, 117);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(80, 5, "Items", 0, 'L', 1, 0, 15, 92, true);
$pdf->MultiCell(25, 5, "Hrs/Cant", 0, 'C', 1, 1, 72 ,92, true);
$pdf->MultiCell(35, 5, "Precio", 0, 'C', 1, 0, 95, 92, true);
$pdf->MultiCell(45, 5, "Imp.", 0, 'C', 1, 0, 118, 92, true);
$pdf->MultiCell(40, 5, "Subtotal", 0, 'C', 1, 0, 155, 92, true);

//$pdf->SetFillColor(17, 7, 0, 12);
$pdf->SetFillColor(0, 0, 0, 0);

$pdf->SetTextColor(150, 150, 150);

$sql = "SELECT h.producto_select AS selec, h.producto_descripcion AS descripcion, h.producto_cantidad AS cantidad, h.producto_precio AS precio, h.producto_impuesto AS impuesto FROM historial AS h, facturas AS f WHERE h.factura_id = f.id AND f.factura_numero = '$id'";

$result = $con->consultaRetorno($sql);


$linea = 99;
$stotal = 0;
$total = 0;
$impuesto = 0;
$pdf->SetFont('times', '', 10);
foreach ($result as $mostrar) {
	$pdf->MultiCell(60, 5, $mostrar['descripcion'], 0, 'L', 1, 0, 15, $linea, true);
	$pdf->MultiCell(25, 5,$mostrar['cantidad'] , 0, 'C', 1, 1, 72 , $linea, true);
	$pdf->MultiCell(25, 5,$mostrar['precio'] , 0, 'C', 1, 0, 100, $linea, true);
	$pdf->SetFont('times', '', 8);
	$pdf->MultiCell(17.5, 5,$mostrar['selec'] , 0, 'C', 1, 0, 132, $linea, true);
	$pdf->SetFont('times', '', 10);
	$subtotal = $mostrar['precio'] * $mostrar['cantidad'];
	$subtotal = conversion($vermoneda,$subtotal);
	$pdf->MultiCell(25, 5,$subtotal, 0, 'R', 1, 0, 162, $linea, true);
	$linea = $linea + 7;	
}

$pdf->SetFillColor(255, 255, 255);
$totalt = conversion($vermoneda,$totalt);
$subtotalt = conversion($vermoneda,$subtotalt);
if(is_null($ttax)){
	$ttax = '-';
}else{
	$ttax = conversion($vermoneda,$ttax);
};

$linea = $linea + 20;

$pdf->SetFont('times', 'B', 10);
$pdf->MultiCell(60, 5, "Resumen de la Factura", 0, 'C', 1, 0, 120, $linea, true);

$linea = $linea + 10;
$pdf->MultiCell(40, 5, "Subtotal", 0, 'L', 1, 0, 110, $linea, true);
$pdf->SetFont('times', '', 10);
$pdf->MultiCell(40, 5, $subtotalt, 0, 'R', 1, 0, 150, $linea, true);

$linea = $linea + 10;

$pdf->SetFont('times', 'B', 10);
$pdf->MultiCell(40, 5, "Total Impuestos", 0, 'L', 1, 0, 110, $linea, true);
$pdf->SetFont('times', '', 10);
$pdf->MultiCell(40, 5, $ttax, 0, 'R', 1, 0, 150, $linea, true);

$linea = $linea + 10;

$pdf->SetFont('times', 'B', 10);
$pdf->MultiCell(40, 5, "Total", 0, 'L', 1, 0, 110, $linea, true);
$pdf->SetFont('times', '', 10);
$pdf->MultiCell(40, 5,$totalt, 0, 'R', 1, 0, 150, $linea, true);

$pdf->SetFont('times', 'I', 10);
$pdf->MultiCell(160, 22,$terminos, 0, '', 1, 0, 30, 250, true);




//Close and output PDF document
$pdf->Output('Factura_'.$id.'.pdf', 'D');


?>

