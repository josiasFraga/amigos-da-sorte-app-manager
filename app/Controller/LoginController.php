<?php

// App::uses('CakeEmail', 'Network/Email');

class LoginController extends AppController {

	public function isAuthorized($user = null) {
		return true;
	}

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('entrar', 'logout');
	}
	
	public $uses = array('User');

	public function entrar() {
		$this->layout = null;
		//exit(debug(AuthComponent::password('zap123')));

		if ( $this->request->is('post') ) {
			// die(debug($this->request->data));
			$this->loadModel('Usuario');	
			if ($this->Auth->login()) {
				$token_exists = $this->checkTokenExists($this->Auth->user('email'));

				$token = md5(uniqid(rand(), true));
				$dados_salvar = array(
					'Token' => array(
						//'id' => $usuario['Token']['id'], 
						'token' => $token, 
						'validade' => date('Y-m-d', strtotime(date("Y-m-d") . ' + 30 days')), 
						'usuario_id' => $this->Auth->user('id')
					)
				);

				if ( $token_exists != false ) {
					$dados_salvar = array(
						'Token' => array(
							'id' => $token_exists['Token']['id'], 
							'token' => $token, 
							'validade' => date('Y-m-d', strtotime(date("Y-m-d") . ' + 30 days')), 
							'usuario_id' => $this->Auth->user('id')
						)
					);
				}

				$this->loadModel('Token');
				if ($this->Token->save($dados_salvar)) {
					$this->Session->write('user_token', $token);
					return $this->routing();
				} else {
					$this->Session->setFlash('Erro ao gerar o token de acesso.', 'flash_error');
					return $this->redirect($this->Auth->logout());
				}

			} else {
				$this->Session->setFlash('Usuário ou senha incorretos.', 'flash_error');
				return $this->redirect(array('controller' => 'login', 'action' => 'entrar'));
			}
		}
	}

	public function deslogar() {
		return $this->redirect($this->Auth->logout());
	}

}