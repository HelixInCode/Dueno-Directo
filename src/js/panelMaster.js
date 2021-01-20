let tabs = document.querySelectorAll(".nav-link");
let panels = document.querySelectorAll(".tab-pane");



for(let i=0; i<tabs.length ; i++){
    tabs[i].addEventListener('click', function(event){
        event.preventDefault();

        document.querySelector('.tab-pane.d-block').classList.remove('d-block');
        document.querySelector('.tab-pane.active').classList.add('d-none');



        //document.querySelector('.nav-link .active').classList.remove('active');
        //document.querySelector('.tab-pane').classList.remove('active');
        /* console.log('hiciste click en ' + panels[i].classList); */
        //console.log('tab ' + tabs[i].classList);

        tabs[i].classList.add('d-block');
        panels[i].classList.add('d-block');

    })
}