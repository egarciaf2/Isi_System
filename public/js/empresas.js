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


function validarEmpresa(){
        let idEmp = $('#idEmp');
        let logoTipo = $('#imgLogo');
        let nombre = $('#txtNombre');
        let email = $('#txtEmail');
        let url = $('#txtUrl');

    if (idEmp.val() == '' && logoTipo.val() == '' ) {
        logoTipo.addClass('is-invalid');
        showAlert('warning', 'Requerido', 'El logo de la empresa es requerido');
        return false;
    }else{
        logoTipo.removeClass('is-invalid');
    }

    if (nombre.val() == '' ) {
        nombre.addClass('is-invalid');
        showAlert('warning', 'Requerido', 'El nombre de la empresa es requerido');
        return false;

    }else{
        nombre.removeClass('is-invalid');
    }

    if (email.val() == '' ) {
        email.addClass('is-invalid');
        showAlert('warning', 'Requerido', 'El Correo Electronico de la empresa es requerido');
        return false;

    }else{
        email.removeClass('is-invalid');
    }

    if (url.val() == '' ) {
        url.addClass('is-invalid');
        showAlert('warning', 'Requerido', 'La direccion URL de la empresa es requerida');
        return false;

    }else{
        url.removeClass('is-invalid');
    }

    if (idEmp.val() == '') {
        let formulario = document.getElementById('frmEmpresa');
        formulario.submit();
    }else{
        Swal.fire({
            title: 'Actualizar',
            text: "¿Confirma que desea Actualizar la empresa?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#d75',
            confirmButtonText: 'Si, Confirmar!'
        }).then((result) => {

            if (result.isConfirmed) {
                let formulario = document.getElementById('frmEmpresa');
                formulario.submit();
            }

        })
    }
    
}



// eliminar Empresa
function deleteEmpresa(idForm){
    Swal.fire({
        title: '¿Confirma que desea eliminar la empresa?',
        text: "Esta accion no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#d75',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {

        if (result.isConfirmed) {
            let formulario = document.getElementById(idForm);
            formulario.submit();
        }

    })
}

// Mostrar previzualizacion de logo
$(".uploadLogo").change(function(){

    let imagen = this.files[0];

    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

        $("input[type='file']").val("");
        
        showAlert('error', 'Incorrecto', 'El logo debe estar en formato JPG o PNG!');

    /*=============================================
    VALIDAMOS EL TAMAÑO DE LA IMAGEN SEA JPG O PNG
    =============================================*/
    }else if(imagen["size"] > 5000000){

        $("input[type='file']").val("");

         showAlert('error', 'Incorrecto', 'El logo no debe pesar más de 5MB!');


    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){

            //Inicializa el objeto de imagen javascript
            var image = new Image();
            image.src = event.target.result;             
            
            //Valida el ancho y el alto de la imagen
              image.onload = function () {
                var height = this.height;
                var width = this.width;

                if (height > 100 && width > 100) {
                  $("#vwNewImg").attr("src", image.src);
                }else{
                    document.getElementById("imgLogo").value = "";
                    $("#vwNewImg").attr("src", '/img/logo-default.jpg');
                    showAlert('error', 'Incorrecto', 'El logo debe tener un tamaño minimo de 100 × 100');
                }
            }


            

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