<?php
/*
	*	@package joomla component
	*	model dutoan 
	*	component/com_dutoan/site/models/dutoan.php
	*	@license	GNU/GPL
*/
//không cho phép truy cập trực tiếp
defined('_JEXEC') or die('Restricted Access');

//import thư viện model cho component
//các thư viện cho component có thể tìm thấy ở /libraries/joomla/application/component
jimport('joomla.application.component.model');

//cách thông thường đặt tên cho các model trong joomla là : Tên Component + 'Model' + Tên Model


class dutoanModeldutoan extends JModel
{
	/*
		Hàm GetGreeting() trả về lời chời hiển thị đến người dùng
	*/
	function getGreeting()
	{
		$db=JFactory::getDBO();
		$query='select greeting FROM #__dutoan';
		$db->setQuery($query);
		$greeting=$db->loadResult();
		return $greeting;
	}
}

?>