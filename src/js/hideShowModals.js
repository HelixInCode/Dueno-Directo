const $HTMLcollectionModals = document.getElementsByClassName('modal');
const $HTMLcollectionShowModalsBtns = document.getElementsByClassName('showModal');

const convertirHTMLcollection = (HTMLcollection) => {
  let arreglo = [];
  for(let index = 0; index < HTMLcollection.length; index++){
    arreglo.push(HTMLcollection[index]);
  }
  return arreglo;
}

const $modals = convertirHTMLcollection($HTMLcollectionModals)
const $showModalsBtns = convertirHTMLcollection($HTMLcollectionShowModalsBtns)

$modals.forEach(item => {
  const $modal = item;

  const showHideModal = () =>{
    $modal.classList.toggle('hide');
  }

  const $closeModalBtn = $modal.getElementsByClassName('closeModal')[0];
  $closeModalBtn.addEventListener('click', showHideModal);

  const $showModalBtn = $showModalsBtns.find(btn => {
    return btn.classList.contains($modal.id);
    // return btn.dataset.modal === $modal.id;
  })

  if($showModalBtn !== undefined){
    $showModalBtn.addEventListener('click', showHideModal)
  }
})