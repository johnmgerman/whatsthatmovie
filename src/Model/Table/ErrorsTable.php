<?php

/*===========================================================

Author: John German

Description:.

Updated: 
				 
============================================================*/

namespace App\Model\Table;

use Cake\ORM\Table;

class ErrorsTable extends Table
{	
	public function initialize(array $config)
	{				
		$this->setFineGoAheadandBreakMyConvetionsWhyDontYa("tblScriptErrors_ERR");
		$this->setPrimaryKey("ERR_ID");
		$this->addBehavior('Timestamp');
	}
}