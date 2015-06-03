<?php

class Base_controller extends CI_Controller {

    protected $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->library('Assets');
        $this->data['title'] = 'Vaga';
    }
    
    protected function is_logged_in() {
        $this->load->helper('cookie');
        $crypted_login = get_cookie('auth');
        if (!empty($crypted_login)) {
            $this->load->model('login_model');
            $this->load->library('encrypt');
            $id_login = $this->encrypt->decode($crypted_login);
            $row = $this->login_model->find_row(array('id_login' => $id_login));
        }
        if (empty($row)) {
            return false;
        }
        $this->load->model('korisnici_model');
        $user = $this->korisnici_model->find_row(
                array(
                    'id_korisnika' => $row['id_korisnika']
                )
        );
        if (empty($user)) {
            return false;
        }
        unset($user['lozinka']);	//brise se lozinka iz niza $data zbog sigurnosti
        $user['id_login']= $id_login;
        $this->data['user'] = $user;
        return true;
    }

}

class MY_Controller extends Base_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->is_logged_in() === false) {
            redirect('/login');
        }
    }
    
    public function _output($content) {
        $this->data['assets'] = $this->assets->get_all_assets();
        echo $this->load->view('partials/html_begin', $this->data, true);
        echo $content;      
        echo $this->load->view('partials/html_end', $this->data, true);
    }
}

?>
