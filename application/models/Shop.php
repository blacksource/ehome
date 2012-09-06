<?php

class Shop extends Zend_Db_Table_Abstract
{
	protected $_name = 'shop';

	public function getById($id)
	{
		$shopModel = $this->find($id)->toArray();
		return $shopModel[0];
	}

	public function addView($id, $count)
	{
		$data = array('views'=>new Zend_Db_Expr('views+'.$count));
        $this->update($data, 'id='.$id);
	}
}