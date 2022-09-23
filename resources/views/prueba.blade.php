<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="/js/jquery2.1.4.min.js"></script>
		<title>Guía de Remisión -- M2CORP</title>

	
		<!-- Estilos-->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>
   
	<body>
		<h1>M2CORP</h1>
		<h3>RUC: 0993303054001</h3> 
		<h2>GUÍA DE REMISIÓN</h2>
		@foreach ($datos as $datos)
		<h3>{{$datos->n_factura_venta}}</h3>
		@endforeach
		<div class="invoice-box">
			<table>
				
				<tr>
					<td colspan="2">
						<table>
							
							<tr>
								
								<td>
									
									VENTA #: {{$datos->id_venta}}<br />
									
									FECHA Y HORA: {{$DateAndTime}}<br />
									
									
								</td>
								<td></td>
							</tr>
						</table>
					</td>
				</tr>
			<h3>DATOS CLIENTE</h3>
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Cliente:<br />
									Ruc:<br />
									E-mail:<br />
									Dirección:
								</td>

								<td>
									
									{{$datos->nombre_c}}<br />
									{{$datos->ruc_c}}<br />
									{{$datos->correo_c}}<br />
									{{$datos->direccion_c}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				
<h3>DETALLE</h3>

				<tr class="heading">
					<td>Producto</td>

					<td>Cantidad</td>
				</tr>

				@for ($i = 0; $i < $cuenta_producto; $i++)
				<tr class="item">
					<td>{{$datos_productos[$i]->nombre_producto}}</td>
			
					<td>{{$datos_productos[$i]->cantidad_producto}}</td>
				</tr>
				@endfor


				

				

					
				
			</table>

		</div>

		
	</body>
</html>

