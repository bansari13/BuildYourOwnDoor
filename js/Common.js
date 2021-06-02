$(".owl-carousel").owlCarousel({
    autoPlay: true,
    items: 1,
    pagination: true,
    paginationSpeed: 150,
    itemsMobile: [479, 2],
    itemsDesktopSmall: [1024, 1],
    itemsTablet: [768, 1]
});

function resetPage() {
    deleteCookie('FrameID');
    deleteCookie('FrameName');
    deleteCookie('DoorID');
    deleteCookie('DesignID');
}

function replace(hide, show) {
    var frameID = getCookie('FrameID');
    var designID = getCookie('DesignID');
    if (hide === 'step1' && frameID === null)
    {
        alert('Please select a frame');
    } else if (hide === 'step2' && designID === null)
    {
        alert('Please select a design');
    } else if (show === 'step6')
    {
        saveCustomerDesign();
        debugger;
        document.getElementById(hide).style.display = "none";
        document.getElementById(show).style.display = "block";
    } else
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

function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function deleteCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
