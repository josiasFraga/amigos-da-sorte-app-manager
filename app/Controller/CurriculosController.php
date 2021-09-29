<?php
class CurriculosController extends AppController {
    public $components = array('dataTable', 'Mpdf.Mpdf');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'metronic';
    }

	public function index() {
		$this->set('title_for_layout', 'Currículos');
		if ( $this->request->is('post') ) {
			$this->layout = "ajax";
			return $this->dataTable();
		}

        $this->loadModel('Escolaridade');
        $escolaridades = $this->Escolaridade->find('list',[
            'fields' => [
                'Escolaridade.escolaridade_id',
                'Escolaridade.escolaridades_descricao'
            ],
            'order'=>[
                'Escolaridade.escolaridades_descricao'

            ]
        ]);

        $this->loadModel('CurriculoStatus');
        $status = $this->CurriculoStatus->find('list',[
            'fields' => [
                'CurriculoStatus.id',
                'CurriculoStatus.titulo'
            ],
            'order'=>[
                'CurriculoStatus.id'

            ]
        ]);

        $this->set(compact('escolaridades', 'status'));
    }
    
    protected function dataTable($tipo = null) {

        $this->layout = "ajax";

        if ( !$this->request->is('post') || empty($this->request->data) ) {
            return new CakeResponse( array( 'type' => 'json', 'body' => json_encode( array( 'status' => 'erro', 'msg' => 'Requisição inválida!' ))));
        }

        $matriz_id = $this->Auth->user('cliente_id');
        $this->loadModel('Cliente');
        $clientes_autorizados = $this->Cliente->find('list',[
            'fields' => [
                'Cliente.cliente_codigo',
                'Cliente.cliente_codigo'
            ],
            'conditions' => [
                'Cliente.cliente_matriz' => $matriz_id
            ]
        ]);

        $clientes_autorizados[$matriz_id] = $matriz_id;
        //debug($clientes_autorizados); die();

        if ( isset($this->request->data['order']) ) $order = $this->request->data['order'];

        $arr_columns_order = array(
            "",
            "Curriculo.curriculo_nome",
            "",
            "",
            "Curriculo.curriculo_dataCadastro",
            "Cliente.cliente_fantasia",
            "Curriculo.curriculo_experiencia",
            "Escolaridade.escolaridades_descricao",
            "CurriculoStatus.titulo",
        );

        $conditions = [
            'Curriculo.curriculo_status' => [1, 2],
            'or' => [
                ['Curriculo.curriculo_clienteDesejado' => $clientes_autorizados],
                ['ISNULL(Curriculo.curriculo_clienteDesejado)']
            ]
        ];

		if ( $this->dataTable->check_filtro("nome","text") === true){
			$conditions = array_merge($conditions, array("Curriculo.curriculo_nome LIKE" => "%".$this->request->data["nome"]."%"));
		}

		if ( $this->dataTable->check_filtro("celular","text") === true){
			$conditions = array_merge($conditions, array("Curriculo.curriculo_celular LIKE" => "%".$this->request->data["celular"]."%"));
		}

		if ( $this->dataTable->check_filtro("email","text") === true){
			$conditions = array_merge($conditions, array("Curriculo.curriculo_email LIKE" => "%".$this->request->data["email"]."%"));
		}

        if (isset($this->request->data['cadastro_de']) && !empty($this->request->data['cadastro_de'])) {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_dataCadastro >=" => $this->request->data["cadastro_de"]));
        }

        if (isset($this->request->data['cadastro_ate']) && !empty($this->request->data['cadastro_ate'])) {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_dataCadastro <=" => $this->request->data["cadastro_ate"].' 23:59:59'));
        }

        if (isset($this->request->data['empresa_pref']) && !empty($this->request->data['empresa_pref'])) {
            $conditions = array_merge($conditions, array("Cliente.cliente_fantasia LIKE" => "%".$this->request->data['empresa_pref']."%"));
        }

        if (isset($this->request->data['experiencia']) && $this->request->data['experiencia'] !== '') {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_experiencia" => $this->request->data['experiencia']));
        }

        if (isset($this->request->data['escolaridade']) && !empty($this->request->data['escolaridade'])) {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_escolaridade" => $this->request->data['escolaridade']));
        }

        if (isset($this->request->data['status']) && !empty($this->request->data['status'])) {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_status" => $this->request->data['status']));
        }

        if ( isset($arr_columns_order[$order[0]['column']]) && isset($order[0]['dir']) && ($order[0]['dir'] == 'asc' || $order[0]['dir'] == 'desc')) {
            $order = $arr_columns_order[$order[0]['column']]." ".$order[0]['dir'];
        }

        $this->loadModel('Curriculo');

		$iTotalRecords = $this->Curriculo->find('count', [
			'conditions' => []
		]);

		$iDisplayLength = intval($this->request->data['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($this->request->data['start']);

		$dados = $this->Curriculo->find('all',array(
			'conditions' => $conditions,
			'order' => $order,
			'fields' => array(
                "Curriculo.*",
                "Cliente.cliente_fantasia",
                "Escolaridade.escolaridades_descricao",
                "CurriculoStatus.titulo"
			),
			'link' => ['Cliente', 'Escolaridade', 'CurriculoStatus'],
			'offset' => $iDisplayStart,
			'limit' => $iDisplayLength
		));

		$registrosFiltrados = $this->Curriculo->find("count", array(
			'conditions' => $conditions,
			'link' => ['Cliente', 'Escolaridade', 'CurriculoStatus'],
		));

        // debug($dados); die();

        $iRecordsFiltered = $registrosFiltrados;
        $sEcho = intval($this->request->data['draw']);
        $records = array();
        $records["data"] = array();

        $hoje = date('Y-m-d');

        if ( count($dados) > 0 ) {

            foreach ( $dados as $dado ) {

                $situation = $this->checkStatus($dado['Curriculo']['curriculo_id']);
                $td_status = '';

                if ( $situation == 'em_selecao_outra_empresa' )
                    $td_status = 'warn';

                if ( $situation == 'dispensado_pela_empresa' )
                    $td_status = 'danger';

                if ( $situation == 'em_selecao' )
                    $td_status = 'info';

                $radio = '<input type="checkbox" name="id[]" value="'.$dado['Curriculo']['curriculo_id'].'">';

                $nome = $dado['Curriculo']['curriculo_nome'];                
                $celular = $dado['Curriculo']['curriculo_celular'];
                $email = $dado['Curriculo']['curriculo_email'];
                $data_cadastro = date('d/m/Y', strtotime($dado['Curriculo']['curriculo_dataCadastro']));
                $empresa = $dado['Cliente']['cliente_fantasia'];
                $experiencia = $dado['Curriculo']['curriculo_experiencia'] == 1 ? 'Sim' : 'Não';
                $escolaridade = $dado['Escolaridade']['escolaridades_descricao'];
                $status = $dado['CurriculoStatus']['titulo'];
                
                $actions = "";

                $btn_visualizar = '<a href="'.Router::url(array('controller' => $this->name, 'action' => 'imprimir', '?' => array('id[]' => $dado['Curriculo']['curriculo_id']))).'" class="btn btn-icon-only green" target="_blank" data-toggle=""><i class="fa fa-file-text-o"></i></a>';
                
                $btn_informar_selecao = '<a href="#modal_selecao" data-id="'.$dado['Curriculo']['curriculo_id'].'" class="btn btn-icon-only blue" data-toggle="modal"><i class="fa fa-check-square-o"></i></a>';

                //$btn_excluir = '<a href="#" class="btn btn-icon-only red btn-remove" data-id="'.$dado['Curriculo']['id'].'"><i class="fa fa-trash"></i></a>';

                if ( $situation == 'em_selecao_outra_empresa' )
                    $actions = $btn_visualizar;
                else
                    $actions = $btn_visualizar.' '.$btn_informar_selecao;

                $records["data"][] = array(
                    $radio,
                    '<span class="'.$td_status.'">'.$nome.'</span>',
                    '<span class="'.$td_status.'">'.$celular.'</span>',
                    '<span class="'.$td_status.'">'.$email.'</span>',
                    '<span class="'.$td_status.'">'.$data_cadastro.'</span>',
                    '<span class="'.$td_status.'">'.$empresa.'</span>',
                    '<span class="'.$td_status.'">'.$experiencia.'</span>',
                    '<span class="'.$td_status.'">'.$escolaridade.'</span>',
                    '<span class="'.$td_status.'">'.$status.'</span>',
                    $actions
                );
            
            }
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iRecordsFiltered;

        return new CakeResponse(
            array(
                'type' => 'json',
                'body' => json_encode($records)
            )
        );

    }

    private function checkStatus($curriculo_id = null) {

        if ( $curriculo_id == null ) {
            return 'disponivel';
        }

        $this->loadModel('CurriculoSelecao');
        $dados_selecao = $this->CurriculoSelecao->find('first',[
            'conditions' => [
                'CurriculoSelecao.curriculo_id' => $curriculo_id
            ],
            'order' => [
                'CurriculoSelecao.id DESC'
            ]
        ]);

        if ( count($dados_selecao) > 0 && $dados_selecao['CurriculoSelecao']['ativo'] == 'Y' && $dados_selecao['CurriculoSelecao']['empresa_id'] != $this->Auth->user('cliente_id') ) {
            return 'em_selecao_outra_empresa';
        }

        $dados_selecao_com_a_empresa = $this->CurriculoSelecao->find('first',[
            'conditions' => [
                'CurriculoSelecao.curriculo_id' => $curriculo_id,
                'CurriculoSelecao.empresa_id' => $this->Auth->user('cliente_id')
            ],
            'order' => [
                'CurriculoSelecao.id DESC'
            ]
        ]);

        if ( count($dados_selecao_com_a_empresa) > 0 && $dados_selecao_com_a_empresa['CurriculoSelecao']['status_id'] == '3' ) {
            return 'dispensado_pela_empresa';
        }

        if ( count($dados_selecao_com_a_empresa) > 0 && $dados_selecao_com_a_empresa['CurriculoSelecao']['status_id'] == '1' ) {
            return 'em_selecao';
        }

        return 'disponivel';

    }
    
    public function imprimir() {

		$this->layout = 'pdf';
        $this->request->data = $this->request->query;

        $matriz_id = $this->Auth->user('cliente_id');
        $this->loadModel('Cliente');
        $clientes_autorizados = $this->Cliente->find('list',[
            'fields' => [
                'Cliente.cliente_codigo',
                'Cliente.cliente_codigo'
            ],
            'conditions' => [
                'Cliente.cliente_matriz' => $matriz_id
            ]
        ]);

        $clientes_autorizados[$matriz_id] = $matriz_id;
        //debug($clientes_autorizados); die();

        if ( isset($this->request->data['order']) ) $order = $this->request->data['order'];

        $arr_columns_order = array(
            "",
            "Curriculo.curriculo_nome",
            "",
            "",
            "Curriculo.curriculo_dataCadastro",
            "Cliente.cliente_fantasia",
            "Curriculo.curriculo_experiencia",
            "Escolaridade.escolaridades_descricao",
        );

        $conditions = [
            'or' => [
                ['Curriculo.curriculo_clienteDesejado' => $clientes_autorizados],
                ['ISNULL(Curriculo.curriculo_clienteDesejado)']
            ]
        ];

		if ( $this->dataTable->check_filtro("nome","text") === true){
			$conditions = array_merge($conditions, array("Curriculo.curriculo_nome LIKE" => "%".$this->request->data["nome"]."%"));
		}

		if ( $this->dataTable->check_filtro("celular","text") === true){
			$conditions = array_merge($conditions, array("Curriculo.curriculo_celular LIKE" => "%".$this->request->data["celular"]."%"));
		}

		if ( $this->dataTable->check_filtro("email","text") === true){
			$conditions = array_merge($conditions, array("Curriculo.curriculo_email LIKE" => "%".$this->request->data["email"]."%"));
		}

        if (isset($this->request->data['cadastro_de']) && !empty($this->request->data['cadastro_de'])) {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_dataCadastro >=" => $this->request->data["cadastro_de"]));
        }

        if (isset($this->request->data['cadastro_ate']) && !empty($this->request->data['cadastro_ate'])) {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_dataCadastro <=" => $this->request->data["cadastro_ate"].' 23:59:59'));
        }

        if (isset($this->request->data['empresa_pref']) && !empty($this->request->data['empresa_pref'])) {
            $conditions = array_merge($conditions, array("Cliente.cliente_fantasia LIKE" => "%".$this->request->data['empresa_pref']."%"));
        }

        if (isset($this->request->data['experiencia']) && $this->request->data['experiencia'] !== '') {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_experiencia" => $this->request->data['experiencia']));
        }

        if (isset($this->request->data['escolaridade']) && !empty($this->request->data['escolaridade'])) {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_escolaridade" => $this->request->data['escolaridade']));
        }

        if ( isset($_GET['id']) && count($_GET['id']) > 0 ) {
            $conditions = array_merge($conditions, array("Curriculo.curriculo_id" => $_GET['id']));
        }

        $dados = $this->Curriculo->find('all',array(
			'conditions' => $conditions,
			'fields' => array(
                "Curriculo.*",
                "Cliente.cliente_fantasia",
                "Escolaridade.escolaridades_descricao",
                "EstadoCivil.estCivil_desc",
                'Sexo.titulo',
                'PaisEndereco.pais_nome',
                'PaisPreferencia.pais_nome',
                'Departamento.uruDep_nome',
                'DepartamentoDesejado.uruDep_nome',
                'DepartamentoLocalidade.usuCid_nome',
                'DepartamentoLocalidadeDesejada.usuCid_nome',
                'LocalidadePreferencia.loc_no',
                'Habilitacao.nome'
			),
			'link' => ['Cliente', 'Escolaridade', 'EstadoCivil', 'Sexo', 'PaisEndereco', 'PaisPreferencia', 'DepartamentoLocalidade' => ['Departamento'], 'DepartamentoLocalidadeDesejada' => ['DepartamentoDesejado'], 'LocalidadePreferencia', 'Habilitacao'],
		));

        //debug($dados); die();

        $this->loadModel('CurriculoConhecimentoInformatica');
        $this->loadModel('CurriculoIdioma');

        foreach( $dados as $key => $dado ){
            $dados[$key]['Curriculo']['curriculo_foto'] = 'https://amigosdasorte.com/sistema/img/fotos_curriculos/topdf_'.$dados[$key]['Curriculo']['curriculo_foto'];
            //$dados[$key]['Curriculo']['curriculo_foto'] = 'http://localhost/amigos/sistema/img/fotos_curriculos/topdf_'.$dados[$key]['Curriculo']['curriculo_foto'];
            $dataNascimento = $dados[$key]['Curriculo']['curriculo_dataNascimento'];
            $date = new DateTime($dataNascimento );
            $interval = $date->diff( new DateTime( date('Y-m-d') ) );
            $dados[$key]['Curriculo']['idade'] = $interval->format( '%Y' );
            $dados[$key]['Curriculo']['conhecimentos_info'] = $this->CurriculoConhecimentoInformatica->findStrByCurrId($dados[$key]['Curriculo']['curriculo_id']);
            $dados[$key]['Curriculo']['conhecimentos_idiomas'] = $this->CurriculoIdioma->findStrByCurrId($dados[$key]['Curriculo']['curriculo_id']);

            /*if ($dados[$key]['Curriculo']['curriculo_cidadeDesejada'] != '') {

            }*/
        }

  
        $this->Mpdf->init();
		//$this->Mpdf->packTableData  = true; // necessario pq não gerava pq tinha mt registro
        //$this->Mpdf->SetDisplayMode('fullpage','two');

        $this->Mpdf->setFilename('file.pdf');
        $this->Mpdf->setOutput('I');
        $this->Mpdf->SetFooter("Amigos da Sorte - Currículos");
		$this->Mpdf->SetWatermarkText("Draft");
        
        $this->set(compact('dados'));

    }

    public function selecao($id=null) {
        $this->layout = "ajax";

        if ($id == null) {
            echo "Currículo não informado";
            return;
        }

        $this->loadModel('CurriculoSelecao');
        $dados_selecao = $this->CurriculoSelecao->find('first',[
            'conditions' => [
                'CurriculoSelecao.empresa_id' => $this->Auth->user('cliente_id'),
                'CurriculoSelecao.curriculo_id' => $id,
                'CurriculoSelecao.ativo' => 'Y'
            ]
        ]);

        $this->loadModel('CurriculoSelecaoStatus');
        $status_selecoes = $this->CurriculoSelecaoStatus->find('list',[
            'fields' => [
                'CurriculoSelecaoStatus.id', 'CurriculoSelecaoStatus.titulo'
            ],
            'order' => [
                
            ]
        ]);

        $this->set(compact('dados_selecao', 'status_selecoes', 'id'));
    }

    public function salvar_selecao() {

        $this->layout = "ajax";
        $dados = $this->request->data;

        $this->loadModel('Curriculo');
        $this->loadModel('CurriculoSelecao');

        $dados_curriculo = $this->Curriculo->find('first',[
            'conditions' => [
                'Curriculo.curriculo_id' => $dados['CurriculoSelecao']['curriculo_id']
            ]
        ]);

        $dados_curriculo_salvar = [
            'curriculo_id' => $dados['CurriculoSelecao']['curriculo_id'],
            'curriculo_status' => 2
        ];

        if ( $dados_curriculo['Curriculo']['curriculo_status'] == 3 ) {
            return new CakeResponse( array( 'type' => 'json', 'body' => json_encode( array( 'status' => 'erro', 'msg' => "Este currículo já está contratado." ))));
        }

        if (isset($dados['CurriculoSelecao']['id']) && $dados['CurriculoSelecao']['id'] != '') {

            $dados_curriculo_selecao = $this->CurriculoSelecao->find('first',[
                'conditions' => [
                    'CurriculoSelecao.id' => $dados['CurriculoSelecao']['id'],
                    'CurriculoSelecao.empresa_id' => $this->Auth->user('cliente_id')
                ]
            ]);

            if ( count($dados_curriculo_selecao) == 0 ) {
                return new CakeResponse( array( 'type' => 'json', 'body' => json_encode( array( 'status' => 'erro', 'msg' => "Não encontramos os dados da seleção informada." ))));
            }

            if ( $dados_curriculo_selecao['CurriculoSelecao']['ativo'] != 'Y' ) {
                return new CakeResponse( array( 'type' => 'json', 'body' => json_encode( array( 'status' => 'erro', 'msg' => "A seleção informada já foi encerrada." ))));
            }

        } else {
            $dados['CurriculoSelecao']['empresa_id'] = $this->Auth->user('cliente_id');
        }

        if ( !$this->Curriculo->save($dados_curriculo_salvar) ) {
            return new CakeResponse( array( 'type' => 'json', 'body' => json_encode( array( 'status' => 'erro', 'msg' => "Ocorreu um erro ao atualizar o status do currículo!" ))));
        }

        if ( !$this->CurriculoSelecao->save($dados) ) {
            return new CakeResponse( array( 'type' => 'json', 'body' => json_encode( array( 'status' => 'erro', 'msg' => "Ocorreu um erro ao atualizar a seleção!" ))));
        }


        return new CakeResponse( array( 'type' => 'json', 'body' => json_encode( array( 'status' => 'ok', 'msg' => "Seleção cadastrada com sucesso!" ))));

	}

}