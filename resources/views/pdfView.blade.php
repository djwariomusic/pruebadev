<!DOCTYPE html>
<html>
<head>
	<title>Documento PDF</title>
	<style type="text/css">
		body,td,th{
			font-family: Arial, Helvetica, sans-serif;
		}
		p{
			color: #000000;
			line-height: 1.5em;
			font-size:13px;
		}
		li{
			margin-bottom: 1em;
			color: #000000;
			line-height: 1.5em;
			font-size:13px;
			letter-spacing: 0px;
		}
		body{
			margin-left: 2.5cm;
			margin-top: 0cm;
			margin-right: 2.5cm;
			margin-bottom: 0cm;
		}
		i{
			color: #000000;
			padding-right: 1em;
		}
		h1{
			font-size: 36px;
			color: #000000;
		}
		h3{
			font-size: 24px;
			color: #000000;
		}
		span{
			color: #000000;
		}
	</style>
</head>
<body>
	<img src="./img/logo.png" />
<h2>Documento PDF con Datos Personales</h2>
<br><br>
<b>Apellidos:</b><br>
{{$consult->lastname}}<br><br>
<b>Nombres:</b><br>
{{$consult->name}}<br><br>
<b>Cedula Ciudadania:</b><br>
{{$consult->cc}}<br><br>
<b>Celular:</b><br>
{{$consult->cellphone}}<br><br>
<b>Email:</b><br>
{{$consult->email}}<br><br>
<b>Departamento Nacimiento:</b><br>
{{$consult->department}}<br><br>
<b>Ciudad Nacimiento:</b><br>
{{$consult->city}}<br><br>
<b>Fecha Hora Registro:</b><br>
{{$consult->created_at}}<br><br>

<br>
<p>Gracias por usar nuestros Servicios. Regresa Pronto!</p>

</body>
</html>
