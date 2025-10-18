let button_error_close = document.querySelector("#button-error-close");
let auth_error_box = document.querySelector(".auth-error-box");

button_error_close.addEventListener("click", () => {
    auth_error_box.classList.add("hidden");
});
