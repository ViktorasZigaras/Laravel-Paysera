/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const productPhotoInput = '<hr><br><input type="file" name="image[]"></input>';

const addPhotoButton = document.querySelector('#add-product-image');
const productPhotoInputsArea = document.querySelector('#product-image-inputs-area');

if (addPhotoButton) {
    addPhotoButton.addEventListener('click', () => {
        const input = document.createElement('span');
        input.innerHTML = productPhotoInput;
        productPhotoInputsArea.appendChild(input);
    });
}

///////

document.querySelectorAll('.add-button').forEach( (button) => {
    button.addEventListener('click', () => {
        const form = button.closest('.form');
        const route = form.querySelector('[name=route]').value;
        const id = form.querySelector('[name=product_id]').value;
        const count = form.querySelector('[name=count]').value;

        axios.post(route, {
            product_id: id,
            count: count,
        }).then( (response) => {  
            const cart = document.querySelector('#cart-count');
            cart.innerHTML = response.data.html;
            console.log(response);
        })
        .catch( (error) => {console.log(error);} );
    });
});
    
        // const input = document.createElement('span');
        // input.innerHTML = productPhotoInput;
        // productPhotoInputsArea.appendChild(input);