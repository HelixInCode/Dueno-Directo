let tabs = document.querySelectorAll(".tablinks");
let panels = document.querySelectorAll(".tabcontent");

console.log(panels);

for(let i=0; i<tabs.length ; i++){
    tabs[i].addEventListener('click', function(event){
        event.preventDefault();

        document.querySelector('.tablinks.active').classList.remove('active');
        document.querySelector('.tabcontent.active').classList.remove('active');
        /* console.log('hiciste click en ' + panels[i].classList); */
        console.log('tab ' + tabs[i].classList);

        tabs[i].classList.add('active');
        panels[i].classList.add('active');

    })
}