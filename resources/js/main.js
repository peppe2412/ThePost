document.addEventListener('DOMContentLoaded', () => {

    function toggleDropdown() {
        let dropdown = document.querySelector('#dropdown')
        dropdown.classList.toggle('hidden')
    }

    window.addEventListener('click', (event) => {
        let dropdown = document.querySelector('#dropdown')
        let button = document.querySelector('#dropdown-btn')
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden')
        }
    })

    window.toggleDropdown = toggleDropdown;


    

})