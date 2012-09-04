<?php

class Product extends Zend_Db_Table_Abstract
{
	protected $_name = 'product';
	protected $_primary = 'ProductId';

	public function getByItemId($iid)
	{
		$select = $this->select()
			   ->setIntegrityCheck(false)
			   ->from("product", array('ProductId','Color','Specification'))
			   ->where("ItemId=?", $iid);
		return $this->fetchAll($select)->toArray();
	}
}
