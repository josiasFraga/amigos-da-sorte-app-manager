<?php
class CuponsController extends AppController {
	public function encontrar_ganhador() {
		$this->layout = 'metronic';

        $this->set('title_for_layout', 'Encontrar Ganhador');

	}
    public function index() {
        $this->layout = 'metronic';
        $this->set('title_for_layout', 'Cupons');
        if ( $this->request->is('post') ) {
            $this->layout = "ajax";
            return $this->dataTable();
        }
    }

    public function encontra_ganhador($campanha_id = "", $sorteio_id = '', $numero = "") {

        if ( $campanha_id == "" || $sorteio_id == "" || $numero == "" ) {

            return $this->redirect(array('action' => 'encontrar_ganhador'));
        }
		$this->layout = 'metronic';
        
        $this->set(compact('campanha_id', 'numero', 'sorteio_id'));
    }

	public function exportar_listagem() {

        $this->layout = 'metronic';
        $this->set('title_for_layout', 'Exportar Listagem');

	}

}