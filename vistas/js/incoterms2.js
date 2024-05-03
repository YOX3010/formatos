// /*=============================================

// SUBIENDO LA FOTO DEL PRODUCTO

// =============================================*/

// $(".nuevaImagen").change(function () {
//   var imagen = this.files[0];

//   /*=============================================

//   	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

//   	=============================================*/

//   if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
//     $(".nuevaImagen").val("");

//     swal({
//       title: "Error al subir la imagen",

//       text: "¡La imagen debe estar en formato JPG o PNG!",

//       type: "error",

//       confirmButtonText: "¡Cerrar!",
//     });
//   } else if (imagen["size"] > 2000000) {
//     $(".nuevaImagen").val("");

//     swal({
//       title: "Error al subir la imagen",

//       text: "¡La imagen no debe pesar más de 2MB!",

//       type: "error",

//       confirmButtonText: "¡Cerrar!",
//     });
//   } else {
//     var datosImagen = new FileReader();

//     datosImagen.readAsDataURL(imagen);

//     $(datosImagen).on("load", function (event) {
//       var rutaImagen = event.target.result;

//       $(".previsualizar").attr("src", rutaImagen);
//     });
//   }
// });

// /*=============================================
// EDITAR INCOTERMS
// =============================================*/

// $(".tablas").on("click", ".btnEditarIncoterms", function () {
//   var idIncoterms = $(this).attr("idIncoterms");

//   var datos = new FormData();

//   datos.append("idIncoterms", idIncoterms);

//   $.ajax({
//     url: "ajax/incoterms.ajax.php",
//     method: "POST",
//     data: datos,
//     cache: false,
//     contentType: false,
//     processData: false,
//     dataType: "json",

//     success: function (respuesta) {
//       $("#idIncoterms").val(respuesta["id"]);
//       $("#editarIncoterm").val(respuesta["incoterm"]);
//       // $("#editarProcedimiento").val(respuesta["procedimiento"]);
//       if (respuesta["procedimiento"] != "") {
//         $("#imagenActual").val(respuesta["procedimiento"]);
//         $(".previsualizar").attr("src", respuesta["procedimiento"]);
//       } else {
//         $(".previsualizarEditar").attr(
//           "src",
//           "vistas/img/procedimientos/default/empty-doc.png"
//         );
//       }
//     },
//   });
// });

// /*=============================================
// ELIMINAR INCOTERMS
// =============================================*/

// // $(".tablas").on("click", ".btnEliminarIncoterms", function(){

// // 	 var idMarca = $(this).attr("idIncoterms");

// // 	 swal({

// // 	 	title: '¿Está seguro de borrar La Incoterms?',
// // 	 	text: "¡Si no lo está puede cancelar la acción!",
// // 	 	type: 'warning',
// // 	 	showCancelButton: true,
// // 	 	confirmButtonColor: '#3085d6',
// // 	 	cancelButtonColor: '#d33',
// // 	 	cancelButtonText: 'Cancelar',
// // 	 	confirmButtonText: 'Si, borrar Incoterms!'

// // 	 }).then(function(result){

// // 	 	if(result.value){

// // 	 		window.location = "index.php?ruta=inspecciones-reparaciones&idIncoterms="+idIncoterms;

// // 	 	}

// // 	 })

// // })
