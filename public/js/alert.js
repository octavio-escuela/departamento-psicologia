//! este fragmento de codigo solo implementar cuando se quiere mostrar una alerta 
function EliminarPsicologo(id, url) {
    parametros = { "id": id };
    $.ajax({
        data: parametros,
        url: 'http://localhost/departamento-psicologia/psychologist/delete',
        type: 'POST',
        beforeSend: function () {},
        success: function () {
            Swal.fire(
                'eliminado!',
                'tu registro ha sido eliminado.',
                'success'
              )
        }
    })
}

function fntDelPsicologo(id, url){
    Swal.fire({
        title: '',
        text: "Una vez eliminado, no podrá recuperarlo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            EliminarPsicologo(id, url);
        }
    })
}