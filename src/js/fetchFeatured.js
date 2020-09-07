(async()=>{
  let LIMITE_DE_PUBLICACIONES = 6;
  printLoaders($publicationContainer, LIMITE_DE_PUBLICACIONES);
  try {
    const response = await fetch('process/consultaPropiedades.php');
    const datos = await response.json();
    printPublications($publicationContainer, datos, LIMITE_DE_PUBLICACIONES);
    renderizarIconos();
      
  } catch (error) {
    modalError('Ha habido un error al traer las publicaciones, intentelo de nuevo')
    $publicationContainer.innerHTML = `<div class="text-center font-weight-bold errorMessage">Intentelo de nuevo...</div>`
  }
})();