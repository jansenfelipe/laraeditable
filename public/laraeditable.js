$(function () {
    $.ajaxSetup({
        beforeSend: function (xhr, settings) {
            if (settings.type == 'POST' || settings.type == 'PUT' || settings.type == 'DELETE') {

                if (!(/^http:.*/.test(settings.url) || /^https:.*/.test(settings.url))) {
                    // Only send the token to relative URLs i.e. locally.
                    xhr.setRequestHeader("X-XSRF-TOKEN", getCookie('XSRF-TOKEN'));
                }
            }
        }
    });


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

    $('.laraimgeditable').each(function () {

        //Desabilitando possivel link
        $(this).parent().click(function (e) {
            e.preventDefault();
        });

        //Efeito
        $(this).hover(function () {
            $(this).fadeTo(500, 0.5);
        }, function () {
            $(this).fadeTo(500, 1);
        });

        $(this).click(function () {
            if (confirm("Deseja realmente trocar essa imagem? \n\nTamanho: " + $(this).attr('width') + " x " + $(this).attr('height') + " pixels")) {
                var form = $('<form style="display: none;" action="/laraimgeditable" method="POST" enctype="multipart/form-data">' +
                        '<input type="hidden" name="_token" value="' + getCookie('XSRF-TOKEN') + '">' +
                        '<input type="text" name="id" value="' + $(this).attr('id') + '"  />' +
                        '<input type="text" name="view" value="' + $(this).attr('view') + '"  />' +
                        '<input type="text" name="width" value="' + $(this).attr('width') + '"  />' +
                        '<input type="text" name="height" value="' + $(this).attr('height') + '"  />');

                var file = $('<input type="file" name="imagem" />');
                form.append(file);

                $('body').append(form);

                file.change(function () {
                    $(this).parent().submit();
                });

                file.click();
            }
        });

    });
});

function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie != '') {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = jQuery.trim(cookies[i]);
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) == (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}