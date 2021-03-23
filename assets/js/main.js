$.fn.select2.defaults.set("theme", "bootstrap");
$(".locationMultiple").select2({
    width: null
})


$('.prd-detail-slide').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: false,
    autoplay: true,

    autoplaySpeed: 3000,
    arrows: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: false
            }
        }
    ]
});


$('.slide-banner').slick({
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false
});

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    infinite: false,
    centerMode: true,
    focusOnSelect: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                dots: false
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: false
            }
        }
    ]
});

// $('#handleCounter').handleCounter();
// $('#handleCounter').handleCounter({
//     minimum: 1,
//     maximize: null,
// });
// $('#handleCounter').handleCounter({
//     onChange: function() {},
//     onMinimum: function() {},
//     onMaximize: function() {}
// })


function numberToCurrency(number) {
    return number.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
}

function currencyToNumber(str) {
    return Number(str.replaceAll(".", ""));
}


$(document).ready(function() {
    $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function() {
        $(this).closest('.select-outline').find('label').toggleClass('active');
        $(this).closest('.select-outline').find('.caret').toggleClass('active');
    });


    // $('.addToWishList').click(function() {
    //     var url = $('.addToWishList').css('background-image').replace(/^url\(['"](.+)['"]\)/, '$1');
    //     if (url.indexOf("1.svg") != -1) {
    //         $('.addToWishList').css('background-image', 'url(' + url.replace("Heart_product_1.svg", "Heart_product_2.svg") + ')');
    //     } else {
    //         $('.addToWishList').css('background-image', 'url(' + url.replace("2.svg", "1.svg") + ')');
    //     }
    // });
});

function addWishList(id_product) {
    var event = '';
    var url = $('#addToWishList-' + id_product).css('background-image').replace(/^url\(['"](.+)['"]\)/, '$1');
    if (url.indexOf("1.svg") != -1) {
        $('#addToWishList-' + id_product).attr('style', 'background-image:url("' + url.replace("1.svg", "2.svg") + '") !important');
        var dataAdd = {
            id_product: id_product,
            add: ""
        };
        event = 'add';
    } else {
        $('#addToWishList-' + id_product).attr('style', 'background-image:url("' + url.replace("2.svg", "1.svg") + '") !important');
        var dataAdd = {
            id_product: id_product,
            remove: ""
        };
        event = 'remove';
    }
    $.ajax({
        url: "wishList.php",
        type: 'POST',
        cache: false,
        data: dataAdd,
        success: function() {
            event == 'add' ? $("#countLike").text(Number($("#countLike").text()) + 1) : $("#countLike").text(Number($("#countLike").text()) - 1);
        }
    })
};

function removeWishItem(id_product) {
    $.ajax({
        url: "wishList.php",
        type: 'POST',
        cache: false,
        data: {
            id_product: id_product,
            remove: ""
        },
        success: function() {

            $("#number_cart-detail").text(Number($("#number_cart-detail").text()) - 1);
            document.location = "wishList.php"
        }
    })
};