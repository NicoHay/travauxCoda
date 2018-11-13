STICKYNAV = {

    elements: "",
    top: "",
    scrollY: "",
    hasScrollClass: "",
    fakediv: "",
    rect: "",



    init: function() {

        window.addEventListener('scroll', STICKYNAV.onScroll);
        window.addEventListener('resize', STICKYNAV.onResize);


        STICKYNAV.scrollY = function() {
            //compatibilité navigateurs
            var supportPageOffset = window.pageXOffset !== undefined;
            var isCSS1Compat = ((document.compatMode || "") === "CSS1Compat");
            return supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;

        }



        STICKYNAV.elements = document.querySelector('#header');


        STICKYNAV.rect = STICKYNAV.elements.getBoundingClientRect()
        STICKYNAV.top = STICKYNAV.rect.top + STICKYNAV.scrollY();

        STICKYNAV.fakediv = document.createElement('div');
        STICKYNAV.fakediv.style.width = STICKYNAV.rect.width + "px";
        STICKYNAV.fakediv.style.height = STICKYNAV.rect.height + "px";


    },

    onScroll: function() {

        STICKYNAV.hasScrollClass = STICKYNAV.elements.classList.contains('fixed');


        if (STICKYNAV.scrollY() > STICKYNAV.top && !STICKYNAV.hasScrollClass) {

            STICKYNAV.elements.classList.add('fixed');
            STICKYNAV.elements.style.width = STICKYNAV.rect.width + "px";
            STICKYNAV.elements.parentNode.insertBefore(STICKYNAV.fakediv, STICKYNAV.elements)


        } else if (STICKYNAV.scrollY() < STICKYNAV.top && STICKYNAV.hasScrollClass) {

            STICKYNAV.elements.classList.remove('fixed');
            STICKYNAV.elements.parentNode.removeChild(STICKYNAV.fakediv)


        }

    },
    onResize: function() {

        STICKYNAV.elements.style.width = "";
        STICKYNAV.elements.classList.remove('fixed');
        STICKYNAV.fakediv.style.display = "none";
        STICKYNAV.rect = STICKYNAV.elements.getBoundingClientRect()
        STICKYNAV.top = STICKYNAV.rect.top + STICKYNAV.scrollY();
        STICKYNAV.fakediv.style.width = STICKYNAV.rect.width + "px";
        STICKYNAV.fakediv.style.height = STICKYNAV.rect.height + "px";
        STICKYNAV.fakediv.style.display = "block";


        STICKYNAV.onScroll();


    },



}
window.onload = STICKYNAV.init;