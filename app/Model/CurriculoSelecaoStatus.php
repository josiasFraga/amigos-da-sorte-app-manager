<?php
class CurriculoSelecaoStatus extends AppModel {
	public $useTable = 'sis_curriculo_selecao_status';

	public $hasMany = array(
		'CurriculoSelecao' => array(
			'foreignKey' => 'status_id'
		),
	);

	
}