var Index = function () {
	window.empresas_selecionadas = [];
	window.campanhas_selecionadas = [];
    var handleMisc = function() {
		$('select[name=dashboard_empresas_filtro]').select2({placeholder: 'empresa(s)'});
		$('select[name=dashboard_empresas_filtro]').change(function(){
			window.empresas_selecionadas = $(this).val();
			let url = '';
			if ( (window.empresas_selecionadas).length > 0 ) {
				$.each(window.empresas_selecionadas, function(index, el){
					url += '&cnpj['+index+']='+el;
				})
			}
			if ( (window.campanhas_selecionadas).length > 0 ) {
				$.each(window.campanhas_selecionadas, function(index, el){
					url += '&campanha_id['+index+']='+el;
				})
			}
			busca_n_nfces(url);
			busca_n_cupons(url);
			busca_soma_nfces(url);
		});
		
		$('select[name=dashboard_campanhas_filtro]').change(function(){
			window.campanhas_selecionadas = $(this).val();
			let url = '';
			if ( (window.empresas_selecionadas).length > 0 ) {
				$.each(window.empresas_selecionadas, function(index, el){
					url += '&cnpj['+index+']='+el;
				})
			}
			if ( (window.campanhas_selecionadas).length > 0 ) {
				$.each(window.campanhas_selecionadas, function(index, el){
					url += '&campanha_id['+index+']='+el;
				})
			}
			busca_n_nfces(url);
			busca_n_cupons(url);
			busca_soma_nfces(url);
		});

		busca_n_usuarios();
		busca_n_nfces();
		busca_n_cupons();
		busca_soma_nfces();
    }

	var busca_campanhas = function(){
        $.get(window.api_url + 'campanhas/lista?token=' + window.user_token + '&usuario=' + window.user_email,{},function(data){
			if ( data.status != 'ok' ) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.msg,
				})
			} else {
				$.each(data.dados, function(index, el) {
					$('select[name=dashboard_campanhas_filtro]').append('<option value="' + el.Campanha.id + '">' + el.Campanha.nome + '</option>');
				})
			}
			$('select[name=dashboard_campanhas_filtro]').select2({placeholder: 'campanha(s)'});
		});
	}

	var busca_n_usuarios = function(){
        $.get(window.api_url + 'usuarios/count_users/?token=' + window.user_token + '&usuario=' + window.user_email,{},function(data){
			if ( data.status != 'ok' ) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.msg,
				})
			} else {
				$("span#count_cad_users").attr({'data-value': data.n_usuarios});
				$("span#count_cad_users").counterUp({
					delay: 10,
					time: 1000
				});
			}
		});
	}

	var busca_n_nfces = function (url='') {
        $.get(window.api_url + 'nfces/count_nfces/?token=' + window.user_token + '&usuario=' + window.user_email + url,{},function(data){
			if ( data.status != 'ok' ) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.msg,
				})
			} else {
				$("span#count_cad_nfces").attr({'data-value': data.n_nfces});
				$("span#count_cad_nfces").counterUp({
					delay: 10,
					time: 1000
				});
			}
		});

	}

	var busca_n_cupons = function(url = '') {
        $.get(window.api_url + 'cupons/count_cupons/?token=' + window.user_token + '&usuario=' + window.user_email + url,{},function(data){
			if ( data.status != 'ok' ) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.msg,
				})
			} else {
				$("span#count_cad_luck_numbers").attr({'data-value': data.n_cupons});
				$("span#count_cad_luck_numbers").counterUp({
					delay: 10,
					time: 1000
				});
			}
		});

	}

	var busca_soma_nfces = function(url = '') {

        $.get(window.api_url + 'nfces/sum_nfces/?token=' + window.user_token + '&usuario=' + window.user_email + url,{},function(data){
			if ( data.status != 'ok' ) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.msg,
				})
			} else {
				$("span#count_total_value").attr({'data-value': data.total});
				$("span#count_total_value").counterUp({
					delay: 10,
					time: 1000
				});
			}
		});

	}

	
	return { // main function to initiate the module
		init: function () {
			handleMisc();
			busca_campanhas();
		}
	};

}();

$(document).ready(function() {
	Index.init();
});