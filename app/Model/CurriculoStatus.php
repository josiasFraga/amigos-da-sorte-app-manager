<?php
class CurriculoStatus extends AppModel {
	public $useTable = 'sis_curriculos_status';

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_status'
		),
	);

	
}