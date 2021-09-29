<?php
class DepartamentoDesejado extends AppModel {
	public $useTable = 'sis_urugai_departamentos';
	public $primaryKey = 'uruDep_id';

	public $hasMany = array(
		'DepartamentoLocalidadeDesejada' => array(
			'foreignKey' => 'usuCid_departamento'
		)
	);
}