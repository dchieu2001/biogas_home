<?php
//file này có chứa controller cơ bản (this file contains our base controller)
/*
	*	@package 	Joomla Component
	*	component/com_dutoan/site/controller.php
	*	@license GNU/GPL
*/
//không được phép truy cập trực tiếp
defined('_JEXEC') or die('Restricted Access');

//Import controller cho component
jimport('joomla.application.component.controller');

class dutoanController extends JController
{
	//Hàm hiển thị 
	//@access :public
	function display()
	{
		parent::display();
	}
}

?>