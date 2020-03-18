<?php
require_once "vendor/autoload.php";
class Smartyci extends Smarty{

    public function __construct() {
        parent::__construct();
        $this->caching = false;
        $this->force_compile = true;
        $this->setTemplateDir(APPPATH . 'views');
        $this->setCompileDir(APPPATH . 'third_party/smarty/templates_c');
        $this->setConfigDir(APPPATH . 'third_party/smarty/configs');
        $this->setCacheDir(APPPATH . 'cache');
        $this->noCache();
    }
    
    private function noCache() {
        $files = glob(APPPATH . 'third_party/smarty/templates_c/*'); 
        foreach($files as $file){ 
          if(is_file($file)) {
                unlink($file); 
          }
        }
    }
}
