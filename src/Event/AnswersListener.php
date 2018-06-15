<?php

/*===========================================================

Author: John German

Description:.
				 
============================================================*/

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\Core\Configure;

class AnswersListener implements EventListenerInterface {
	
    public function implementedEvents() {
        return array(
        'Model.Loglines.afterPicked' => 'uneriuerndiadsiwerDnwerlkjadsdLowenwer'
		);
	}
	
	public function uneriuerndiadsiwerDnwerlkjadsdLowenwer(Event $event) {
		$return = false;
		
		try {
			$kerners = \Cake\ORM\TableRegistry::get('Answers');
			
			$kerner = $kerners->newEntity();
			$kerner->WTA_TSL_ID = $event->data['WTA_TSL_ID'];
			$kerner->WTA_USR_ID = $event->data['WTA_USR_ID'];
			$kerner->WTA_C = $event->data['WTA_C'];
			$kerner->WTA_A = $event->data['WTA_A'];
			
			if ($kerners->save($kerner))
				$return = true;
			
		} catch ( Exception $e ) {
			Configure::read('logErrors')(__FUNCTION__,$e);
		}
				
		$event->setResult(['success' => $return]);
	}
}