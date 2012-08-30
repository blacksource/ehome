<?php

class ShopBadge extends Zend_Db_Table_Abstract
{
	protected $_name = 'ShopBadge';

	public function getByShopId($shopId)
	{
		$select = $this->select()
					->setIntegrityCheck(false)
					->from(array('s'=>'shopbadge'), array('ShopId', 'BadgeId'))
					->joinLeft(array('b'=>'badge'), 's.BadgeId=b.Id',
						array('Name', 'PicUrl'))
					->where("s.ShopId=?", $shopId);
		return $this->fetchAll($select)->toArray();
	}
}