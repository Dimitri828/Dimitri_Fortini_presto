// Accordion
const tabs = document.querySelectorAll(".accordion-tab");
const panels = document.querySelectorAll(".panel");


tabs.forEach(tab => {

    tab.addEventListener("click",()=>{

        tabs.forEach(t=>t.classList.remove("active"));
        panels.forEach(p=>p.classList.remove("active"));


        tab.classList.add("active");

        document
        .getElementById(tab.dataset.tab)
        .classList.add("active");

    });

});

// collapse-custom


document.addEventListener("click", function (event) {

    const navbar = document.querySelector(".navbar");
    const categories = document.querySelector("#categoriesMenu");
    const languages = document.querySelector("#languagesMenu");

    if (!navbar.contains(event.target)) {

        categories.classList.remove("show");
        languages.classList.remove("show");

    }

});


// accordion mobile
const mobileItems = document.querySelectorAll('.mobile-item');

mobileItems.forEach(item => {

    item.querySelector('.mobile-header').addEventListener('click', () => {
        item.classList.toggle('active');
    });

});

