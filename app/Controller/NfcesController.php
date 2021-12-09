<?php
class NfcesController extends AppController {

    public function index() {
        $this->layout = 'metronic';
        $this->set('title_for_layout', 'Cupons');
        if ( $this->request->is('post') ) {
            $this->layout = "ajax";
            return $this->dataTable();
        }
    }

}