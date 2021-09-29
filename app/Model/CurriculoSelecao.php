<?php
class CurriculoSelecao extends AppModel {
	public $useTable = 'sis_curriculos_selecoes';

	public $belognsTo = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_id'
		),
		'CurriculoSelecaoStatus' => array(
			'foreignKey' => 'status_id'
		),
	);


	public function beforeSave($options = array()) {
		if ( isset($this->data['CurriculoSelecao']['inicio']) && $this->data['CurriculoSelecao']['inicio'] != "" ){
			$this->data['CurriculoSelecao']['inicio'] = $this->dateBrEn($this->data['CurriculoSelecao']['inicio']);
		}
		if ( isset($this->data['CurriculoSelecao']['fim']) && $this->data['CurriculoSelecao']['fim'] != "" ){
			$this->data['CurriculoSelecao']['fim'] = $this->dateBrEn($this->data['CurriculoSelecao']['fim']);
		}
	}
	
}