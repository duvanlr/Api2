<?php
        
include 'conexion_db.php'; // Se incluye el archivo de conexión a la base de datos
$dbcon = conexion(); // se crea una variable con la función definida anteriormente
session_start(); // se inicia una sesión
?>

        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, user-scalable=no, initial-scalable=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/botton1.css">


       <header>
           <div class="contenedor">
               <h1 class="icon-globe">Geoportal Catastral</h1>
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
                <h3>Identifiquese para acceder a la información espacial</h3>
            </section>
            
 			</br>
<center>
				
		
		
<?php
echo '	<form method="post" action="inicio_sesion.php">
			<table>
				<tr>
					<th>Usuario</th>
					<th><input type="text" name="L_usuario" /></th>
				</tr>
				<tr>
					<th>password</th>
					<th><input type="password" name="L_pass" /></th>
				</tr>
				<tr>
					<th></th>
					<th><input name="login" type="submit" value="Inicio Sesion"  /></th>
				</tr>
				<tr>
					<th></th>
					<th></th>
				</tr>
			</table>
			
			
			<table style="width:100%">
  <tr>
    <th><a href="registro.php">Registro</a></th>
	<th><a input href="index.php" type="button" >Regresar</a></th>
  </tr>
 </table>

			</br>

			</form>'; //Se define un formulario de inicio de sesión en HTML 

			
			
if(isset($_POST['login'])){ //De acuerdo con el formulario definido aquí se ejecuta cuando presionamos el botón login 
    $L_usuario=$_POST['L_usuario']; // Se guarda en una variable cada entrada definida en el formulario
	$L_pass=md5($_POST['L_pass']); //Se guarda en una variable cada entrada definida en el formulario (codificamos la contraseña en MD5)
	
	if (!empty($L_usuario) && !empty($L_pass)){ // Se consulta que no exista ningún campo vacío
		$sql =" SELECT usuario, contrasena, rol FROM usuarios WHERE usuario='$L_usuario';"; // Consulta de usuario en SQL
		$resultado = pg_query($dbcon, $sql); // Se ejecuta la consulta en PostgreSQL con la conexión definida anteriormente
		if($row = pg_fetch_array($resultado)){ // se estructura el resultado en matriz
			if($row["contrasena"] == $L_pass){ // Valida la contraseña de la base de datos y la digitada por el usuario  
			   $_SESSION['usuario'] = $row['usuario']; //se define el parametro usuario en la sesion creada
			   $_SESSION['rol'] = $row['rol']; //se define el parametro usuario en la sesion creada
				   echo '<script language="javascript">'; 
				   echo 'location.href = "mapa/mapa.html";'; //se define el redireccionamiento de la pagina de inicio en javascript
				   echo '</script>';			   
			}else{
			   echo 'Contraseña Incorrecta'; // Si la contraseña de la base de datos no es igual a la digitada por el usuario, retorna un mensaje en HTML
			}
		}else{
		  echo 'Usuario no existente en la base de datos'; // Cuando la consulta en base de datos no retorna ningún valor, se debe a que no existe el usuario retornando un mensaje en HTML
		}
		
	}else{
		echo 'Inicio Sesión Fallido, Campos vacíos'; // Si existe algún campo vacío, retorna el mensaje en HTML
	}
}
?>

</center>

			
            <section id="info">
                <h3>Registrate para acceder</h3>
                <div class="contenedor">
                    
                </div>
            </section>
                      
<!--   *****  PIE DE PÁGINA   <iframe style="border: none;" height="400" width="600" src="http://localhost:8080/geoexplorer/viewer/#maps/1"></iframe> +++++++++++++++  -->                      
                       
        </main> 
        
        <footer>
            <div class="contenedor">
               <p class="copy">GisModel&copy 2022</p>
                <div class="sociales">
                    <a class="icon-facebook-squared" href="#"></a>
                    <a class="icon-twitter" href="#"></a>
                    <a class="icon-instagram" href="#"></a>
                    <a class="icon-googleplus-rect" href="#"></a>
                    
                </div>
            </div>
        </footer>
		