const $publicationContainer = document.querySelector('#publications > .publications-container')

const printLoaders = (container) =>{
  const NUMERO_PUBLICACIONES_LOAD = 9;
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
const printPublications = (container, datos) => {
  console.log(datos)
  container.innerHTML = "";

  if(Array.isArray(datos)){
    datos.forEach(publicacion => {
      container.innerHTML += publicationTemplate(publicacion)
    });
  }else{
    container.innerHTML += publicationTemplate(datos)
  }
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
      console.log('Cumple la condicion');
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

      busqueda = document.createElement('div')  
      busqueda.className = datosFiltros['nombre'].toLowerCase();

      let html = document.createElement('div')
      html.className = publicacion['nombre'].toLowerCase();

      if(html.className.includes(busqueda.className)){
        cumpleCondicion(1)
        console.log(`la busqueda es exacta`)
      }else{
        
        for(let index = 0; index <= busqueda.classList.length; index++){
          if(html.className.includes(busqueda.classList[index])){
            if(busqueda.classList[index] !== 'de' &&
              busqueda.classList[index] !== 'el' &&
              busqueda.classList[index] !== 'la' &&
              busqueda.classList[index] !== 'los' &&
              busqueda.classList[index] !== 'las' &&
              busqueda.classList[index] !== 'y' &&
              busqueda.classList[index] !== 'en' &&
              busqueda.classList[index] !== 'del'){

              palabrasEncontradas.push(busqueda.classList[index])
              matchRate++;
            }
          }
        }
        if(matchRate > 0 && palabrasEncontradas != []){
          console.log(`hubieron ${matchRate} coincidencias`)
          console.log(`Las palabras encontradas fueron "${palabrasEncontradas.join(', ')}"`)
          cumpleCondicion(1)

        }else{
          console.log('No hubo coincidencias')
        }
      }
    }else{
      console.log('no se busco por nombre')
    }

    if(datosFiltros['precioMinimo'] !== undefined && datosFiltros['precioMaximo'] !== undefined){
          
      busqueda = datosFiltros['precioMinimo'].toLowerCase();
      busqueda2 = datosFiltros['precioMaximo'].toLowerCase();
      
      if(parseInt(busqueda) <= parseInt(publicacion['peso']) && parseInt(publicacion['peso']) <= parseInt(busqueda2)){
        cumpleCondicion(2)
        console.log('El precio esta entre ambos rangos')
      }else{
        console.log('No cumple la condicion')
      }
    }else if(datosFiltros['precioMinimo'] !== undefined){

      busqueda = datosFiltros['precioMinimo'].toLowerCase();
      console.log('precioMinimo fue ingresado')
      
      if(parseInt(busqueda) <= publicacion['peso']){
        cumpleCondicion(1)
      }else{
        console.log('No cumple la condicion')
      }
    }else if(datosFiltros['precioMaximo'] !== undefined){
      
      busqueda = datosFiltros['precioMaximo'].toLowerCase();
      console.log('precioMaximo fue ingresado')
      
      if(publicacion['peso'] <= parseInt(busqueda)){
        cumpleCondicion(1);
      }else{
        console.log('No cumple la condicion')
      }
    }else{
      console.log('ninguno de los dos fue ingresado')
    }

    verficacionCampo('tipo_propiedad')
    verficacionCampo('finalidad')
    verficacionCampo('banos')
    verficacionCampo('habitaciones')
    
    if(NUMERO_DE_DATOS_FILTRADOS === verificador){
      foundItems.push(datoEncontrado)
    }else{
      console.log('No cumple todas las condiciones')
    }
    console.log(foundItems)
  }
  return foundItems;
}
const fetchPrintPosts = async (datosFiltros)=>{

  printLoaders($publicationContainer);
  try {
    // const response = await fetch('query.php');
    
    const response = await fetch('process/consultaPropiedades.php');
    const datos = await response.json();
    const foundItems = filtrarDatos(datosFiltros, datos)
    
    printPublications($publicationContainer, foundItems);
    renderizarIconos();
  } catch (error) {
    modalError('Ha habido un error al traer las publicaciones, intentelo de nuevo')
    $publicationContainer.innerHTML = `<div class="text-center font-weight-bold errorMessage">Intentelo de nuevo...</div>`
  }
}
// Code execution starts here!

