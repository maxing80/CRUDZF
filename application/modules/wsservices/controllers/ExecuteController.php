<?php

class Wsservices_ExecuteController extends Zend_Controller_Action
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
    public function init()
    {
        $this->_helper->contextSwitch()
            ->addActionContext('index', array('xml', 'json'))
            ->setAutoJsonSerialization(false)
            ->initContext();
    }

    /**
     *
     */
    public function indexAction()
    {
        $server = new Zend_Rest_Server();
        $server->setEncoding('utf-8');
        $server->setClass('Ws_Empleado');
        $request = $this->getRequest();
        if ($request->getParam('format', $request) == 'json') {
            $server->returnResponse(true);
            $response = $server->handle();
            $json = Zend_Json::fromXml($response);
            echo Zend_Json::prettyPrint($json, array('format' => 'txt', 'ident' => 4));
        } else {
            $server->handle();
        }
    }
}