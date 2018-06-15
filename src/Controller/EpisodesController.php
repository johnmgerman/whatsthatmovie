<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\ORM;

class EpisodesController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
	
	public function index()
	{
		$stmt = $this->Episodes->findByStlTslId('206C8E68-7730-4D24-B08E-589668D6B739');
		$this->set(compact('stmt'));
		
		$this->set('_serialize', ['stmt']);
		
		/*$this->loadComponent('Paginator');
		//var_dump($this);
        $sqss = $this->Paginator->paginate($this->ScriptStats->find());
        $this->set(compact('sqss'));*/
	}
}