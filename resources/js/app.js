
require('./bootstrap');

////

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
        form.querySelector('[name=count]').value = 0;

        axios.post(route, {
            product_id: id,
            count: count,
        }).then( (response) => {  
            document.querySelector('#cart-count').innerHTML = response.data.html;
        })
        .catch( (error) => {console.log(error);} );
    });
});