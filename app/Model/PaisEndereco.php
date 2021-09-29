<?php
class PaisEndereco extends AppModel {
	public $useTable = 'sis_paises';
	public $primaryKey = 'pais_id';

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_pais'
		),
	);
}