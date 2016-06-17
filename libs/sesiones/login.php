<?php 
	require('../php/conexion.php');

	session_start();

	$usuario = "";
	$clave = "";

	$usuario = $_GET['usuario'];
	$clave = $_GET['clave'];

	//consulta en la base de datos los usuarios y claves existentes
	$consulta = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'", $conexion);

	// separa los datos usuario - clave - id usuario de la base de datos
	if($consulta){
		if (mysql_num_rows($consulta) > 0) {
			$datos = mysql_fetch_assoc($consulta);
			$usuario_db = $datos['usuario'];
			$clave_db = $datos['clave'];
			$id_usuario_db = $datos['id_usuario'];
			$perfil_db = $datos['perfil'];

			$_SESSSION['usuario'] = $usuario;
			$_SESSION['clave'] = $clave;
			$_SESSION['id_usuario'] = $id_usuario_db;
			$_SESSION['perfil'] = $perfil_db;

			if ($perfil_db == 0) {
				echo "<meta http-equiv='refresh' content='2;url=./libs/sesiones/master-root/cuenta.php?user=".$id_usuario_db."'>";
			}else if ($perfil_db == 1) {
				echo "<meta http-equiv='refresh' content='2;url=./libs/sesiones/master/cuenta.php'>";
			}else if ($perfil_db == 2) {
				echo "<meta http-equiv='refresh' content='2;url=./libs/sesiones/inmobiliaria/cuenta.php'>";
			}else if ($perfil_db == 3) {
				echo "<meta http-equiv='refresh' content='2;url=./libs/sesiones/cliente/cuenta.php?user=".$usuario."'>";
			}
			
		}else{
			?>
			<script type='text/javascript'>;
				swal({
					title:"Error !",
					text:"datos erroneos, verifique los datos e intente nuevamente.",
					type:"error",
					confirmButtonColor:"#87B32E",
					confirmButtonText:"Aceptar"
				});
			</script>;
			<?php
		}	
	}


?>