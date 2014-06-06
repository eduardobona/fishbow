<?php
class Application_Class_Handling_File
{
	public static $_path;
	
	public static function remove($name)
	{
	    unlink(self::$_path.$name);
	}
	
	public static function rename($name)
	{
	    $filter = new Application_Class_Filter_File();
		$new_name = $filter->filter($name);
		rename(self::$_path.$name, self::$_path.$new_name);
		return $new_name;
	}
}
?>