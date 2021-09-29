<?php
class ConhecimentoInformatica extends AppModel {
	public $useTable = 'sis_curriculos_conhecimentos_info';
	public $primaryKey = 'conhecimentoInfo_id';

	public $belongsTo = array(
		'ConhecimentoInformaticaCategoria' => array(
			'foreignKey' => 'conhecimentoInfo_cat'
		),
	);

	public $hasMany = array(
		'CurriculoConhecimentoInformatica' => array(
			'foreignKey' => 'currConhecInfo_conhecimentoInfo'
		),
	);
}