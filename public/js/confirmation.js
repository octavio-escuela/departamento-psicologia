function sweetConfirm(title, message, callback) {
    swal.fire({
        title: title,
        text: message,
        type: 'warning',
        showCancelButton: true
    }).then((confirmed) => {
        callback(confirmed && confirmed.value == true);
    });
}

function req(message = '¿Estás seguro?', confirmation='Sí', method='GET',url='', id='1') {
   event.preventDefault();
   sweetConfirm(message, confirmation, function (confirmed) {
        if (confirmed) {
            fetch(url+'/'+id, {method: method}).then(()=>{
                window.location.reload();}
            );
        }
    });
}