let question = document.querySelectorAll('.question');
let btnDropdown = document.querySelectorAll('.question .more')
let answer = document.querySelectorAll('.answer');
let parrafo = document.querySelectorAll('.answer p');
let container = document.querySelectorAll('.item-faq')

for ( let i = 0; i < btnDropdown.length; i ++ ) {

    let altoParrafo = parrafo[i].clientHeight;
    let switchc = 0;

    btnDropdown,question[i].addEventListener('click', () => {

        if ( switchc == 0 ) {
            
            answer[i].style.height = `${altoParrafo}px`;
            question[i].style.marginBottom = '15px';
            btnDropdown[i].innerHTML = '<i>-</i>';
            question[i].style.background ='rgba(212, 133, 133, 0.859)';
            container[i].style.boxShadow = '0 0 5px -1px rgba(0, 0, 0, 0.471)';
            container[i].style.marginBottom ='40px';
            // answer[i].style.height ='45px';
            switchc ++;

        }

        else if ( switchc == 1 ) {

            answer[i].style.height = `0`;
            question[i].style.marginBottom = '0';
            btnDropdown[i].innerHTML = '<i>+</i>';
            question[i].style.background ='';
            container[i].style.boxShadow = '';
            container[i].style.marginBottom ='';    
            switchc --;

        }

    })

}