<?php

/**
 * Descripción corta del fichero
 *
 */
class Empleados_Form_Registro extends Zend_Form
{
    /**
     * Metodo que crea el formulario con los campos y validadores necesarios
     * @return	render Zend_Form
     */
    public function init()
    {
        $this->setName('registro')
            ->setAction('index/addempleado')
            ->setMethod('post');

        $this->addElements(array(
            new Zend_Form_Element_Text('nombre', array(
                'required'		=>	true,
                'filters'		=>	array('StringTrim', 'StripTags'),
                'validators' 	=>	array('Alpha')
            )),
            new Zend_Form_Element_Text('apellidos', array(
                'required'		=>   true,
                'filters'		=>   array('StringTrim', 'StripTags'),
                'validators'	=>   array('Alpha')
            )),
            new Zend_Form_Element_Text('f_nacimiento', array(
                'required'		=>   true,
                'filters'		=>   array('StringTrim', 'StripTags'),
                'validators'	=>   array('Alpha')
            )),
            new Zend_Form_Element_Text('ingresos', array(
                'required'		=>   true,
                'filters'		=>   array('StringTrim', 'StripTags'),
                'validators'	=>   array('Alpha')
            ))
        ));
        $submit = new Zend_Form_Element_Submit('Registrar');
        $submit->setValue('Registrar');
        $this->addElement($submit);


        $this->setElementDecorators(array('ViewHelper'));
        $this->setDecorators(array(array('ViewScript', array('viewScript' => 'index/registro.phtml'))));

        return $this->render();

    } // end init
}