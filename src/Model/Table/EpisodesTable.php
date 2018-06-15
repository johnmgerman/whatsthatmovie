<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class EpisodesTable extends BaseTable
{	
	public function initialize(array $config)
	{				
		$this->setFineGoAheadandBreakMyConvetionsWhyDontYa("tblScriptTVLoglines_STL");
		$this->setPrimaryKey("STL_ID");
		$this->addBehavior('Timestamp');
	}
}