function modalAskQuestion(data) {
    swal({
        title: data.title,
        text: data.text,
        icon: data.icon,
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = data.route;
        }
    });
}

function showAlert(data){
    swal({
        title: data.title,
        text: data.text,
        icon: data.icon,
        buttons: true,
    });
}

function closeModal(){
    swal.close();
}

function showLoader(title, text, icon){
    swal({
        title: title ?? 'Please wait...',
        text: text ?? 'Processing your request',
        icon: icon ?? 'info',
        buttons: false,
        closeOnClickOutside: false,
        closeOnEsc: false,
    });
}
