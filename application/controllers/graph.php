<?php

class Graph extends MY_Controller {

    public function index() {
        $this->data['width'] = 800;
        $this->data['height'] = 400;
        $this->load->model('merenja_model');
        $query = $this->merenja_model->graph_kilogrami_vreme(array(
            'id_korisnika' => $this->data['user']['id_korisnika']
        ));
        $series_data = array();
        foreach ($query->result_array() as $row) {
            $time = strtotime($row['datum']);
            $series_data['kilogrami'][] = array('x' => $time, 'y' => floatval($row['tezina']));
            $series_data['voda'][] = array('x' => $time, 'y' => floatval($row['voda']));
            $series_data['masti'][] = array('x' => $time, 'y' => floatval($row['masti']));
            $series_data['kosti'][] = array('x' => $time, 'y' => floatval($row['kosti']));
        }
        $this->data['series'] = array(
            array(
                'name' => 'kilogrami',
                'color' => '#50C020',
                'data' => $series_data['kilogrami']
            ),
            array(
                'name' => 'voda',
                'color' => '#502020',
                'data' => $series_data['voda']
            ),
            array(
                'name' => 'masti',
                'color' => '#20C020',
                'data' => $series_data['masti']
            ),
            array(
                'name' => 'kosti',
                'color' => '#c05020',
                'data' => $series_data['kosti']
            ),
        );
        return $this->load->view('graph', $this->data);
    }

}

?>