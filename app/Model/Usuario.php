<?php
class Usuario extends AppModel {

	public $useTable = 'usuarios';

    public $name = 'Usuario';

	public $hasMany = array(
		'Token' => array(
			'foreignKey' => 'usuario_id'
		),

	);

	// public $belongsTo = array();

	public $validate = array(
		'nome' => array(
			'rule1' => array(
				'required' => true,
				'rule' => 'notBlank',
				'message' => 'O campo nome é obrigatório!'
			),
		),
		'email' => array(
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'Já existe um usuário com este email.'
			),
			'rule1' => array(
				'required' => true,
				'rule' => 'notBlank',
				'on' => 'create',
				'message' => 'O campo email é obrigatório!'
			),
		)
	);

	public function beforeSave($options = array()) {
		if ( isset($this->data['Usuario']['senha']) && $this->data['Usuario']['senha'] != "" ){
			$this->data['Usuario']['senha'] = AuthComponent::password($this->data['Usuario']['senha']);
		}
	}


}