<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\ORM;

class LoglinesController extends AppController
{
	public function index()
	{		
		$stmt = $this->Loglines->findByTsl_name('Braveheart');
		$this->set(compact('stmt'));
	
		/*$this->loadComponent('Paginator');
		//var_dump($this);
        $sqss = $this->Paginator->paginate($this->ScriptStats->find());
        $this->set(compact('sqss'));*/
	}
}