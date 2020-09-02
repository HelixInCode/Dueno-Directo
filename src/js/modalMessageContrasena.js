const messageAppears = document.getElementById('modal-message-sent');
const formulario = document.querySelector('#formulario-recupera');
const formularioModal = document.querySelector('#formulario-respuesta');
const close = document.querySelector('.closeModal');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    console.log('hciste click');
    messageAppears.classList.toggle('hide');

    if(close.addEventListener('click', function(e){
        messageAppears.classList.toggle('hide');
    }));
    if(formularioModal.addEventListener('submit', function(e){
        e.preventDefault();
        console.log('Se envio el formulario, se manda a pagina recupera-contrasena2');
    }));
});
