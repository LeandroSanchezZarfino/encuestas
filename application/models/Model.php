<?php
use Doctrine\ORM\EntityManager;
use application\models\IModel;

class Model extends CI_Model{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct() {
             $this->em = $this->doctrine->em;
    }

    private function ejecutar($unaTransaccion, $unElemento){
        try{
            $this->em->beginTransaction();
            $this->em->$unaTransaccion($unElemento);
            $this->em->commit();
            $this->em->flush();
        }
        catch (Exception $ex){
            log_message("error", $ex->getMessage());
            throw $ex;
        }
    }
    
    public function modificar($unElemento){
        $this->ejecutar("merge", $unElemento);
    }
    
    public function eliminar($unElemento){
        $this->ejecutar("remove", $unElemento);
    }
    
    public function agregar($unElemento){
        $this->ejecutar("persist", $unElemento);
    }
    
    public function buscar(string $unaEntidad, $unVerificador){
        if(is_array($unVerificador))return $this->buscarPor($unVerificador, $unaEntidad);
        else return $this->buscarPorId($unaEntidad, $unVerificador);
    }
    
    private function buscarPorId($unaEntidad, $unId){
        try{
            $entidad = $this->em->find($unaEntidad, $unId);
            return $entidad;
        }
        catch (Exception $ex){
            log_message("error", $ex->getMessage());
            throw $ex;
        }
    }
    
    private function buscarPor($unCriterio, $unaEntidad){
        try{
            $unObjeto = $this->em->getRepository($unaEntidad)->findOneBy($unCriterio);
            return $unObjeto;
        }
        catch (Exception $ex){
            log_message("error",__FILE__." ".__LINE__."  ". $ex->getMessage());
            throw $ex;
        }
    }
    
    public function existe(string $unaEntidad, $verificador){
        return (!is_null($this->buscar($unaEntidad, $verificador)));
    }
    
    public function buscarTodos(string $unaEntidad, $unVerificadfor = null ,$unOrden = null){
        if(is_null($unVerificadfor)) return $this->buscarTodosSinCriterio($unaEntidad, $unOrden);
        else return $this->buscarTodosPor($unVerificadfor, $unaEntidad, $unOrden);
    }
    
    private function buscarTodosPor($unCriterio, $unaEntidad, $unOrden = null){
        try{
            $unRepositorio = $this->em->getRepository($unaEntidad)->findBy($unCriterio,$unOrden);
            $this->em->flush();
            return $unRepositorio;
        }
        catch (Exception $ex){
            log_message("error", $ex->getMessage());
            throw $ex;
        }
    }
    
    private function buscarTodosSinCriterio($unaEntidad, $unOrden=null){
        try {
            $repositorio = $this->em->getRepository($unaEntidad)->findBy(array(),$unOrden);
            $this->em->flush();
            return $repositorio;
        }
        catch (Exception $ex){
            log_message("error", $ex->getMessage());
            throw $ex;
        }
    }
    
    public function ejecutarSql($sql){
        $this->em->getConnection()->getWrappedConnection()->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function ejecutarNonQuerySql($sql){
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute();
    }

    public function ejecutarDQL($dql, $parametro = array(), $debug = false , $limite = 0) : array{
        /* @var $query \Doctrine\ORM\Query */
        $query = $this->em->createQuery($dql);
        foreach ($parametro as $clave => $valor) {
            $query->setParameter($clave, $valor);
        }
        if($limite != 0)
            $query->setMaxResults($limite);
        if ($debug) {
            echo $query->getSQL();
        } else {
            $resultset = $query->getResult();
            return $resultset;
        }
    }
}