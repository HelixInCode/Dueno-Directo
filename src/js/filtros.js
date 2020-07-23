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