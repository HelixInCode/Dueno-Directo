const $filtros = document.getElementById('filtros')
const $btnFiltros = document.getElementById('btnFiltros')
const $mainFiltros = $filtros.querySelector('.main-container')
const $btnClose = $filtros.querySelector('i')

$btnFiltros.addEventListener('click', () => {

  if($mainFiltros.style.transform === '' || $mainFiltros.style.transform === 'translateX(-100%)'){
    $mainFiltros.style.transform = 'translateX(0px)'
  }
})

$btnClose.addEventListener('click', () => {
  if($mainFiltros.style.transform === 'translateX(0px)'){
    $mainFiltros.style.transform = 'translateX(-100%)'
  }
})

// Clases active de los botones del buscador

const $botonesContainer = document.getElementById('botones-container')


const eventListenerToggle = (boton1, boton2) => {

  boton1.addEventListener('click', () =>{
  
    if (!boton1.classList.contains('active') && 
         boton2.classList.contains('active')) {
  
      boton1.classList.toggle('active')
      boton2.classList.toggle('active')
  
    }
  })

}

eventListenerToggle($botonesContainer.children[0],
                    $botonesContainer.children[1])

eventListenerToggle($botonesContainer.children[1],
                    $botonesContainer.children[0])

