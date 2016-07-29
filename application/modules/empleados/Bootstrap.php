<?php

class Empleados_Bootstrap extends Zend_Application_Module_Bootstrap
{
    /**
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Empleados_',
            'basePath' => APPLICATION_PATH . '/modules/empleados',
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