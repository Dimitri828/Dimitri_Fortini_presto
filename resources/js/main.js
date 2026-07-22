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


