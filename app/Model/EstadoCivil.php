<?php
class EstadoCivil extends AppModel {
	public $useTable = 'sis_curriculos_estado_civil';
	public $primaryKey = 'estCivil_id';

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_estadoCivil'
		),
	);
}