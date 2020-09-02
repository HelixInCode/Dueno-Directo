const $filtrosForm = document.querySelector('#filtros > .main-container > .filtros-container')
const $mainForm = document.getElementById('search-main')

// const $filtrosFormInputs = ['busqueda', 'precio-minimo', 'precio-maximo','superfie-cubierta-minima', 'superfie-cubierta-maxima', 'superfie-total-minima', 'superfie-total-maxima', 'operacion', 'inmueble', 'opciones', 'habitaciones', 'bathrooms', 'plantas']
// const $mainFormInputs = ['busqueda', 'precio-minimo', 'precio-maximo']

const eventoSubmit = ($form1, $form2) =>{
  $form1.addEventListener('submit',(event)=>{
    event.preventDefault();
  
    const form1 = new FormData($form1);
    const form2 = new FormData($form2);
    const gottenData = {};

    let verificador = 0;

    const getInputs = (form) =>{
      for (const input of form.entries()) {
        if(input[1] !== null && input[1] !== ""){
          verificador++
          // console.log(`El input ${input[0]} tiene algo ingresado: ${input[1]}`)
          gottenData[input[0]] = input[1];
        }
      }
    }

    getInputs(form1)
    getInputs(form2)
    
    console.log(gottenData)
    console.log(`${verificador} inputs ingresados`)
    
    if(!verificador){
  
      modalError('¡Error, debe seleccionar al menos un filtro!')
  
    }else{
      console.log('ejecutar fetch()')
    }
  
  
    // console.log('search:',filtrosForm.get('search'))
    // console.log('operacion:',filtrosForm.get('operacion'))
    // console.log('inmueble:',filtrosForm.get('inmueble'))
    // console.log('precio-minimo:',filtrosForm.get('precio-minimo'))
    // console.log('precio-maximo:',filtrosForm.get('precio-maximo'))
    // console.log('opciones:',filtrosForm.get('opciones'))
    // console.log('superfie-cubierta-minima:',filtrosForm.get('superfie-cubierta-minima'))
    // console.log('superfie-cubierta-maxima:',filtrosForm.get('superfie-cubierta-maxima'))
    // console.log('superfie-total-minima:',filtrosForm.get('superfie-total-minima'))
    // console.log('superfie-total-maxima:',filtrosForm.get('superfie-total-maxima'))
    // console.log('habitaciones:',filtrosForm.get('habitaciones'))
    // console.log('bathrooms:',filtrosForm.get('bathrooms'))
    // console.log('plantas:',filtrosForm.get('plantas'))
  })
}
eventoSubmit($mainForm, $filtrosForm)
// eventoSubmit($mainForm, $mainFormInputs, $filtrosForm, $filtrosFormInputs)
// eventoSubmit($filtrosForm, $filtrosFormInputs, $mainForm, $mainFormInputs)
