/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';


import Places from 'places.js';
import { values } from 'lodash';
let inputAddress = document.querySelector('#bb_address')
if(inputAddress !== null){
 let place = Places
    ({
        container:inputAddress
    })
place.on('change',function(e){
    document.querySelector('#bb_city').values=e.suggestion.city
    document.querySelector('#bb_PostCode').values = e.suggestion.postCode
   document.querySelector('#bb_lat').values=e.suggestion.lat
   document.querySelector('#bb_lng').values=e.suggestion.lng
})
}