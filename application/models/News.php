<?php

class News extends Zend_Db_Table_Abstract
{
	protected $_name = 'news';

	public function getById($id)
	{
		$news = $this->find($id)->toArray();
		return $news[0];
	}

	public function getAll()
	{
		$select = $this->select();
		return $this->fetchAll($select)->toArray();
	}

	public function addView($id, $count)
	{
		$data = array('views'=>new Zend_Db_Expr('views+'.$count));
        $this->update($data, 'id='.$id);
	}

	public function getHot()
	{
		$select = $this->select()
					->setIntegrityCheck(false)
			   		->from("news", array('Id','Title'))
			   		->order("views DESC")
			   		->limit(10);
		return $this->fetchAll($select)->toArray();
	}
}
