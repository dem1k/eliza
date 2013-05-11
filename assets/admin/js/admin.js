$(function(){
	
  //LOGIN (AUTHORIZE FORM)
  $("#auth").dialog({
    modal: true,
    title: 'Авторизация',
    width: '350px',
    draggable: true,
    resizable: false
  });			
$('.input_search, input#email').focus(function () {
    if ($(this).val() == $(this).attr('title')) {
        $(this).val('');
    }
})
});
