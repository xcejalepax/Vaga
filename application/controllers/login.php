<?php

class Login extends Base_Controller {

    public function index() {
        if ($this->is_logged_in() === true) {
            redirect('/');
        }
        $this->load->view('login', $this->data);
    }

    public function submit() {
        if ($this->is_logged_in() === true) {
            redirect('/');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('korisnicko_ime', 'Korisnicko ime', 'trim|required');
        $this->form_validation->set_rules('lozinka', 'Lozinka', 'trim|required');

        if ($this->form_validation->run()) {
            $this->load->model('korisnici_model');
            $user = $this->korisnici_model->find_row(array('korisnicko_ime' => $this->input->post('korisnicko_ime')));
            if (!empty($user)) {
                $this->load->library('encrypt');
                $this->load->helper('security');
                $lozinka_md5 = do_hash($this->input->post('lozinka'), 'md5');
                $lozinka_md5_baza = $this->encrypt->decode($user['lozinka']);
                if ($lozinka_md5_baza == $lozinka_md5) {
                    $this->load->helper('cookie');
                    $this->load->model('login_model');
                    $this->login_model->add_row(array(
                        'id_korisnika' => $user['id_korisnika'],
                        'datum' => time()
                    ));
                    $id_login = $this->db->insert_id();
                    $cookie = array(
                        'name' => 'auth',
                        'value' => $this->encrypt->encode($id_login),
                        'expire' => '86500',
                        'domain' => preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/", "$1", base_url()),
                        'path' => '/',
                    );
                    set_cookie($cookie);
                    header("Location: " . base_url());  //umesto redirect(/) 
                    die();
                }
            }
        }
        $this->form_validation->set_error('form', 'Pogresno korisnicko ime ili lozinka');
        $this->data['errors'] = $this->form_validation->error_array();
        $this->index();
    }

    public function logout() {
        if ($this->is_logged_in() === true) {

            // delete auth cookie
            $this->load->helper('cookie');
            delete_cookie('auth');

            // delete from login table
            $this->load->model('login_model');
            $this->login_model->delete_row(array(
                'id_login' => $this->data['user']['id_login']
            ));
        }
        header("Location: " . base_url('/login'));
    }

}

?>
