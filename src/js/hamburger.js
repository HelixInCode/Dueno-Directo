const $menuItems = document.getElementsByClassName('menu-items')[0]
const $menuOverlay = document.getElementsByClassName('menu-overlay')[0]
const $hamburger = document.getElementById('hamburger')

$hamburger.addEventListener('click', ()=>{
  if($menuItems.classList.contains('hide')){

    $menuItems.classList.remove('hide')
    $menuOverlay.classList.remove('hide')
    
  }else if(!$menuItems.classList.contains('hide')){
    
    $menuItems.classList.add('hide')
    $menuOverlay.classList.add('hide')
  }
})
$menuOverlay.addEventListener('click', ()=>{
  if(!$menuItems.classList.contains('hide')){
    
    $menuItems.classList.add('hide')
    $menuOverlay.classList.add('hide')
  }
})