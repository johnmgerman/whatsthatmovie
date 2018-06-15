<?php

/*===========================================================

Author: John German

Description: .

Updated: 
				 
============================================================*/

	namespace App\Form;
	
	use Cake\Form\Form;
	use Cake\Form\Schema;
	use Cake\Validation\Validator;
	use \App\Model\Entity\User;
	
	class AddForm extends Form
	{
		protected function _buildSchema(Schema $schema)
		{
			return $schema->addField('usr_username', 'string')
				->addField('USR_Password', ['type' => 'string'])
				->addField('USR_ierjd', ['type' => 'string']);
		}
		
		protected function _buildValidator(Validator $validator)
		{
			return $validator->add('USR_UserName', 'length', [
					'rule' => ['minLength',4],
					'message' => 'A user name is required'
					])->add('USR_UserName', 'format', [
						'rule' => 'email',
						'message' => 'A valid email address is required'
					])->add('USR_Password', 'length', [
					'rule' => ['minLength', 4],
					'message' => 'A password is required'
					])/*->add('USR_Password', 'sameAs', [
					'rule' => ['sameAs', 'USR_ierjd', 'USR_Password'],
					'message' => 'sfd'
					])*/;
		}
		
		protected function _execute(array $data)
		{
			if ($this->validate($data))
				return true;
			
			return false;
		}
	}
?>