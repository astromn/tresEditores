<!DOCTYPE html>
<html>
<head>
	<title></title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css" >
     <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">

      <link rel="stylesheet" type="text/css" href="../librerias/css/alertify.css">
     <link rel="stylesheet" type="text/css" href="../librerias/css/themes/default.css">



         
   
   <script src="../jsprograma/js/jquery-3.3.1.min.js" ></script>   
    <script type="text/javascript" src="../jsprograma/js/jquery-ui.js"></script>  
     <script src="../jsprograma/js/bootstrap.min.js" ></script>

    <script src="../librerias/alertify.js" ></script>
   <script src="../jsprograma/js/popper.min.js"></script>         
  
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="javascript:void(0)">Sistema de Encuestas</a>
     
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
      <span class="navbar-toggler-icon"></span>
    </button>
    

    <!--NAVBAR-->
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav mr-auto">
      </ul>
      <form class="form-inline my-2 my-lg-0" style="color: #fff">         
     
         
      </form>
    </div>
  </nav> 

    <div class="container" align="center" > 


      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-5 col-sm-8 col-sm-offset-2">

          <div style="padding-top:50px" class="panel-body" >


  <div class = "panel panel-primary">
   <div class = "panel-heading">
        
       <h3 class = "panel-title" style="color:rgb(253, 254, 254  );">Registro de Usuarios</h3> 

   </div>
   
   <div class = "panel-body">



  <form method="post" class="form-horizontal" autocomplete="off" onsubmit=" return enviar();">
    
               <div class="input-group" style="margin-top:20px;" >                  


                <label for="documento" class="col-md-3 control-label">Documento:</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="documento" id="documento" placeholder="documento" value="<?php if(isset($documento)) echo $documento; ?>" required >
                </div>
              </div>

               <br />
              
              <div class="input-group">
                <label for="nombre" class="col-md-3 control-label">Nombre:</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nombre"  id="nombre" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
                </div>
              </div>
                 <br />
              
              <div class="input-group">
                <label for="apellido" class="col-md-3 control-label">Apellido</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" value="<?php if(isset($apellido)) echo $apellido; ?>" required>
                </div>
              </div>
                 <br />

              <div class="input-group">
                <label for="email" class="col-md-3 control-label">Email</label>
                <div class="col-md-9">
                  <input type="email" class="form-control" name="email" id="email" placeholder="email" pattern=".+[.][cC][oO][mM]" value="<?php if(isset($email)) echo $email; ?>" required>
                </div>
              </div>
                 <br />

              <div class="input-group">
                <label for="fecha" class="col-md-3 control-label">fecha nacimiento</label>
                <div class="col-md-9">
                   <input type="text" class="form-control" id="datepicker" autocomplete="off">

                </div>
              </div>

                 <br />


                           <div class="input-group">
                <label for="Genero" class="col-md-3 control-label">Genero</label>
                <div class="col-md-9">

                              
                               <div class="radio">
                               <label for="radios-0">
                               <input type="radio" name="radios"  id="radioh" value="1"  >
                                   Hombre
                               </label>

                                <label for="radios-1">
                               <input type="radio" name="radios" id="radiom" value="2"  >
                                    Mujer
                               </label>
                             </div>                     
                              </div>
              </div> 
                 <br />

               <div class="input-group">
                <label for="rol" class="col-md-3 control-label">rol</label>
                <div class="col-md-9">

                              
                               <div class="radio">
                               <label for="radios-0">
                               <input type="radio" name="radios1" id="radios0" value="3"  >
                                   Estudiante
                               </label>

                                <label for="radios-1">
                               <input type="radio" name="radios1" id="radios1" value="4">
                                    Profesor
                               </label>
                             </div>                     
                              </div>
              </div>
                 <br />

              

                <div class="input-group">
                <label for="institucion" class="col-md-3 control-label">Institucion</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="institucion" id="institucion" placeholder="institucion" value="<?php if(isset($institucion)) echo $institucion; ?>" required>
                </div>
              </div>
                 <br />

              
              <div class="input-group">
                <label for="password" class="col-md-3 control-label">Password</label>
                <div class="col-md-9">
                  <input type="password" class="form-control"  id="password" name="password" placeholder="Password" required>
                </div>
              </div>
                 <br />
              
              <div class="input-group">
                <label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
                <div class="col-md-9">
                  <input type="password" class="form-control" name="con_password" id="con_password" placeholder="Confirmar Password" required>
                </div>
              </div>
                 <br />

              <div class="input-group">                                      
                <div class="col-md-offset-6 col-md-12">
                     <input type="submit"  value="Registrar"  class="btn btn-info ">  <i class="icon-hand-right"></i>
                       <br />
                         <br />

                     <a id="signinlink" href="../index.php">Iniciar Sesi&oacute;n</a>
                </div>
              </div>   

  </form>
     

   </div>
</div>
</div>
</div>
</div>

   <br />

      <br />

         <br />


</body>
</html>


<script>
	
 function enviar(){

 documento=$('#documento').val();
  nombre=$('#nombre').val();
  apellido=$('#apellido').val();
  correo=$('#email').val();
  fecha =$('#datepicker').val();
  genero = generobd;
      tipo = rolbd;
  institucion=$('#institucion').val();
  password=$('#password').val(); 
    con_password=$('#con_password').val(); 

     

  var datos = 'documento='+documento+'&nombre='+nombre+'&apellido='+apellido+'&correo='+correo+'&fecha='+fecha+
              '&genero='+genero+'&tipo='+tipo+'&institucion='+institucion+'&password='+password+'&con_password='+con_password;

  $.ajax({

  	type:'post',
  	url:'../controladores/funcionesAdministradorphp/insertarusuario.php',
  	data:datos,
  	success:function(res){
  		 if(res==2){
       alertify.confirm('Registro Usuario', 'Contraseñas incorrectas', function(){ alertify.success('contraseñas incorrectas') }
                , function(){ alertify.error('Cerrar')});

       }else if(res==3){
         alertify.confirm('Registro Usuario', 'Usuario ya existe', function(){ alertify.success('Documento o correo ya existen') }
                , function(){ alertify.error('Cerrar')});
       }else if(res==1){
   
           alertify.confirm('Registro Usuario', 'Registro exitoso', function(){ alertify.success('exitoso') }
                , function(){ alertify.error('Cerrar')});
       }
  	}


  });
  return false;

 }

</script>



<script >
     $( function() {
   
   $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
     
  </script>


<script type="text/javascript">
   
   var generobd ="",rolbd ="";


  $(document).ready(function(){
    $('#radioh').click(function(){
        generobd= "hombre";
             
    });

    $('#radiom').click(function(){
               generobd= "Mujer";
            
    });

    $('#radios0').click(function(){
               rolbd = 2;
             
    });

    $('#radios1').click(function(){
              rolbd= 3;
             
    });
    
    });

</script>
