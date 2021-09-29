<?php
class DepartamentoLocalidade extends AppModel {
	public $useTable = 'sis_urugai_departamentos_cidade';
	public $primaryKey = 'uruCid_id';

	public $belongsTo = array(
		'Departamento' => array(
			'foreignKey' => 'usuCid_departamento'
		)
	);

	public $hasMany = array(
		'Curriculo' => array(
			'foreignKey' => 'curriculo_cidadeUy'
		)
	);
}