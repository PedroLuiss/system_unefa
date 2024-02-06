
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Constancia de cuminación de servicio comunitario</title>

	<style>
        @page {
    margin: 0cm 0cm;
}

body
{
	font-size: 11px  !important;
    background: white !important;
    margin: 0.5cm 0.5cm 0.5cm;
    /* font-family: "Calibri, sans-serif"; */
}

table, th, td
{
	/* border: 1px solid black; */
	border-collapse: collapse;
}

table
{
	width: 100%;
}

.noborder
{
	border-style: solid solid hidden hidden;
}

.cantidad
{
	width: 5%;
}

.monto
{
	width: 17%;
}

.anulado
{
	 position: absolute;
	 top: -5cm;
	 left: -1cm;
	 z-index: -1;
}
.watermark {
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%) rotate(-45deg);
	opacity: 0.3;
	font-size: 72px;
	color: green;
}
.watermark-anulada {
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%) rotate(-45deg);
	opacity: 0.3;
	font-size: 72px;
	color:red;
}
    </style>
</head>
<body>

	<head>
		<table style="text-align: center; margin-top: 10px;">
			<tr>
				<td style="width: 15%;">
					<img src="{{public_path('/logo_armada.jpg')}}" width="120" style="margin-left: 10px"  alt="">
				</td>
				<td style="width: 70%;">
					<h2 style="text-align: center; font-size: 15px">REPÚBLICA BOLIVARIANA DE VENEZUELA <br>
                        MINISTERIO DEL PODER POPULAR PARA LA DEFENSA <br>
                        UNIVERSIDAD NACIONAL EXPERIMENTAL POLITÉCNICA <br>
                        DE LA FUERZA ARMADA NACIONAL <br>
                        U.N.E.F.A. <br>
                        NÚCLEO  LARA - EXTENSIÓN_____________
                        </h2>
				</td>
				<td style="width: 15%;">
                   <img src="{{public_path('logo_unefa_pdf.jpg')}}" width="70" style="margin-right: 30px"  alt="">
				</td>
			</tr>
		</table>
	</head>
	<main>
		<br>
		<br>
        <h2 style="text-align: center; font-family: 'Calibri, sans-serif'; font-size: 19px">CONSTANCIA DE CULMINACIÓN <br>
            DE SERVICIO COMUNITARIO
            </h2>
		<div>
            <p style="font-family: 'Calibri, sans-serif'; font-size: 18px; text-align: justify; padding: 0px 42px;    line-height: 29px;">
                <span style="color: white">__</span>Quien suscribe, Decano(a) de la Universidad Nacional Experimental Politécnica de la Fuerza Armada Nacional (U.N.E.F.A.), hace constar que el (la) ciudadano (a): <span style="text-align: center; font-family: 'Calibri, sans-serif'; font-size: 15px;font-weight: bold;text-transform: uppercase;">{{$daraResp['estudiante']['primer_apellido']}} {{$daraResp['estudiante']['segundo_apellido']}} {{$daraResp['estudiante']['nombres']}}</span>, titular de la cédula de identidad Nº <span style="text-align: center; font-family: 'Calibri, sans-serif'; font-size: 15px;font-weight: bold;">{{$daraResp['estudiante']['cedula']}}</span>, ha realizado el Servicio Comunitario en: <span style="text-transform: uppercase;text-align: center; font-family: 'Calibri, sans-serif'; font-size: 15px;font-weight: bold;">{{$daraResp['grupo']['direccion_comunidad']}}</span>, referente a: <span style="text-align: center; font-family: 'Calibri, sans-serif'; font-size: 15px;font-weight: bold;text-transform: uppercase;">{{$daraResp['grupo']['nombre_proyecto']}}</span>, para optar al título de {{$daraResp['carrera']}} que se otorga en esta Casa de Estudios, de acuerdo a lo contemplado en los artículos cuatro (4) y seis (6) y (8) de la Ley de Servicio Comunitario del Estudiante de Educación Superior.
              </p>
        </div>
        <div>
            <p style="font-family: 'Calibri, sans-serif'; font-size: 18px; text-align: justify; padding: 0px 42px;    line-height: 29px;">
                <span style="color: white">__</span>Constancia que se expide a petición de la parte interesada, en Barquisimeto, a los 20 días del mes Junio  de {{$daraResp['year']}}.
              </p>
        </div>
		<br>


		<div style="margin-top: 19%;width:32%;margin-left: 35.6%;text-align: center;">
			_________________________________________________________
			<h1 style="text-align: center; font-family: 'Calibri, sans-serif'; font-size: 15px">DRA. ELSY ROJAS RODRIGUÉZ <br>
                DECANA DEL NÚCLEO LARA</h1>

		</div>
	</main>
</body>
</html>
