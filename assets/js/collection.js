/**
 * Created with JetBrains PhpStorm.
 * User: dem1k
 * Date: 12.09.12
 * Time: 22:54
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function () {
    $('a.check_box').bind('click', function () {
        $(this).parent().toggleClass('active');
        currentcheckbox = $(this).parent().find('input[type=checkbox]');
        if($(currentcheckbox).attr('checked'))
        {
            $(currentcheckbox).attr('checked',false)
        }
        else
        {
            $(currentcheckbox).attr('checked',true)
        }
        $(this).parents('form').submit();
    })
    $('a.check_box_sort').bind('click', function () {
        $('li.sort_btn').removeClass('active')
        $(this).parent().toggleClass('active');
        currentcheckbox = $(this).parent().find('input[type=checkbox]');
        $('input.checboxsort').attr('checked',false);
        if($(currentcheckbox).attr('checked'))
        {
            $(currentcheckbox).attr('checked',false)
        }
        else
        {
            $(currentcheckbox).attr('checked',true)
        }
        $(this).parents('form').submit();
    })
window.pager = function (page) {
    $('form.form_filters').append('<input type="hidden" name="page" value="' + page + '" />').submit();
}
    window.show_more_details = function(obj){
        url=$(obj).attr('href');
        $.get(url,function(data){
            $('div.show_ring').html(data).show();
        })
    }
window.reset_filters = function (filter) {
    $.each($(filter).parents('.parametrs').find('input:checked'),function(key,el){
        $(el).attr('checked',null);
    });
    $(filter).parents('form').submit();
}
})

