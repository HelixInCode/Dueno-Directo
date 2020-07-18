let selects = document.querySelector('#tipo');
let panels = document.querySelectorAll('.panelcontent');

selects.addEventListener('change', function(e){
    e.preventDefault();

    let selectedOption = this.options[selects.selectedIndex];
    //console.log(selectedOption.value + ':'+ selectedOption.text);

    if(selectedOption.value === 'propiedad'){

        panels[0].classList.add('active');
        panels[1].classList.remove('active');
        panels[2].classList.remove('active');
    
    }else if(selectedOption.value === 'profesional'){
        panels[1].classList.add('active');
        panels[0].classList.remove('active');
        panels[2].classList.remove('active');
    
    }else if(selectedOption.value === 'servicio'){
        panels[2].classList.add('active');
        panels[1].classList.remove('active');
        panels[0].classList.remove('active');
    }
});