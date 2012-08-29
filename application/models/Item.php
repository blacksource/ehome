<?php

class Item extends Zend_Db_Table_Abstract
{
	protected $_name = 'item';
	protected $_primary = 'ItemId';

	public function getByShopId($shopId)
	{
		$select = $this->select()
			   ->setIntegrityCheck(false)
			   ->from("Item", array('ItemId','Title','PicUrl','Price'))
			   ->where("ShopId=?", $shopId);
		return $this->fetchAll($select)->toArray();
	} 
}