<?php 
class MY_Loader extends CI_Loader {
    protected function get_assets_instance() {
        $CI = get_instance();
        return $CI->assets;
    }

    public function add_css_files($filenames = array(), $grupa = Assets::HEAD_BEGIN){
        $this->get_assets_instance()->add_css_files($filenames, $grupa);
    }

    public function add_css_file($filename, $grupa = Assets::HEAD_BEGIN){
        $this->get_assets_instance()->add_css_file($filename, $grupa);
    }

    public function add_js_files($filenames = array(), $grupa = Assets::HEAD_BEGIN){
        $this->get_assets_instance()->add_js_files($filenames, $grupa);
    }

    public function add_js_file($filename, $grupa = Assets::HEAD_BEGIN){
        $this->get_assets_instance()->add_js_files($filename, $grupa);
    }
}
?>
