// Main Menu Elements
const $hamburger = document.getElementById('hamburger')
const $menuOverlay = document.getElementsByClassName('menu-overlay')[0]
const $menuItems = document.getElementsByClassName('menu-items')[0]
// Menu User Panel
const $user = document.getElementsByClassName('user')[0]
const $userPanel = $user.getElementsByTagName('ul')[0]
const $userArrow = $user.getElementsByClassName('fa-angle-down')[0]

class Menu{
  constructor(displayButton, menuList, optionalElement, class1, class2){
    this.boton = displayButton;
    this.menu = menuList;
    this.option = optionalElement;
    this.clase1 = class1;
    this.clase2 = class2;
  }
}

const displayMenu = (menuType) => {
  menuType.boton.addEventListener('click', () => {
    menuType.menu.classList.toggle(menuType.clase1)
    menuType.option.classList.toggle(menuType.clase2)
  })
}
document.addEventListener('DOMContentLoaded', (event) =>{
  
  if($userPanel.children[0].children[0].innerText === ""){
    //Hay sesión iniciada
    $user.classList.toggle('d-none')
    
  }else{
    //No hay sesión iniciada
    $menuItems.classList.toggle('four-buttons')
    $menuItems.children[3].classList.toggle('d-none')
  }
})

const menuHamburger = new Menu($hamburger, $menuItems, $menuOverlay, 'hide', 'hide')
const menuOverlay = new Menu($menuOverlay, $menuItems, $menuOverlay, 'hide', 'hide')
const menuUser = new Menu($user, $userPanel, $userArrow, 'hide', 'rotate')

const menu = [menuHamburger, menuOverlay, menuUser]

menu.forEach(menuType => displayMenu(menuType))
