<?php
include 'conexion_db.php'; // Se incluye el archivo de conexión a la base de datos
$dbcon = conexion(); // se crea una variable con la función definida anteriormente

?>

        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, user-scalable=no, initial-scalable=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/botton1.css">


       <header>
           <div class="contenedor">
               <h1>Geoportal Ambiental</h1>
               <input type="checkbox" id="menu-bar">
               <label class="icon-menu" for="menu-bar"></label>
             </div>          
       </header>
       
        <main>
            <section id="banner">
                <img src="img/catastro.jpg">
                <div class="contenedor">
                    <h2>Acceso al Geoportortal </h2>
                    <p>Aspectos de datos espaciales</p>
                    <a href="#">Leer más</a>
                </div>
            </section>
            
            <section id="bienvenidos">
                <h2>BIENVENIDOS AL GEOPORTAL CATASTRAL</h2><br>
                <h3>Zona de registro de usuario</h3>
            </section>

<center>
		




	<form method="post" action="registro.php">
			<table>
				<tr>
					<th>Usuario</th>
					<th><input type="text" name="R_usuario" /></th>
				</tr>
				<tr>
					<th>Nombre</th>
					<th><input type="text" name="R_nombre" /></th>
				</tr>
				<tr>
					<th>Apellidos</th>
					<th><input type="text" name="R_apellidos" /></th>
				</tr>
				<tr>
					<th>Contraseña</th>
					<th><input type="password" name="R_pass" /></th>
				</tr>
				<tr>
					<th></th>
					<th><input name="registro" type="submit" value="Registrar"  /></th>
				</tr>
			</table>
		</form>
<?php		
/* *************************    Inicio de la zona de registro   **************************/

if(isset($_POST['registro'])){ //De acuerdo con el formulario definido aquí se ejecuta cuando presionamos el botón registro 
    $R_usuario=$_POST['R_usuario']; // Se guarda en una variable cada entrada definida en el formulario
	$R_nombre=$_POST['R_nombre']; // Se guarda en una variable cada entrada definida en el formulario
	$R_apellidos=$_POST['R_apellidos']; // Se guarda en una variable cada entrada definida en el formulario
	$R_pass=md5($_POST['R_pass']); // Se guarda en una variable cada entrada definida en el formulario (codificamos la contraseña en MD5)
	
	if (!empty($R_usuario) && !empty($R_nombre) && !empty($R_apellidos) && !empty($R_pass)){ // Se consulta que no exista ningún campo vacío
		$sql ="INSERT INTO usuarios(usuario, nombre, apellidos,contrasena,rol) VALUES('$R_usuario', '$R_nombre', '$R_apellidos','$R_pass','usuario');"; // Ingreso de registro en SQL (parametros de usuario)
		$resultado = pg_query($dbcon, $sql); // Se ejecuta la consulta en PostgreSQL con la conexión definida anteriormente

		if(pg_affected_rows($resultado)==1){ //Si el registro es exitoso, retorna el valor de 1
			echo '<p>Registro exitoso</p>'; // Mensaje de salida en HTML
			echo '<p><a href="inicio_sesion.php">Inicio Sesion</a></p>'; // Mensaje de salida en HTML
		}else{
			echo 'Registro Fallido, Usuario no disponible'; // Si el registro no es exitoso, retorna el mensaje en HTML
		}	
	}else{
		echo 'Registro Fallido, Campos vacíos'; // Si existe algún campo vacío, retorna el mensaje en HTML
	}
}

?>

		 <!–-Se define un formulario de registro en HTML -->
		
</center>


            <section id="info">
                <h3>Debe registarse para acceder a los datos ambientales</h3>
                <div class="contenedor">
                  
                </div>
            </section>
 
                      

                      
<!--   *****  PIE DE PÁGINA   <iframe style="border: none;" height="400" width="600" src="http://localhost:8080/geoexplorer/viewer/#maps/1"></iframe> +++++++++++++++  -->                      
                       
        </main> 
        
        <footer>
            <div class="contenedor">
               <p class="copy">GisModel&copy 2020</p>
                <div class="sociales">
                    <a class="icon-facebook-squared" href="#"></a>
                    <a class="icon-twitter" href="#"></a>
                    <a class="icon-instagram" href="#"></a>
                    <a class="icon-googleplus-rect" href="#"></a>
                    
                </div>
            </div>
        </footer>
