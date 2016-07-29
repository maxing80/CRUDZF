<?php

class Wsservices_Bootstrap extends Zend_Application_Module_Bootstrap
{
    /**
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Wsservices_',
            'basePath' => APPLICATION_PATH . '/modules/wsservices',
            'resourceTypes' => array(
                'form' => array(
                    'path' => 'forms/',
                    'namespace' => 'Form',
                ),
                'model' => array(
                    'path' => 'models/',
                    'namespace' => 'Model',
                ),
            )
        ));
        return $autoloader;
    }
}