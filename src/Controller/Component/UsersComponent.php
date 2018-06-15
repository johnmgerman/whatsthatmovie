<?php

/*===========================================================

Author: John German

Description: .

Updated: 
				 
============================================================*/

	namespace App\Controller\Component;

	use Cake\Controller\Component;

	class UsersComponent extends Component
	{
		public static function getCurrentLoginAction($auth) {
			//return '';
			if ($auth->user())
				return $auth->getConfig('logoutAction');
			else
				return $auth->getConfig('loginAction');
		}
		
		public static function checkForAddButton($auth) {
			//return '';
			if ($auth->user())
				return "visibility:hidden;display:none";
			else
				return "visibility:visible";
		}
	}
?>