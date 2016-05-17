<?php

include_once dirname(__FILE__).'/../modelos/Contactos.php';
include_once dirname(__FILE__).'/../modelos/Facturacion.php';


class Cfacturacion
{
	
	function __construct()
	{
		
	}

	public function generaReporteEdades()
	{
		$dataCliente = Contactos::model()->consultar("SELECT * FROM contactos WHERE id = ".$_POST['cliente']);
		
		if(isset($dataCliente[0]))
			$dataCliente = $dataCliente[0];

		$dataFacturacion = Contactos::model()->consultar("SELECT f.*,dc.* FROM facturacion f
										LEFT JOIN detalle_caja dc ON f.id = dc.id_factura
										WHERE f.nit = '".$dataCliente['nit']."' AND f.fecha_desde >= '".$_POST['f_init']."' AND f.fecha_hasta <= '".$_POST['f_fin']."'
										GROUP BY f.id 
										ORDER BY dc.id_detalle DESC	
										");
		ob_start();   
		include_once dirname(__FILE__).'/../vistas/facturacion/reporte_edades.php';
		$html = ob_get_contents();
		ob_end_clean();  

		include(dirname(__FILE__).'/../lib/MPDF57/mpdf.php');

		$mpdf = new mPDF();
		
		$mpdf->WriteHTML(($html));

		$mpdf->Output();

		exit;
	}

}

$ctr = new Cfacturacion();
if(isset($_REQUEST['accion'])){
	$ctr->{$_REQUEST['accion']}();
}else{
	echo "No se especifico la acion";
}