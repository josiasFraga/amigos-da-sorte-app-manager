<?php
class CampanhasController extends AppController {
	public function index() {
		$this->layout = 'metronic';

        $this->set('title_for_layout', 'Gerenciar Campanhas');

	}
	public function adicionar() {
		$this->layout = 'metronic';

        $this->set('title_for_layout', 'Adicionar Campanha');

	}

	public function alterar($id = null) {
		$this->layout = 'metronic';

        $this->set('title_for_layout', 'Adicionar Campanha');

		if ( $id == null ) {
			return $this->redirect(array('controller' => 'campanhas', 'action' => 'index'));
		}

		$this->set(compact("id"));

	}
}