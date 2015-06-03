<?php

class Merenja extends MY_Controller {

    public function index() {
        $this->load->helper('form');
        $this->data['action'] = 'create';
        $this->data['merenje'] = array(
            'tezina' => $this->input->post('tezina'),
            'masti' => $this->input->post('masti'),
            'misici' => $this->input->post('misici'),
            'voda' => $this->input->post('voda'),
            'kosti' => $this->input->post('kosti'),
            'datum' => $this->input->post('datum'),
        );
        if (empty($this->data['merenje']['datum'])) {
            $this->data['merenje']['datum'] = date('Y-m-d', time());
        }

        $this->load->view('merenja', $this->data);
    }

    public function submit() {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->form_validation->set_rules('tezina', 'Kilogrami', 'required|decimal');
        $this->form_validation->set_rules('masti', 'Masti', 'required|decimal');
        $this->form_validation->set_rules('misici', 'Mišići', 'required|decimal');
        $this->form_validation->set_rules('voda', 'Voda', 'required|decimal');
        $this->form_validation->set_rules('kosti', 'Kosti', 'required|decimal');
        $this->form_validation->set_rules('datum', 'Datum', 'required|valid_date');

        $this->form_validation->set_message('valid_date', 'Field %s must be in the following format YYYY-MM-DD');

        $success = $this->form_validation->run();
        if ($success) {
            //snimi u bazu
            $this->load->model('merenja_model');
            $this->action = $this->input->post('action');

            $row = array(
                'tezina' => $this->input->post('tezina'),
                'masti' => $this->input->post('masti'),
                'misici' => $this->input->post('misici'),
                'voda' => $this->input->post('voda'),
                'kosti' => $this->input->post('kosti'),
                'datum' => $this->input->post('datum')
            );
            $row['id_korisnika'] = $this->data['user']['id_korisnika'];
            switch ($this->action) {
                case 'create':
                    $this->merenja_model->add_row($row);
                    redirect('/pregled');
                    break;
                case 'edit':
                    $where = array(
                        'id_merenja' => $this->input->post('id_merenja')
                    );
                    $this->merenja_model->update_row($where, $row);
                    redirect('/pregled');
                    break;
                default:
                    $this->form_validation->set_error('form', 'Unknown action');
            }
        }
        //prikazi greske
        $this->data['errors'] = $this->form_validation->error_array();
        $this->index();
    }

    public function edit() {
        $this->data['action'] = 'edit';
        $this->load->helper('form');
        $id_merenja = $this->uri->segment(3, '');
        $this->load->model('merenja_model');
        $row = $this->merenja_model->find_row(array('id_merenja' => $id_merenja));
        $row['datum'] = date('Y-m-d', strtotime($row['datum']));
        $this->data['merenje'] = $row;
        // ovde mozda treba da se napravi da ako f-ja nije nista vratila onda da javi neku gresku ??
        $this->load->view('merenja', $this->data);
    }

    public function delete() {
        $id_merenja = $this->uri->segment(3, '');
        $this->load->model('merenja_model');
        $this->merenja_model->delete_row(array(
            'id_merenja' => $id_merenja
        ));
        redirect('/pregled');
    }

}

?>