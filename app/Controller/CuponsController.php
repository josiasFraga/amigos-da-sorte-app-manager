<?php
class CuponsController extends AppController {
	public function encontrar_ganhador() {
		$this->layout = 'metronic';

        $this->set('title_for_layout', 'Encontrar Ganhador');

	}

    public function encontra_ganhador($campanha_id = "", $numero = "") {

        if ( $campanha_id == "" || $numero == "" ) {

            return $this->redirect(array('action' => 'encontrar_ganhador'));
        }
		$this->layout = 'metronic';
        
        $this->set(compact('campanha_id', 'numero'));
    }

}