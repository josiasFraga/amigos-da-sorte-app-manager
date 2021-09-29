<?php
class CurriculoIdioma extends AppModel {
	public $useTable = 'sis_curriculos_conhecimentos_idiomas';

	public $belognsTo = array(
		'Curriculo' => array(
			'foreignKey' => 'conheIdi_curriculo'
		),
		'Idioma' => array(
			'foreignKey' => 'conheIdi_idioma'
		),
	);

	public function findStrByCurrId($curr_id = null) {
		if ( $curr_id == null ) {
			return 'Não Possui';
		}

		$conhecimentos = $this->find('list',[
			'fields' => [
				'Idioma.idioma_titulo',
				'Idioma.idioma_titulo',
			],
			'conditions' => [
				'CurriculoIdioma.conheIdi_curriculo' => $curr_id
			],
			'link' => ['Idioma']
		]);

		if ( count($conhecimentos) == 0 ) {
			return 'Não Possui';
		}

		return implode(', ',$conhecimentos);

	}
}