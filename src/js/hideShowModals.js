const login = document.getElementById('modal-login')
const btnHideLogin = document.getElementById('close-login')
const btnShowLogin = document.getElementById('ingresar')

const messageSent = document.getElementById('modal-message-sent')
const btnHideSent = document.getElementById('close-sent')

// messageSent.style.transform = 'translateY(0px)'

const hideModal = (btnHide, modal) =>{
  btnHide.addEventListener('click', () =>{

    if(modal.style.transform === 'translateY(0px)'){
      modal.style.transform = 'translateY(-100%)'
    }
    console.log(modal.style.transform)
  })
}

btnShowLogin.addEventListener('click', () =>{

  if (login.style.transform === '' || login.style.transform === 'translateY(-100%)') {
    login.style.transform = 'translateY(0px)'
  }
  console.log(login.style.transform)
})

hideModal(btnHideLogin, login)
hideModal(btnHideSent, messageSent)
