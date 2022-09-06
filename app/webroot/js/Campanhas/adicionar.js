var Adicionar = function () {

	sorteios = new Array();
	n_sorteios = 0;

    // validation using icons
    var handleValidation = function() {

        var form = $('form#adicionar-campanha');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        var warning = $('.alert-warning', form);

        $("form#adicionar-campanha button[type=submit]").click(function(e){
            e.preventDefault();
            if ( sorteios.length == 0 ) {
                $("form#adicionar-campanha .alert-warning span.message").html("Você precisa adicionar pelo menos uma data de sorteio");
                warning.show();
                success.hide();
                error.hide();
                return false;
            }
            $('form#adicionar-campanha').submit();
        });

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            invalidHandler: function (event, validator) { //display error alert on form submit
                success.hide();
                error.show();
                App.scrollTo(error, -200);
            },

            // errorPlacement: function (error, element) { // render error placement for each input type
            //     var icon = $(element).parent('.input-icon').children('i');
            //     icon.removeClass('fa-check').addClass("fa-warning");
            //     icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            // },

            // highlight: function (element) { // hightlight error inputs
            //     $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            //     tab_name = $(element).closest('.tab-pane').attr('id');
            //     $("a[href=#"+tab_name+"]").tab('show');
            // },

            // unhighlight: function (element) { // revert the change done by hightlight
            //     $(element).closest('.form-group').removeClass("has-error").addClass('has-success'); // remove error class to the control group
            // },

            // success: function (label, element) {
            //     var icon = $(element).parent('.input-icon').children('i');
            //     $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
            //     icon.removeClass("fa-warning").addClass("fa-check");
            // },

            submitHandler: function (form) {

				$("form#adicionar-campanha input[type=hidden].sorteio").remove();
		
                $.each(sorteios, function(index, value){
                    var el = '<input type="hidden" name="data[CampanhaSorteio][' + index + '][data]" class="sorteio" value="'+value.data+'"  />';
                    $("form#adicionar-campanha").append(el);
                    var el = '<input type="hidden" name="data[CampanhaSorteio][' + index + '][hora]" class="sorteio" value="'+value.hora+'"  />';
                    $("form#adicionar-campanha").append(el);				
				});
                
                var formdata = new FormData(form);
                $("form#adicionar-campanha button[type=submit]").html('<i class="fa fa-spinner fa-spin"></i> Cadastrando, aguarde...').attr('disabled',true);

                $.ajax({
                    type: "POST",
                    data: formdata,
                    url: window.api_url+'campanhas/adicionar?token=' + window.user_token + '&usuario=' + window.user_email, // ajax source,
                    async: true,
                    cache: false,
                    processData: false,
                    contentType: false
                }).done(function(data){
                    if (data.status == "ok"){
                        $("form#adicionar-campanha .alert-success span.message").html(data.msg);
                        success.show();
                        error.hide();
                        warning.hide();
                        $("form#adicionar-campanha button[type=submit]").html('<i class="fa fa-check"></i> Salvo');
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                        // $('#outro_cadastro').show();
                    }else if(data.status == "warning"){
                        $("form#adicionar-campanha .alert-warning span.message").html(data.msg);
                        warning.show();
                        success.hide();
                        error.hide();
                        $("form#adicionar-campanha button[type=submit]").html('<i class="fa fa-check"></i> Salvar').removeAttr('disabled');
                    }else if(data.status == "erro"){
                        $("form#adicionar-campanha .alert-danger span.message").html(data.msg);
                        warning.hide();
                        success.hide();
                        error.show();
                        $("form#adicionar-campanha button[type=submit]").html('<i class="fa fa-check"></i> Salvar').removeAttr('disabled');
                    }
                    App.scrollTo($("form#adicionar-campanha"), -200);
                }).fail(function(jqXHR, textStatus, errorThrown){
                    success.hide();
                    warning.hide();
                    $("form#adicionar-campanha .alert-danger span.message").html("Ocorreu um erro ao adicionar a campanha. ("+textStatus+" - "+errorThrown+")")
                    error.show();
                    $("form#adicionar-campanha button[type=submit]").html('<i class="fa fa-check"></i> Salvar').removeAttr('disabled');
                    App.scrollTo(error, -200);
                });
  
            }
        });

    }

    var initMisc = function () {
		$("select#empresa_id").select2({
            ajax: {
              url: window.api_url + 'empresas/index?token=' + window.user_token + '&usuario=' + window.user_email,
              dataType: 'json',
              processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                let dados = data.data;
                let items = [];
                $.each(dados, function(index, el){
                    items.push({id: el.Empresa.id, text: el.Empresa.nome + " - " + el.Empresa.cnpj});
                })
                return {
                  results: items
                };
              }
              // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });
    }

    var initPickers = function(){ // init date pickers
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            clearBtn: true,
            autoclose: true,
			format: 'dd/mm/yyyy',
            language: 'pt-BR',
            todayHighlight: true,
            forceParse: false, // para não deixar ser apagado pelo tab,
            // showOnFocus: false, // para evitar abrir quando focado
            allowInputToggle: true, // para quando clicar no input abrir calendario
        });
    }

    var handleSorteios = function () {

		//quando clicar em adicionar opção
		$("a.add-sorteio").click(function(){
			$('#adicionar_sorteio').modal('show');
		});

		//quando clicar em salvar opção
		$("button#add_sorteio").click(function(){

			var data = $("input#sorteio_data").val();
			var hora = $("input#sorteio_hora").val();

			if ( $.trim(data) == "" ){
				message = 'Digite a data antes de clicar em adicionar.';
				$('.alert-sorteio span').text(message);
				$('.alert-sorteio').fadeIn(300);
				$('input#sorteio_data').focus();
				return false;
			}

			if ( $.trim(hora) == "" ){
				message = 'Digite a hora antes de clicar em adicionar.';
				$('.alert-sorteio span').text(message);
				$('.alert-sorteio').fadeIn(300);
				$('input#sorteio_hora').focus();
				return false;
			}

			$("input#sorteio_data").val('');
			$("input#sorteio_hora").val('');

			sorteios.push({
				"index": n_sorteios,
				"data" : data,
				"hora" : hora,
			});

			$new_tr = '<tr style="display:none" data-index="'+n_sorteios+'"><td>' + (parseInt(n_sorteios) + 1) + '</td><td>' + data + ' ' + hora + '</td><td><a class="btn default btn-xs remove" href="javascript:;"><i class="fa fa-trash-o"></i> Remover </a></td></tr>';
			$("table#sorteios tbody").append($new_tr);
			$("table#sorteios tbody tr:last").fadeIn(300);
			$('.alert-sorteios').css('display','none');

			$('#sorteios').find('tr.no_results').css('display','none');

			n_sorteios++;
			
		});
		
		$("table#sorteios tbody").on('click',' tr td a.remove', function(){
			index_el = $(this).closest('tr').data('index');
   
			$.each(sorteios, function(index, el){
				if (index == index_el ) {
					sorteios.splice(index,1);
				}
			});
			$(this).closest('tr').remove();
		})
    }

    var handleMasks = function () {
        
		$("input.hora").keyup(function(){
			mascara( this, mhora )
		});
    }

    return { // main function to initiate the module
        init: function () {
            handleValidation();
            initMisc();
            initPickers();
            handleSorteios(); 
            handleMasks();
        }

    };
    
}();

$(document).ready(function(){
    Adicionar.init();
});