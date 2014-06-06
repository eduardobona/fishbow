<?php
class Application_Class_Filter_File implements Zend_Filter_Interface
{
    public function filter($value)
    {
        $name = iconv('UTF-8', 'ASCII//TRANSLIT', $value);
        $name = strtolower(trim($name, '-'));
        $name = preg_replace("/[\/_| -]+/", '-', $name);
        return $name;
    }
}
?>