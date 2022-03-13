var EncontrarGanhador = function () {

    var findCampanhas = function() {
        $.get(window.api_url + 'campanhas/lista/?token=' + window.user_token + '&usuario=' + window.user_email,{},function(data){
			if ( data.status != 'ok' ) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.msg,
				})
			} else {
                $.each(data.dados,function(index, el){
                    $('select[name="data[campanha_id]"]').append('<option value="'+el['Campanha']['id']+'">'+el['Campanha']['nome']+'</option>');
       
                })
			}
		});
    }

    var handleDepDrop = function() {
		$("#sorteio_id").depdrop({
			depends: ['campanha_id'],
			url: window.api_url + 'campanhas/sorteios_deep/?token=' + window.user_token + '&usuario=' + window.user_email,
			language: 'pt-BR'
		});
    }

	// validation using icons
	var handleValidation = function() {
		$("form#encontrar-ganhador button[type=submit]").click(function(e){
			e.preventDefault();
			$('form#encontrar-ganhador').submit();
		})
		// for more info visit the official plugin documentation:
		// http://docs.jquery.com/Plugins/Validation

			var form = $('form#encontrar-ganhador');
			var error = $('.alert-danger', form);
			var success = $('.alert-success', form);
			var warning = $('.alert-warning', form);

			form.validate({
				errorElement: 'span', //default input error message container
				errorClass: 'help-block help-block-error', // default input error message class
				focusInvalid: true, // do not focus the last invalid input
				ignore: "", // validate all fields including form hidden input
				rules: {
					// 'data[Usuario][senha]': {
					// 	required: true,
					// 	minlength: 6,
					// 	maxlength: 24
					// },
					// 'repetir_senha': {
					// 	required: true,
					// 	minlength: 6,
					// 	maxlength: 24,
					// },
				},

				invalidHandler: function (event, validator) { //display error alert on form submit
					success.hide();
					error.show();
					App.scrollTo(error, -200);
				},

				errorPlacement: function (error, element) { // render error placement for each input type
					var icon = $(element).parent('.input-icon').children('i');
					icon.removeClass('fa-check').addClass("fa-warning");
					icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
				},

				highlight: function (element) { // hightlight error inputs
					$(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
					tab_name = $(element).closest('.tab-pane').attr('id');
					$("a[href=#"+tab_name+"]").tab('show');
				},

				unhighlight: function (element) { // revert the change done by hightlight
					$(element).closest('.form-group').removeClass("has-error").addClass('has-success'); // remove error class to the control group
				},

				success: function (label, element) {
					var icon = $(element).parent('.input-icon').children('i');
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
					icon.removeClass("fa-warning").addClass("fa-check");
				},

				submitHandler: function (form) {

                    window.location.href = baseUrl+'Cupons/encontra_ganhador/'+$('select[name="data[campanha_id]"]').val()+"/"+$('select[name="data[sorteio_id]"]').val()+'/'+$('input[name="data[numero]"]').val();
					
				}
			});

	}

	var initMisc = function () {
		//$("select.select2").select2();
	}

	return {

		//main function to initiate the module
		init: function () {
            findCampanhas();
			handleValidation();
			handleDepDrop();
			initMisc();
		}

	};

}();

$(document).ready(function(){
	EncontrarGanhador.init();
});