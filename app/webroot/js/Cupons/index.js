var Index = function () {

	var grid = new Datatable();



	var handleRecords = function () {

		grid.init({
			src: $("#table-cupons"),
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
				{'bSortable' : false, "sClass": "text-center"},
				{ "sClass": "text-center"},
				{},
				{},
				{"sClass": "text-center"},
				{'bSortable' : false, "sClass": "text-center"}
			],

				"bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
				"sDom": "t<'row'<'col-md-8 col-sm-12'pi><'col-md-4 col-sm-12'>>",

				"lengthMenu": [
					[10, 20, 50, 100, 150, -1],
					[10, 20, 50, 100, 150, "All"] // change per page values here
				],
				"pageLength": 10, // default record count per page
				"ajax": {
					"url": window.api_url+'Cupons/dataTable?token=' + window.user_token + '&usuario=' + window.user_email, // ajax source
				},
				"order": [
					[1, "asc"]
				] // set first column as a default sort by asc
			}
		});

	}

	var initPickers = function(){

        //init date pickers
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true,
			format: 'dd/mm/yyyy',
			language: 'pt-BR'
        });
	}

	return {

		//main function to initiate the module
		init: function () {
			if (!jQuery().dataTable) { return; }
			handleRecords();
			initPickers();
		}

	};

}();

$(document).ready(function() {
	Index.init();
});