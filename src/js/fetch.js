const $publicationContainer = document.querySelector('#publications > .publications-container')

const publicationTemplate = (publicacion)=> {
  // const {nombre} = publicacion;
  const {idPropiedad} = publicacion;
  const {habitaciones} = publicacion;
  const {calle} = publicacion;
  const {banos} = publicacion;
  const {imagen1} = publicacion;
  const {dolar} = publicacion;
  // const {peso} = publicacion;
  // const {area_cubierta} = publicacion;
  const {area_total} = publicacion;
  const {cochera} = publicacion;
  
  return `<a href="publicacion-precarga.php?public=${idPropiedad}" class="publications-item">
  <div class="img-container">
      
    <img src="dist/images/${imagen1}" alt="">
    
    <div class="publications-address">
      <h5>${calle}</h5>
    </div>
    <div class="publications-price">
      <h6>$${parseFloat(dolar).toLocaleString()}</h6>
    </div>

    <div class="publications-features">
      
      <div href="#?" class="bedroom-icon">
        <span>${habitaciones}</span>
        <!-- icono insertado por svg.js -->
      </div>

      <div href="#?" class="area-icon">
        <span>${area_total}</span>
        <!-- icono insertado por svg.js -->
      </div>
      
      <div href="#?" class="bathroom-icon">
        <span>${banos}</span>
        <!-- icono insertado por svg.js -->
      </div>

      <div href="#?" class="parking-icon">
        <span>${cochera}</span>
        <!-- icono insertado por svg.js -->
      </div>

    </div>

  </div> 
</a>`
}
const printPublications = (container, datos) => {

  container.innerHTML = "";
  datos = [datos, datos, datos, datos, datos, datos, datos, datos, datos]

  if(Array.isArray(datos)){
    datos.forEach(publicacion => {
      container.innerHTML += publicationTemplate(publicacion)
    });
  }else{
    container.innerHTML += publicationTemplate(datos)
  }
}

for (let i = 0; i < 9; i++) {
  $publicationContainer.innerHTML += '<div class="publications-item-load"></div>'
}

(async ()=>{
  try {
    const response = await fetch('process/consultas.php');
    const datos = await response.json();
    printPublications($publicationContainer, datos);
    renderizarIconos();
  } catch (error) {
    modalError('Ha habido un error al traer las publicaciones, intentelo de nuevo')
    $publicationContainer.innerHTML = `<div class="text-center font-weight-bold errorMessage">Intentelo de nuevo...</div>`
  }
})()

// const crearPublicacion = (container, publicacion) =>{
//   const html = document.implementation.createHTMLDocument();
//   html.body.innerHTML = publicationTemplate(publicacion)
//   container.append(html.body.children[0])
// }