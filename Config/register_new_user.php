<?php
//error_reporting(0);
require_once("conexion.php");
require_once("class_login.php");
$Log = new Login;
$action = 'read';

if (isset($_POST['action']))
{

	$action = $_POST['action'];
}


if ($action == 'read')
{

     $nombres = $_POST["nombres"];
	 $pass = $_POST["pass"];
	 $email = $_POST["email"];
	

$camposVacios  = 0;
  if ($nombres !== ""  && $email !== "" && $pass !== ""  ) 
  {
       $ConfirmEmail = $Log->ConfirmEmail($email);

       ////////////////////////////////
       
       if ($ConfirmEmail == 0 ) 
		{
			$res['resul'] = 1; // esto quiere decir que todos los datos estan correctos y que se rehistrará al user
		}else {
			$res['resul'] = 3; // el email ya existe
		}
	 	

  }elseif ($nombres == "" || $email == "" || $pass == "" ) 
  {
  	$res['resul'] = 2; // 2 quiere decir que existen campos vacios ////
  }     
        

  	  $r = $res['resul'];
	  if ($r == 1) 
	  {	
	  	$Log -> register_user($nombres,$email,$pass);
	  	$res['resultt']=$email;
	  }

	
}
 





header('Content-Type: application/json');
echo json_encode($res);
die();


?>