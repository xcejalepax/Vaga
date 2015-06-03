+<?php

class Join extends Base_Controller {

    public function index() {
        $this->load->helper('form');
        $this->load->view('join', $this->data);
    }

    public function submit() {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('ime', 'Ime', 'trim|required|max_length[45]|min_length[2]');
        $this->form_validation->set_rules('prezime', 'Prezime', 'trim|required|max_length[45]|min_length[2]');
        $this->form_validation->set_rules('korisnicko_ime', 'Korisnicko ime', 'trim|required|max_length[20]|min_length[5]|is_unique[korisnici.korisnicko_ime]');
        $this->form_validation->set_rules('lozinka', 'Lozinka', 'trim|required|max_length[255]|min_length[8]');
        $this->form_validation->set_rules('potvrda_lozinke', 'Potvrda Lozinke', 'matches[lozinka]');
        $this->form_validation->set_rules('datum_rodjenja', 'Datum rodjenja', 'trim|required|valid_date');
        $this->form_validation->set_rules('visina', 'Visina', 'trim|required|numeric');
        $this->form_validation->set_rules('pol', 'Pol', 'trim|required|enum[male,female]');

        $this->form_validation->set_message('valid_date', 'Field %s must be in the following format YYYY-MM-DD');
        $this->form_validation->set_message('enum', 'Field %s has invalid value.');

        $success = $this->form_validation->run();
        if ($success) {
            //snimi u bazu
            $this->load->model('korisnici_model');
            $this->load->library('encrypt');
            $this->load->helper('security');


            $row = array(
            'ime' => $this->input->post('ime'),
            'prezime' => $this->input->post('prezime'),
            'korisnicko_ime' => $this->input->post('korisnicko_ime'),
            'lozinka' => $this->encrypt->encode(do_hash($this->input->post('lozinka'), 'md5')),
            'datum_rodjenja' => $this->input->post('datum_rodjenja'),
            'visina' => $this->input->post('visina'),
            'pol' => $this->input->post('pol')
            );

            $this->korisnici_model->add_row($row);
            redirect('/login');
        } else {
            //prikazi greske
            $this->data = array(
                'errors' => $this->form_validation->error_array(),
            );
            $this->index();
        }
    }

}
?>
