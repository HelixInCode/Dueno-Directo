const $publicationContainer = document.querySelector('#publications > .publications-container')
const LA_PAGINA_ESTA_EN_SEARCH_RESULTS = $publicationContainer.dataset.url === 'resultspage';
const LA_PAGINA_ESTA_EN_INDEX = $publicationContainer.dataset.url === 'homepage';
const LA_PAGINA_SERVICIOS = $publicationContainer.dataset.url === 'servicepage';
const LA_PAGINA_PRODUCTOS = $publicationContainer.dataset.url === 'productspage';

const printLoaders = (container, NUMERO_DE_LOADERS) =>{
  const NUMERO_PUBLICACIONES_LOAD = NUMERO_DE_LOADERS;
  for (let i = 0; i < NUMERO_PUBLICACIONES_LOAD; i++) {
    container.innerHTML += '<div class="publications-item-load"></div>'
  }
}
const publicationTemplate = (publicacion) => {
  const comparacionDeString = (feature) =>{
    if(feature === '4 o mas'){
      feature = '4+';
    }
    return feature;
  }
  // const {nombre} = publicacion;
  // const {peso} = publicacion;
  // const {area_cubierta} = publicacion;
  let habitaciones = publicacion.habitaciones;
  let banos = publicacion.banos;
  
  habitaciones = comparacionDeString(habitaciones);
  banos = comparacionDeString(banos);

  return `<a href="publicacion-precarga.php?public=${publicacion.idPropiedad}" class="publications-item">
  <div class="img-container">
      
    <img src="dist/images/${publicacion.imagen1}" alt="">
    
    <div class="publications-address">
      <h5>${publicacion.calle}</h5>
    </div>
    <div class="publications-price">
      <h6>$${parseFloat(publicacion.dolar).toLocaleString()}</h6>
    </div>

    <div class="publications-features">
      
      <div href="#?" class="bedroom-icon">
        <span>${habitaciones}</span>
        <!-- icono insertado por svg.js -->
      </div>

      <div href="#?" class="area-icon">
        <span>${publicacion.area_total}</span>
        <!-- icono insertado por svg.js -->
      </div>
      
      <div href="#?" class="bathroom-icon">
        <span>${banos}</span>
        <!-- icono insertado por svg.js -->
      </div>

      <div href="#?" class="parking-icon">
        <span>${publicacion.cochera}</span>
        <!-- icono insertado por svg.js -->
      </div>

    </div>

  </div> 
</a>`
}
const printPublications = (container, datos, LIMITE_DE_PUBLICACIONES) => {
  console.log(datos)
  container.innerHTML = "";
  if(!LIMITE_DE_PUBLICACIONES){
    if(Array.isArray(datos)){
      datos.forEach(publicacion => {
        container.innerHTML += publicationTemplate(publicacion)
      });
    }else{
      container.innerHTML += publicationTemplate(datos)
    }
  }else{
    if(Array.isArray(datos)){
      for (let index = 0; index < LIMITE_DE_PUBLICACIONES; index++) {
        container.innerHTML += publicationTemplate( datos[index])
      }
    }else{
      container.innerHTML += publicationTemplate(datos)
    }
  }
  renderizarIconos();
}
const filtrarDatos = (datosFiltros, datos) =>{
  const  foundItems = [];
  for(publicacion of datos){
    const NUMERO_DE_DATOS_FILTRADOS = Object.values(datosFiltros).length;

    let datoEncontrado = {};
    let busqueda;
    let busqueda2;
    let verificador = 0;

    const cumpleCondicion = (repeticiones) =>{
      datoEncontrado = publicacion;
      // console.log('Cumple la condicion');
      for (let i = 0; i < repeticiones; i++) {
        verificador++;
      }
    }
    const verficacionCampo = (campo) =>{
      if(datosFiltros[campo] !== undefined){
        
        busqueda = datosFiltros[campo].toLowerCase();
        
        if(publicacion[campo] === busqueda){
        
          cumpleCondicion(1)
        }
      }
    }
    const verficacionCampoTipoRango = (minimo, maximo, campo) =>{
      if(datosFiltros[minimo] !== undefined && datosFiltros[maximo] !== undefined){
          
        busqueda = datosFiltros[minimo].toLowerCase();
        busqueda2 = datosFiltros[maximo].toLowerCase();
        
        if(parseInt(busqueda) <= parseInt(publicacion[campo]) && parseInt(publicacion[campo]) <= parseInt(busqueda2)){
          cumpleCondicion(2)
          console.log('El precio esta entre ambos rangos')
        }else{
          console.log('No cumple la condicion')
        }
      }else if(datosFiltros[minimo] !== undefined){
  
        busqueda = datosFiltros[minimo].toLowerCase();
        
        if(parseInt(busqueda) <= publicacion['peso']){
          cumpleCondicion(1)
        }else{
          console.log('No cumple la condicion')
        }
      }else if(datosFiltros[maximo] !== undefined){
        
        busqueda = datosFiltros[maximo].toLowerCase();
        
        if(publicacion[$mainForm] <= parseInt(busqueda)){
          cumpleCondicion(1);
        }else{
          console.log('No cumple la condicion')
        }
      }else{
        console.log('ninguno de los dos fue ingresado')
      }
    }

    if(datosFiltros['nombre'] !== undefined){
      
      let matchRate = 0;
      let palabrasEncontradas = [];

      const limpiarPalabrasBasura = (elemento) =>{
        // debugger
        let auxiliar = document.createElement('div')  
        auxiliar.className = elemento.className.toLowerCase();
    
        for(let index = 0; index <= auxiliar.classList.length; index++){
          if(auxiliar.classList[index] === 'de' ||
              auxiliar.classList[index] === 'el' ||
              auxiliar.classList[index] === 'la' ||
              auxiliar.classList[index] === 'los' ||
              auxiliar.classList[index] === 'las' ||
              auxiliar.classList[index] === 'y' ||
              auxiliar.classList[index] === 'con' ||
              auxiliar.classList[index] === 'en' ||
              auxiliar.classList[index] === 'del'){
              
            elemento.classList.remove(auxiliar.classList[index])  
          }
        }
        return elemento
      }

      busqueda = document.createElement('div')  
      busqueda.className = datosFiltros['nombre'].toLowerCase();

      let html = document.createElement('div')
      html.className = publicacion['nombre'].toLowerCase();

      busqueda = limpiarPalabrasBasura(busqueda)
      html = limpiarPalabrasBasura(html)

      if(html.className.includes(busqueda.className)){
        cumpleCondicion(1)
        console.log(`la busqueda es exacta`)
      }else{
        
        for(let index = 0; index <= busqueda.classList.length; index++){

          //se verifica si las palabras clave buscada concuerdan con la base de datos
          if(html.className.includes(busqueda.classList[index])){ 
            
            //si reunen la palabras encontradas
            palabrasEncontradas.push(busqueda.classList[index])
            matchRate++;
          }
        }

        //Si el N° de palabras encontradas no concuerdan con en N° de palabras clave buscadas entonces se tomará como que no cumple con la busqueda
        if(matchRate === busqueda.classList.length && palabrasEncontradas != []){
          // console.log(`hubieron ${matchRate} coincidencias`)
          // console.log(`Las palabras encontradas fueron "${palabrasEncontradas.join(', ')}"`)
          cumpleCondicion(1)

        }else{
          console.log('No hubo coincidencias')
        }
      }

    }else{
      console.log('no se busco por nombre')
    }

    verficacionCampo('tipo_propiedad')
    verficacionCampo('finalidad')
    verficacionCampo('banos')
    verficacionCampo('habitaciones')
    verficacionCampoTipoRango('precioMinimo', 'precioMaximo', 'peso')
    verficacionCampoTipoRango('superfieCubiertaMinima', 'superfieCubiertaMaxima', 'area_cubierta')
    verficacionCampoTipoRango('superfieTotalMinima', 'superfieTotalMaxima', 'area_total')
    
    if(NUMERO_DE_DATOS_FILTRADOS === verificador){
      foundItems.push(datoEncontrado)
      console.log('Cumple las condiciones')
    }else{
      console.log('No cumple todas las condiciones')
    }
    console.log(foundItems)
  }
  return foundItems;
}
const filtrarProductosServicios = (datosFiltros, datos) =>{
  const  foundItems = [];
  for(publicacion of datos){
    const NUMERO_DE_DATOS_FILTRADOS = Object.values(datosFiltros).length;

    let datoEncontrado = {};
    let busqueda;
    let verificador = 0;

    const cumpleCondicion = (repeticiones) =>{
      datoEncontrado = publicacion;
      // console.log('Cumple la condicion');
      for (let i = 0; i < repeticiones; i++) {
        verificador++;
      }
    }
    const verficacionCampo = (campo) =>{
      if(datosFiltros[campo] !== undefined){
        
        busqueda = datosFiltros[campo].toLowerCase();
        
        if(publicacion[campo] === busqueda){
        
          cumpleCondicion(1)
        }
      }
    }

    if(datosFiltros['nombre'] !== undefined){
      
      let matchRate = 0;
      let palabrasEncontradas = [];

      const limpiarPalabrasBasura = (elemento) =>{
        // debugger
        let auxiliar = document.createElement('div')  
        auxiliar.className = elemento.className.toLowerCase();
    
        for(let index = 0; index <= auxiliar.classList.length; index++){
          if(auxiliar.classList[index] === 'de' ||
              auxiliar.classList[index] === 'el' ||
              auxiliar.classList[index] === 'la' ||
              auxiliar.classList[index] === 'los' ||
              auxiliar.classList[index] === 'las' ||
              auxiliar.classList[index] === 'y' ||
              auxiliar.classList[index] === 'con' ||
              auxiliar.classList[index] === 'en' ||
              auxiliar.classList[index] === 'del'){
              
            elemento.classList.remove(auxiliar.classList[index])  
          }
        }
        return elemento
      }

      busqueda = document.createElement('div')  
      busqueda.className = datosFiltros['nombre'].toLowerCase();

      let html = document.createElement('div')
      html.className = publicacion['nombre'].toLowerCase();

      busqueda = limpiarPalabrasBasura(busqueda)
      html = limpiarPalabrasBasura(html)

      if(html.className.includes(busqueda.className)){
        cumpleCondicion(1)
        console.log(`la busqueda es exacta`)
      }else{
        
        for(let index = 0; index <= busqueda.classList.length; index++){

          //se verifica si las palabras clave buscada concuerdan con la base de datos
          if(html.className.includes(busqueda.classList[index])){ 
            
            //si reunen la palabras encontradas
            palabrasEncontradas.push(busqueda.classList[index])
            matchRate++;
          }
        }

        //Si el N° de palabras encontradas no concuerdan con en N° de palabras clave buscadas entonces se tomará como que no cumple con la busqueda
        if(matchRate === busqueda.classList.length && palabrasEncontradas != []){
          // console.log(`hubieron ${matchRate} coincidencias`)
          // console.log(`Las palabras encontradas fueron "${palabrasEncontradas.join(', ')}"`)
          cumpleCondicion(1)

        }else{
          console.log('No hubo coincidencias')
        }
      }

    }else{
      console.log('no se busco por nombre')
    }

    verficacionCampo('provincia')
    verficacionCampo('titulacion')
    
    if(NUMERO_DE_DATOS_FILTRADOS === verificador){
      foundItems.push(datoEncontrado)
      console.log('Cumple las condiciones')
    }else{
      console.log('No cumple todas las condiciones')
    }
    console.log(foundItems)
  }
  return foundItems;
}
const MENSAJE_DE_NOTIFICACION = (mensaje) =>{
  return `<div class="text-center font-weight-bold errorMessage">${mensaje}</div>`;

}
const fetchPrintPosts = async (datosFiltros)=>{

  const NUMERO_DE_LOADERS = 12;
  if(LA_PAGINA_ESTA_EN_SEARCH_RESULTS){
    $publicationContainer.innerHTML = ''; 
    printLoaders($publicationContainer, NUMERO_DE_LOADERS);
  }
  localStorage.clear()
  try {
    // const response = await fetch('query.php');
    
    const response = await fetch('process/consultaPropiedades.php');
    const datos = await response.json();
    const foundItems = filtrarDatos(datosFiltros, datos);

    if(foundItems.length > 0){
      if(LA_PAGINA_ESTA_EN_INDEX){

        localStorage.setItem('busquedas', JSON.stringify(foundItems))
        window.location = 'search-results.html';
        
      }else if(LA_PAGINA_ESTA_EN_SEARCH_RESULTS){
        
        localStorage.setItem('busquedas', JSON.stringify(foundItems));
        const HAY_BUSQUEDAS_DE_LA_HOME = JSON.parse(localStorage.getItem('busquedas'));
        colocarPagination(HAY_BUSQUEDAS_DE_LA_HOME);
        window.location = 'search-results.html';
        // printPublications($publicationContainer, foundItems);
      }
    }else{
      modalError('Lo sentimos, no se encontraron con concordancias')
      if(LA_PAGINA_ESTA_EN_SEARCH_RESULTS){
        $publicationContainer.innerHTML = MENSAJE_DE_NOTIFICACION(NO_FOUND_ITEMS_MESSAGE)
      }
    }
  } catch (error) {
    modalError('Ha habido un error al traer las publicaciones, intentelo de nuevo')
    $publicationContainer.innerHTML = MENSAJE_DE_NOTIFICACION(TRY_AGAIN_MESSAGE)
  }
}
const colocarPagination = (HAY_BUSQUEDAS_DE_LA_HOME) => {
  const NUMERO_DE_LOADERS = 12;
  
  printLoaders($publicationContainer, NUMERO_DE_LOADERS);
  const printPagination = (container, dato)=>{
    container.innerHTML += publicationTemplate(dato)
  }
  let NUMERO_RENDERIZADOS =  30;

  let START_RANGO;
  let END_RANGO;

  START_RANGO = parseInt(localStorage.getItem('startRender'));
  END_RANGO = parseInt(localStorage.getItem('endRender'));

  console.log(START_RANGO)
  console.log(END_RANGO)

  if(!START_RANGO && !END_RANGO){
    START_RANGO = 0;
    END_RANGO = 1;
  }

  const NUMERO_DE_FOUND_ITEMS = HAY_BUSQUEDAS_DE_LA_HOME.length
  const NUMERO_RANGO = NUMERO_DE_FOUND_ITEMS / NUMERO_RENDERIZADOS;

  const START = START_RANGO * NUMERO_RENDERIZADOS;
  const END = END_RANGO * NUMERO_RENDERIZADOS;

  $publicationContainer.innerHTML = "";
  // debugger

  for (let index = START; index < END; index++) {
    let SOBREPASA_FOUND_ITEMS = !(index < NUMERO_DE_FOUND_ITEMS);
    
    if(SOBREPASA_FOUND_ITEMS){
      break
    }else{
      // console.log(index)
      console.log(HAY_BUSQUEDAS_DE_LA_HOME[index])
      printPagination($publicationContainer, HAY_BUSQUEDAS_DE_LA_HOME[index])
    }
  }
  renderizarIconos()

  const END_RENDER = Math.round(NUMERO_RANGO)

  const ul = document.createElement('ul')
  // debugger
  ul.className = "pagination m-0 p-0"
  if(START_RANGO == 0){
    
    // ul.innerHTML += `<li class="page-item d-flex"><a class="page-link disabled bg-secondary" data-pagination="" href="#?">Previous</a></li>`
  }else{
    ul.innerHTML += `<li class="page-item d-flex"><a class="page-link" data-pagination="${0}" href="#?">Inicio</a></li>`
  }
  
  for (let index = END_RANGO - 2; index < END_RANGO +1 ; index++) {
    if(index === -1 || index === END_RENDER){
      continue
    }else{
      ul.innerHTML += `<li class="page-item d-flex"><a class="page-link" data-pagination="${index}" href="#?">${index + 1}</a></li>`
    }
  }

  if(END_RANGO == END_RENDER){

    // ul.innerHTML += `<li class="page-item d-flex"><a class="page-link disabled bg-secondary" data-pagination="" href="#?">Next</a></li>`
  }else{
    ul.innerHTML += `<li class="page-item d-flex"><a class="page-link" data-pagination="${END_RENDER - 1}" href="#?">Final</a></li>`
  }

  document.querySelector('#publications').innerHTML += `<div class="page-navigation d-flex justify-content-center">
                                                        <div aria-label="Page navigation example">
                                                          
                                                        </div>
                                                      </div>`;

  document.querySelector('#publications > .page-navigation > div').innerHTML = "";
  if(NUMERO_RANGO > 1){
    document.querySelector('#publications > .page-navigation > div').append(ul)
    document.querySelector('#publications > .page-navigation > div > ul').addEventListener('click', (event) =>{

      if(event.target.dataset.pagination){
        localStorage.setItem('startRender', parseInt(event.target.dataset.pagination))
        localStorage.setItem('endRender', parseInt(event.target.dataset.pagination) + 1)

        
        console.log(parseInt(localStorage.getItem('startRender')))
        console.log(parseInt(localStorage.getItem('endRender')))
        colocarPagination(HAY_BUSQUEDAS_DE_LA_HOME);
        window.location.reload();
      }
    })
  }
}
const LOOK_FOR_SOMETHING_MESSAGE = '<i class="fas fa-search fa-x3 mb-2"></i><p>Busca algo</p>';
const NO_FOUND_ITEMS_MESSAGE = '<i class="fas fa-book-dead fa-x3 mb-2"></i><p>No se encontraron busquedas...</p>';
const TRY_AGAIN_MESSAGE = '<i class="fas fa-exclamation-circle fa-x3 mb-2"></i><p>Intentelo de nuevo...</p>';

// Code execution starts here!

if(LA_PAGINA_ESTA_EN_SEARCH_RESULTS){
  let HAY_BUSQUEDAS_DE_LA_HOME = JSON.parse(localStorage.getItem('busquedas'));
  
  if(HAY_BUSQUEDAS_DE_LA_HOME){
    colocarPagination(HAY_BUSQUEDAS_DE_LA_HOME);

  }else{
    $publicationContainer.innerHTML = MENSAJE_DE_NOTIFICACION(LOOK_FOR_SOMETHING_MESSAGE)
  }
}else if(LA_PAGINA_SERVICIOS){
  let HAY_BUSQUEDAS_DE_LA_HOME = JSON.parse(localStorage.getItem('busquedasServicios'));

  if(HAY_BUSQUEDAS_DE_LA_HOME){
    colocarPagination(HAY_BUSQUEDAS_DE_LA_HOME);

  }else{
    $publicationContainer.innerHTML = MENSAJE_DE_NOTIFICACION(LOOK_FOR_SOMETHING_MESSAGE)
  }
}else if(LA_PAGINA_PRODUCTOS){
  let HAY_BUSQUEDAS_DE_LA_HOME = JSON.parse(localStorage.getItem('busquedasProductos'));

  if(HAY_BUSQUEDAS_DE_LA_HOME){
    colocarPagination(HAY_BUSQUEDAS_DE_LA_HOME);

  }else{
    $publicationContainer.innerHTML = MENSAJE_DE_NOTIFICACION(LOOK_FOR_SOMETHING_MESSAGE)
  }
}
