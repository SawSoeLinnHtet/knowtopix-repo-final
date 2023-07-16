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

function toggleOverflow() {
    document.getElementById("app").classList.toggle("overflow-hidden");
}

$(document).ready(function () {
    $(document).on('change', '#photo', function () {
        var file = this.files[0];
        if (file) {
            console.log('hello');
            let reader = new FileReader();
            reader.onload = function (event) {
                $(".imgPreview").addClass("d-block");
                $(".imgPreview").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });  
})
