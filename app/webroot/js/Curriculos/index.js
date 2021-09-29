var Index = function () {

	var grid = new Datatable();


	var initPrint = function () {
		$('a#imprimir').unbind();
		$('a#imprimir').on('click', function(ev){
			ev.preventDefault();
			var dados = [];
			$.each($('input.form-filter'),function(index,el){
				let input_name = $(el).prop('name');
				dados[input_name] =  $(el).val();
			});
			
			let dados_chekboxes = [];
			dados_chekboxes['ids'] = [];
			$.each($('input[name="id[]"]:checked'),function(index,el){
		
				dados_chekboxes['ids'][index] = $(el).val();
			});

			let params_checkboxes = '';
			if ( dados_chekboxes['ids'].length > 0 ) {
				params_checkboxes = dados_chekboxes['ids'].join('&id[]=');
				params_checkboxes = '&id[]=' + params_checkboxes;
			}

			dados = Object.assign({}, dados);
			dados_params = $.param(dados);
			let url = baseUrl+"Curriculos/imprimir/?" + dados_params + params_checkboxes;
			window.open(url, '_blank');
			
			/*$(document).on('click', 'a', function(e){ 
				e.preventDefault(); 
				window.open(url, '_blank');
			});*/
		})
	}

	var handleRecords = function () {

	
			grid.init({
				src: $("#table-curriculos"),
				onSuccess: function (grid) {
					// execute some code after table records loaded
				},
				onError: function (grid) {
					// execute some code on network or other general error
				},
				loadingMessage: 'Carregando...',
				dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options
	
					// Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
					// setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js).
					// So when dropdowns used the scrollable div should be removed.
					//"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
					
					"language": { // language settings
						// App spesific
						"AppGroupActions": "_TOTAL_ registros selecionados: ",
						"AppAjaxRequestGeneralError": "Não foi possível completar a requisição. Por favor, cheque sua conexão com a internet.",
	
						// data tables spesific
						"lengthMenu": "<span class='seperator'>|</span>Vendo _MENU_ registros",
						"info": "<span class='seperator'>|</span>Encontrados um total de _TOTAL_ registros",
						"infoEmpty": "Sem registros para mostrar",
						"emptyTable": "Nenhum dado disponível na tabela",
						"zeroRecords": "Nenhum registro encontrado",
						"paginate": {
							"previous": "Anterior",
							"next": "Próximo",
							"last": "Último",
							"first": "Primeiro",
							"page": "Página",
							"pageOf": "de"
						}
					},
	
				"aoColumns": [
					{ 'bSortable' : false, "sClass": "text-center" },
					{ },
					{ 'bSortable' : false, "sClass": "text-center" },
					{ 'bSortable' : false },
					{ "sClass": "text-center" },
					{ },
					{ "sClass": "text-center" },
					{ },
					{ },
					{ 'bSortable' : false, "sClass": "text-center" },
				],
	
					"bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
					"sDom": "t<'row'<'col-md-8 col-sm-12'pi><'col-md-4 col-sm-12'>>",
	
					"lengthMenu": [
						[10, 20, 50, 100, 150, -1],
						[10, 20, 50, 100, 150, "All"] // change per page values here
					],
					"pageLength": 10, // default record count per page
					"ajax": {
						"url": baseUrl+"Curriculos/index", // ajax source
					},
					"order": [
						[1, "desc"]
					] // set first column as a default sort by asc
				}
			});
	
			// handle group actionsubmit button click
			grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
				e.preventDefault();
				var action = $(".table-group-action-input", grid.getTableWrapper());
				if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
					grid.setAjaxParam("customActionType", "group_action");
					grid.setAjaxParam("customActionName", action.val());
					grid.setAjaxParam("id", grid.getSelectedRows());
					grid.getDataTable().ajax.reload();
					grid.clearAjaxParams();
				} else if (action.val() == "") {
					App.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Por favor, selecione uma ação.',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				} else if (grid.getSelectedRowsCount() === 0) {
					App.alert({
						type: 'danger',
						icon: 'warning',
						message: 'Nenhum registro selecionado.',
						container: grid.getTableWrapper(),
						place: 'prepend'
					});
				}
			});
		

	}

	var initPickers = function(){
        //init date pickers
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true,
			format: 'dd/mm/yyyy',
			language: 'pt-BR',
            todayHighlight: true
        });
	}

	var initMasks = function () {
		$("input.cep").keyup(function () { mascara(this, mcep) });
		$("input.cpf").keyup(function () { mascara(this, mcpf) });
		$("input.cnpj").keyup(function () { mascara(this, cnpj) });
		$("input.phone").keyup(function () { mascara(this, mtel) });
		$("input.databr").keyup(function () { mascara(this, mdata) });
		$("input.moeda").keyup(function () { mascara(this, mvalor) });

		/*$(".select2").select2({
			placeholder: "Selecione..",
			width: 'element',
			allowClear: true
		});*/
	}

	var initModal = () => {
		$('#modal_selecao').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); // Button that triggered the modal
			var id = button.data('id'); // Extract info from data-* attributes
			App.blockUI({
				target: 'form#selecao_curriculo',
				message: 'Buscando dados'
			});

			$("#modal_selecao .modal-dialog .modal-content form .form-body .modal-body").load(baseUrl + 'Curriculos/selecao/'+id,{},(dados)=>{
				Selecao.init();
				App.unblockUI('form#selecao_curriculo');
			});

		});
	}

	return {
		//main function to initiate the module
		init: function () {
			if (!jQuery().dataTable) { return; }
			handleRecords();
			initModal();
			initPickers();
			initMasks();
			initPrint();
			//handleValidationAlterar();
			// initPago();
			// handleSample();
		},
		reloadItensTable: () => {
			grid.getDataTable().ajax.reload();
		}
	};
	
}();

$(document).ready(function() {
	Index.init();
	// $('[data-toggle="popover"]').popover();
});