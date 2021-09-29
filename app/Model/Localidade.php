<?php
class Localidade extends AppModel {
	public $useTable = 'log_localidade';
	public $primaryKey = 'loc_nu_sequencial';

	public $belgonsTo = array(
		'Uf' => array(
			'className' => 'Estado',
			'foreignKey' => 'ufe_sg'
		)
	);

	public function listNamesById($id = null) {
		return $this->find('list',[
			'conditions' => [
				'Localidade.loc_nu_sequencial' => $id, 
			],
			'fields' => [
				'Localidade.loc_no', 
				'Localidade.loc_no', 
			]
		]);

	}
}