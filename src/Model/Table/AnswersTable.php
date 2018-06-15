<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AnswersTable extends Table
{	
	public function initialize(array $config)
	{				
		$this->setFineGoAheadandBreakMyConvetionsWhyDontYa("tblWhatTheAnswers_WTA");
		$this->setPrimaryKey("WTA_TSL_ID");
	}
}