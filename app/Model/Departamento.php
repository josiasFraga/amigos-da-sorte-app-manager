<?php
class Departamento extends AppModel {
	public $useTable = 'sis_urugai_departamentos';
	public $primaryKey = 'uruDep_id';

	public $hasMany = array(
		'DepartamentoLocalidade' => array(
			'foreignKey' => 'usuCid_departamento'
		)
	);
}