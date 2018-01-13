


function clearInputErrors( form ) {
	if( form ) {
		$(form).find(".hint").remove();
		$(form).find(".has-error").removeClass("has-error");
	}
	else {
		$(".hint").remove();
		$(".has-error").removeClass("has-error");
	}
}



function showInputErrors( form, errors ) {
	var errorHintTpl = '<span class="hint small help-block"></span>';

	$.map(errors, function(error, name ) {
		var $errorHint = $( errorHintTpl).html( error );

		var $inputElement = $(form).find("[name="+name+"]");

		if( $inputElement ) {
			$inputElement.parent().append( $errorHint);

			$inputElement.click( function() {
				$errorHint.remove();
			});

			$inputElement.focus( function() {
				$errorHint.remove();
			});

			$inputElement.parent().addClass("has-error");
		}
	});
}





var setFormAjaxHandler = function( form, ajaxPath, onSuccess, onComplete, onBeforeSend) {

	form.submit( function () {
		data = new FormData(this);
		var thisForm = this;
		$.ajax({
			url: site_url+ajaxPath,
			type: 'post',
			data: data,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function() {
				showFader();
				if(typeof onBeforeSend === "function" ) onBeforeSend( thisForm, data );
			},
			success: function(data) {
				hideFader();
				if( data.success ) {
					clearInputErrors( thisForm );
					if(typeof onSuccess === "function" ) onSuccess( thisForm, data );
				} else {
					// remove all existed hints and clear errors
					clearInputErrors( thisForm );
					// add hints with error mesages
					showInputErrors( thisForm, data.errors );
				}

				if(data.values)
					$.map(data.values, function(element, indx ) {
						$(thisForm).find("[name="+indx+"]").val( element );
					});
			},
			error: handleAjaxError,
			complete: function(data) {
				if(typeof onComplete === "function" ) onComplete( thisForm, data );
			}
		});
		return false;
	});
}





function showFader() {
	//$('body').addClass('modal-open');
	$('body').append("<div class='form-fader'><div class='icon-loading'></div></div>");


	// ToDo decide to scroll or not here
	//$('body').scrollTop( 0 );
}

function hideFader() {
	$(".form-fader").remove();
}


function redirectWithMessage( url, message, type, waitClick ) {
	hideFader();

	if( !type ) type = 'success';

	if( !waitClick ) waitClick = false;

	if( !message )
		if( url ) message = "<div class='form-fader'><div class='icon-loading'></div></div>";
		else message = "<div class='form-fader'><div class='icon-loading'></div></div>";


	$('body')
		.addClass('modal-open')
		.append("<div class='form-fader'><div class='top-liner'><div class='cover-bg cover-teal'></div></div><div class='fader-message " + type + "'><span class='glyphicon glyphicon-ok'></span>" + message + "</div></div>")
		.scrollTop( 0 );

	var doRedirect = function() {
		if (url) location.href = url;
		else location.reload();
	}

	if( waitClick ) {
		$('.fader-message').append('<br /><div class="btn btn-md btn-info">Continue</div>');

		$('body').click( doRedirect );

	}
	else {
		setTimeout( doRedirect, 500);
	}


}

function ajaxRequest( options ) {
	$.ajax({
		url: options.url,
		type: options.type ? options.type : 'get',
		data: options.data,
		dataType: options.dataType ? options.dataType : "json",

		beforeSend: function(data) {
			showFader();
			if( typeof options.beforeSend === 'function') options.beforeSend();
		},

		success: function(data) {
			hideFader();
			if( typeof options.success === 'function') options.success( data );
		},
		error: handleAjaxError,
		complete: function(data) {
			if( typeof options.complete === 'function') options.complete( data );
		},
	});
}


function handleAjaxError(xhr, textStatus, thrownError) {
	hideFader();

	if( thrownError == 'Unauthorized' ) {
		redirectWithMessage( null, 'You\'ve been logged out. Please sign in again.' );
	}
	else {
		console.log( xhr );
		console.log( textStatus );
		console.log( thrownError );

		alert('Ah, shucks. Something went wrong. Please refresh the page and try that again...');
	}
}



