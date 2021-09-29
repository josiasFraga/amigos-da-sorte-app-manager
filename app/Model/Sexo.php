<?php
class Sexo extends AppModel {
	public $useTable = 'sis_sexos';

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_sexo'
		),
	);
}