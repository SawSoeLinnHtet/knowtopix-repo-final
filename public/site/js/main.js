$(".owl-carousel").owlCarousel({
    loop: false,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 2,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 1,
        },
        1440: {
            items: 2,
        },
    },
});

$(".scrollTop").on("click", function () {
    window.scrollTo(0, 0);
});

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    breakpoints: {
        640: {
            slidesPerView: 8,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 8,
            spaceBetween: 10,
        },
        1024: {
            slidesPerView: 8,
            spaceBetween: 10,
        },
    },
});

function showPreview(event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        console.log(preview.src);
        preview.classList.add("d-block");
        preview.src = src;
    }
}
