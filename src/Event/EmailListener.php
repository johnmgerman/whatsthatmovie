<?php

/*===========================================================

Author: John German

Description: Event listener for all e-mail related.

Updated: 
11-21-2017: sendUserActivation, send, $from, $to, $subject, 
			$template, $emailFormat, $viewVars.
				 
============================================================*/

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Mailer\Email;
use Cake\Event\Event;

class EmailListener implements EventListenerInterface {
	private $_event;
	private $_from;
	private $_to;
	private $_subject;
	private $_template;
	private $_emailFormat;
	private $_viewVars;
	
    public function implementedEvents() {
        return array(
        'Model.Contact.afterSave' => 'sendContactsEmail',
		'Model.User.afterSave' => 'sendUserActivation',
		'Model.Errors' => 'sendErrorEmail'
		);
	}
	
	public function sendUserActivation(Event $event) {
		$this->_event = $event;
		$this->_from = 'john.m.german@localhost';
		$this->_to = $event->data['data'][0]['USR_UserName'];
		$this->_subject = 'User Activation';
		$this->_template = 'user';
		$this->_emailFormat = 'both';
		$this->_viewVars = ['randomized' => $event->data['randomized']];
				
		$this->send();
	}
	
	public function sendContactsEmail(Event $event) {
		$this->_event = $event;
		$this->_from = 'john.m.german@localhost';
		$this->_to = 'john.m.german@localhost';
		$this->_subject = $event->data['data']['CON_Subject'];
		$this->_template = 'contact';
		$this->_emailFormat = 'both';
		$this->_viewVars = ['CON_Name' => $event->data['data']['CON_Name'], 
					'CON_Email' => $event->data['data']['CON_Email'],
					'CON_Subject' => $event->data['data']['CON_Subject'],
					'CON_Message' => $event->data['data']['CON_Message']];
					
		$this->send();
	}
	
	public function sendErrorEmail(Event $event) {
		$this->_event = $event;
		$this->_from = 'john.m.german@localhost';
		$this->_to = 'john.m.german@localhost';
		$this->_subject = 'Errors';
		$this->_template = 'error';
		$this->_emailFormat = 'both';
		$this->_viewVars = ['error' => $event->data['error']];
					
		$this->send();
	}
	
	private function send()
	{		
		$return = false; 
				
		try {
			$email = new Email('default');
			$email->from([$this->_from])
			->to($this->_to)
			->subject($this->_subject)
			->template($this->_template)
			->emailFormat($this->_emailFormat)
			->viewVars($this->_viewVars);
			
			if ( $email->send() ) {
				$return = true;
			} else {
				Configure::read('logErrors')(__FUNCTION__,[$this->_from, $this->_to, $this->_subject, $this->_template, $this->_emailFormat]);
			}
		} catch ( Exception $e ) {
			Configure::read('logErrors')(__FUNCTION__,[$this->_from, $this->_to, $this->_subject, $this->_template, $this->_emailFormat]);
		}
		
		$this->_event->setResult(['success' => $return]);
	}
}