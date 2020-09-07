const fetchServices = async(datosFiltros)=>{
  let LIMITE_DE_PUBLICACIONES = 12;
  printLoaders($publicationContainer, LIMITE_DE_PUBLICACIONES);
  try {
    const response = await fetch('process/consultaProF.php');
    const datos = await response.json();
    const foundItems = filtrarProductosServicios(datosFiltros, datos);

    if(foundItems.length > 0){

      localStorage.setItem('busquedasServicios', JSON.stringify(foundItems));
      const HAY_BUSQUEDAS_DE_LA_HOME = JSON.parse(localStorage.getItem('busquedasServicios'));
      colocarPagination(HAY_BUSQUEDAS_DE_LA_HOME);

    }else{
      modalError('Lo sentimos, no se encontraron con concordancias')
      $publicationContainer.innerHTML = MENSAJE_DE_NOTIFICACION(NO_FOUND_ITEMS_MESSAGE)
    }
      
  } catch (error) {
    modalError('Ha habido un error al traer las publicaciones, intentelo de nuevo')
    $publicationContainer.innerHTML = MENSAJE_DE_NOTIFICACION(TRY_AGAIN_MESSAGE)
  }
}