<?php
class PaisPreferencia extends AppModel {
	public $useTable = 'sis_paises';
	public $primaryKey = 'pais_id';

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_paisDesejado'
		),
	);
}