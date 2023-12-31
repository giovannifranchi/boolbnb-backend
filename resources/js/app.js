import './bootstrap';
import '~resources/scss/app.scss'
import axios from 'axios';

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'
import { add } from 'lodash';

// gestione immagini build
import.meta.glob([
    '../img/**'
])

const apiUrl = 'https://api.tomtom.com/search/2/search/${this.searchText}.json?key=Svz7LipmreJVnHm9yFvS36THWzv1koFe&typeahead=true&limit=5`'

const switcher = document.getElementById('handle-image');
const imageInput = document.getElementById('image');
const fileWrapper = document.querySelector('#image-wrapper');
const image = document.getElementById('image-field');


// switcher.addEventListener('change', function(){
//     if(switcher.checked){
//         fileWrapper.classList.remove('d-none');
//         fileWrapper.classList.add('d-block')
//     }else {
//         fileWrapper.classList.remove('d-block');
//         fileWrapper.classList.add('d-none')
//     }
// });

// imageInput.addEventListener('change', showImg);


// function showImg(event){
//     if(event.target.files.length > 0){
//         const src = URL.createObjectURL(event.target.files[0]);
//         image.src = src;
//     }
// }


const addressField = document.getElementById('address-input');

addressField.addEventListener('input', async (e) => {
    const searchText = e.target.value;
    let foundOptions = [];
    const container = document.getElementById('autocompleteContainer');

    if (searchText) {
        const response = await axios.get(`http://127.0.0.1:8000/api/search/${searchText}`);
        if (response.data.results.length > 0) {
            if (container.children.length > 0) {
                container.innerHTML = '';
            }
            foundOptions = [];
            foundOptions = response.data.results;
            console.log(foundOptions);
            container.classList.remove('d-none');
            container.classList.add('d-block');
            foundOptions.forEach(result => {
                const listItem = document.createElement('li');
                const text = `${result.address.streetName || ''} ${result.address.municipality} ${result.address.country}`
                listItem.innerHTML = text;
                listItem.addEventListener('click', () => {
                    addressField.value = text;
                    container.classList.remove('d-block');
                    container.classList.add('d-none');
                    document.getElementById('address').value = result.address.streetName;
                    document.getElementById('city').value = result.address.municipality;
                    document.getElementById('state').value = result.address.country;
                    document.getElementById('longitude').value = result.position.lon;
                    document.getElementById('latitude').value = result.position.lat;
                });
                container.append(listItem);
            });
        }
    }
});




