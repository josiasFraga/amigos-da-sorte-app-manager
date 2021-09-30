var Index = function () {

    var handleMisc = function() {
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
        $.get(window.api_url + 'nfces/count_nfces/?token=' + window.user_token + '&usuario=' + window.user_email,{},function(data){
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
        $.get(window.api_url + 'cupons/count_cupons/?token=' + window.user_token + '&usuario=' + window.user_email,{},function(data){
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
        $.get(window.api_url + 'nfces/sum_nfces/?token=' + window.user_token + '&usuario=' + window.user_email,{},function(data){
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
		}
	};

}();

$(document).ready(function() {
	Index.init();
});