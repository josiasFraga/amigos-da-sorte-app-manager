<?php
class Idioma extends AppModel {
	public $useTable = 'sis_curriculos_idiomas';
	public $primaryKey = 'idioma_id';

	public $hasMany = array(
		'CurriculoIdioma' => array(
			'foreignKey' => 'conheIdi_idioma'
		),
	);
}