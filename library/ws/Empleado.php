<?php

class Ws_Empleado
{
    /**
     * @param $data
     * @return array
     */
    public function testWebService($data)
    {
        $wSResponseRP = array("testWebService" => "OK");
        return $wSResponseRP;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function addEmpleado($data)
    {
        $empleado = new Wsservices_Model_Empleado;
        $response = $empleado->add($data);
        $data['id_empleado'] = $response['id_empleado'];
        $datEmpleado = new Wsservices_Model_Datosempleado();
        $datEmpleado->add($data);
        return $response;
    }

    /**
     * @param $data
     * @return string
     */
    public function editEmpleado($data)
    {
        $empleado = new Wsservices_Model_Empleado;
        $response = $empleado->edit($data);
        $datEmpleado = new Wsservices_Model_Datosempleado();
        $datEmpleado->edit($data);
        return $response;
    }

    /**
     * @param $data
     * @return string
     */
    public function deleteEmpleado($data)
    {
        $empleado = new Wsservices_Model_Empleado;
        $response = $empleado->deleteE($data);
        $datEmpleado = new Wsservices_Model_Datosempleado();
        $datEmpleado->deleteE($data);

        return $response;
    }

    /**
     * @param $data
     * @return array
     */
    public function getEmpleado($data)
    {
        $empleado = new Wsservices_Model_Empleado;
        $response = $empleado->getEmpleado($data);
        return $response;
    }

    /**
     * @return array
     */
    public function getAllEmpleados()
    {
        $empleado = new Wsservices_Model_Empleado;
        $response = $empleado->getAllEmpleados();
        return $response;
    }
}