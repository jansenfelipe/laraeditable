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
                var form = $('<form style="display: none;" action="/laraimgeditable" method="POST" enctype="multipart/form-data">'+
                        '<input type="text" name="id" value="'+ $(this).attr('id') +'"  />'+
                        '<input type="text" name="view" value="'+ $(this).attr('view') +'"  />'+
                        '<input type="text" name="width" value="'+ $(this).attr('width') +'"  />'+
                        '<input type="text" name="height" value="'+ $(this).attr('height') +'"  />');              
                
                var file = $('<input type="file" name="imagem" />');
                form.append(file);
                
                $('body').append(form);
                
                file.change(function(){
                   $(this).parent().submit();
                });
                
                file.click();
            }
        });

    });
});
