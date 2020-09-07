const $filtrosForm = document.querySelector('#filtros > .main-container > .filtros-container')
const $mainForm = document.getElementById('search-main')

const eventoSubmit = ($form1, $form2) =>{
  $form1.addEventListener('submit',(event)=>{
    event.preventDefault();
  
    const form1 = new FormData($form1);
    const form2 = new FormData($form2);
    const gottenData = {};//Donde se van a almacenar todos los datos que fueron ingresados en los 2 forms 

    let verificador = 0;

    const getInputs = (form) =>{
      for (const input of form.entries()) {
        if(input[1] !== null && input[1] !== ""){//Si el campo del formuario no está vacio se añade a GottenData
          verificador++;
          // console.log(`El input ${input[0]} tiene algo ingresado: ${input[1]}`)
          gottenData[input[0]] = input[1];
        }
      }
    }

    //Se obtienen los datos ingresados en los 2 forms 
    getInputs(form1)
    getInputs(form2)
    
    console.log(gottenData)
    console.log(`${verificador} inputs ingresados`)
    
    if(verificador){
      //se resetean los forms y se hace el llamado a la base de datos
      $form1.reset()
      $form2.reset()
      fetchPrintPosts(gottenData)
      
    }else{
      modalError('¡Error, debe seleccionar al menos un filtro!')
    }
  })
}
eventoSubmit($mainForm, $filtrosForm)
// eventoSubmit($mainForm, $mainFormInputs, $filtrosForm, $filtrosFormInputs)
// eventoSubmit($filtrosForm, $filtrosFormInputs, $mainForm, $mainFormInputs)
