<?php
use Entities\Perfil;
use Entities\Administrador;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'BaseController.php';

class Welcome extends BaseController {

    public function __construct(){
        parent::__construct();
    }

	public function test(){
        echo "holis";
    }

}
