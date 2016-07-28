$('body').on('click', '.show-todolist-modal', function(event) {
	event.preventDefault();
	//show form create list
	 var me = $(this),
        url = me.attr('href'),
      title = me.attr('title');

    $('#todo-list-title').text(title);
    $('#todo-list-save-btn').text(me.hasClass('edit') ? 'Update' : 'Create New');
		$.ajax({
			url:url,
			dataType:'html',
			success:function(response){
				$('#todolist-body').html(response);
			}
		});
	$('#todolist-modal').modal('show');
});
$('.show-task-modal').click(function(event){
	event.preventDefault();
	$('#task-modal').modal('show');
});
// fungsi alert
function ShowSuccessMessage(message){

		$('#add-new-alert').text(message).fadeTo(1000,500).slideUp(500,function(){
			$(this).hide();
		});
}
//fungsi hitung record
function recordCounter(){
	var total = $('.list-group-item').length;
	$('#todolist-counter').text(total).next().text(total>1 ? 'records' : 'record');
}
//event handler untuk bug press enter
//supaya tidak bisa langsung enter di task modal
$('#todolist-modal').on('keypress',":input:not(textarea)",function(event){
	//13 merupakan code dari tombol enter
	return event.keyCode !=13 ;
})
$('#todolist-save').click(function(event){
		event.preventDefault();

		var form = $('#todolist-body form');
		var	url = form.attr('action');
		var	method= 'POST';
		//untuk mereset atau menghapus pesan error ketika validasi
		form.find('.help-block').remove();
		form.find('.form-group').removeClass('has-error');
		$.ajax({
			url:url,
			method:method,
			//serialize utk mengambil semua isi form dalam bentuk url encode
			data:form.serialize(),
			success:function(response){
				$('#todolist').prepend(response);
				ShowSuccessMessage("Todolist Created");
				recordCounter();
				$('#todolist-modal').modal('hide');

			},
			error:function(xhr){
				var errors = xhr.responseJSON;
           		if ($.isEmptyObject(errors) !== true) {
                 $.each(errors, function(key, value) {
                 	if(key=='title'){
                 		 $('#todolist-body form input[name='+key+']')
                          .closest('.form-group')
                          .addClass('has-error')
                          .append('<span class="help-block"><strong>' + value + '</strong></span>');
                      }else{
                      		 $('#todolist-body form textarea[name='+key+']')
                          .closest('.form-group')
                          .addClass('has-error')
                          .append('<span class="help-block"><strong>' + value + '</strong></span>');
                      }
                     
                  });
              }
				
			}

		});
});
//iCheck config
$(function(){
	$('input[type=checkbox]').iCheck({
		checkboxClass:'icheckbox_square-blue',
		increaseArea:'20%',
	});
	$('#check-all').on('ifChecked',function(e){

		$('.check-item').iCheck('check');
	});
	$('#check-all').on('ifUnchecked',function(e){

		$('.check-item').iCheck('uncheck');
	})
});