<?php

class ItemImg extends Zend_Db_Table_Abstract
{
	protected $_name = 'itemimg';

	public function getByItemId($iid)
	{
		$select = $this->select()
			   ->where("ItemId=?", $iid);
		return $this->fetchAll($select)->toArray();
	} 
}
