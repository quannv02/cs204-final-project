window.addEventListener('scroll', function () {
    let navbar = document.querySelector('nav');
    let windowPosition = window.scrollY > 0;
    navbar.classList.toggle('after-scroll', windowPosition);
})