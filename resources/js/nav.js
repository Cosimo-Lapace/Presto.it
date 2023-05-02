(function () {
    /* navbar*/
    let elementoNavbar = document.getElementById("navscroll");
        document.addEventListener("scroll", function(event) {
            let scrollAttualeVerticale = window.scrollY;

            if (scrollAttualeVerticale > 60) {
                elementoNavbar.classList.add("m-0")
            }
            else {
                elementoNavbar.classList.remove("m-0");
            }
        })
    }
) ()

