import './bootstrap';
import '~resources/scss/app.scss'

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

// gestione immagini build
import.meta.glob([
    '../img/**'
])

const switcher = document.getElementById('handle-image');
const imageInput = document.getElementById('image');
const fileWrapper = document.querySelector('#image-wrapper');
const image = document.getElementById('image-field');


switcher.addEventListener('change', function(){
    if(switcher.checked){
        fileWrapper.classList.remove('d-none');
        fileWrapper.classList.add('d-block')
    }else {
        fileWrapper.classList.remove('d-block');
        fileWrapper.classList.add('d-none')
    }
});

imageInput.addEventListener('change', showImg);


function showImg(event){
    if(event.target.files.length > 0){
        const src = URL.createObjectURL(event.target.files[0]);
        image.src = src;
    }
}