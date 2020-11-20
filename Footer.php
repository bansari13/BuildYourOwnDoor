<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/konva/7.1.3/konva.min.js"></script>
<script src="js/CreateDoor.js"></script>
<script>
    $(".owl-carousel").owlCarousel({
        autoPlay: true,
        items: 1,
        pagination: true,
        paginationSpeed: 150,
        itemsMobile: [479, 2],
        itemsDesktopSmall: [1024, 1],
        itemsTablet: [768, 1]
    });
</script>
<script>
    function replace(hide, show) {
        var frameID=getCookie('FrameID');
        var designID=getCookie('DesignID');
        if (hide === 'step1' && frameID===null)
        {
            alert('Please select a frame');
        } 
        else if (hide === 'step2' && designID===null)
        {
            alert('Please select a design');
        } 
        else
        {
            document.getElementById(hide).style.display = "none";
            document.getElementById(show).style.display = "block";
        }
    }

    function getCookie(name) {
        var cookie = document.cookie;
        var prefix = name + "=";
        var begin = cookie.indexOf("; " + prefix);
        if (begin == -1) {
            begin = cookie.indexOf(prefix);
            if (begin != 0)
                return null;
        } else {
            begin += 2;
            var end = document.cookie.indexOf(";", begin);
            if (end == -1) {
                end = cookie.length;
            }
        }
        return unescape(cookie.substring(begin + prefix.length, end));
    }
</script>
</body>
</html>