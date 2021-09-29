<?php
class DepartamentoLocalidadeDesejada extends AppModel {
	public $useTable = 'sis_urugai_departamentos_cidade';
	public $primaryKey = 'uruCid_id';

	public $belongsTo = array(
		'DepartamentoDesejado' => array(
			'foreignKey' => 'usuCid_departamento'
		)
	);

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_cidadeUyDesejada'
		)
	);
}