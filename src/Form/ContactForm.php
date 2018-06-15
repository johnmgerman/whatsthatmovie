<?php
	namespace App\Form;
	
	use Cake\Form\Form;
	use Cake\Form\Schema;
	use Cake\Validation\Validator;
	use \App\Model\Entity\Contact;
	use Cake\Mailer\Email;
	use Cake\Event\Event;
	use Cake\Event\EventManager;
	
	class ContactForm extends Form
	{
		protected function _buildSchema(Schema $schema)
		{
			return $schema->addField('CON_Name', 'string')
				->addField('CON_Subject', ['type' => 'string'])
				->addField('CON_Email', ['type' => 'string'])
				->addField('CON_Message', ['type' => 'text']);
		}
		
		protected function _buildValidator(Validator $validator)
		{
			return $validator->add('CON_Name', 'length', [
					'rule' => ['minLength', 10],
					'message' => 'A name is required'
					])->add('CON_Email', 'format', [
						'rule' => 'email',
						'message' => 'A valid email address is required'
					])->add('CON_Subject', 'length', [
					'rule' => ['minLength', 4],
					'message' => 'A subject is required'
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