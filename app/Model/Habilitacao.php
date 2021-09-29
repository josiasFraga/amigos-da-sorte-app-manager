<?php
class Habilitacao extends AppModel {
	public $useTable = 'sis_habilitacoes';

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_habilitacao_id'
		),
	);
}