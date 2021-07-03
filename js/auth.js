$(function(){
	var dialog, form;

	dialog = $( "#login-form" ).dialog({
		autoOpen: false,
		width: 300,
		modal: true,
		draggable: false,
		resizable: false,
		buttons: {
			"Войти": function(){
				form.find( "[type=submit]" ).click();
			},
			"Отмена": function() {
				dialog.dialog( "close" );
			}
		},
		close: function() {
			form[ 0 ].reset();
		}
	});

	form = dialog.find( "form" );

	form.ajaxForm({
		//beforeSubmit:   showRequest,
		success:        function(responseText, statusText, xhr, $form){
			//console.log(responseText);
			if (responseText.status == 'OK') {
				$.cookie('authorizationSuccess', 1);
				window.location.reload();
			} else {
				dialog.find( ".validateTips").text(responseText.msg);
			}
		},
		dataType:       'json'
	});

	$( "#login" ).button().on( "click", function() {
		dialog.dialog( "open" );
	});
});