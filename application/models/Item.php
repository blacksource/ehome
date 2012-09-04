<?php

class Item extends Zend_Db_Table_Abstract
{
	protected $_name = 'item';
	protected $_primary = 'ItemId';

	public function getByShopId($shopId)
	{
		$select = $this->select()
			   ->setIntegrityCheck(false)
			   ->from("item", array('ItemId','Title','PicUrl','Price'))
			   ->where("ShopId=?", $shopId);
		return $this->fetchAll($select)->toArray();
	} 

	public function getByBigClass($classId)
	{
		$select = $this->select()
				->setIntegrityCheck(false)
			   	->from("item", array('ItemId','Title','PicUrl','Price'))
				->where('BigClassId=?', $classId);
		return $this->fetchAll($select)->toArray();
	}

	public function getByLeafClass($classId)
	{
		$select = $this->select()
				->setIntegrityCheck(false)
			   	->from("item", array('ItemId','Title','PicUrl','Price'))
				->where('ClassId=?', $classId);
		return $this->fetchAll($select)->toArray();
	}
}