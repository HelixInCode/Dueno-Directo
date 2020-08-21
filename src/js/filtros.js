const $filtros = document.getElementById('filtros')
const $filtrosOverlay = $filtros.getElementsByClassName('filtros-overlay')[0]

const $btnFiltrosDesktop = document.getElementById('btnFiltrosDesktop')
const $btnFiltrosResponsive = document.getElementById('btnFiltrosResponsive')

const $modalServicios = document.getElementById('submenu')
const $btnServiciosResponsive = document.getElementById('btnServiciosResponsive')
const $serviciosOverlay = document.getElementsByClassName('servicios-overlay')[0]


const $mainFiltros = $filtros.querySelector('.main-container')
const $btnClose = $filtros.querySelector('i')

const btnFiltros = ($btnFiltros) =>{
  $btnFiltros.addEventListener('click', () => {
    $mainFiltros.classList.toggle('show')
    $filtrosOverlay.classList.toggle('hide')
  })
}
btnFiltros($btnFiltrosDesktop)
btnFiltros($btnFiltrosResponsive)
btnFiltros($btnClose)
btnFiltros($filtrosOverlay)



$btnServiciosResponsive.addEventListener('click', () => {
  $modalServicios.classList.toggle('show')
  $serviciosOverlay.classList.toggle('hide')
})
$serviciosOverlay.addEventListener('click', () => {
  $modalServicios.classList.toggle('show')
  $serviciosOverlay.classList.toggle('hide')
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

