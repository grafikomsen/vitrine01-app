const nav = document.querySelector('nav');

window.addEventListener('scroll', function () {
    if (window.pageYOffset > 100) {
        nav.classList.add('bgprimary', 'shadow');
    } else {
        nav.classList.remove('bgprimary', 'shadow');
    }
});