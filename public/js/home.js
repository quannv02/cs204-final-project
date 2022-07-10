window.addEventListener("load", function() {
    document.querySelector(".hero-title").classList.add("appear");
    document.querySelector(".hero-btn").classList.add("appear");
});

window.addEventListener('scroll', function () {
    let navbar = document.querySelector('nav');
    if (window.innerWidth > 1125) {
        let windowPosition = (window.scrollY > 175 && window.scrollY < 565) || window.scrollY > 1200;
        navbar.classList.toggle('after-scroll', windowPosition);
    } else {
        let windowPosition = (window.scrollY > 175 && window.scrollY < 650) || window.scrollY > 1250;
        navbar.classList.toggle('after-scroll', windowPosition);
    }
})

window.addEventListener('scroll', function () {
    var elem = document.querySelector('.believe');
    var distInView = elem.getBoundingClientRect().top - window.innerHeight + 20;
    if (distInView < 0) {
        elem.classList.add("appear");
    }
})

window.addEventListener('scroll', function () {
    var elem = document.querySelector('.tracking');
    var distInView = elem.getBoundingClientRect().top - window.innerHeight + 20;
    if (distInView < 0) {
        elem.classList.add("appear");
    }
})