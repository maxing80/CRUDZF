<?php

/**
 * Created by PhpStorm.
 * User: Xion
 * Date: 29/07/16
 * Time: 11:32 AM
 */
class Wsservices_Model_Empleado extends Zend_Db_Table_Abstract
{
    protected $_name = 'empleado';
    protected $_primary = "id_empleado";

    public function getAllEmpleados(){

        $select = $this->select()
            ->setIntegrityCheck(false)
            ->from(array('emp' => 'empleado'), array(
                "id_empleado"
            , "emp.nombre"
            , "emp.apellidos"
            , "dat.f_nacimiento"
            , "dat.ingresos "
            ))
            ->joinLeft(array("dat" => "datos_empleado"), "emp.id_empleado = dat.id_empleado", array());
        $res = $this->fetchAll($select);

        return $res->toArray();
    }

    public function getEmpleado($data){

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
        $bind = array(
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
        );
        $row->setFromArray($bind);
        $id = $row->save();
        $data['id_empleado'] = "$id";
        $data['modelo'] = "Ok";

        return $data;
    }

    public function edit($data)
    {
        $dataTmp = array(
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
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