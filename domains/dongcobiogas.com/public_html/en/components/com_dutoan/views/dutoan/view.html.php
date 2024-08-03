<?php
//file này nhận các dữ liệu cần thiết và đặt nó lên template(this file retrieves the necessary data 
//and pushes it into the template)
/*
	*	@package joomla component
	*	component/com_dutoan/site/views/dutoan/view.html.php
	*	@license	GNU/GPL
*/
//không được phép truy cập trực tiếp
defined('_JEXEC') or die('Restricted Access');

//Import view cho component
jimport('joomla.application.component.view');

//JView::assignRef
class dutoanViewdutoan extends JView
{
	function display($tpl=null)
	{
		$model=$this->getModel('dutoan');
		$greeting=$model->getGreeting();
		$this->assignRef('greting',$greeting);
		parent::display($tpl);
	}
}

?>