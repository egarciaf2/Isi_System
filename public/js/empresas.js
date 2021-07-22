$(document).ready( function () {
    $('#tblEmpresas').DataTable({
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando registros del _START_ al _END_",
            sInfoEmpty: "Mostrando registros del 0 al 0 ",
            sInfoFiltered: "(de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            oAria: {
                sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending:
                    ": Activar para ordenar la columna de manera descendente",
            },
        },
    });
} );

$(".uploadLogo").change(function(){

    let imagen = this.files[0];

    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

        $("input[type='file']").val("");
        
        showAlert('error', 'Incorrecto', 'La imagen debe estar en formato JPG o PNG!');

    /*=============================================
    VALIDAMOS EL TAMAÑO DE LA IMAGEN SEA JPG O PNG
    =============================================*/
    }else if(imagen["size"] > 5000000){

        $("input[type='file']").val("");

         showAlert('error', 'Incorrecto', 'La imagen no debe pesar más de 5MB!');


    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){

            var rutaImagen = event.target.result;

            $("#vwNewImg").attr("src", rutaImagen);

        })

    }

    // cargando(0);
});


// Muestra una alerta suave
function showAlert(icon, title, text){

    Swal.fire({
      title: title,
      text: text,
      icon: icon,
      confirmButtonText: 'OK',
      confirmButtonColor: '#17A2B8',
    })

}