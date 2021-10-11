var EncontraGanhador = function () {
	

    var encontraGanhador = function() {
		$('div#ganhador_result').html('<br><br><center>Buscando Ganhador...</center>');
        $.get(window.api_url + 'cupons/encontra_ganhador/?token=' + window.user_token + '&usuario=' + window.user_email + '&campanha_id=' + window.campanha_id + '&numero_sorteado=' + window.numero_sorteado,{},function(data){
			if ( data.status != 'ok' ) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.msg,
				})
				$('div#ganhador_result').html('<br><br><center>Erro...</center>');
			} else {
				$('div#ganhador_result').html('');
				$ol = $('<ol class="ganhadores_list">');
				count = 1;
				$.each(data.dados,function(index, el){
					$li = $('<li class="li_'+index+'">');
					if ( index == 0 || index == "ganhador"){
						$li.append('<div class="d-flex"><div class="col-one d-flex"><span>'+count+')</span></div><div class="col-two d-flex text-center"><img src="'+el.Usuario.img+'" alt="'+el.Usuario.nome+'" width="80px" class="rounded"></div><div class="d-flex flex-five col-three"><h3>Nº da Sorte: '+el.Cupom.n+'</h3><h5>Nome: '+el.Usuario.nome+'</h5><h5>País: '+el.Usuario.pais+'</h5><h5>CPF/CI: '+el.Usuario.cpf+el.Usuario.ci+'</h5><h5>E-mail: '+el.Usuario.email+'</h5></div></div>');
					} else {
						$li.append('<div class="d-flex"><div class="col-one d-flex"><span>'+count+')</span></div><div class="col-two d-flex text-center"><img src="'+el.Usuario.img+'" alt="'+el.Usuario.nome+'" width="50px" class="rounded"></div><div class="d-flex flex-five col-three"><h4>Nº da Sorte: '+el.Cupom.n+'</h4><h5>Nome: '+el.Usuario.nome+'</h5><h5>País: '+el.Usuario.pais+'</h5><h5>CPF/CI: '+el.Usuario.cpf+el.Usuario.ci+'</h5><h5>E-mail: '+el.Usuario.email+'</h5></div></div>');
					}
					$ol.append($li);
					count++;

				})
				$('div#ganhador_result').append($ol);
			}
		});
    }



	var initMisc = function () {
		//$("select.select2").select2();
	}

	return {

		//main function to initiate the module
		init: function () {
            encontraGanhador();
			initMisc();
		}

	};

}();

$(document).ready(function(){
	EncontraGanhador.init();
});