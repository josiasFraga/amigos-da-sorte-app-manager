<?php
class ConhecimentoInformaticaCategoria extends AppModel {
	public $useTable = 'sis_curriculos_conhecimentos_info_cat';
	public $primaryKey = 'cat_id';

	public $hasMany = array(
		'ConhecimentoInformatica' => array(
			'foreignKey' => 'conhecimentoInfo_cat'
		),
	);
}