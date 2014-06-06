<?php
class Application_Class_Handling_Image
{
	public static $_path;
	
	public static function remove($name)
	{
	    unlink(self::$_path.$name);
	}
	
	public static function rename($name)
	{
		$datetime = new \DateTime();
	    $filter = new Application_Class_Filter_File();
		$new_name = $filter->filter($datetime->format('Y-m-d-H-i-s').'-'.$name);
		rename(self::$_path.$name, self::$_path.$new_name);
		return $new_name;
	}
	
	public static function resize($image, $width, $height = null, $prefix = null)
	{
		if ($prefix) {
			$new_name = $prefix.'-'.$image;
		}
		else {
			$new_name = $image;
		}	
		
		$new_image = self::$_path.$new_name;
		/*
		if (!$height) {
			$height = (($width / 100) * 80);
		}
		*/
		
		WideImage::load(self::$_path.$image)->resize($width, $height, "outside")
		//->crop(0, 0, $width, $height)
		->saveToFile($new_image);
	}
}
?>