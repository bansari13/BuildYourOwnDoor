    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script>
        $("#owl1").owlCarousel({
            autoPlay: true,
            items: 1,
            pagination: true,
            paginationSpeed: 150,
            itemsMobile: [480, 1],
            itemsDesktopSmall: [980, 1],
            itemsTablet: [768, 1],
        });
    </script>
    <script>
        $("#owl2").owlCarousel({
            autoPlay: true,
            items: 1,
            pagination: true,
            paginationSpeed: 150,
            itemsMobile: [480, 1],
            itemsDesktopSmall: [980, 1],
            itemsTablet: [768, 1],
        });
    </script>
    <script>
        function replace() {
            document.getElementById("step1").style.display = "none";
            document.getElementById("step2").style.display = "block";
        }
    </script>
</body>
</html>