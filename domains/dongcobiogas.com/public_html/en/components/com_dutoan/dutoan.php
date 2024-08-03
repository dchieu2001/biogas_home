<?php
//đây là điểm đầu vào cho component của chúng ta(this is the entry point to our component)
//Về bản chất file điểm vào này điều khiển các controller để thực thi các nhiệm vụ
/*
	* package Component Joomla
	* component/com_dutoan/site/dutoan.php
	* @license 	GNU/GPL
*/

//không cho phép truy cập vào trực tiếp
defined('_JEXEC') or die('Restricted access');

//Nhúng file controller cơ bản vào 
//JPATH_COMPONENT : đường dẫn tuyệt đối tới component hiện tại
//DS :dấu phân cách trong hệ thống ('/' hoặc '\') thiết lập tự động bơi Joomla
require_once(JPATH_COMPONENT.DS.'controller.php');

//Nhúng file controller đặc biệt vào nếu có yêu cầu
if($controller=JRequest::getWord('controller'))
{
	$path=JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if(file_exists($path))
	{
		require_once $path;
	}
	else
	{
		$controller='';
	}
}

//Tạo Controller
$classname	='dutoanController'.$controller;
$controller	=new $classname();

//Thực thi các nhiệm vụ được yêu cầu
$controller->execute(JRequest::getVar('task')); 
//JRequest::getVar('') : lấy giá trị biến task có thể là GET hoặc POST
//ví dụ :index.php?option=com_dutoan&task=new 
//task có thể mang giá trị "new" ,"save" ,"edit" ,"display" ...
//Nếu không có nhiệm vụ nào thi mặc định là display .
//khi "display" được sử dụng biến "view" quyết dịnh hiển thị cái gì .

//Chuyển hướng nếu thiết lập bởi controller
$controller->redirect();
?>