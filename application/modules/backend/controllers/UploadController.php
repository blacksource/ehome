<?php
class Backend_UploadController extends Zend_Controller_Action
{
	public function init()
	{
		try {
		$this->_helper->layout->setLayout('admin');	
			
		} catch (Exception $e) {
			echo $e;
		}
	}

	public function indexAction()
	{
		$request = $this->getRequest();
		if($request->isPost())
		{
			$channel = $request->getParam('channel');
			$suffix = $request->getParam('suffix');
			$fileName = $request->getParam('fileName');

			if($_FILES['uploadFile']['type'] == "image/jpeg" ||
				$_FILES['uploadFile']['type'] == "image/png" || 
				$_FILES['uploadFile']['type'] == "image/gif")
			{
				$rootPath = $_SERVER['DOCUMENT_ROOT'];
				$picPath = '/upload/'.$channel.'/'.date('Ym').'/';
				if(!file_exists($rootPath.$picPath))
				{   
					if(!mkdir($rootPath.$picPath,0777))
					{   
				   		echo('创建文件夹失败:'.$rootPath.$picPath);   
					}
				}
				if($fileName != '')
				{
					$fileName = $fileName.$suffix.strrchr($_FILES['uploadFile']['name'], '.');
				}
				else
				{
					$fileName = date('dhis').$suffix.strrchr($_FILES['uploadFile']['name'], '.');
				}

				echo $fileName;
				return;
				

				if(!move_uploaded_file($_FILES['uploadFile']['tmp_name'], $rootPath.$picPath.$fileName))
				{
					echo "upload filed";
				}
				else
				{
					echo $picPath.$fileName;
				}
			}
			else
			{
				echo "文件类型错误";
				return;
			}
			
		}
	}
}