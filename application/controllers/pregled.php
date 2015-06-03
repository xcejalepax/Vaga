<?php

class Pregled extends MY_Controller {

    public function index() {
        $this->load->helper('form');
        $this->show_table();
    }

 
	
	public function show_table(){
		$this->load->model('merenja_model');
		$this->load->library('pagination');
		
		$config = array();
		$config['base_url'] = base_url(). "pregled/show_table";
		$config['total_rows'] = $this->merenja_model->count_rows(array('id_korisnika' => $this->data['user']['id_korisnika']));
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3))? $this->uri_segment(3):0;
		$this->data['results'] = $this->merenja_model->find_rows(array('id_korisnika' => $this->data['user']['id_korisnika']), $config['per_page'], $page);
		$this->data['links'] = $this->pagination->create_links();
		$this->load->view('pregled', $this->data);

	}

}

?>