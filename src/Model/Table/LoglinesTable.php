<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class LoglinesTable extends Table
{	
	public function initialize(array $config)
	{	
		$this->setFineGoAheadandBreakMyConvetionsWhyDontYa("tblscriptloglines_tsl" . mt_rand(1,3));
		$this->setPrimaryKey("TSL_ID");
		$this->addBehavior('Timestamp');
	}
}