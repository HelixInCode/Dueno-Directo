const $filtrosForm = document.querySelector('#filtros > .main-container > .filtros-container')
$filtrosForm.addEventListener('submit',(event)=>{
  event.preventDefault();

  const form = new FormData($filtrosForm);
  let verificador = 0;
  let radioInputs = ['operacion', 'inmueble', 'opciones', 'habitaciones', 'bathrooms', 'plantas'];
  let textNumberInputs = ['search', 'precio-minimo', 'precio-maximo',
                          'superfie-cubierta-minima', 'superfie-cubierta-maxima', 
                          'superfie-total-minima', 'superfie-total-maxima']

  const getInput = (input) =>{
    return form.get(input)
  }
  const getInputs = (arrayInputs) =>{
    let inputsGotten = arrayInputs.map((input)=>{
      
      let gottenData = getInput(input)

      if(gottenData !== null && gottenData !== ""){
        verificador++
      }
      return gottenData
    })
    return inputsGotten;
  }

  radioInputs = getInputs(radioInputs)
  textNumberInputs = getInputs(textNumberInputs)

  // console.log(radioInputs)
  // console.log(textNumberInputs)
  // console.log(verificador)
  
  if(!verificador){

    modalError('¡Error, debe seleccionar al menos un filtro!')

  }else{
    console.log('ejecutar fetch()')
  }


  // console.log('search:',form.get('search'))
  // console.log('operacion:',form.get('operacion'))
  // console.log('inmueble:',form.get('inmueble'))
  // console.log('precio-minimo:',form.get('precio-minimo'))
  // console.log('precio-maximo:',form.get('precio-maximo'))
  // console.log('opciones:',form.get('opciones'))
  // console.log('superfie-cubierta-minima:',form.get('superfie-cubierta-minima'))
  // console.log('superfie-cubierta-maxima:',form.get('superfie-cubierta-maxima'))
  // console.log('superfie-total-minima:',form.get('superfie-total-minima'))
  // console.log('superfie-total-maxima:',form.get('superfie-total-maxima'))
  // console.log('habitaciones:',form.get('habitaciones'))
  // console.log('bathrooms:',form.get('bathrooms'))
  // console.log('plantas:',form.get('plantas'))
})