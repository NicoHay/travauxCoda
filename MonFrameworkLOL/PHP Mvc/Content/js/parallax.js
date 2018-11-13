    //  requestAnimationFrame method:
    window.requestAnimationFrame =
        window.requestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.msRequestAnimationFrame ||

        function(f) { setTimeout(f, 1000 / 60) }


    var layer1 = document.getElementById('layer1')
    var layer2 = document.getElementById('layer2')
    var layer3 = document.getElementById('layer3')
    var layer4 = document.getElementById('layer4')
    // var layer5 = document.getElementById('layer5')




    function parallax() {
        var scrolltop = window.pageYOffset // get number of pixels document has scrolled vertically 
        var Negscroll = scrolltop * -1

        layer1.style.top = Negscroll * 0.2 + 'px'
        layer1.style.transform = " translate3d( 0 , " + scrolltop * 0.010 + "px, 0)";
        layer2.style.top = Negscroll * 0.4 + 'px'
        layer2.style.transform = " translate3d( 0 , " + scrolltop * 0.020 + "px, 0)";
        layer3.style.top = Negscroll * 0.6 + 'px'
        layer3.style.transform = " translate3d( 0 , " + scrolltop * 0.030 + "px, 0)";
        layer4.style.top = Negscroll * 0.8 + 'px'
        layer4.style.transform = " translate3d( 0 , " + scrolltop * 0.040 + "px, 0)";
        // layer5.style.top = Negscroll * 1.1 + 'px'
        // layer5.style.transform = "translate3d( 0 , " + scrolltop * 0.050 + "px, 0)";


    }

    document.addEventListener('scroll', function() { // on page scroll
        requestAnimationFrame(parallax) // call parallax() on next available screen paint
    }, false)