const nav = document.querySelector('nav');

window.addEventListener('scroll', function () {
    if (window.pageYOffset > 100) {
        nav.classList.add('bgprimary', 'shadow');
    } else {
        nav.classList.remove('bgprimary', 'shadow');
    }
});

// OWL CAROUSEL
var owl = $('.owl-carousel');

owl.owlCarousel({
    items:1,
    loop:true,
    margin:100,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});

$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
