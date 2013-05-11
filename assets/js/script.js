jQuery(function ($) {
    $('form#email_subscribe').live('submit',function(e){
//       console.info( $(this).find('input[name=email]').val());
        $.post("/subscribe/",
            {
                email:$(this).find('input[name=email]').val(),
                subscribe:'subscribe'
            },
            function(data){
            if(data.error)
            {
                alert (data.error);
            }
            else {
                alert(data.message);
            }
        },'json')
        e.preventDefault();
    })
    $('.input_search, input#email').focus(function () {
        if ($(this).val() == $(this).attr('title')) {
            $(this).val('');
        }
    })
        .blur(function () {
            if ($(this).val() == '') {
                $(this).val($(this).attr('title'));
            }
        });
    $('.button_search').click(function () {
        search_val=$('.input_search');
        if ($(search_val).val() != $(search_val).attr('title')) {
            if($('form.form_filters'))
            {
                $('form.form_filters')
                    .append('<input type="hidden" class="search" name="search" value="'+search_val+'" />')
                    .submit();
            }
            else
            {$('form.forma_search').submit}
        }else{
            alert('Введите артикул');
        }
    })


        $('.input_email')
            .focus(function () {
                if ($(this).val() == $(this).attr('title')) {
                    $(this).val('');
                }
            })
            .blur(function () {
                if ($(this).val() == '') {
                    $(this).val($(this).attr('title'));
                }
            })

        $(".faq_link a").click(function () {
            $(this).parent('li').toggleClass("open");
            return false;
        })
        $(".wrap_carousel").jCarouselLite({
            auto:2100,
            btnNext:".next",
            btnPrev:".prev",
            mouseWheel:true,
            visible:4,
            scroll:2,
            speed:700
        });

        $('.big_banner').click(function () {
            window.location = "/collection/";
        })


window.basket = function(basket){
    $.get('/basket/add?'+basket.serialize(),{},
        function(data){if(data){
            alert('добавлено в корзину');
            $('.right_header .no_background span').text(data)
        }
        })
}
    window.basket_remove = function(el){
    $.get($(el).attr('href'),{},function(data){if (data!=0){
        $(el).parents('tr').remove();
    }else{$('div.table_order').html('<h1 >Нет добавленных продуктов</h1>')}
    });
    }

});