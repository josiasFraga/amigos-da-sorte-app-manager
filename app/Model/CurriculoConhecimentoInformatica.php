<?php
class CurriculoConhecimentoInformatica extends AppModel {
	public $useTable = 'sis_curriculos_conhec_info';

	public $belognsTo = array(
		'Curriculo' => array(
			'foreignKey' => 'conheIdi_curriculo'
		),
		'ConhecimentoInformatica' => array(
			'foreignKey' => 'currConhecInfo_conhecimentoInfo'
		),
	);

	public function findStrByCurrId($curr_id = null) {
		if ( $curr_id == null ) {
			return 'Não Possui';
		}

		$conhecimentos = $this->find('list',[
			'fields' => [
				'ConhecimentoInformatica.conhecimentoInfo_titulo',
				'ConhecimentoInformatica.conhecimentoInfo_titulo',
			],
			'conditions' => [
				'CurriculoConhecimentoInformatica.currConhecInfo_curriculo' => $curr_id
			],
			'link' => ['ConhecimentoInformatica']
		]);

		if ( count($conhecimentos) == 0 ) {
			return 'Não Possui';
		}

		return implode(', ',$conhecimentos);

	}
}