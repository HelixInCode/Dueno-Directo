const $modalLogin = document.getElementById('modal-login')
const $modalInputs = $modalLogin.getElementsByClassName('input-container')
const $modalSubmit = $modalLogin.getElementsByTagName('button')[0]

for (let index = 0; index < ($modalInputs.length - 1); index++) {

  $modalInputs[index].querySelector('input').addEventListener('input', ()=>{
    let valorInput = $modalInputs[index].querySelector('input').value
    
    const html = document.implementation.createHTMLDocument()
    html.body.innerHTML = '<p style="color: red; margin: 0;">Obligatorio</p>'

    const parrafo = html.body.children[0]

    if (valorInput === "") {
      if (!$modalInputs[index].children[2]) { //si no existe el parrafo
        $modalInputs[index].append(parrafo)
      }

    }else if ($modalInputs[index].children[2]) { //si existe el parrafo
      $modalInputs[index].children[2].remove()
    }

    if (!$modalInputs[0].children[2] && !$modalInputs[1].children[2] && 
         $modalInputs[0].children[1].value !== "" && $modalInputs[1].children[1].value !== "") {
      console.log('boton habilitado')
      $modalSubmit.removeAttribute('disabled')
    }else{
      console.log('boton sigue inhabilitado')

      if(!$modalSubmit.disabled){
        $modalSubmit.setAttribute('disabled', '')
      }
    }
  })
  
}

