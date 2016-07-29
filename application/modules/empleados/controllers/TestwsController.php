<?php

class Empleados_TestwsController extends Zend_Controller_Action
{
    /**
     *
     */
    public function preDispatch()
    {

        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();
    }

    /**
     *
     */
    public function testwsAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $data = array(
            'datos' => "maxing80@gmail.com",
        );
        $wsEmpleado = new Ws_Empleado();
        $response = $wsEmpleado->deleteEmpleado($data);;
        echo "<pre>" . print_r($response, true) . "</pre>";
        exit();
    }

    /**
     *
     */
    public function addAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $data = array(
            'nombre' => "Mario ",
            'apellidos' => "Sida",
            'f_nacimiento' => '05-04-1993',
            'ingresos' => '45000'
        );
        $wsEmpleado = new Ws_Empleado();
        $response = $wsEmpleado->addEmpleado($data);;
        echo "<pre>" . print_r($response, true) . "</pre>";
        exit();
    }

    /**
     *
     */
    public function editAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $data = array(
            'id_empleado' => "1",
            'nombre' => "Mario Alonso",
            'apellidos' => "Martinez Leandro",
            'f_nacimiento' => '02-12-1983',
            'ingresos' => '30000'
        );
        $wsEmpleado = new Ws_Empleado();
        $response = $wsEmpleado->editEmpleado($data);;
        echo "<pre>" . print_r($response, true) . "</pre>";
        exit();
    }

    /**
     *
     */
    public function deleteAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $data = array(
            'id_empleado' => "3",
        );
        $wsEmpleado = new Ws_Empleado();
        $response = $wsEmpleado->deleteEmpleado($data);;
        echo "<pre>" . print_r($response, true) . "</pre>";
        exit();
    }

    /**
     *
     */
    public function getAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $data = array(
            'id_empleado' => "5",
        );
        $wsEmpleado = new Ws_Empleado();
        $response = $wsEmpleado->getEmpleado($data);;
        echo "<pre>" . print_r($response, true) . "</pre>";
        exit();
    }

    /**
     *
     */

    public function getallAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $wsEmpleado = new Ws_Empleado();
        $response = $wsEmpleado->getAllEmpleados();;
        echo "<pre>" . print_r($response, true) . "</pre>";
        exit();
    }

    /**
     *
     */
    public function addwsAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $wsRestUrl = "http://crudpf.app/wsservices/execute/index/";
        try {
            $client = new Zend_Rest_Client($wsRestUrl);
            $data = array(
                'nombre' => "Mario",
                'apellidos' => "Martinez Leandro",
            );
            $result = $client->addEmpleado($data)->get();
            echo "<pre>" . print_r($result, true) . "</pre>";
        } catch (Exception $e) {
            var_dump($e);
        }
        exit();
    }
}