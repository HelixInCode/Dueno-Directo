const login = document.getElementById('modal-login')
const btnHide = document.getElementById('close-login')
const btnShow = document.getElementById('ingresar')

btnShow.addEventListener('click', () =>{

  if (login.style.transform === '' || login.style.transform === 'translateY(-100%)') {
    login.style.transform = 'translateY(0px)'
  }
  console.log(login.style.transform)
})
btnHide.addEventListener('click', () =>{

  if(login.style.transform === 'translateY(0px)'){
    login.style.transform = 'translateY(-100%)'
  }
  console.log(login.style.transform)
})