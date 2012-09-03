<?php

class Article extends Zend_Db_Table_Abstract
{
	protected $_name = 'article';

	//http://framework.zend.com/manual/en/zend.paginator.usage.html
	public function getAll($pageSize, $pageIndex)
	{

	}

	public function getById($id)
	{
		$article = $this->find($id)->toArray();
		return $article[0];
	}
}