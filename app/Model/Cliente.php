<?php
class Cliente extends AppModel {
	public $useTable = 'sis_clientes';
	public $primaryKey = 'cliente_codigo';

	public $hasMany = array(
		'AvaliacaoDesempenho' => array(
			'foreignKey' => 'avalDes_cliente'
		),
		'UsuarioEmpresaPermissao' => array(
			'foreignKey' => 'cliente_id'
		),
		'Usuario' => array(
			'foreignKey' => 'colaborador_cliente'
		),
		'Setor' => array(
			'foreignKey' => 'set_cliente'
		),
		'Local' => array(
			'foreignKey' => 'setor_cliente'
		),
		'Cargo' => array(
			'foreignKey' => 'cargo_cliente'
		),
		'MapaEstrategico' => array(
			'foreignKey' => 'mapa_cliente'
		),
		'Pop' => array(
			'foreignKey' => 'pop_cliente'
		),
		'Manual' => array(
			'foreignKey' => 'manual_cliente'
		),
		'ClimaOrganizacional' => array(
			'foreignKey' => 'cliente_id'
		),
		'ModuloResponsavel' => array(
			'foreignKey' => 'responsavel_cliente'
		),
		'Curriculo' => array(
			'foreignKey' => 'curriculo_clienteDesejado'
		)
	);
}