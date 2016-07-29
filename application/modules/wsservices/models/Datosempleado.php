<?php

/**
 * Created by PhpStorm.
 * User: Xion
 * Date: 29/07/16
 * Time: 11:32 AM
 */
class Wsservices_Model_Datosempleado extends Zend_Db_Table_Abstract
{
    protected $_name = 'datos_empleado';
    protected $_primary = "id_datos_empleado";

    public function getAll()
    {
        return $this->fetchAll(null, "id_empleado asc");
    }
    public function getEmpleado($data){
        $sql = "select emp.id_empleado, emp.nombre, emp.apellidos, dat.f_nacimiento, dat.ingresos 
                from empleado emp
                left join datos_empleado dat on emp.id_empleado = dat.id_empleado";
        //die($select->__toString()."\n");



        $select = $this->select()
            ->setIntegrityCheck(false)
            ->from(array('emp' => 'empleado'), array(
            "id_empleado"
            , "emp.nombre"
            , "emp.apellidos"
            , "dat.f_nacimiento"
            , "dat.ingresos "
            ))
            ->joinLeft(array("dat" => "datos_empleado"), "emp.id_empleado = dat.id_empleado", array())
            ->where("emp.id_empleado = ?", $data['id_empleado']);
        $res = $this->fetchAll($select);

        return $res->toArray();
    }

    public function add($data)
    {
        $row = $this->createRow();
        $fNacimiento = new Zend_Date($data['f_nacimiento'], 'dd-mm-yyyy');

        $bind = array(
            'id_empleado' => $data['id_empleado'],
            'f_nacimiento' => $fNacimiento->toString("yyyy-mm-dd"),
            'ingresos' => $data['ingresos'],
        );
        $row->setFromArray($bind);
        $id = $row->save();
        $data['modelo'] = "Ok $id";

        return $data;
    }

    public function edit($data)
    {
        $fNacimiento = new Zend_Date($data['f_nacimiento'], 'dd-mm-yyyy');
        $dataTmp = array(
            'f_nacimiento' => $fNacimiento->toString("yyyy-mm-dd"),
            'ingresos' => $data['ingresos'],
        );
        $res = $this->update($dataTmp, "id_empleado = {$data['id_empleado']}");
        $response = "Ok ($res)";

        return $response;
    }

    public function deleteE($data)
    {
        $res = $this->delete("id_empleado = {$data['id_empleado']}");
        $response = "Ok ($res)";

        return $response;
    }

}