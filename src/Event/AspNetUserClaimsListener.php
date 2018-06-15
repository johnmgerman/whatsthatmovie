<?php

/*===========================================================

Author: John German

Description:.
				 
============================================================*/

namespace App\Event;

use Cake\Event\EventListenerInterface;
use Cake\Mailer\Email;
use Cake\Event\Event;
use App\Event\EmailListener;
use Cake\Core\Configure;

class AspNetUserClaimsListener implements EventListenerInterface {
	
    public function implementedEvents() {
        return array(
        'Model.User.afterSave' => 'saveUserAuthentication',
		'Model.User.afterLogin' => 'deleteUserAuthentication'
		);
	}
	
	public function deleteUserAuthentication(Event $event) {
		$return = false;
		
		try {
			$aspNetUserClaims = \Cake\ORM\TableRegistry::get('AspNetUserClaims');	

			$aspNetUserClaim = $aspNetUserClaims->findByUserid($event->data['id']);	

			if(empty($aspNetUserClaim->toArray()))
				$return = true;
			
			if ($return == false) {
				$aspNetUserClaim = $aspNetUserClaims->findByClaimvalueAndUserid($event->data['authentication'],$event->data['id']);
				
				if(!empty($aspNetUserClaim->toArray()))
				{
					$checkDelete = $aspNetUserClaims->delete($aspNetUserClaim->first());
					
					if ($checkDelete)
						$return = true;
				}
			}
			
		} catch ( Exception $e ) {
			Configure::read('logErrors')(__FUNCTION__,$e);
		}
		
		$event->setResult(['success' => $return]);
	}
	
	public function saveUserAuthentication(Event $event) {
		$return = false;
		
		try {
			$aspNetUserClaims = \Cake\ORM\TableRegistry::get('AspNetUserClaims');
			
			$aspNetUserClaim = $aspNetUserClaims->newEntity();
			$aspNetUserClaim->ClaimType = 'RegisterNew';
			$aspNetUserClaim->UserId = $event->data['data'][0]['USR_ID'];
			$aspNetUserClaim->ClaimValue = $event->data['randomized'];
			
			if ($aspNetUserClaims->save($aspNetUserClaim))
				$return = true;
			
		} catch ( Exception $e ) {
			Configure::read('logErrors')(__FUNCTION__,$e);
		}
				
		$event->setResult(['success' => $return]);
	}
}