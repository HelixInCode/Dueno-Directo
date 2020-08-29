const showHideModal = ($btn, $modal) =>{
  $btn.addEventListener('click', () =>{

    $modal.classList.toggle('hide')
  })
}

if(document.getElementById('modal-login')){
  const $login = document.getElementById('modal-login')
  const $btnHideLogin = document.getElementById('close-login')
  const $btnShowLogin = document.getElementById('ingresar')

  showHideModal($btnHideLogin, $login)
  showHideModal($btnShowLogin, $login)
}

if(document.getElementById('modal-input-img')){
  const $input = document.getElementById('modal-input-img')
  const $btnHideInput = document.getElementById('close-input')
  const $btnShowInput = document.getElementById('show-input')

  showHideModal($btnHideInput, $input)
  showHideModal($btnShowInput, $input)
}

if(document.getElementById('modal-perfil')){
  const $perfil = document.getElementById('modal-perfil')
  const $btnHidePerfil = document.getElementById('close-modal-perfil')
  const $btnShowPerfil = document.getElementById('show-modal-perfil')

  console.log('ejecutado')
  showHideModal($btnHidePerfil, $perfil)
  showHideModal($btnShowPerfil, $perfil)
}

if(document.getElementById('modal-message-sent')){
  const $messageSent = document.getElementById('modal-message-sent')
  const $btnHideSent = document.getElementById('close-sent')

  showHideModal($btnHideSent, $messageSent)
}