/*
 * Application
 */

$(document).tooltip({
    selector: "[data-toggle=tooltip]"
})

/*
 * Auto hide navbar
 */
jQuery(document).ready(function($){

    var $header = $('.navbar-autohide'),
        scrolling = false,
        previousTop = 0,
        currentTop = 0,
        scrollDelta = 10,
        scrollOffset = 150

    $(window).on('scroll', function(){
        if (!scrolling) {
            scrolling = true

            if (!window.requestAnimationFrame) {
                setTimeout(autoHideHeader, 250)
            }
            else {
                requestAnimationFrame(autoHideHeader)
            }
        }
    })

    function autoHideHeader() {
        var currentTop = $(window).scrollTop()

        // Scrolling up
        if (previousTop - currentTop > scrollDelta) {
            $header.removeClass('is-hidden')
        }
        else if (currentTop - previousTop > scrollDelta && currentTop > scrollOffset) {
            // Scrolling down
            $header.addClass('is-hidden')
        }

        previousTop = currentTop
        scrolling = false
    }


    // AJAX Requests for Food/Drinks
    (function($){

        $('#FoodCategoriesFilter').on('change', 'input, select', function(){
            var $form = $(this).closest('form');
            $form.request();
        });

        $('#DrinkCategoriesFilter').on('change', 'input, select', function(){
            var $form = $(this).closest('form');
            $form.request();
        });

    })(jQuery);

    // JS Plugin niceSelect (/food-drinks)
        $('select').niceSelect();

   // Javascript to enable link to tab (/food-drinks, /contact-reservation)
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        } 
        // Change hash for page-reload 
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
            window.scrollTo(0, 0);
        })

    // show uploaded file on contact form
        $('#file-upload').bind('change', function() { var fileName = ''; fileName = $(this).val(); $('#file-selected').html(fileName); })

    // fancybox plugin
        $(".fancybox").fancybox({
            openEffect: 'elastic',
            closeEffect: 'elastic'
        });

});