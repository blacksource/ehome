<?php

class Category extends Zend_Db_Table_Abstract
{
	protected $_name = 'category';

	public function getByClass1($classId)
	{
		$select = $this->select()
					->where('ClassId1=?', $classId);
		return $this->fetchAll($select)->toArray();
	}
}