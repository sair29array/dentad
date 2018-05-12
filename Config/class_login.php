<?php 

	class Login
	{
		public function access()
		{
			if (isset($_SESSION["_user_log"])) 
			{
				header("location: index.php ");
			}
		}

		public function login($email, $pass)
		{
			include("conexion.php");
			
		}
	}



 ?>