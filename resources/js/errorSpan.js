let button_error_close = document.querySelector("#button-error-close");
let auth_error_box = document.querySelector('.auth-error-box');

button_error_close.addEventListener('click', ()=>{
    if(auth_error_box){
        auth_error_box.classList.add('hidden')
    }
})
