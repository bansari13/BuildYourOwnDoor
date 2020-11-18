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
    function replace(hide,show) {
        document.getElementById(hide).style.display = "none";
        document.getElementById(show).style.display = "block";
    }
</script>
</body>
</html>