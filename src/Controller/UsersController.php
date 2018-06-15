<?php

/*===========================================================

Author: John German

Description: .

Updated: 
				 
============================================================*/

namespace App\Controller;
use Cake\ORM;
use Cake\Auth\DefaultPasswordHasher;
use Cake\View\Helper\SessionHelper;
use Cake\Mailer\Email;
use App\Form\LoginForm;
use App\Form\AddForm;
use Cake\Core\Configure;
use App\Event\AspNetUserClaimsListener;
use App\Event\EmailListener;
use Cake\Event\Event;

class UsersController extends AppController
{
	private $session;
			
	public function initialize()
	{	
		parent::initialize();
		
		$aspNetUserClaimsListener = new AspNetUserClaimsListener();
		$this->eventManager()->on($aspNetUserClaimsListener);
		
		$emailListener = new EmailListener();
		$this->eventManager()->on($emailListener);
				
		$this->Auth->allow(['logout', 'add', 'login', 'authentication']);
	}
	
	public function authentication($asdf) {
		$session = $this->request->session();
		$session->write('User.authentication', $asdf);
		
		$this->Flash->error(__('Login to verify authentication.'));
		
		return $this->redirect(["controller" => "users", "action" => "login"]);
	}
	
	public function add() 
	{	
		//if ($this->Auth->user())
		//	return $this->redirect(['loglines' => 'index']); 
		
		$user = $this->Users->newEntity();
		
		$add = new AddForm();
		
		if ($this->request->is('post')) 
		{ 
			if ($add->execute($this->request->getData())) {
				$userSuccess = false;
				
				try {
					$user->USR_UserName = $this->request->getData()['usr_username'];
					$user->USR_Password = (new DefaultPasswordHasher)->hash($this->request->getData()['USR_Password']);
					$user->usr_applicationid = Configure::read('AppId');
									
					$userSuccess = $this->Users->save($user);
				} catch (Exception $e) {
					Configure::read('logErrors')(__FUNCTION__, securitizeData($this->request->getData()));
				}
				
				if ($userSuccess) 
				{
					$user = $this->Users->findByUsrUsername($user->USR_UserName)->toArray();
					
					$randomized = Configure::read('meWantRandom')();
					
					$event = new Event('Model.User.afterSave', $this, [
						'data' => $user,
						'randomized' => $randomized
					]);
					
					$this->eventManager()->dispatch($event);

					if ($event->getResult()['success']) 
					{
						$event = new Event('Model.User.afterSave', $this, [
							'data' => $user,
							'randomized' => $randomized
						]);
						
						$this->eventManager()->dispatch($event);
						
						if ($event->getResult()['success']) 
						{
							$this->Flash->success(__('.')); 
							//return $this->redirect(['action' => 'login']);
						}
					} 
				} 
			}
		} 
		
		$this->Flash->error(__('Unable to add your article.'));
			
		$this->set(['add' => $add,
					'params' => array()]);
	}
	public function isAuthorized()
	{
		
	}
	
	private function securitizeData($data) {
		return (new DefaultPasswordHasher)->hash($data);
	}
	
	public function login()
	{	
		$login = new LoginForm();
		$session = $this->request->session();
				
		if($this->request->is('post')) {
			$user = $this->Auth->identify();
			
			if ($user) {
				
				$event = new Event('Model.User.afterLogin', $this, [
					'authentication' => $session->read('User.authentication'),
					'id' => $user['USR_ID']
				]);
				
				$this->eventManager()->dispatch($event);
				
				if ($event->getResult()['success'])
				{						
					if ($user['USR_EmailVerified'] == 'N')
					{
						$user['USR_EmailVerified'] = 'Y';
						
						$session->delete('User.authentication');
					}
					
					$this->Auth->setUser($user);
				}
				
				//$this->Flash->error(__('Check e-mail to verify account.'));
			}
		}
		
		$this->set('login', $login);
	}

	public function logout() {
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}
}

?>