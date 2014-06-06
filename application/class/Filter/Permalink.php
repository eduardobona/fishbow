<?php
class Application_Class_Filter_Permalink implements Zend_Filter_Interface
{
    public function filter($value)
    {
        $permalink = iconv('UTF-8', 'ASCII//TRANSLIT', $value);
        $permalink = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $permalink);
        $permalink = strtolower(trim($permalink, '-'));
        $permalink = preg_replace("/[\/_| -]+/", '-', $permalink);
        return $permalink;
    }
}
?>