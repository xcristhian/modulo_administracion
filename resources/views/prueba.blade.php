<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

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
		<h3>RUC: 0909090909</h3> 

		<div class="invoice-box">
			<table>
				<tr>
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<h2>GUÍA DE REMISIÓN</h2>
								</td>

								<td>
									ID #: 123<br />
									Fecha: 26/08/2022<br />
									Hora: 08:45:20
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Cliente:<br />
									Ruc:<br />
									E-mail:
								</td>

								<td>
									CRISTHIAN CHAVEZ<br />
									0950207647001<br />
									xcristhian15@gmail.com
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Factura N#</td>

					<td>Autorización</td>
				</tr>

				<tr class="details">
					<td>001-001-002022</td>

					<td>156-364-26082022</td>
				</tr>

				<tr class="heading">
					<td>Producto</td>

					<td>Cantidad</td>
				</tr>

				<tr class="item">
					<td>Tarjeta Madre - ASUS</td>

					<td>2</td>
				</tr>

				<tr class="item">
					<td>Memoria Ram - KINGSTON '8gb c/u'</td>

					<td>2</td>
				</tr>

				<tr class="item last">
					<td>Memoria interna SSD - 1TB - HP</td>

					<td>1</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Empleado responsable: Javier Villava</td>
				</tr>
			</table>
		</div>
	</body>
</html>