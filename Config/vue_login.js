var app = new Vue({
  el: '#app',
  data: {
    message: '',
    email: "",
    pass: "",
    nombres: "",
    vista_login: true,
    vista_reset_pass: false,
    vista_register:false,

    // control de respuestas : 
    Campos_vacios: false,
    Correo_ya_existe: false,
    Registro_exitoso: false,

    datos_no_coinciden: false,
    acceso_log: false

  },

  methods: 
  {
  	Cambio_de_vista(vista)
  	{
  		if (vista == 1 ) 
  		{
  				app.vista_login = true; 
  				app.vista_register = false; 
  				app.vista_reset_pass = false;
  		}
  		else if (vista == 2) 
  			{
  				app.vista_login = false; 
  				app.vista_register = true; 
  				app.vista_reset_pass = false;
  			
  			}
  	},

  	DataLoginProcess()
  	{
  			var formData = new FormData();
        formData.append('email', this.email);
        formData.append('pass',this.pass);
        axios.post("Config/peticion_login.php?action=read",formData)
        .then(function(response) {
            
         console.log(response);
         datos = response.data;
                
        if (datos.resul  == "2")
          {
                  // /Campos vacios
                  app.Campos_vacios = true;
		  }else if (datos.resul == "0") 
		  {
		  		/// ya existe el correo
		  		app.datos_no_coinciden = true;
		  		app.message = "¡Tus datos no coinciden!";
		  }else if (datos.resul == "1") 
		  {
		  		app.acceso_log = true;

		  		 var page = "./login.php?d50eaec9ae6a5169acf029ef84a171fad50eaec9ae6a5169acf029ef84a171fad50eaec9ae6a5169acf029ef84a171fad50eaec9ae6a5169acf029ef84a171fa="+datos.resultt;
                 location.href=page;
		  		 
					
		  }
        
                                
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
  	},

  	DataRegister()
  	{
  	   var formData = new FormData();
        formData.append('email', this.email);
        formData.append('pass',this.pass);
        formData.append('nombres',this.nombres);
        axios.post("Config/register_new_user.php?action=read",formData)
        .then(function(response) {
            
         console.log(response);
         datos = response.data;
                
        if (datos.resul  == "2")
          {
                  // /Campos vacios
                  app.Campos_vacios = true;
		  }else if (datos.resul == "3") 
		  {
		  		/// ya existe el correo
		  		app.Correo_ya_existe = true;
		  		app.message = "¡Este correo no está disponible!";
		  }else if (datos.resul == "1") 
		  {
		  		/// ya existe el correo
		  		app.Registro_exitoso = true;
		  }
        
                                
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
  	}

  }
})