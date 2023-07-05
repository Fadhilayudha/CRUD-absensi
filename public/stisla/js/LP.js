const navbar = document.getElementsByTagName('nav')[0];
window.addEventListener('scroll', function() {
    console.log(window.scrollY);
    if (this.window.scrollY > 1) {
        navbar.classList.replace('bg-transparent', 'nav-color');
    } else if (this.window.scrollY <= 0 ) {
        navbar.classList.replace('nav-color', 'bg-transparent')
    }
});


// const li=document.querySelectorAll("nav-link");
// const sec=document.querySelectorAll("section");

// function activeMenu(){
//   let len=sec.length;
//   while(--len && window.scrollY + 97 < sec[len].offsetTop){}
//   li.forEach(ltx => ltx.classList.remove("active"));
//   li[len].classList.add("active");
// }
// activeMenu();
// window.addEventListener("scroll", activeMenu);



$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        700: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});

function carousel() {
    $.js('timeline-carousel').slick({
        infinite: false,
        arrows: false,
        dots: true,
        autoplay: false,
        speed: 1100,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
        {
            breakpoint: 800,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            }
        }]
    });
    }

    carousel();