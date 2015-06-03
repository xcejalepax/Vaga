<?php

class Main extends MY_Controller {
    public function index(){
        $this->load->view('main', $this->data);
        
    }
}
?>
