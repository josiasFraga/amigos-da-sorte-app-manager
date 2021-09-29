<?php
class LocalidadePreferencia extends AppModel {
	public $useTable = 'log_localidade';
	public $primaryKey = 'loc_nu_sequencial';

	public $belgonsTo = array(
		'UfPreferencia' => array(
			'className' => 'UfPreferencia',
			'foreignKey' => 'ufe_sg'
		)
	);

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_cidadeDesejada'
		)
	);

}