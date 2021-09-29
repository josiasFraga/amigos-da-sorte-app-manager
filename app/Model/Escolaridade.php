<?php
class Escolaridade extends AppModel {
	public $useTable = 'sis_escolaridades';
	public $primaryKey = 'escolaridade_id';

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_escolaridade'
		),
	);
}