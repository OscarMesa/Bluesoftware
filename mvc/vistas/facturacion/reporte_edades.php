<style type="text/css">
	.table-bordered {
	    border: 1px solid #eceeef;
	}
	.table {
	    width: 100%;
	    max-width: 100%;
	    margin-bottom: 1rem;
	}
	table {
	    background-color: transparent;
	}
	table {
	    border-spacing: 0;
	    border-collapse: collapse;
	}
	thead {
	    display: table-header-group;
	    vertical-align: middle;
	    border-color: inherit;
	}
	tr {
	    display: table-row;
	    vertical-align: inherit;
	    border-color: inherit;
	}

	.table-bordered thead td, .table-bordered thead th {
	    border-bottom-width: 2px;
	}
	.table thead th {
	    vertical-align: bottom;
	    border-bottom: 2px solid #eceeef;
	}
	.table-bordered td, .table-bordered th {
	    border: 1px solid #eceeef;
	}
	.table td, .table th {
	    padding: .75rem;
	    line-height: 1.5;
	    vertical-align: top;
	    border-top: 1px solid #eceeef;
	}
	th {
	    text-align: left;
	}
	td, th {
	    padding: 0;
	}
	*, ::after, ::before {
	    -webkit-box-sizing: inherit;
	    box-sizing: inherit;
	}
	user agent stylesheet
	th {
	    font-weight: bold;
	}
	user agent stylesheet
	td, th {
	    display: table-cell;
	    vertical-align: inherit;
	}

	*, ::after, ::before {
	    -webkit-box-sizing: inherit;
	    box-sizing: inherit;
	}
	user agent stylesheet
	table {
	    display: table;
	    border-collapse: separate;
	    border-spacing: 2px;
	    border-color: grey;
	}
	Inherited from body.bd-docs
	body {
	    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	    font-size: 1rem;
	    line-height: 1.5;
	    color: #373a3c;
	    background-color: #fff;
	}
	Inherited from html
	html {
	    font-size: 16px;
	    -webkit-tap-highlight-color: transparent;
	}
	html {
	    font-family: sans-serif;
	    -webkit-text-size-adjust: 100%;
	    -ms-text-size-adjust: 100%;
	}
	Pseudo ::before element
	*, ::after, ::before {
	    -webkit-box-sizing: inherit;
	    box-sizing: inherit;
	}
	Pseudo ::after element
	*, ::after, ::before {
	    -webkit-box-sizing: inherit;
	    box-sizing: inherit;
	}
	tbody {
	    display: table-row-group;
	    vertical-align: middle;
	    border-color: inherit;
	}
	.table td, .table th {
    padding: .75rem;
    line-height: 1.5;
    vertical-align: top;
    border-top: 1px solid #eceeef;
	}
	td, th {
	    padding: 0;
	}
	*, ::after, ::before {
	    -webkit-box-sizing: inherit;
	    box-sizing: inherit;
	}
	user agent stylesheet
	td, th {
	    display: table-cell;
	    vertical-align: inherit;
	}
</style>
<table style="width: 100%;text-align: center;">
	<tr>
		<td><b>Cartera por edades</b></td>
	</tr>
	<tr>
		<td>
			<?php echo strtoupper($dataCliente['nombre_contact']." ".$dataCliente['apellido_contact']); ?>
		</td>
	</tr>
	<tr>
		<td>
			Nit: <?php echo $dataCliente['nit']; ?>
		</td>
	</tr>
	<tr>
		<td>
			Dirección: <?php echo $dataCliente['direccion']; ?>
		</td>
	</tr>
	<tr>
		<td>
			PBX: <?php echo $dataCliente['tel_fijo']; ?>
		</td>
	</tr>
	<tr>
		<td align="center" style="padding-top: 20px;">
			<center>
			<table class="table table-bordered">
				<thead style="margin: 0 auto;">
					<tr>
						<th>Id Factura</th>
						<th>Fecha</th>
						<th>Datalle</th>
						<th>Valor</th>
						<th>Saldo</th>
						<th>0 a 30</th>
						<th>31 a 60</th>
						<th>61 a 90</th>
						<th>91 a 120</th>
						<th> >121 </th>
						<th>Zona</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$t1 = 0;$t2 = 0;$t3 = 0;$t4 = 0;
						foreach ($dataFacturacion as $data) {
							$datetime1 = date_create($data['fecha_desde']);
							$datetime2 = date_create($_POST['f_fin']);
							$interval = date_diff($datetime1, $datetime2);
						//	var_dump($interval->d);die;
							echo "<tr>".
									"<td>".$data['id']."</td>".
									"<td>".date('Y-m-d')."</td>".
									"<td>".$data['detalle']."</td>".
									"<td>".number_format($data['saldo'],2,'.',',')."</td>".
									"<td>". number_format(($t1 += ($data['saldo'] - $data['abono'])),2,'.',',')."</td>".
									"<td>". number_format(($t2 += ($interval->d >= 0 && $interval->d <= 30 )?($data['saldo'] - $data['abono']):0),2,'.',',')."</td>".
									"<td>". number_format(($t3 += ($interval->d >=31 && $interval->d <= 60)?($data['saldo'] - $data['abono']):0),2,'.',',')."</td>".
									"<td>". number_format(($t4 += ($interval->d >=61 && $interval->d <= 90)?($data['saldo'] - $data['abono']):0),2,'.',',')."</td>".
									"<td>".number_format((($interval->d >=91 && $interval->d <= 120)?($data['saldo'] - $data['abono']):0),2,'.',',')."</td>".
									"<td>".number_format((($interval->d >=121)?($data['saldo'] - $data['abono']):0),2,'.',',')."</td>".
									"<td>---</td>".
								"</tr>";
						}

						echo "<tr>".
								"<td></td><td></td><td></td><td></td>".
								"<td><b>Total: ".number_format($t1,2,'.',',')."</b></td>".
								"<td><b>Total: ".number_format($t2,2,'.',',')."</b></td>".
								"<td><b>Total: ".number_format($t3,2,'.',',')."</b></td>".
								"<td><b>Total: ".number_format($t4,2,'.',',')."</b></td>".
								"<td></td><td></td><td></td>".
							 "</tr>";
					?>
				</tbody>
			</table>
			</center>
		</td>
	</tr>
</table>