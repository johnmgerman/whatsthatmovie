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
	use \App\Model\Entity\Contact;
	use Cake\Mailer\Email;
	
	class LoginForm extends Form
	{
		protected function _buildSchema(Schema $schema)
		{
			return $schema->addField('USR_Name', 'string')
				->addField('USR_Password', ['type' => 'string']);
		}
		
		protected function _buildValidator(Validator $validator)
		{
			return $validator->add('USR_Name', 'format', [
						'rule' => 'email',
						'message' => 'A valid email address is required'
					])->add('USR_Password', 'length', [
					'rule' => ['minLength', 4],
					'message' => 'A password is required'
					]);
		}
		
		protected function _execute(array $data)
		{
			if ($this->validate($data))
				return true;
			
			return false;
		}
	}
?>