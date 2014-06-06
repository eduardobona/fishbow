<?php
class Application_Model_Row_ObjectBase extends Zend_Db_Table_Row_Abstract
{
	/*
	 public function __get($column) {
	 return $this->_data[$column];
	}
	*/
	
	public function __get($columnName)
	{
		$columnName = $this->_transformColumn($columnName);
		if (!array_key_exists($columnName, $this->_data)) {
			$this->_refresh();
			if (!array_key_exists($columnName, $this->_data)) {
				throw new Zend_Db_Table_Row_Exception("Specified column \"$columnName\" not exists in table");
			}
		}
		return $this->_data[$columnName];
	}
	
	public function setFromArray(array $data)
	{
		$data = array_intersect_key($data, $this->_data);
	
		$filter = new Zend_Filter_Word_UnderscoreToCamelCase();
		foreach ($data as $key => $value) {
			$method = 'set' . $filter->filter($key);
			if (!method_exists($this, $method)) {
				throw new Zend_Db_Exception("Can't set property '$key' couse method '$method' does not exists");
			}
			$this->$method($value);
		}
	}
	
	public function isNewRow() {
		return empty($this->_cleanData);
	}
}