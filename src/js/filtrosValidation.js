const $filtrosForm = document.querySelector('#filtros > .main-container > .filtros-container')
const $mainForm = document.getElementById('search-main')
const $proForm = document.getElementById('search-pro')

const eventoSubmit = ($form1, $form2) =>{
  $form1.addEventListener('submit',(event)=>{
    event.preventDefault();
  
    const form1 = new FormData($form1);
    const form2 = new FormData($form2);
    const gottenData = {};//Donde se van a almacenar todos los datos que fueron ingresados en los 2 forms 
    const formToSend = new FormData();

    const getInputs = (form) =>{
      for (const input of form.entries()) {
        if(input[1] !== null && input[1] !== ""){//Si el campo del formuario no está vacio se añade a GottenData
          // console.log(`El input ${input[0]} tiene algo ingresado: ${input[1]}`)
          if(input[0] !== 'precio'){
            verificador++;
          }
            gottenData[input[0]] = input[1];
            formToSend.append(input[0], input[1]);
        }
      }
    }

    let verificador = 0;
    //Se obtienen los datos ingresados en los 2 forms 
    getInputs(form1)
    getInputs(form2)
    
    console.log(gottenData)
    console.log(verificador)
    // console.log(`${verificador} inputs ingresados`)
    
    if(verificador){
      //se resetean los forms y se hace el llamado a la base de datos

      $form1.reset();
      $form2.reset();

      (async()=>{
        const response = await fetch('preuba.php',{
          method: 'POST',
          body: formToSend
        });
        const datos = await response.json();
        console.log(datos);
      })();

      // fetchPrintPosts(gottenData)
    }else{
      modalError('¡Error, debe seleccionar al menos un filtro!')
    }
  })
}
const eventoSubmitServicios = ($form1) =>{
  $form1.addEventListener('submit',(event)=>{
    event.preventDefault();
  
    const form1 = new FormData($form1);
    const gottenData = {};//Donde se van a almacenar todos los datos que fueron ingresados en los 2 forms 
    const formToSend = new FormData();

    const getInputs = (form) =>{
      for (const input of form.entries()) {
        if(input[1] !== null && input[1] !== ""){//Si el campo del formuario no está vacio se añade a GottenData
          // console.log(`El input ${input[0]} tiene algo ingresado: ${input[1]}`)
          if(input[0] !== 'precio'){
            verificador++;
          }
            gottenData[input[0]] = input[1];
            formToSend.append(input[0], input[1]);
        }
      }
    }

    let verificador = 0;
    // debugger
    //Se obtienen los datos ingresados en los 2 forms 
    getInputs(form1)
    
    console.log(gottenData)
    console.log(`${verificador} inputs ingresados`)
    
    if(verificador){
      //se resetean los forms y se hace el llamado a la base de datos
      $form1.reset()
      (async()=>{
        const response = await fetch('preuba.php',{
          method: 'POST',
          body: formToSend
        });
        const datos = await response.json();
        console.log(datos);
      })();
      // fetchServices(gottenData)
      
    }else{
      modalError('¡Error, debe seleccionar al menos un filtro!')
    }
  })
}
if($mainForm && $filtrosForm){
  eventoSubmit($mainForm, $filtrosForm);
}
if($proForm){
  eventoSubmitServicios($proForm);
}
// eventoSubmit($mainForm, $mainFormInputs, $filtrosForm, $filtrosFormInputs)
// eventoSubmit($filtrosForm, $filtrosFormInputs, $mainForm, $mainFormInputs)
