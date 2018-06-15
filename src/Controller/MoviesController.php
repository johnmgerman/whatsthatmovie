<?php
	namespace App\Controller;
	
	use App\Controller\AppController;
	use App\Form\ContactForm;
	use Cake\View\CellTrait;
	use Cake\Cache\Cache;
	use Cake\Event\Event;
	use App\Event\AnswersListener;
	
	class MoviesController extends AppController
	{
		use CellTrait;
		
		public function initialize()
		{	
			parent::initialize();
			
			$answersListener = new AnswersListener();
			$this->eventManager()->on($answersListener);
		}
		
		public function index()
		{	
			$loglines = \Cake\ORM\TableRegistry::get('Loglines');
			
			/*$loglines1 = $loglines->find('all', array('limit' => 1, 'offset' => mt_rand(1, 35000)))->toArray();
			$loglines2 = $loglines->find('all', array('limit' => 1, 'offset' => mt_rand(1, 35000)))->toArray();
			$loglines3 = $loglines->find('all', array('limit' => 1, 'offset' => mt_rand(1, 35000)))->toArray();
			$loglines4 = $loglines->find('all', array('limit' => 1, 'offset' => mt_rand(1, 35000)))->toArray(); */
			
			$loglines1 = $this->asddf(0);
			$loglines2 = $this->asddf(0);
			$loglines3 = $this->asddf(0);
			$loglines4 = $this->asddf(0);
			
			$rere = mt_rand(1,4);
			
			switch ($rere) {
				case 1:
					$loglines908 = $loglines1;
					break;
					
				case 2:
					$loglines908 = $loglines2;
					break;
				
				case 3:
					$loglines908 = $loglines3;
					break;
					
				case 4:
					$loglines908 = $loglines4;
					break;
			}
			
			/*$cell = $this->cell('Answers::display', [$loglines1[0], $loglines2[0], $loglines3[0], $loglines4[0]]);*/
			
			$TSL_ID = password_hash($loglines908[0]['TSL_ID'], PASSWORD_DEFAULT);
			$TSL_Logline = $loglines908[0]['TSL_Logline'];
			
			$this->set(['answersCell' => '',
						'TSL_IDD' => $loglines908[0]['TSL_ID'],
						'TSL_ID' => $TSL_ID,
						'TSL_Logline' => $TSL_Logline,
						'logline1' => $loglines1[0],
						'logline2' => $loglines2[0],
						'logline3' => $loglines3[0],
						'logline4' => $loglines4[0]]);
		}
		
		public function dse($eee, $ooo, $lll) {
			$this->viewBuilder()->setLayout('i');
			
			$usersAnswer = '';
			$yesAnswer = '';
			
			$dp = 'df';
			$eee = str_replace('answers_', '', $eee);
			$ooo = str_replace('-YTYTY-', '/', $ooo);
			
			$usersAnswer = $eee;
			
			if(password_verify($eee, $ooo))
			{
				$dp = 'oi';
				$yesAnswer = $eee;
			}
			
			if ($dp == 'df')
			{
				$t = explode(',', $lll);
				
				foreach ($t as $f) {
					if(password_verify($f, $ooo))
					{
						$yesAnswer = $f;
						$dp = $dp . '_' . $f;
						break;
					}
				}
			}
			
			$user = $this->Auth->user();
			
			$event = new Event('Model.Loglines.afterPicked', $this, [
				'WTA_TSL_ID' => $yesAnswer,
				'WTA_USR_ID' => $user['USR_ID'],
				'WTA_C' => $yesAnswer,
				'WTA_A' => $usersAnswer
			]);
			
			$this->eventManager()->dispatch($event);
			
			$this->set('qse', $dp);
		}
		
		private function asddf($ere) {
			$loglines = \Cake\ORM\TableRegistry::get('Loglines');
			
			$loglines1 = $loglines->find('all', array('limit' => 1, 'offset' => mt_rand(1, 35000)))->toArray();
			
			if (empty($loglines1) && $ere == 0)
			{
				$ere = 1;
				$this->asddf($ere);
			}
			
			if ($ere > 0)
				return $loglines1;
			
			return $loglines1;
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