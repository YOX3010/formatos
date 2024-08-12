/*=============================================
EDITAR LOI
=============================================*/

$(".tablas").on("click", ".btnEditarLOI", function () {
  var idLOI = $(this).attr("idLOI");

  var datos = new FormData();

  datos.append("idLOI", idLOI);

  $.ajax({
    url: "ajax/loi.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idLOI").val(respuesta["id"]);
      $("#editarCliente").val(respuesta["id_clientes"]);
      $("#editarCodigo").val(respuesta["codigo"]);
      $("#editarDescripcion").val(respuesta["descripcion"]);
      // $("#editarLoiImage").val(respuesta["loi_image"]);
    },
  });
});

/*=============================================
BOTON ADMINISTRAR LOI
=============================================*/

$(".tablas tbody").on("click", ".btnLOI", function () {
  var idProveedor = $(this).attr("idProveedor");

  window.location = "index.php?ruta=loi&idProveedor=" + idProveedor;
});

/*=============================================
BOTON IMPRIMIR JV
=============================================*/

$(".tablas").on("click", ".btnJV", function () {
  var idLOI = $(this).attr("idLOI");

  window.open(
    "extensiones/tcpdf/examples/joint-venture.php?idLOI=" + idLOI,
    "_blank"
  );
});

/*=============================================
ELIMINAR LOI
=============================================*/

// $(".tablas").on("click", ".btnEliminarLOI", function(){

// 	 var idMarca = $(this).attr("idLOI");

// 	 swal({

// 	 	title: '¿Está seguro de borrar La LOI?',
// 	 	text: "¡Si no lo está puede cancelar la acción!",
// 	 	type: 'warning',
// 	 	showCancelButton: true,
// 	 	confirmButtonColor: '#3085d6',
// 	 	cancelButtonColor: '#d33',
// 	 	cancelButtonText: 'Cancelar',
// 	 	confirmButtonText: 'Si, borrar LOI!'

// 	 }).then(function(result){

// 	 	if(result.value){

// 	 		window.location = "index.php?ruta=inspecciones-reparaciones&idLOI="+idLOI;

// 	 	}

// 	 })

// })
