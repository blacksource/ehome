<?php

class News extends Zend_Db_Table_Abstract
{
	protected $_name = 'news';

	public function getById($id)
	{
		$news = $this->find($id)->toArray();
		return $news[0];
	}
}
