$(document).ready(function() {
    "use strict";
    $('.add-u').click(function () {
        var htmlData = $('.clone').html();
        $('.increment').after(htmlData);
    });

    $('form').on('click', '.delete-u', function() {
        $(this).parents('.xpress').remove();
    })
});
