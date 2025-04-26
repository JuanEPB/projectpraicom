document.addEventListener("DOMContentLoaded", function() {
    var header = document.querySelector("header");
    
    window.addEventListener("scroll", function() {
        if (window.scrollY > 50) { 
            header.classList.add("solid");
            header.classList.remove("transparent");
        } else {
            header.classList.add("transparent");
            header.classList.remove("solid");
        }
    });
});

