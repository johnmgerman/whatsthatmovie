<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
use Cake\ORM;

class ScriptStatsController extends AppController
{
	public function ie() {
		$stmt = $this->ScriptStats->findBySqs_totalquotecount(6347);
		$this->set(compact('stmt'));
	}
	
	public function index()
	{
		/*=============
		// Get JSON encoded data submitted to a PUT/POST action $jsonData = $this->request->input('json_decode');
		===============*/
		
		/*=========================================
		• is('get') Check to see whether the current request is a GET. 
		• is('put') Check to see whether the current request is a PUT. 
		• is('patch') Check to see whether the current request is a PATCH. 
		• is('post') Check to see whether the current request is a POST. 
		• is('delete') Check to see whether the current request is a DELETE. 
		• is('head') Check to see whether the current request is HEAD. 
		• is('options') Check to see whether the current request is OPTIONS. 
		• is('ajax') Check to see whether the current request came with X-Requested-With = XMLHttpRequest. 
		• is('ssl') Check to see whether the request is via SSL. 
		• is('flash') Check to see whether the request has a User-Agent of Flash. 
		• is('requested') Check to see whether the request has a query param ‘requested’ with value 1. 
		• is('json') Check to see whether the request has ‘json’ extension and accept ‘application/json’ mimetype
		==========================================*/
		
		/*========================================
		$acceptsJson = $this->request->accepts('application/json');
		==========================================*/
		
		/*==================================================
		// If you want a json response 
		$response = $response->withType('application/json') ->withStringBody(json_encode(['Foo' => 'bar']));
		===================================================*/
		
		/*=================================================
		// After 3.1.0 you should use 
		$this->RequestHandler->config('inputTypeMap.json', ['json_decode', true]);
		// The above will make $this->request->getData() an array of the JSON input data, without the additional true you’d get a set of stdClass objects. 
		===================================================*/
		
		/*=================================================
		
		//The IntegrationTestCase class provides a number of assertion methods that make testing responses much simpler. Some examples are:
		// Check for a 2xx response code 
		$this->assertResponseOk();
		// Check for a 2xx/3xx response code 
		$this->assertResponseSuccess();
		// Check for a 4xx response code 
		$this->assertResponseError();
		// Check for a 5xx response code 
		$this->assertResponseFailure();
		// Check for a specific response code, e.g. 200 
		$this->assertResponseCode(200);
		// Check the Location header 
		$this->assertRedirect(['controller' => 'Articles', 'action' => 'index']);
		// Check that no Location header has been set 
		$this->assertNoRedirect();
		// Check a part of the Location header 
		$this->assertRedirectContains('/articles/edit/');
		// Assert not empty response content 
		$this->assertResponseNotEmpty();
		// Assert empty response content 
		$this->assertResponseEmpty();
		// Assert response content 
		$this->assertResponseEquals('Yeah!');
		// Assert partial response content 
		$this->assertResponseContains('You won!'); $this->assertResponseNotContains('You lost!');
		// Assert layout $this->assertLayout('default');
		682 Chapter 28. Testing
		CakePHP Cookbook Documentation, Release 3.5
		// Assert which template was rendered (if any) 
		$this->assertTemplate('index');
		// Assert data in the session 
		$this->assertSession(1, 'Auth.User.id');
		// Assert response header. 
		$this->assertHeader('Content-Type', 'application/json');
		// Assert view variables 
		$user = $this->viewVariable('user'); $this->assertEquals('jose', $user->username);
		// Assert cookies in the response 
		$this->assertCookie('1', 'thingid');
		// Check the content type 
		$this->assertContentType('application/json');
		=========================================================*/
		
		/*=======================================================
		// Send a JSON request body. 
		$http = new Client(); 
		$response = $http->post( 'http://example.com/tasks', json_encode($data), ['type' => 'json'] );
		========================================================*/
		
		/*======================================================
		// Get some JSON 
		$http = new Client(); 
		$response = $http->get('http://example.com/test.json'); 
		$json = $response->json;
		=======================================================*/
		
		//Inflector::underscore("tblScriptQuotesStats_SqsTable");
		/*$this->autoRender = false;

		return json_encode($this->ModelBla->find('first',array(
			'conditions'=>array('Bla.bla_child_id'=>$estado_id)
		)));*/
		
		/*$sqss = d\TableRegistry::get('tblScriptQuotesStatsSqsTable', [
			'className' => 'App\Model\Table\tblScriptQuotesStats_SqsTable',
			'table' => 'tblScriptQuotesStats_SQS',
			'entityClass' => 'App\Model\Entity\ScriptQuotesStats_SQS_Entity'
		]);
		var_dump($sqss);
		$sqss = $sqss->find();
		$this->set(compact('sqss'));*/
		
		//$stmt = $this->ScriptStats->findBySqs_totalquotecount(6347); //$this->asdf()->execute( 'CALL sp_w()' )->findBySqs_totalquotecount();
		
		//$stmt->execute();
		
		//var_dump($stmt);
		
		//$stmt = $conn->execute( 'SELECT * FROM articles WHERE published = ?', [true] );

	
		/*$this->loadComponent('Paginator');
		//var_dump($this);
        $sqss = $this->Paginator->paginate($this->ScriptStats->find());
        $this->set(compact('sqss'));*/
	}
}