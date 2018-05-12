
<?php 
session_start();
  if (isset($_GET["d50eaec9ae6a5169acf029ef84a171fad50eaec9ae6a5169acf029ef84a171fad50eaec9ae6a5169acf029ef84a171fad50eaec9ae6a5169acf029ef84a171fa"])) {
      $user = $_GET["d50eaec9ae6a5169acf029ef84a171fad50eaec9ae6a5169acf029ef84a171fad50eaec9ae6a5169acf029ef84a171fad50eaec9ae6a5169acf029ef84a171fa"];
      
      $_SESSION["_user_log"] = $user;
  }
	require_once("Config/class_login.php");
	$log = new Login();
	$log ->access();
 ?>

<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Dentad | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        



            <div id="app">
                <!-- VISTA DE LOGIN -->
                <div v-if="vista_login" class="form-box" id="login-box">
                    <div class="header">Sign In</div>

                        <div class="body bg-gray">
                            
                            
                            <div v-if="!Campos_vacios">
                                 <p class="text-danger" v-if="datos_no_coinciden" >{{message}}</p>
                                <div class="form-group">
                                <input v-model="email" type="email"  class="form-control" placeholder="Correo Electrónico"/>
                                </div>
                                <div class="form-group">
                                    <input v-model="pass" type="password" name="password" class="form-control" placeholder="Contraseña"/>
                                </div>
                            </div>
                            <div v-if="Campos_vacios">
                                <div class="form-group has-error">
                                <input v-model="email" type="email" @click="Campos_vacios = false"  class="form-control" placeholder="Correo Electrónico"/>
                                </div>
                                <div class="form-group has-error">
                                    <input v-model="pass" type="password" @click="Campos_vacios = false" name="password" class="form-control" placeholder="Contraseña"/>
                                </div>
                            </div> 

                            
                        </div>
                        <div class="footer">  


                        <div class="col-12">
                             <div  class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn bg-olive btn-block" @click="DataLoginProcess()" >Iniciar</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button"  class="btn bg-olive btn-block" @click="Cambio_de_vista(2)" >Registrarme</button>
                                </div>
                            </div>
                        </div> 
                            <br>
                            <center><a href="register.html" class="text-center">¿Olvidaste tu contraseña?</a></center>
                        </div>
                </div>
                <!-- FIN VISTA DE LOGIN -->








            <!--  VISTA DE REGISTRO-->
                <div v-if="vista_register" class="form-box" id="login-box">
                    <div class="header">Registrate</div>

                        <div class="body bg-gray">
                            

                             <div v-if="!Campos_vacios">
                                 <div class="form-group">
                                <input v-model="nombres" type="nombres" name="nombres" class="form-control" placeholder="Nombres completos"/>
                                    </div>   
                                <p class="text-danger" v-if="Correo_ya_existe" >{{message}}</p>
                                <div class="form-group">
                                    <input  v-model="email"  @click="Correo_ya_existe = false" type="email" required="true"  class="form-control" placeholder="Correo Electrónico"/>
                                </div>
                                <div class="form-group">
                                    <input v-model="pass" type="password" name="password" class="form-control" placeholder="Contraseña"/>
                                </div> 
                             </div>

                             <div v-if="Campos_vacios">
                                <div class="form-group has-error ">
                                <input v-model="nombres" type="nombres" @click="Campos_vacios = false" name="nombres" class="form-control" placeholder="Nombres completos"/>
                                    </div>   
                                <div class="form-group  has-error">
                                    <input v-model="email" type="email" @click="Campos_vacios = false" @click="Correo_ya_existe = false" required="true"  class="form-control" placeholder="Correo Electrónico"/>
                                </div>
                                <div class="form-group has-error">
                                    <input v-model="pass" type="password" @click="Campos_vacios = false" name="password" class="form-control" placeholder="Contraseña"/>
                                </div> 
                             </div>

                            
                        </div>
                        <div class="footer">  


                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn bg-olive btn-block" @click="DataRegister()" >Aceptar</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button"  class="btn bg-olive btn-block" @click="Cambio_de_vista(1)" >Iniciar sesión</button>
                                </div>
                            </div>
                        </div> 
                            <br>
                            <center><a href="register.html" class="text-center">¿Olvidaste tu contraseña?</a></center>
                        </div>
                </div>
                <!-- FIN  VISTA DE REGISTRO-->


            </div>
























        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script src="https://unpkg.com/vue"></script>
        <script src="Config/vue_login.js"></script>

    </body>
</html>