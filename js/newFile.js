window.onscroll = function() {
    var menu = document.getElementById('fixed-menu');
    if (window.pageYOffset > 100) {
        menu.classList.add('sticky');
    } else {
        menu.classList.remove('sticky');
    }
};