<?php
/**
 * Created by PhpStorm.
 * User: Ezequiel
 * Date: 28/12/2018
 * Time: 10:56
 */


class BaseController extends \CI_Controller{
    private static $lenguaje;
    private static $smatyci;
    private static $model;
    private static $input;

    public function __construct(){
        if(is_null(parent::get_instance())){
            parent::__construct();
            $this->init();
        }
    }

    protected function logVarDumpFor($aVariable){
        ob_start();
        var_dump($aVariable);
        $contents = ob_get_contents();
        ob_end_clean();
        log_message("error", $contents);
    }

    private function init(){
        self::$lenguaje = $this->lang;
        self::$smatyci = $this->smarty;
        $this->smarty->configLoad(VIEWPATH."/config.conf");
        self::$input = $this->input;
    }

    /**
     * @return  Smarty
     */
    protected static function smarty(){
        return self::$smatyci;
    }

    protected function cargar($tipo,$deNombre){
        parent::get_instance()->load->$tipo($deNombre);
        return parent::get_instance()->$deNombre;
    }

    public function recuperarPost($unParametro = null){
        if(is_array($unParametro)){
            $values = array();
            foreach ($unParametro as $unVerdaderoParametro){
                $values[$unVerdaderoParametro] = self::$input->post($unVerdaderoParametro);
            }
            return $values;
        }
        else{
            return is_null($unParametro)? self::$input->post() : self::$input->post($unParametro);
        }
    }

    protected function recuperarArchivos($input) {
        $target_dir = APPPATH.'../'.ATTACHMENTS_PUBLIC_DIR;
        $archivos  = [];
        if( isset($_FILES[$input]['name'])) {

            $total_files = count($_FILES[$input]['name']);
            $dir_nameee = hash("sha256",uniqid().uniqid().microtime());
            while(file_exists($target_dir.$dir_nameee)){
                $dir_nameee = hash("sha256",uniqid().uniqid().microtime());
            }
            mkdir($target_dir.$dir_nameee, 0777, true);

            for($key = 0; $key < $total_files; $key++) {

                // Check if file is selected
                if(isset($_FILES[$input]['name'][$key])
                    && $_FILES[$input]['size'][$key] > 0) {

                    $original_filename = $_FILES[$input]['name'][$key];
                    $target = $target_dir . $dir_nameee. "/".basename($original_filename);
                    $tmp  = $_FILES[$input]['tmp_name'][$key];
                    move_uploaded_file($tmp, $target);
                    array_push($archivos, [
                        "nombre" => basename($original_filename),
                        "carpeta" => $dir_nameee
                    ]);
                }
            }
        }
        return $archivos;
    }

    public function recuperarGet($unParametro = null){
        if(is_array($unParametro)){
            $values = array();
            foreach ($unParametro as $unVerdaderoParametro){
                $values[$unVerdaderoParametro] = self::$input->get($unVerdaderoParametro);
            }
            return $values;
        }
        else{
            return is_null($unParametro)? self::$input->get() : self::$input->get($unParametro);
        }
    }

    protected function getUsuarioLogueado(){
        return $this->usuarioModel()->usuarioLogueado();
    }

    protected function usuarioLogueadoTienePermisoPara($unaAccion){
        if($this->usuarioModel()->hayUsuarioLogueado()){
            return self::getUsuarioLogueado()->tenesPermisoPara(self::dictonaryPermisos()[$unaAccion]);
        }
        else return false;
    }

    protected function hayUsuarioLogueado(){
        return $this->usuarioModel()->hayUsuarioLogueado();
    }

    protected function dictonaryPermisos(){
        /** @var PermisoModel $permisosModel */
        $permisosModel = self::cargar("model","PermisoModel");
        return $permisosModel->dictionaryPermisos();
    }

    private function asignarPsermisos(){
        self::smarty()->assign("permisos",$this->dictonaryPermisos());
    }

    protected function permisoRequerido($permiso, $modal = false, $json = false){
        if(!$this->usuarioLogueadoTienePermisoPara($permiso)){
            $modal? $this->accesoDenegadoModal($json) : $this->redirigirProhibido();
        }
    }

    protected function sesionRequerida(){
        if(!$this->hayUsuarioLogueado()){
            $this->redirigirInicio();
        }
    }

    private function redirigirInicio(){
        redirect('/', 'refresh');
        die();
    }

    protected function redirigirProhibido(){
        redirect('/', 'refresh');
        die();
    }
}