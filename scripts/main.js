$(document).ready(() => {

    'use strict';

    // for some reason, the arrow functions don't work here
    $('body').on('submit', 'form', function(e) {
        e.preventDefault();
        
        $.post($(this).attr('action'), $(this).serialize(), (response) => {
            if(response.error) {
                alert(response.error);
            }else {
                alert(`Product ${response.title} saved with id ${response.id}`);
                $(this).find('.input').each((index, element) => {
                    $(element).val('');
                });
            }
        }, 'json');
    });

});