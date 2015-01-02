$(function () {
    $('.laraeditable').each(function () {
        $(this).attr('contenteditable', 'true');
    });

    $('.laraeditable').blur(function () {
        $.post('/laraeditable', {
            id: $(this).attr('id'),
            html: $(this).html(),
            view: $(this).attr('view') 
        });
    });
});
