document.addEventListener("DOMContentLoaded", () => {
    // Dropdown navbar
    function toggleDropdown() {
        let dropdown = document.querySelector("#dropdown");
        dropdown.classList.toggle("hidden");
    }

    window.addEventListener("click", (event) => {
        let dropdown = document.querySelector("#dropdown");
        let button = document.querySelector("#dropdown-btn");
        if (dropdown && button) {
            if (
                !button.contains(event.target) &&
                !dropdown.contains(event.target)
            ) {
                dropdown.classList.add("hidden");
            }
        }
    });

    window.toggleDropdown = toggleDropdown;

    // Effetto immagine writer home
    let img_writer_effect = document.querySelector("#imgWriterHome");

    if (img_writer_effect) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 0) {
                img_writer_effect.classList.add("effect-img-home-writer");
            }
        });
    }

    // Effetto scroll home
    let imgScroll = [
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHXyzV23BMz6dEBxDc5oTS6-z0Lm9bMQpbZg&s",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMdM9MEQ0ExL1PmInT3U5I8v63YXBEdoIT0Q&s",
        "https://img.freepik.com/foto-gratuito/strumenti-sportivi_53876-138077.jpg",
        "https://imageio.forbes.com/specials-images/imageserve/5d3703e2f1176b00089761a6/2020-Chevrolet-Corvette-Stingray/0x0.jpg?crop=4560,2565,x836,y799,safe&height=399&width=711&fit=bounds",
    ];

    function ImagesScroll(repeat = 0) {
        let container = document.querySelector("#containerScroll");
        if (!container) return;
        container.innerHTML = "";

        let imagesUse = [];
        for (let i = 0; i < repeat; i++) {
            imagesUse = imagesUse.concat(imgScroll);
        }

        imagesUse.forEach((src, index) => {
            let image = document.createElement("img");
            image.src = src;
            image.alt = `${index}`;
            container.appendChild(image);
        });

        container.addEventListener("scroll", () => {
            if (container.scrollLeft >= container.scrollWidth / 2) {
                container.scrollLeft = 0;
            }
        });
    }

    window.onload = () => ImagesScroll(4);

    // Effetto immagini pagina careers
    let imgCareers = document.querySelectorAll(".careers-img");

    let observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("effect-careers-img");
                    entry.target.classList.remove("opacity-0");
                }
            });
        },
        {
            threshold: 0.2,
        }
    );

    imgCareers.forEach((imgCar) => observer.observe(imgCar));

    //Link careers form
    let formCareersLink = document.querySelector("#link-form-careers");
    let formCareers = document.querySelector("#careers-form");

    if (formCareersLink && formCareers) {
        window.addEventListener("scroll", () => {
            let getBound = formCareers.getBoundingClientRect();

            if (getBound.top < window.innerHeight) {
                formCareersLink.classList.add("opacity-0");
            } else {
                formCareersLink.classList.remove("opacity-0");
            }
        });
    }

    // Mostra password
    let password_input = document.querySelector("#password");
    let view_password = document.querySelector("#togglePassword");
    let open_eye = document.querySelector('#eyeOpen')
    let close_eye = document.querySelector('#eyeClose')

    view_password.addEventListener("click", () => {
        const type = password_input.getAttribute('type') == 'password' ? 'text' : 'password'
        password_input.setAttribute('type', type)
        if(type == 'text'){
            open_eye.classList.add('hidden')
            close_eye.classList.remove('hidden')
        } else{
            open_eye.classList.remove('hidden')
            close_eye.classList.add('hidden')
        }
    });
});
