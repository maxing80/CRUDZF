<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAutoload()
    {
        $property = $this->getOptions();
        Zend_Registry::set('applicationIni', $property);
        $moduleLoader = new Zend_Application_Module_Autoloader(
            array('namespace' => ''
            , 'basePath' => APPLICATION_PATH)
        );
        return $moduleLoader;
    }

}

