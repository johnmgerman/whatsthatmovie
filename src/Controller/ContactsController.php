<?php
/*===========================================================

Author: John German

Description: .

Updated: 
				 
============================================================*/

	namespace App\Controller;
	
	use App\Controller\AppController;
	use App\Form\ContactForm;
	use Cake\Event\Event;
	use App\Event\EmailListener;
	use Cake\Core\Configure;
	
	class ContactsController extends AppController
	{
		public function index()
		{				
			$emailListener = new EmailListener();
			$this->eventManager()->on($emailListener);

			$contact = new ContactForm();
			
			if ($this->request->is('post')) {
				if ($contact->execute($this->request->getData())) {
					$contactSuccess = false;
					
					try {
						$contacts = \Cake\ORM\TableRegistry::get('Contacts');
						$contact = $contacts->newEntity();
						
						$contact->CON_Name = $this->request->getData()['CON_Name'];
						$contact->CON_Subject = $this->request->getData()['CON_Subject'];
						$contact->CON_Message = $this->request->getData()['CON_Message'];
						$contact->CON_Email = $this->request->getData()['CON_Email'];
						
						$contactSuccess = $contacts->save($contact);
					} catch ( Exception $e ) {
						Configure::read('logErrors')(__FUNCTION__,$e);
					}
					
					if ($contactSuccess)
					{
						$event = new Event('Model.Contact.afterSave', $this, [
							'data' => $this->request->getData()
						]);
						
						$this->eventManager()->dispatch($event);

						if ($event->getResult()['success'])
							$this->Flash->success('_');
					}
				} else {
					$this->Flash->error('asdf asdfd asdf adsf.');
				}
			}
					   
			$this->set(['contact' => $contact,
					   'answersCell' => '']);
		}
		
		public function isAuthorized()
		{
			if ($this->Auth->user() != null)
				return true;
			else
				return false;
		}
	}
?>