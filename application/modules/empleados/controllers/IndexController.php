<?php

class Empleados_IndexController extends Zend_Controller_Action
{

    /**
     *
     */
    public function preDispatch()
    {
        $this->_helper->layout()->setLayout('empleados');
    }

    /**
     *
     */
    public function indexAction()
    {
        $this->view->registroForm = new Empleados_Form_Registro();
        $wsRestUrl = "http://crudpf.app/wsservices/execute/index/";
        try {
            $client = new Zend_Rest_Client($wsRestUrl);
            $this->view->empleadosList = $client->getAllEmpleados()->get();

        } catch (Exception $e) {
            var_dump($e);
        }

    }

    /**
     *
     */
    public function addempleadoAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams();
            $wsRestUrl = "http://crudpf.app/wsservices/execute/index/";
            try {
                $client = new Zend_Rest_Client($wsRestUrl);
                $data = array(
                    'nombre' => $data['nombre'],
                    'apellidos' => $data['apellidos'],
                    'f_nacimiento' => $data['f_nacimiento'],
                    'ingresos' => $data['ingresos']
                );

                $result = $client->addEmpleado($data)->get();
                echo $json = Zend_Json::encode($result->addEmpleado);

            } catch (Exception $e) {
                var_dump($e);
            }
        }
    }

    /**
     *
     */
    public function deleteempleadoAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams();
            $wsRestUrl = "http://crudpf.app/wsservices/execute/index/";
            try {
                $client = new Zend_Rest_Client($wsRestUrl);
                $result = $client->deleteEmpleado($data)->get();
                echo $json = Zend_Json::encode($result->deleteEmpleado);

            } catch (Exception $e) {
                var_dump($e);
            }
            exit();
        }
        $this->_redirect('/empleados/index/');
        exit();
    }
}