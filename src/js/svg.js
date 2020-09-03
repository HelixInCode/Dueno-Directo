const svgContainers = {
  bedroom: document.getElementsByClassName('bedroom-icon'),
  area: document.getElementsByClassName('area-icon'),
  bathroom: document.getElementsByClassName('bathroom-icon'),
  parking: document.getElementsByClassName('parking-icon')
}
const icons = {
  bedroom: `<svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
  <g>
    <path d="m42.49 286.452h427.02c17.6 0 31.867-14.267 31.867-31.867 0-17.6-14.267-31.867-31.867-31.867h-427.02c-17.6 0-31.867 14.267-31.867 31.867-.001 17.6 14.267 31.867 31.867 31.867z"/>
    <path d="m287.867 153.983c-9.301 0-16.867 7.566-16.867 16.867v21.867h130.539v-21.867c0-9.301-7.566-16.867-16.867-16.867z"/>
    <path d="m80.46 170.851c0-25.843 21.024-46.867 46.867-46.867h96.805c12.298 0 23.498 4.768 31.867 12.544 8.369-7.776 19.569-12.544 31.867-12.544h96.805c25.843 0 46.867 21.024 46.867 46.867v21.867h48.689v-103.32c0-17.6-14.268-31.867-31.867-31.867h-384.721c-17.6 0-31.867 14.267-31.867 31.867v103.32h48.688z"/>
    <path d="m127.328 153.983c-9.301 0-16.867 7.566-16.867 16.867v21.867h130.539v-21.867c0-9.301-7.566-16.867-16.867-16.867z"/>
    <path d="m0 316.452v138.017h30v-54.697h452v54.697h30v-138.017z"/>
  </g>
</svg>`,
  area: `<svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512">
  <g>
    <path d="M496,88a8,8,0,0,0,8-8V16a8,8,0,0,0-8-8H432a8,8,0,0,0-8,8V40H296V16a8,8,0,0,0-8-8H224a8,8,0,0,0-8,8V40H88V16a8,8,0,0,0-8-8H16a8,8,0,0,0-8,
      8V80a8,8,0,0,0,8,8H40V216H16a8,8,0,0,0-8,8v64a8,8,0,0,0,8,8H40V424H16a8,8,0,0,0-8,8v64a8,8,0,0,0,8,8H80a8,8,0,0,0,8-8V472H216v24a8,8,0,0,0,8,
      8h64a8,8,0,0,0,8-8V472H424v24a8,8,0,0,0,8,8h64a8,8,0,0,0,8-8V432a8,8,0,0,0-8-8H472V296h24a8,8,0,0,0,8-8V224a8,8,0,0,0-8-8H472V88ZM232,
      24h48V72H232ZM24,72V24H72V72Zm0,208V232H72v48ZM72,488H24V440H72Zm208,0H232V440h48Zm144-56v24H296V432a8,8,0,0,0-8-8H224a8,8,0,0,0-8,8v24H88V432a8,
      8,0,0,0-8-8H56V296H80a8,8,0,0,0,8-8V224a8,8,0,0,0-8-8H56V88H80a8,8,0,0,0,8-8V56H216V80a8,8,0,0,0,8,8h64a8,8,0,0,0,8-8V56H424V80a8,8,0,0,0,8,
      8h24V216H432a8,8,0,0,0-8,8v64a8,8,0,0,0,8,8h24V424H432A8,8,0,0,0,424,432Zm64,8v48H440V440Zm0-208v48H440V232ZM440,72V24h48V72Z"/>
    <path d="M264,248V200a8,8,0,0,0-16,0v48H200a8,8,0,0,0,0,16h48v48a8,8,0,0,0,16,0V264h48a8,8,0,0,0,0-16Z"/>
    <path d="M256,160a96,96,0,1,0,96,96A96.115,96.115,0,0,0,256,160Zm0,176a80,80,0,1,1,80-80A80.093,80.093,0,0,1,256,336Z"/>
  </g>
</svg>`,
  bathroom: `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
  viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
<g>
  <path d="M449.633,271H61v45c0,37.603,19.995,72.924,51.885,91.601l-21.431,85.767C89.081,502.799,96.233,512,106,512h210
    c9.767,0,16.919-9.201,14.546-18.633l-18.354-73.447C385.863,408.123,442.737,346.183,449.633,271z"/>
</g>
</g>
<g>
<g>
  <path d="M451,181H271v60h180c16.569,0,30-13.433,30-30C481,194.431,467.569,181,451,181z"/>
</g>
</g>
<g>
<g>
  <rect x="61" y="90" width="180" height="151"/>
</g>
</g>
<g>
<g>
  <path d="M241,0H61C44.431,0,31,13.431,31,30v15c0,8.284,6.716,15,15,15h210c8.284,0,15-6.716,15-15V30C271,13.431,257.569,0,241,0
    z"/>
</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
              </svg>`,
  parking: `<svg id="Capa_1" enable-background="new 0 0 510 510" height="512" viewBox="0 0 510 510" width="512" xmlns="http://www.w3.org/2000/svg">
  <g>
    <path d="m255 1.615-255 127.5v379.271h510v-379.271zm225 476.77h-450v-330.729l225-112.5 225 112.5z"/><path d="m150 298.385h30v30h-30z"/>
    <path d="m330 298.385h30v30h-30z"/>
    <path d="m153.686 133.385-32.353 113.235c-18.701 10.74-31.333 30.9-31.333 53.968v57.797 30 60h90v-60h150v60h90v-60-30-57.797c0-23.068-12.632-43.228-31.333-53.968l-32.353-113.235zm180 30 21.429 75h-200.229l21.429-75zm-183.686 255h-30v-30h30zm240 0h-30v-30h30zm0-60h-60-150-60v-57.797c0-17.757 14.446-32.203 32.203-32.203h205.594c17.757 0 32.203 14.446 32.203 32.203z"/>
  </g>
</svg>`
}

const insertarIconos = (clase, icono) =>{
  const $html = document.implementation.createHTMLDocument();
  $html.body.innerHTML = icono
  clase.append($html.body.children[0])
}

const renderizarIconos = () =>{

  for (const tipoSVG in svgContainers) {

    svgContainers[tipoSVG].forEach((container) => {

      if(!container.children[1]){
        insertarIconos(container, icons[tipoSVG])
      }
    });

  }
}
renderizarIconos();