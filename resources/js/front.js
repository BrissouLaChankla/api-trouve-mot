document.addEventListener("DOMContentLoaded", function (event) {

    let burger = document.getElementById("burger");
    let sidebar = document.querySelector(".sidebar");
    let backdrop = document.getElementById("backdrop");
    let mobileLinks = document.querySelectorAll(".sidebar a")

    const toggleMobileMenu = () => {
        burger.classList.toggle("open");
        sidebar.classList.toggle("opened");
        if(window.innerWidth < 768) {
            backdrop.classList.toggle("d-none")
        }
        
    }

    backdrop.addEventListener("click", () => {
        toggleMobileMenu();
    })

    burger.addEventListener('click', () => {
        toggleMobileMenu();
    });

    mobileLinks.forEach(link => {
        link.addEventListener("click", () => {
            toggleMobileMenu();
        });
    });


});

