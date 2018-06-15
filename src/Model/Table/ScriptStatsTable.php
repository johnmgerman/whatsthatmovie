<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ScriptStatsTable extends BaseTable
{	
	public function initialize(array $config)
	{				
		//$this->belongsTo('tblScriptQuotesStats_SQS');
		$this->setFineGoAheadandBreakMyConvetionsWhyDontYa("tblScriptQuotesStats_SQS");
		$this->setPrimaryKey("SQS_ID");
		//$this->setEntityClass("App\Model\Entity\ScriptQuotesStats_SQS_Entity");
		
		//var_dump($this);
		
		//$this->setUp(array('table' => 'tblScriptQuotesStats_SQS', 'table_id' => 'SQS_ID', 'table_entity' => 'tblScriptQuotesStats_SQS_Entity'));
		$this->addBehavior('Timestamp');
	}
}