
document.addEventListener("DOMContentLoaded", function () {
        // Your JavaScript code here
        const menuToggle = document.querySelector(".menu-toggle");
        const navContainer = document.querySelector(".nav-container");
        const readMoreLink = document.getElementById("read-more-link");
        const moreInfoDiv = document.getElementById("more-info");

        menuToggle.addEventListener('click', () => {
            navContainer.classList.toggle('show-menu');
            menuToggle.classList.toggle('active');
        });

        readMoreLink.addEventListener("click", function(e){
            e.preventDefault();
            moreInfoDiv.classList.toggle("hidden");

            /Toggle the link text/
            if (moreInfoDiv.classList.contains("hidden")) {
                readMoreLink.textContent = "Read more";
            } else {
                readMoreLink.textContent = "Read less";
            } 
        })
});
 