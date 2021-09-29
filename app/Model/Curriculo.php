<?php
class Curriculo extends AppModel {
	public $useTable = 'sis_curriculos';
	public $primaryKey = 'curriculo_id';

	public $belognsTo = array(
		'Pais' => array(
			'foreignKey' => 'curriculo_nacionalidade'
		),
		'PaisEndereco' => array(
			'foreignKey' => 'curriculo_pais'
		),
		'PaisPreferencia' => array(
			'foreignKey' => 'curriculo_paisDesejado'
		),
		'Uf' => array(
			'foreignKey' => 'curriculo_estado'
		),
		'UfPreferencia' => array(
			'foreignKey' => 'curriculo_estadoDesejado'
		),
		'DepartamentoLocalidade' => array(
			'foreignKey' => 'curriculo_cidadeUy'
		),
		'DepartamentoLocalidadeDesejada' => array(
			'foreignKey' => 'curriculo_cidadeUyDesejada'
		),
		'Cliente' => array(
			'foreignKey' => 'curriculo_clienteDesejado'
		),
		'EstadoCivil' => array(
			'foreignKey' => 'curriculo_estadoCivil'
		),
		'Escolaridade' => array(
			'foreignKey' => 'curriculo_escolaridade'
		),
		'Sexo' => array(
			'foreignKey' => 'curriculo_sexo'
		),
		'Habilitacao' => array(
			'foreignKey' => 'curriculo_habilitacao_id'
		),
		'CurriculoStatus' => [
			'foreignKey' => 'curriculo_status'			
		]
	);

    public $hasMany = [        
        'CurriculoIdioma' => array(
			'foreignKey' => 'conheIdi_curriculo'
		),
        'CurriculoConhecimentoInformatica' => array(
			'foreignKey' => 'currConhecInfo_curriculo'
		),
        'CurriculoSelecao' => array(
			'foreignKey' => 'curriculo_id'
		),
    ];

	public $actsAs = array(
		'Upload.Upload' => array(
			'curriculo_foto' => array(
				'path' => ROOT.DS."..".DS."sistema".DS."app".DS."webroot".DS."webroot".DS."img".DS."fotos_curriculos",
				'thumbnailSizes' => array(
					'thumb' => '80x80',
					'topdf' => '300x400'
				),
				'pathMethod' => 'flat',
				'nameCallback' => 'rename'
			)
		)
	);

	public function beforeSave($options = array()) {

		if ( isset($this->data['Curriculo']['curriculo_dataNascimento']) && $this->data['Curriculo']['curriculo_dataNascimento'] != "" ){
			if ( strpos($this->data['Curriculo']['curriculo_dataNascimento'], '/') ) {
				$this->data['Curriculo']['curriculo_dataNascimento'] = $this->dateBrEn($this->data['Curriculo']['curriculo_dataNascimento']);
			}
		}

		if ( isset($this->data['Curriculo']['curriculo_ultEmpresaAdmissao1']) && $this->data['Curriculo']['curriculo_ultEmpresaAdmissao1'] != "" ){
			if ( strpos($this->data['Curriculo']['curriculo_ultEmpresaAdmissao1'], '/') ) {
				$this->data['Curriculo']['curriculo_ultEmpresaAdmissao1'] = $this->dateBrEn($this->data['Curriculo']['curriculo_ultEmpresaAdmissao1']);
			}
		}

		if ( isset($this->data['Curriculo']['curriculo_ultEmpresaDemissao1']) && $this->data['Curriculo']['curriculo_ultEmpresaDemissao1'] != "" ){
			if ( strpos($this->data['Curriculo']['curriculo_ultEmpresaDemissao1'], '/') ) {
				$this->data['Curriculo']['curriculo_ultEmpresaDemissao1'] = $this->dateBrEn($this->data['Curriculo']['curriculo_ultEmpresaDemissao1']);
			}
		}

		if ( isset($this->data['Curriculo']['curriculo_ultEmpresaAdmissao2']) && $this->data['Curriculo']['curriculo_ultEmpresaAdmissao2'] != "" ){
			if ( strpos($this->data['Curriculo']['curriculo_ultEmpresaAdmissao2'], '/') ) {
				$this->data['Curriculo']['curriculo_ultEmpresaAdmissao2'] = $this->dateBrEn($this->data['Curriculo']['curriculo_ultEmpresaAdmissao2']);
			}
		}

		if ( isset($this->data['Curriculo']['curriculo_ultEmpresaDemissao2']) && $this->data['Curriculo']['curriculo_ultEmpresaDemissao2'] != "" ){
			if ( strpos($this->data['Curriculo']['curriculo_ultEmpresaDemissao2'], '/') ) {
				$this->data['Curriculo']['curriculo_ultEmpresaDemissao2'] = $this->dateBrEn($this->data['Curriculo']['curriculo_ultEmpresaDemissao2']);
			}
		}

		if ( isset($this->data['Curriculo']['curriculo_ultEmpresaAdmissao3']) && $this->data['Curriculo']['curriculo_ultEmpresaAdmissao3'] != "" ){
			if ( strpos($this->data['Curriculo']['curriculo_ultEmpresaAdmissao3'], '/') ) {
				$this->data['Curriculo']['curriculo_ultEmpresaAdmissao3'] = $this->dateBrEn($this->data['Curriculo']['curriculo_ultEmpresaAdmissao3']);
			}
		}

		if ( isset($this->data['Curriculo']['curriculo_ultEmpresaDemissao3']) && $this->data['Curriculo']['curriculo_ultEmpresaDemissao3'] != "" ){
			if ( strpos($this->data['Curriculo']['curriculo_ultEmpresaDemissao3'], '/') ) {
				$this->data['Curriculo']['curriculo_ultEmpresaDemissao3'] = $this->dateBrEn($this->data['Curriculo']['curriculo_ultEmpresaDemissao3']);
			}
		}

		if ( isset($this->data['Curriculo']['curriculo_pretensaoSalarial']) && $this->data['Curriculo']['curriculo_pretensaoSalarial'] != "" ){
            $this->data['Curriculo']['curriculo_pretensaoSalarial'] = $this->moneyToFloat($this->data['Curriculo']['curriculo_pretensaoSalarial']);
		}
    }

	public function rename($field, $currentName, array $data, array $options) {
        $ext = pathinfo($currentName, PATHINFO_EXTENSION);
        $name = md5(uniqid(rand())).'.'.mb_strtolower($ext);
        return $name;
    }
}