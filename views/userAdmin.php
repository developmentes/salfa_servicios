

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../asset/css/style.css" rel="stylesheet">
    <link href="../asset/css/style_form.css" rel="stylesheet">
</head>
<body>


<h1>UserAdmin</h1>

<nav class="menu">
		<label class="logo"><img src="img/pngegg.png" alt=""></label>
		<ul class="menu-items">
			<li class="active"><a href="">Inicio</a></li>
			<li><a href="">Informes</a></li>
			<li><a href="">Activos</a></li>
			<li><a href="./crearEmpleado.php">Empleados</a></li>
			<li><a href="./crearUsuario.php">Usuarios</a></li>
			<li><a href="">Vehiculos</a></li>
			<li><a href="">Tecnologias</a></li>
			<li><a href="">Herramientas</a></li>
		</ul>
		<span class="btn-menu">
			<i class="fa fa-bars"></i>
		</span>
	</nav>
	
	
	<Section class="form">
		<h1>Ingreso de Vehiculos </h1>
		<input class="control" type="text" name="patente" id="patente" placeholder="Ingrese Patente">
		<input class="control" type="text" name="marca" id="marca" placeholder="Ingrese Marca">
		<input class="control" type="text" name="modelo" id="modelo" placeholder="Ingrese Modelo">
		<input class="btn" type="submit" value="Guardar"> 
		<input class="btn" type="submit" value="Volver"> 

	</Section>

    
</body>
</html>