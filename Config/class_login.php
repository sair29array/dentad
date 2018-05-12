<?php 

	class Login
	{
		public function access() /// pregunta si hay o no una session construida
		{
			if (isset($_SESSION["_user_log"])) 
			{
				header("location: index.php ");
			}
		}
		public function CreateSession($email) // construye una sesión
		{
			$sess = $_SESSION["_user_log"] = $email;
			return $sess;
			header("location: index.php ");
		}

		public function login_($email, $pass)
		{
			include("conexion.php");
			
		}

		public function GetDatosUsuariosRegistrados() // sacamos todos los datos que se encuentran registrados y asociados a nuestros usuarios
     	{
        include("conexion.php");
        $consult = mysqli_query($conn, "SELECT * FROM usuarios ");
        return mysqli_fetch_all($consult, MYSQLI_ASSOC);
     	}

		public function ConfirmEmail($email) // /sabemos si el user que se está registrando ya existe
		{
			//VERIFICAR SI EL CORREO QUE SE INGRESÓ ESTÁ O NO ESTÁ EN LA DB:
			$error = 0;
			$datos = $this->GetDatosUsuariosRegistrados();
			foreach ($datos as $datos_users) 
			{
			  if (filter_var($email, FILTER_VALIDATE_EMAIL))
			   { 
				$e = $datos_users['email'];
				if ($e == $email  ) 
				{
					$error = $error + 1;
				}
			   }else
			   {  $error = 1;  }
			}
			return $error;
		}


		public function register_user($n,$e,$p)
		{
			include("conexion.php");

		$consulta = mysqli_query($conn, "INSERT INTO usuarios (nombre,email,pass)  VALUES ('$n','$e','$p')");
		/////////////////ENVIAR LINK DE ACTIVACIÓN DE CUENTA /////////////

                /*$username = $nombres. " " . $apellidos;
                $link_activacion_dealta = "https://www.array.com.co/?activate&981129()//array_user-act=".$email;
                $destino = $email;
                $titulo = "Activa tu cuenta de array para empezar a trabajar";
                
                $contenido = '<html>'.
                '<head><title>Te damos la bienvenida a ARRAY | abre el siguiente enlace para activar tu cuenta.</title></head>'.
                '<body><h3> Te damos la bienvenida a ARRAY | abre el siguiente enlace para activar tu cuenta.</h3> <br>'.
                '<body><h3> Usuario: '.$username.'</h3> <br>'.
                '<body><h3>'.$link_activacion_dealta.'</h3>'.
                
                '<hr>'.
                'Array | Expertos en TIC | www.array.com.co'.
                '</body>'.
                '</html>';
                $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $cabeceras .= 'From: ARRAY <contacto@array.com.co>';
                mail($destino,$titulo,$contenido,$cabeceras);*/
		 
		return $consulta;
		}
	}



 ?>