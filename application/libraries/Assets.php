<?php

class Assets {

	protected $css_files = array();
	protected $js_files = array();
	protected $included_files = array();
	
	const UNDEFINED     = 0;
	const HEAD_BEGIN 	= 1;
	const HEAD_END 		= 2;
	const BODY_BEGIN 	= 3;
	const BODY_END 		= 4;
		
	protected function is_valid_group($grupa){
		switch ($grupa){
			case self::HEAD_BEGIN:  
			case self::HEAD_END: 
			case self::BODY_BEGIN: 
			case self::BODY_END:
				return true;
		}		
		return false;
	}

	protected function is_file_included($filename){
		return in_array($filename, $this->included_files);
	}
	
	public function add_css_files($filenames = array(), $grupa = self::HEAD_BEGIN){
		if(is_array($filenames)){
			foreach($filenames as $filename){			
				$this->add_css_file($filename, $grupa);			
			}
		}
	}
	
	public function add_css_file($filename, $grupa = self::HEAD_BEGIN){
		if($this->is_valid_group($grupa)
			&& !empty($filename)
			&&	!$this->is_file_included($filename)){
				$this->css_files[$grupa][] = $filename;
				$this->included_files[] = $filename;
		}
	}
	
	public function add_js_files($filenames = array(), $grupa = self::HEAD_BEGIN){
		if(is_array($filenames)){
			foreach($filenames as $filename){			
				$this->add_js_file($filename, $grupa);			
			}
		}
	}
	
	public function add_js_file($filename, $grupa = self::HEAD_BEGIN){
		if($this->is_valid_group($grupa)
			&& !empty($filename)
			&&	!$this->is_file_included($filename)){
				$this->js_files[$grupa][] = $filename;
				$this->included_files[] = $filename;
		}
	}
	
	public function get_css_files($grupa = self::HEAD_BEGIN){
		if(empty($this->css_files[$grupa])){
			return array();
		}
		return $this->css_files[$grupa];
	}
	
	public function get_js_files($grupa = self::HEAD_BEGIN){
		if(empty($this->js_files[$grupa])){
			return array();
		}
		return $this->js_files[$grupa];
	}
	public function get_all_assets(){
            $all_assets = array();
            $groups = array(
                self::HEAD_BEGIN,
                self::HEAD_END,
                self::BODY_BEGIN,
                self::BODY_END
            );
            
            foreach ($groups as $group) {
                $all_assets[$group] = array(
                    'css' => $this->get_css_files($group),
                    'js' => $this->get_js_files($group),
                );
}
            return $all_assets;
        }
}

?>