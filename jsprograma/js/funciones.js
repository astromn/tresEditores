 

  function obtenerid (datos) {
        
          d=datos.split('||');    
          
         $('#id').val(d[0]);
         $('#documento').val(d[1]);
         $('#nombre').val(d[2]);
         $('#apellido').val(d[3]);
         $('#email').val(d[4]); 
         $('#fecha').val(d[5]); 
         $('#genero').val(d[6]);
         $('#tipo').val(d[7]);   
         $('#institucion').val(d[8]);   
         $('#password').val(d[9]); 
         $('#ultima').val(d[10]);   

   }



   function actualizardatos(){

       id=  $('#id').val();
       documento= $('#documento').val();
       nombre=$('#nombre').val();
       apellido=$('#apellido').val();
         correo=$('#email').val(); 
        fecha= $('#fecha').val(); 
        genero= $('#genero').val();
        tipo= $('#tipo').val();   
         institucion=$('#institucion').val();   
        password= $('#password').val();          

         dato ='id='+id+'&documento='+documento+
                '&nombre='+nombre+'&apellido='+apellido+
                '&correo='+correo+'&fecha='+fecha+'&genero='+genero
                +'&tipo='+tipo+'&institucion='+institucion+'&password='+password;

       $.ajax({

    type:'POST',
    url:'funciones/actualizarusuario.php',
    data:dato,
    success:function(res){
      if(res==1){
         alertify.success("actualizado ");
      } else if(res =0){
          alertfy.error("no actualizado ");
      }      
    }
  });
   }

   function validarsiono(){

     
   }
