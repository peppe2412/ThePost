document.addEventListener("DOMContentLoaded", () => {
    function toggleDropdown() {
        let dropdown = document.querySelector("#dropdown");
        dropdown.classList.toggle("hidden");
    }

    window.addEventListener("click", (event) => {
        let dropdown = document.querySelector("#dropdown");
        let button = document.querySelector("#dropdown-btn");
        if (
            !button.contains(event.target) &&
            !dropdown.contains(event.target)
        ) {
            dropdown.classList.add("hidden");
        }
    });

    window.toggleDropdown = toggleDropdown;

    let img_writer_effect = document.querySelector("#imgWriterHome");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 10) {
            img_writer_effect.classList.add("effect-img-home-writer");
        }
    });

    let imgScroll = [
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHXyzV23BMz6dEBxDc5oTS6-z0Lm9bMQpbZg&s",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMdM9MEQ0ExL1PmInT3U5I8v63YXBEdoIT0Q&s",
        "https://img.freepik.com/foto-gratuito/strumenti-sportivi_53876-138077.jpg",
        "https://imageio.forbes.com/specials-images/imageserve/5d3703e2f1176b00089761a6/2020-Chevrolet-Corvette-Stingray/0x0.jpg?crop=4560,2565,x836,y799,safe&height=399&width=711&fit=bounds",
        
    ];

    function scrollImage() {
        let container = document.querySelector("#containerScroll");
        container.innerHTML = "";

        let imgUse = [];
        for (let i = 0; i < 8; i++) {
            imgUse.push(...imgScroll);
        }


        imgUse.forEach((src, index) => {
            let img = document.createElement("img");
            img.src = src;
            img.alt = `${index}`;
            container.appendChild(img);
        });
    }

    window.onload = () => scrollImage();
});
