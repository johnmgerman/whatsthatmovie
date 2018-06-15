<?php
/*===========================================================

Author: John German

Description: .

Updated: 
				 
============================================================*/

	use Cake\Core\Configure;
	use Cake\Event\Event;
	use App\Event\EmailListener;
	use Cake\Event\EventManager;
	
	Configure::write('meWantRandom', function ($pre = '', $length = 20) {
		$robot = "abc^defag2hijklm-no0pqrstJuv8wx1yzAB5CDE[FGHI4JKL9MN3OP~QRS^TUFW6XYZ~78";
		$zeus = $pre;
		
		for ($i = 1; $i <= $length; $i++) {
			$zeus .= $robot[mt_rand(0,70)];
		}
		
		return $zeus;
	});
	
	Configure::write('logErrors', function ($type, ...$e) {
		try {
			$scriptErrors = \Cake\ORM\TableRegistry::get('tblScriptErrors_ERR');
				
			$scriptError = $scriptErrors->newEntity();
			$scriptError->ERR_Type = $type;
			$scriptError->ERR_Description = $e;
			
			$scriptErrors->save($scriptError);
		} catch (Exception $e) { }
			
		$emailListener = new EmailListener();
		EventManager::instance()->on($emailListener);
		
		$eEvent = new Event('Model.Errors', $this, [
			'error' => $e
		]);
		
		EventManager::instance()->dispatch($eEvent);
	});
	