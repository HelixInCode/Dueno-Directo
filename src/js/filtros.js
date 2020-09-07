const $filtros = document.getElementById('filtros')
const $modalServicios = document.getElementById('submenu')



const btnFiltros = ($btnFiltros) =>{
  $btnFiltros.addEventListener('click', () => {
    $filtros.classList.toggle('showUp')
    $mainFiltros.classList.toggle('show')
    $filtrosOverlay.classList.toggle('hide')
  })
}
if($filtros){
  const $filtrosOverlay = $filtros.getElementsByClassName('filtros-overlay')[0]
  const $mainFiltros = $filtros.querySelector('.main-container')
  const $btnClose = $filtros.querySelector('i')

  const $btnFiltrosDesktop = document.getElementById('btnFiltrosDesktop')
  const $btnFiltrosResponsive = document.getElementById('btnFiltrosResponsive')

  btnFiltros($btnFiltrosDesktop)
  btnFiltros($btnFiltrosResponsive)
  btnFiltros($btnClose)
  btnFiltros($filtrosOverlay)
}
if($modalServicios){
  const $btnServiciosResponsive = document.getElementById('btnServiciosResponsive')
  const $serviciosOverlay = document.getElementsByClassName('servicios-overlay')[0]

  $btnServiciosResponsive.addEventListener('click', () => {
    $modalServicios.classList.toggle('show')
    $serviciosOverlay.classList.toggle('hide')
  })
  $serviciosOverlay.addEventListener('click', () => {
    $modalServicios.classList.toggle('show')
    $serviciosOverlay.classList.toggle('hide')
  })
}

