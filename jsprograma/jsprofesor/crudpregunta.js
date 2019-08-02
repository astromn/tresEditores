// Cargar modal de boostrap para agregar nueva pregunta
// Usaremos el "shorter method"
$(function() {
	$("#boton_agregar").click(function() {
		$("#modal_agregar").modal("show");
	});
});


var id_contexto = $("#id_contexto").val();

// Mostrar encuestas
function mostrarPreguntas(id_contexto) {
    // Mostrar encuestas con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/Preguntasprofesorphp/mostrarPreguntas.php", {
    	id_contexto : id_contexto
    }, function(data, status) {
        $("#tabla_preguntas").html(data);
    });
}

// Mostrar encuestas al cargar la página
$(function() {
    mostrarPreguntas(id_contexto); // Llamando a la función
});

// Agregar nueva pregunta
function agregarPregunta() {
    // Obtener los valores de los inputs


    var id_contexto 		= $("#id_contexto").val();
    var titulo      	 	= $("#titulo").val();
    var id_tipo_pregunta 	= $("#tipopregunta").val();
     var ayuda              = $("#ayuda").val();

    // Agregar encuesta con el método ajax POST
    $.post("../controladores/funcionesProfesorphp/Preguntasprofesorphp/agregarPregunta.php",
        {
        	id_contexto 		: id_contexto,
            titulo      		: titulo,
            id_tipo_pregunta 	: id_tipo_pregunta,
            ayuda               : ayuda
        },
        function (data, status) {
            // Cerrar el modal
            $("#modal_agregar").modal("hide");
            // Mostrar las encuestas nuevamente
            mostrarPreguntas(id_contexto);            
            // Limpiar campos del modal
            $("#titulo").val("");
             $("#ayuda").val("");
        }
    ) ;
}

// Eliminar Pregunta
function eliminarPregunta(id_pregunta) {
    var conf = confirm("Estas seguro de eliminar la Pregunta");
    if (conf == true) {
        // Eliminar pregunta con el método ajax POST
        $.post("../controladores/funcionesProfesorphp/Preguntasprofesorphp/eliminarPregunta.php", {id_pregunta: id_pregunta}, function (data, status) {
            // Volver a cargar la tabla de encuestas
            mostrarPreguntas(id_contexto);
        });
    }
}



function obtenerDetallesPregunta(id_pregunta) {
    // Agregar id_pregunta al campo oculto
    $("#hidden_id_pregunta").val(id_pregunta);

    $.post("../controladores/funcionesProfesorphp/Preguntasprofesorphp/mostrarDetallesPregunta.php", {id_pregunta: id_pregunta}, function (data, status) {
        // PARSE json data
        var pregunta = JSON.parse(data);
        // Asignamos valores del encuesta al modal
        $("#modificar_titulo").val(pregunta.titulo);
          $("#modificar_ayuda").val(pregunta.ayudaestudiante);

        
    });
    // Abrir modal de modificar
    $("#modal_modificar").modal("show");
}

// Funcion modificarDetallesPregunta del modal modificar pregunta
function modificarDetallesPregunta() {
    // Obtener valores
    var titulo      = $("#modificar_titulo").val();
    var id_pregunta = $("#hidden_id_pregunta").val();
     var ayuda = $("#modificar_ayuda").val();

    // Modificar detalles consultando al servidor usando ajax
    $.post("../controladores/funcionesProfesorphp/Preguntasprofesorphp/modificarDetallesPregunta.php",
        {
            id_pregunta : id_pregunta,
            titulo      : titulo,
            ayuda       : ayuda
        },
        function (data, status) {
            // Ocultar el modal utilizando jQuery
            $("#modal_modificar").modal("hide");
            // Volver a cargar la tabla pregunta         
            var id_pregunta = $("#id_pregunta").val();
            
            mostrarPreguntas(id_contexto);
        }
    ) ;
}