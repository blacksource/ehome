<?php

class Shop extends Zend_Db_Table_Abstract
{
	protected $_name = 'shop';

	public function getById($id)
	{
		$shopModel = $this->find($id)->toArray();
		return $shopModel[0];
	}
}